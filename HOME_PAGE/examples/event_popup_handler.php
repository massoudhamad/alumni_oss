<?php
session_start();
include("../../connection.php");
if ($_SERVER["REQUEST_METHOD"] == "POST")
  {
    $etitle = $_POST["event_tittle"];
    $description = $_POST["event_description"];
    $etime = $_POST["e_time"];
    $eadd = $_POST["e_address"];
    $pic= $_FILES['attachment'];
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
  $path="../../GALLERY/".$filename;
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
    $query5 = "INSERT INTO event_ (user_ID, event_tittle, event_description, e_time, e_address, attachment) VALUES (:user_ID,:event_tittle,:event_description,:e_time,:e_address, :attachment)";
    $runq5 = $conn->prepare($query5);
    $runq5->bindParam(":user_ID",$ui);
    $runq5->bindParam(":event_tittle",$et);
    $runq5->bindParam(":event_description",$edes);
    $runq5->bindParam(":e_time",$edate);
    $runq5->bindParam(":e_address",$ead);
    $runq5->bindParam(":attachment", $eat);
    $ui = $user_ID;
    $et = $etitle;
    $edes = $description;
    $edate = date("Y-m-d h:i:sa");
    $ead = $eadd;
    $eat = $filename; 
   if($runq5->execute())
    {
      header("location:all_events.php");
     ?>
      <script>
                  Swal.fire({
                    icon: 'success',
                    title: 'Event created',
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
                    title: 'Failed to create event',
                  })
                  
                </script>
                <?php
  $_SESSION["ERROR"]=$err;
  header("location:all_events.php?sts=Upload failed, try again ");
  }

  }
}
}

?>
