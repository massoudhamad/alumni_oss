<?php 

include('../../connection.php');

$delete_id = $_POST['delete_id'];

$query = "DELETE FROM feedback WHERE feed_id = :feed";
$run->$conn->prepare($query);
$sleman = array(":feed"=>$delete_id);
$execute = $run->execute($sleman);

?>