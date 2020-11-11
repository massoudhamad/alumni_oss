<?php
  
  include("../../connection.php");

  if (isset($_GET["approval"]))
  {
    $approval = $_GET["approval"];
    $query1 = "SELECT * FROM users,login WHERE login.login_id = users.user_ID AND users.user_ID = :id";
    $run = $conn->prepare($query1);
    $run->bindParam(":id",$parameter1);
    $parameter1 = $approval;
    $run->execute();
    $num = $run->rowCount();
    if ($num == 1)
    {
      $query2 = "UPDATE users SET approval = ? WHERE users.user_ID = ?";
      $run2 = $conn->prepare($query2);
      $hasuko = array("approved",$approval);
      $execute = $run2->execute($hasuko);
      if($execute)
      {
      header("location:home.php?msg=updation successifully");
    }
    }

  }

?>