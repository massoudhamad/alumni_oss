<?php
	session_start();
	include"../../connection.php";
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{	
		$id  = $_POST['id'];
		$chat  = $_POST["chat"];
		$user  = $_SESSION['user_ID'];
		$check   = $conn->query("SELECT group_members.g_member_id from group_members WHERE group_members.grou_id = $id");
		$data  = $check->fetch(PDO::FETCH_ASSOC);
		$g_member_id  = $data['g_member_id'];

		$check2  = $conn->query("SELECT m_id from members where user_id =$user");
		$data2  = $check2->fetch(PDO::FETCH_ASSOC);
		$m_id  =  $data2['m_id'];
		$query5  = "INSERT INTO chat (g_member_id,m_id,message,time_posted,date_posted) VALUES ('$g_member_id','$m_id','$chat',NOW(),NOW())";
		$run  = $conn->query($query5); 
			if ($run)
			{
				header("location:chat_group.php?id=".$id);
			}
    	
	}

?>