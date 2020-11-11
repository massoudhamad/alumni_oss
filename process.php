
<?php
include("connection.php");
if (isset($_POST["save"]))
{
  $username = $_POST["username"];
  $first    = $_POST["first"];
  $last     = $_POST["last"];
  $address  = $_POST["address"];
  $password = sha1($_POST["password"]);
  $email    = $_POST["email"];
  $phone    = $_POST["phone"];
  $gender   = $_POST["gender"];
  $role     = $_POST["role"];

  $query = "SELECT * FROM users,login WHERE login.login_id = users.user_ID AND username = ? AND password = ?";
  $hasuko = array("$username","$password");
  $run = $conn->prepare($query);
  $execute = $run->execute($hasuko);
  $num = $run->rowCount();
    if ($num == 0)
    {
      $query2 = "INSERT INTO login (username,password,user_role,user_status) VALUES (?,?,?,?)";
      $run2 = $conn->prepare($query2);
      $hasuko2 = array("$username","$password","$role","ACTIVE");
      $execute2 = $run2->execute($hasuko2);

      if($execute2)
      {
        $query3 = "SELECT login_id FROM login WHERE username = :aa";
        $run3 = $conn->prepare($query3);
        $run3->bindParam(":aa",$parameter1);
        $parameter1 = $username;
        $execute3 = $run3->execute();
        $num2 = $run3->rowCount();
        $row2 = $run3->fetch(PDO::FETCH_ASSOC);
        if ($num2 == 1)
        {
          
          $xx = $row2["login_id"];
          $query4 = "INSERT INTO users (user_ID,f_name,l_name,address,gender,email,contact,approval) VALUES (:aa,:a,:b,:c,:d,:e,:f,:g)";
          $run4 = $conn->prepare($query4);
          $run4->bindParam(":aa",$parameter11);
          $run4->bindParam(":a",$parameter2);
          $run4->bindParam(":b",$parameter3);
          $run4->bindParam(":c",$parameter4);
          $run4->bindParam(":d",$parameter5);
          $run4->bindParam(":e",$parameter6);
          $run4->bindParam(":f",$parameter7);
          $run4->bindParam(":g",$parameter8); 
          $parameter11=$xx;
          $parameter2 =$first;
          $parameter3 =$last;
          $parameter4 =$address;
          $parameter5 =$gender;
          $parameter6 =$email;
          $parameter7 =$phone;
          $parameter8 ="not-approved";
          $execute4 = $run4->execute();
                if ($execute4)

                    {
                      $query5  =$conn->query("SELECT users.user_ID from users,login WHERE users.user_ID = login.login_id AND username = '$username'");
                      $count =$query5->rowCount();
                      if($count == 1)
                      {
                        $fetch2 = $query5->fetch(PDO::FETCH_ASSOC);
                        $ID = $fetch2["user_ID"];
                        $query6 = "INSERT INTO members (user_id) VALUES (:u)";
                        $run6 = $conn->prepare($query6);
                        $run6->bindParam(":u",$p1);
                        $p1 = $ID;
                        if($run6->execute())
                        {
                            header("location:HOME_PAGE/examples/admin_registration.php?sms=");
                        }else
                        {
                             header("location:HOME_PAGE/examples/admin_registration.php?sms2=");
                        }
                      }
                    }
                else 
                {
                header("location:HOME_PAGE/examples/admin_registration.php?sms3=");
                }    
        }
      }
    }

}

?>





<?php 

if($_SERVER["REQUEST_METHOD"] == "POST")
{
  $ID2     = $_POST["id2"];
  $ID     = $_POST["id"];
  $first    = $_POST["first"];
  $last     = $_POST["last"];
  $address  = $_POST["address"];
  $email    = $_POST["email"];
  $phone    = $_POST["phone"];
  $gender   = $_POST["gender"];
  $role     = $_POST["role"];
  $username = $_POST["username"];

      $update = "UPDATE login SET username = '$username', user_role = '$role' WHERE login_id = $ID";

      $runupdate = $conn->query($update);
      if($runupdate)
      {
          $update2 = "UPDATE users SET f_name = '$first', l_name='$last',address='$address',gender='$gender',email='$email',contact='$phone' WHERE users.user_ID=$ID2";
          $runupdate2 = $conn->query($update2);

          if ($runupdate2)
          {
            header("location:HOME_PAGE/examples/admin_registration.php?x=");
          
          }
      }
}
?>