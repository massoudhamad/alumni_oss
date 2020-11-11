<?php

session_start();
require_once("connection.php");
if($_SERVER["REQUEST_METHOD"]== "POST")
{

$username  = $_POST["username"];
$password  = sha1($_POST["password"]);

	$check = "SELECT * FROM users,login WHERE login.login_id = users.user_ID AND username = :user AND password = :pass AND approval != :app";

	$runcheck = $conn->prepare($check);

	$runcheck->bindParam(":user",$parameter1);
	$runcheck->bindParam(":pass",$parameter2);
	$runcheck->bindParam(":app",$parameter3);
	$parameter1 = $username;
	$parameter2 = $password;
	$parameter3 = "approved";
	
	$checkexe = $runcheck->execute();
	$num = $runcheck->rowCount();
		if ($num == 0)
		{
			$sleman = array("$username","$password");
			$query2 = "SELECT * FROM login,users,members WHERE  users.user_ID = login.login_id AND users.user_ID = members.user_id AND username = ? AND password = ?";
			$runq2 = $conn->prepare($query2);
			$execute = $runq2->execute($sleman);
			if ($execute)
			{
			$numrows = $runq2->rowCount();
			$row = $runq2->fetch(PDO::FETCH_ASSOC);
				if ($numrows > 0)
				{
				$_SESSION['user_ID'] = $row["user_ID"];
				$_SESSION['userID'] = $row["login_id"];
				$_SESSION['member_ID'] = $row["m_id"];
				$_SESSION['username'] = $username;
				$_SESSION['user_role'] = $row["user_role"];
				$_SESSION['time'] = time();
				if ($_SESSION["user_role"] == "ADMIN")
					{
				header("location:HOME_PAGE/examples/home.php");
					}
					else{
					$user = $_SESSION['user_ID'];
					$checkprofile = $conn->query("SELECT * FROM profile,users WHERE users.user_ID=profile.user_ID AND profile.user_ID =$user");
					$ourrows = $checkprofile->fetch(PDO::FETCH_ASSOC);
						if($calculate = $checkprofile->rowCount() == 0)
								{
									
									header("location:HOME_PAGE/examples/fill_info.php");
								}else{
									header("location:HOME_PAGE/examples/home.php");
								}
						}
					

				}
				else
				{
					header("location:login.php?sms=");
				}
			}
		}
		else{
			header("location:login.php?sts=");
		}
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
	<title>ALUMNI INFORMATION SYSTEM</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="LOGIN/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="LOGIN/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="LOGIN/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="LOGIN/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="LOGIN/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="LOGIN/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="LOGIN/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="LOGIN/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="LOGIN/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="LOGIN/css/util.css">
	<link rel="stylesheet" type="text/css" href="LOGIN/css/main.css">
<!--===============================================================================================-->

<link rel="stylesheet" type="text/css" href="HOME_PAGE/examples/popup/sweetalert2.css">
<link rel="stylesheet" type="text/css" href="HOME_PAGE/examples/popup/sweetalert2.min.css">

<script src="HOME_PAGE/examples/popup/sweetalert2.js"></script>
<script src="HOME_PAGE/examples/popup/sweetalert2.min.js"></script>
<script src="HOME_PAGE/examples/popup/sweetalert2.all.js"></script>
<script src="HOME_PAGE/examples/popup/sweetalert2.all.min.js"></script>
</head>
<body style="background-color: #666666;">


		<style>
		.alert
		{
			padding: 20px;
			background-color: #f44336;
			color: white;
		}
		.alert1
		{
			padding: 20px;
			background-color: #008000;
			color: white;
		}
		.closebtn
		{
			margin-left: 15px;
			color: white;
			font-weight: bold;
			float: right;
			font-size: 22px;
			line-height: 20px;
			cursor: pointer;
			transition: 0.3s;
		}
		.closebtn:hover
		{
			color: black;
		}
	</style>


	<?php
  if(isset($_GET['sms']))
  {?>
  <script>
    Swal.fire({
      position: 'top-center',
      icon: 'error',
      title: 'Incorrect  Username  or Password',
      showConfirmButton: false,
      timer:1500
         });
 </script>
<?php
}
?>        

<?php
  if(isset($_GET['sts']))
  {?>
  <script>
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'You have not been Approved by Admin ? Please Wait for your Approaval!',
         });
 </script>
<?php
}
?>        
	<?php
  if(isset($_GET['status1']))
  {?>
  <script>
    Swal.fire({
      icon: 'success',
      title: 'Congratulation',
      text: 'REGISTRATION SUCCESSIFULLY , PENDING ADMIN APPROVAL TRY LOGIN AFTER 24 HOURS',
         });
 </script>
<?php
}
?>

<?php
									if (isset($_GET["msg1"]))
									{
										$bb= $_GET["msg1"];
									?>
			<div class="alert1">
				<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
				<strong>
					<?php echo $bb; ?>
				</strong>
			</div>			
							<?php		}	?>

	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?> ">
					<span class="login100-form-title p-b-43">
						Login to continue
					</span>
					
					
					<div class="wrap-input100 validate-input" data-validate="Username is required">
						<input class="input100" type="text" name="username">
						<span class="focus-input100"></span>
						<span class="label-input100">Username</span>
					</div>
					
					
					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="password">
						<span class="focus-input100"></span>
						<span class="label-input100">Password</span>
					</div>

					<div class="flex-sb-m w-full p-t-3 p-b-32">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								Remember me
							</label>
						</div>

						<div>
							<a href="registration.php" class="txt1">
								Create Account
							</a>
						</div>
						<div>
							<a href="pass_forget.php" class="txt1">
								Forgot Password?
							</a>
						</div>
					</div>
			

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>

					</div>
					<div class="text-center p-t-46 p-b-20">
						<span class="txt2">
							<a href="INDEX/index.php">Index Page</a>
					    </span>
					</div>
				</form>

				<div class="login100-more" style="background-image: url('LOGIN/images/picture.jpg');">
				</div>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->
	<script src="LOGIN/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="LOGIN/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="LOGIN/vendor/bootstrap/js/popper.js"></script>
	<script src="LOGIN/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="LOGIN/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="LOGIN/vendor/daterangepicker/moment.min.js"></script>
	<script src="LOGIN/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="LOGIN/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="LOGIN/js/main.js"></script>

</body>
</html>

