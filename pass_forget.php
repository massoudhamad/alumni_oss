


<?php

include("connection.php");

	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$username = $_POST["username"];
		$email = $_POST["email"];

		$sleman = array("$username","$email");
		$query  = "SELECT * FROM login,users where username = ? and email = ? and login.login_id = users.user_id";

		$run = $conn->prepare($query);
		
		$execute = $run->execute($sleman);
		$num = $run->rowCount();

		if ($num == 1)
		{
			$random = rand(12345,67890);
			$newpass = $random;
			$new = sha1($newpass);

			$query2 = "UPDATE login,users SET password = :pass WHERE login.username = :name AND users.email = :email AND login.login_id = users.user_ID";

			$run2 = $conn->prepare($query2);
			$run2->bindParam(":pass",$parameter1);
			$run2->bindParam(":name",$parameter2);
			$run2->bindParam(":email",$parameter3);

			$parameter1 = $new;
			$parameter2 = $username;
			$parameter3 = $email;
			$exec = $run2->execute();
			if ($exec)
			{
				header("location:login.php?msg1=YOUR NEW PASSWORD IS  :   =>    $newpass  .");
			} 
			else
				header("location:pass_forget.php?msg2=Incorrect username or Email Address");
		}
		else
		{
			header("location:pass_forget.php?msg2=Incorrect username or Email Address");
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

	<?php
  if(isset($_GET['msg2']))
  {?>
  <script>
    Swal.fire({
      position: 'top-center',
      icon: 'error',
      title: 'Incorrect  Username  or Email',
      showConfirmButton: false,
      timer:1500
         });
 </script>
<?php
}
?>        

	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?> ">
					<span class="login100-form-title p-b-43">
						Get New Password
					</span>
					
					
					<div class="wrap-input100 validate-input" data-validate="Username is required">
						<input class="input100" type="text" name="username">
						<span class="focus-input100"></span>
						<span class="label-input100">Username</span>
					</div>
					
					
					<div class="wrap-input100 validate-input" data-validate="Email is required">
						<input class="input100" type="text" name="email">
						<span class="focus-input100"></span>
						<span class="label-input100">Email</span>
					</div>

					<div class="flex-sb-m w-full p-t-3 p-b-32">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							
						</div>

						<div>
							<a href="registration.php" class="txt1">
								Create Account
							</a>
						</div>
						<div>
							<a href="login.php" class="txt1">
								login page
							</a>
						</div>
					</div>
			

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Change Password
						</button>
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
