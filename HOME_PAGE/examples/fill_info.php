<?php
session_start();
include('../../connection.php');
?>

<?php 
 if ($_SERVER["REQUEST_METHOD"]  == "POST")
 {
 		$primary  = trim($_POST["primary"]);
 		$secondary = trim($_POST["secondary"]);
 		$advance   = trim($_POST["advance"]);
 		$year_total = trim($_POST["year_total"]);
 		$gpa        = trim($_POST["gpa"]);
 		$year_graduate = trim($_POST["year_graduate"]);
 		$program   = trim($_POST["program"]);
 		$skill   = trim($_POST["skill"]);
 		$language  =  trim($_POST["language"]);
 		$country   =  trim($_POST["country"]);
 		$city    =    trim($_POST["city"]);
 		$health   =   trim($_POST["health"]);
 		$date_of_birth = trim($_POST["date_of_birth"]);
 		$id = $_SESSION['user_ID'];
 		$query = "INSERT INTO profile (user_ID,date_of_birth,language,country,city,skill,health,primary_education,secondary,advance,program_study,year_graduated,program_year,gpa) values (:user,:birth,:language,:country,:city,:skill,:health,:primary,:secondary,:advance,:program,:year_grad,:year,:gpa)";

 		$run = $conn->prepare($query);
 	    $hasuko = array(":user"=>$id, ":birth"=>$date_of_birth, ":language"=>$language, ":country"=>$country, ":city"=>$city,":skill"=>$skill, ":health"=>$health, ":primary"=>$primary, ":secondary"=>$secondary, ":advance"=>$advance, ":program"=>$program, ":year_grad"=>$year_graduate,":year"=>$year_total,":gpa"=>$gpa);

 	    $execute  =$run->execute($hasuko);
 	    	if($execute)
 	    	{	
 	    		header("location:home.php?sms=");
 	    	}
 	    	else
 	    	{
 	    		header("location:fill_info.php?sms2=");
 	    	}
 }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>ALUMNI INFORMATION SYSTEM</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" type="text/css" href="info/css/opensans-font.css">
	<link rel="stylesheet" type="text/css" href="info/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

  <link rel="stylesheet" href="info/css/style.css"/>
  <link rel="stylesheet" type="text/css" href="popup/sweetalert2.css">
  <link rel="stylesheet" type="text/css" href="popup/sweetalert2.min.css">

<script src="popup/sweetalert2.js"></script>
<script src="popup/sweetalert2.min.js"></script>
<script src="popup/sweetalert2.all.js"></script>
<script src="popup/sweetalert2.all.min.js"></script>
</head>
<body>
	
	<?php
  if(isset($_GET['sms2']))
  {?>
  <script>
    Swal.fire({
      position: 'top-center',
      icon: 'error',
      title: 'Failed to Upload Information',
      showConfirmButton: false,
      timer:1500
         });
 </script>
<?php
}
?>         
	<div class="page-content">
		<div class="form-v1-content">
			<div class="wizard-form">
		        <form class="form-register" action="fill_info.php" method="post">
		        	<div id="form-total">
		        		<!-- SECTION 1 -->
			            <h2>
			            	<p class="step-icon"><span>01</span></p>
			            	<span class="step-text">Educational Infomation</span>
			            </h2>
			            <section>
			                <div class="inner">
			                	<div class="wizard-header">
									<h3 class="heading">Educational Infomation</h3>
									<p>Please enter your infomation and proceed to the next step so we can Access the System </p>
								</div>
								<div class="form-row">
									<div class="form-holder">
										<fieldset>
											<legend>Primary Education</legend>
											<input type="text" class="form-control" id="first-name" name="primary" placeholder="Primary Education School" required>
										</fieldset>
									</div>
									<div class="form-holder">
										<fieldset>
											<legend>Secondary Education</legend>
											<input type="text" class="form-control" id="last-name" name="secondary" placeholder="Secondary Education School" required>
										</fieldset>
									</div>

								</div>
								<div class="form-row">
									<div class="form-holder">
										<fieldset>
											<legend>Advance Education</legend>
											<input type="text" class="form-control" id="first-name" name="advance" placeholder="Advance Education School" required>
										</fieldset>
									</div>
									<div class="form-holder">
										<fieldset>
											<legend>Programm Study</legend>
											<input type="text" class="form-control" id="last-name" name="program" placeholder="Program Learnt" required>
										</fieldset>
									</div>
									
								</div>
								
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<fieldset>
											<legend>Skill</legend>
											<input type="text" name="skill" id="" class="form-control" placeholder="Your Skills" required>
										</fieldset>
									</div>
								</div>
							 <div class="form-row form-row-date">
									<div class="form-holder form-holder-2">
										<label class="special-label">Years & Grade Point Average</label>
										
										<select name="year_total" id="date">
											<option value="DD" disabled selected>Total Year</option>
											<?php
											for($i=1; $i<5; $i++)
											{	?>
											<option value="<?php echo $i."   Years";?>"><?php echo $i."  Years";?></option>
											<?php 
											}	?>
										</select>
										<select name="gpa" id="year">
											<option value="YYYY" disabled selected>GPA</option>
											<option value="2.0 ++">2 & above</option>
											<option value="3.0 ++">3 & above</option>
											<option value="4.0 ++">4 & above</option>
											<option value="5.0 ++">5.0</option>
										</select>
									</div>
								</div> 
								<legend>Year Graduated</legend>
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<input type="text" class="form-control input-border" id="ssn" name="year_graduate" placeholder="xxxx/xxxx" required>
									</div>
								</div>
							</div>
			            </section>
						<!-- SECTION 2 -->
			            <h2>
			            	<p class="step-icon"><span>02</span></p>
			            	<span class="step-text">Background Infomation</span>
			            </h2>
			            <section>
			                <div class="inner">
			                	<div class="wizard-header">
									<h3 class="heading">Background Infomation</h3>
									<p>Please enter your infomation and proceed to the next step so we can Access the System </p>
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<label class="special-label">Birth Date:</label>
										<input type="date" name="date_of_birth" placeholder="Date Of Birth" required="required">
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<fieldset>
											<legend>Language</legend>
											<input type="text" name="language" id="" class="form-control" placeholder="Mother Language" required>
										</fieldset>
									</div>
								</div>

								<div class="form-row">
									<div class="form-holder form-holder-2">
										<fieldset>
											<legend>Country</legend>
											<input type="text" name="country" id="" class="form-control" placeholder="Your Country" required>
										</fieldset>
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<fieldset>
											<legend>City</legend>
											<input type="text" class="form-control" id="" name="city" placeholder="Your Country City" required>
										</fieldset>
									</div>
								</div>
								<label>Health Problem</label>
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<input type="text" class="form-control input-border" id="ssn" name="health" placeholder="Dis--abilities" required>
									</div>
								</div>
							</div>
			            </section>
			            <!-- SECTION 3 -->


			            <?php 

			            $x = $_SESSION['user_ID'];
			            $query = $conn->query("SELECT * FROM users WHERE user_ID = $x");
			            $fetch = $query->fetch(PDO::FETCH_ASSOC);
			            ?>
			            <h2>
			            	<p class="step-icon"><span>03</span></p>
			            	<span class="step-text">Personal Information</span>
			            </h2>
			            <section>
			                <div class="inner">
			                	<div class="wizard-header">
									<h3 class="heading">Personal Information</h3>
									<p>Please Varify Your Personal Information </p>
								</div>
								<div class="form-row">
									<div class="form-holder">
										<fieldset>
											<legend>First Name</legend>
											<input type="text" disabled="selected" class="form-control" id="first-name" name="first" value="<?php echo $fetch['f_name'];?>" required>
										</fieldset>
									</div>
									<div class="form-holder">
										<fieldset>
											<legend>Last Name</legend>
											<input type="text" disabled="selected" class="form-control" id="last-name" name="last" value="<?php echo $fetch['l_name']; ?>" required>
										</fieldset>
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<fieldset>
											<legend>Your Email</legend>
											<input type="text" disabled="selected" name="email" id="your_email" class="form-control" pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" value="<?php echo $fetch['email']; ?>" required>
										</fieldset>
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<fieldset>
											<legend>Phone Number</legend>
											<input type="text" disabled="selected" class="form-control" id="phone" name="phone" value="<?php echo $fetch['contact']; ?>" required>
										</fieldset>
									</div>
								</div>
								<div class="form-row form-row-date">
									<div class="form-holder form-holder-2">
										<label class="special-label">Gender:</label>
										<select name="gener" id="year">
											<option value="" disabled selected><?php echo $fetch['gender']; ?></option>
										</select>
									</div>
								</div>
								<label>Address</label>
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<input type="text" disabled="selected" class="form-control input-border" value="<?php echo $fetch['address']; ?>" id="ssn" name="ssn"  required>
									</div>
								</div>
							</div>
			            </section>
			            <button class="button">Upload Info</button>
		        	</div>
		        </form>
		        
			</div>
			<style>
				.button
				{	margin-left: 60%;
					margin-bottom: 15%;
					background-color: #4CAF50;
					border: none;
					color: white;
					padding: 15px 32px;
					text-align: center;
					text-decoration: none;
					display: inline-block;
					font-size: 16px;
				}
				.button:hover
				{
					width:30%;
				}
			</style>
		</div>
	</div>
	<script src="info/js/jquery-3.3.1.min.js"></script>
	<script src="info/js/jquery.steps.js"></script>
	<script src="info/js/main.js"></script>
</body>
</html>



