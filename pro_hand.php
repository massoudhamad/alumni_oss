<?php

session_start();
include('connection.php');
$pic= $_FILES['picture'];
$alowed_ext=array("png","jpg","gif");
$exp = explode(".",$pic["name"]);
$ext=strtolower(end($exp));
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
  $path="PROFILE/".$filename;
  if(move_uploaded_file($pic["tmp_name"],$path))
  {
    // $query5 = "UPDATE login SET profile = '$filename' WHERE username = 'HASUKO'";
    $query5 = "UPDATE login SET profile = :pro WHERE username = :user";
    // $runq5 = $conn->query($query5);
    $runq5 = $conn->prepare($query5);
    $runq5->bindParam(":pro",$parameter_x);
    $runq5->bindParam(":user",$parameter_y);
    $parameter_x = $filename;
    $parameter_y = $logged_user; 
   $xx = $runq5->execute();
    // if ($runq5)
   if($xx)
    {
    header("location:HOME_PAGE/examples/profile_change.php?msg");  
    }
else
  {
  $_SESSION["ERROR"]=$err;
  header("location:HOME_PAGE/examples/profile_change.php?sts=Upload failed, try again ");
  }
}
}

?>