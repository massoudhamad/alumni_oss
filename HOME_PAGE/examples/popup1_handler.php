<?php
session_start();
include("../../connection.php");
if ($_SERVER["REQUEST_METHOD"] == "POST")
  {
    $forum_name = $_POST["f_name"];
    $description = $_POST["description"];
    $pic= $_FILES['picture'];
    $alowed_ext=array("png","jpg","gif");
    $x = explode(".",$pic["name"]);
    $ext=strtolower(end($x));
    $err=array();
    if(!in_array($ext,$alowed_ext))
    {
      $err[count($err)]="Invalid FIle Type. only JPG, PNG and GIF are allowed";
    }
    if($pic["size"]>10097152)
    {
    $err[count($err)]="Invalid FIle Size. Maximum size allowed is 10MB";
    }
    if(sizeof($err)==0)
    {
  $logged_user=$_SESSION['username'];
  $filename=$logged_user.".".$ext;
  $path="../../FORUM/".$filename;
  if(move_uploaded_file($pic["tmp_name"],$path))
  {
    $query = "SELECT user_ID FROM users,login WHERE login.login_id = users.user_ID AND username = :username";
    $run = $conn->prepare($query);
    $run->bindParam(":username",$p1);
    $p1 = $logged_user;
      $exe = $run->execute();
      $num=$run->rowCount();
      if ($num == 1)
      { 
        $row = $run->fetch(PDO::FETCH_ASSOC);
        $user_ID = $row["user_ID"];
    $query5 = "INSERT INTO forum (user_ID,forum_tittle,forum_description,forum_date,forum_attachment) VALUES (:a,:b,:c,:d,:e)";
    $runq5 = $conn->prepare($query5);
    $runq5->bindParam(":a",$parameter_x);
    $runq5->bindParam(":b",$parameter_y);
    $runq5->bindParam(":c",$parameter_z);
    $runq5->bindParam(":d",$parameter_a);
    $runq5->bindParam(":e",$parameter_b);
    $parameter_x = $user_ID;
    $parameter_y = $forum_name;
    $parameter_z = $description;
    $parameter_a = date("Y-m-d h:i:sa");
    $parameter_b = $filename; 
   if($runq5->execute())
    {
      header("location:view_forums.php");
     ?>
      <script>
                  Swal.fire({
                    icon: 'success',
                    title: 'Forum Created',
                  })
                  
                </script>
   <?php
   
    }
   }   
else
  { ?>
    <script>
                  Swal.fire({
                    icon: 'error',
                    title: 'Forum Was Not Created',
                  })
                  
                </script>
                <?php
  $_SESSION["ERROR"]=$err;
  header("location:forum.php?sts=Upload failed, try again ");
  }

  }
}
}

?>
