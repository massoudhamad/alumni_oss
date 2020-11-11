

<?php
include("connection.php");
$user  = $_SESSION['username'];
$query = "SELECT profile FROM login WHERE login.username = :pro";

$run = $conn->prepare($query);
$run->bindParam(":pro",$para);
$para = $user;
$execute = $run->execute();
$fetch = $run->fetch(PDO::FETCH_ASSOC);

$path = "../../PROFILE/".$fetch["profile"];
?>
<img style="width: 70%; height: 20%; border-radius: 150px; margin-left: 40px;" src="<?php echo $path;?>">