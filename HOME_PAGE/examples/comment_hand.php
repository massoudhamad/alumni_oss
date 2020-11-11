<?php
session_start();
include("../../connection.php");
  if($_SERVER["REQUEST_METHOD"]  ==  "POST")
  {

     $comment = $_POST["comment"];
     $forum = $_POST["forum"];
     $user = $_SESSION['user_ID'];
      $query2  = "INSERT INTO comment (forum_id,user_ID,comment_description,comment_time) VALUES (:a,:d,:b,:c)";
      $run2  = $conn->prepare($query2); 
      $run2->bindParam(":a",$p1);
      $run2->bindParam(":d",$p4);
      $run2->bindParam(":b",$p2);
      $run2->bindParam(":c",$p3);
      $p4= $user;
      $p1 = $forum;
      $p2 = $comment;
      $p3 = date("Y-m-d h:i:sa");
      $exec = $run2->execute();
      header("location:my_forum_show_comment.php?sms=".$forum."#hasuko");  
   
  }

?>