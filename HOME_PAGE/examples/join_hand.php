<?php
session_start();
include("../../connection.php");

	if (isset($_GET['id']))
	{
		$x  = $_GET['id'];
		$y  = $_SESSION['member_ID'];
		$check =  $conn->query("SELECT * FROM group_members WHERE grou_id = $x AND m_id =$y");
			$num = $check->rowCount();
			if($num > 0)
		{
			header("location:home.php?sms10=");
		}else{
			$query  = $conn->query("INSERT INTO group_members (grou_id,m_id) VALUES ($x,$y)");
			if($query)
			{
				header("location:my_groups.php?sms9=");
			}
		}
	}
?>
