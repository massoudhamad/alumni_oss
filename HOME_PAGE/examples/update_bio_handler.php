<?php
session_start();
include("../../connection.php");
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $bio = $_POST["user_bio"];
    $user_ID = $_SESSION['user_ID'];
   
    $queryu = "UPDATE users SET user_bio = :user_bio WHERE user_ID = :user_ID";
    $runu = $conn->prepare($queryu);
    $runu->bindParam(":user_bio",$ub);
    $runu ->bindParam(":user_ID", $ui);
    $ub = $bio;
    $ui = $user_ID;
     
   if($runu->execute())
    {
      if($_SESSION["user_role"]=="ADMIN")
       {
         header("location:admin_registration.php");
       }

       else {
      header("location:profile_change.php");
       }
     ?>
      <script>
                  Swal.fire({
                    icon: 'success',
                    title: 'Profile Updated',
                  })
                  
                </script>
      <?php
   
    }
    
 else
  { ?>
    <script>
                  Swal.fire({
                    icon: 'error',
                    title: 'Profile not Updated',
   })
                  
                </script>
                <?php
   }

  
}


?>
