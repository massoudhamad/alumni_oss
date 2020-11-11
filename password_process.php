  <?php

  session_start();
  include("connection.php");
  if ($_SERVER["REQUEST_METHOD"] == "POST")
  {
    $current = sha1($_POST["password"]);
    $new   = sha1($_POST["new_pass"]);
    $new2  = sha1($_POST["re_pass"]);
    $x = $_SESSION['username'];

      if ($new ==  $new2)
  {
    $query = " SELECT password FROM login WHERE username = :username AND password = :password";
    $run = $conn->prepare($query);
    $run->bindParam(":username",$para1);
    $run->bindParam(":password",$para2);

    $para1 = $x;
    $para2 = $current;
    // $sleman = array($x,$current);
    $execute = $run->execute();
        if ($execute)
    {
          $num = $run->rowCount();
          if ($num  >  0)
        {
              $query2 = "UPDATE login set password = :pass WHERE username = :user";
              $runq2  = $conn->prepare($query2);
              $runq2->bindParam(":pass",$parameter1);
              $runq2->bindParam(":user",$parameter2);

              $parameter1 = $new;
              $parameter2 = $x; 

              if ($runq2->execute())
              {
                header("location:HOME_PAGE/examples/change_password.php?ssmmss=");
              }
              // else
              // {
              //   header("location:HOME_PAGE/examples/change_password.php?ssmmss2 = ");
              // }
        }
        else{
                  header("location:HOME_PAGE/examples/change_password.php?ssmmss2=");   
        }
    }
  }
     else {
              header("location:HOME_PAGE/examples/change_password.php?ssmmss3= ");    
          }
} 

?>