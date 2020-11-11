<?php

include("connection.php");

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $username = $_POST["username"];
    $password = sha1($_POST["password"]);
    $name  = $_POST["fname"];
    $sir_name = $_POST["sirname"];
    $email  = $_POST["email"];
    $p_number = $_POST["phone"];
    $address  = $_POST["address"];
    $gender  = $_POST["gender"];
    $query4 = "SELECT  * FROM login WHERE login.username = ? AND password = ?";
    $runq4= $conn->prepare($query4);
    $caldera = array("$username","$password");
    $runq4->execute($caldera);
    $num2  = $runq4->rowCount();
        if ($num2 == 0)
        {
$query = "INSERT INTO login (username,password,user_role,user_status) VALUES (:username,:password,:role,:status)";

$run = $conn->prepare($query);

$run->bindParam(":username",$parameter1);
$run->bindParam(":password",$parameter2);
$run->bindParam(":role",$parameter3);
$run->bindParam(":status",$parameter4);

$parameter1 = $username;
$parameter2 = $password;
$parameter3 = "ALUMNI"; 
$parameter4 = "ACTIVE";

$execu = $run->execute();

if ($execu)
{
    $query2 = "SELECT login_id FROM login WHERE username = ? AND password = ?";
    $runq2 = $conn->prepare($query2);
    $hasuko = array("$username","$password");
    $execute = $runq2->execute($hasuko);
    $num = $runq2->rowCount();
    if($num > 0)
    {
    $fetch = $runq2->fetch(PDO::FETCH_ASSOC);
    $userid = $fetch["login_id"];

    $query3 = "INSERT INTO users (user_ID,f_name,l_name,address,gender,email,contact) VALUES (?,?,?,?,?,?,?)";
    $sleman = array($userid,"$name","$sir_name","$address","$gender","$email","$p_number");
    $run3 = $conn->prepare($query3);
    $run2 = $run3->execute($sleman);
    if ($run2)
    {
             $query5  =$conn->query("SELECT users.user_ID from users,login WHERE users.user_ID = login.login_id AND username = '$username'");
                      $count =$query5->rowCount();
                      if($count == 1)
                      {
                        $fetch2 = $query5->fetch(PDO::FETCH_ASSOC);
                        $ID = $fetch2["user_ID"];
                        $query6 = "INSERT INTO members (user_id) VALUES (:u)";
                        $run6 = $conn->prepare($query6);
                        $run6->bindParam(":u",$p1);
                        $p1 = $ID;
                        if($run6->execute())
                        {
                            header("location:login.php?status1=");
                        }else
                        {
                             header("location:registration.php?status2=REGISTRATION FAILED, TRY TO PUT THE VALID ENTRY");
                        }
                      }
                    }
                else 
                {
                 header("location:registration.php?status3=REGISTRATION FAILED, USERNAME ALLREADY EXIST");
                }    
            }
        } 
     }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ALUMNI INFORMATION SYSTEM </title>
    <link rel="shortcut icon" type="image/x-icon" href="index/assets/img/favicon.ico">
    <link rel="stylesheet" href="REGISTRATION/fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="REGISTRATION/css/style.css">

    <style>
    .alert
        {
            padding: 20px;
            background-color: #f44336;
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
</head>
<body>

                                                <?php
                                                    if(isset($_GET["status2"]))
                                                    {
                                                        $xx = $_GET["status2"];
                                                ?>

             <div class="alert">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                <strong>
                    <?php 
                    echo $xx;
                    ?>
                </strong>
            </div>  
                                                    <?php   }   ?>

                                                    <?php
                                                    if(isset($_GET["status3"]))
                                                    {
                                                        $xx = $_GET["status3"];
                                                ?>

             <div class="alert">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                <strong>
                    <?php 
                    echo $xx;
                    ?>
                </strong>
            </div>  
                                                    <?php   }   ?>                                                     
    <div class="main">

        <h1>Sign up Form</h1>
        <div class="container">
            <div class="sign-up-content">
                
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="signup-form">
                    <h2 class="form-title">REGISTER HERE ?</h2>
                    
                    <div class="form-textbox">
                        <label for="name">First names</label>
                        <input type="text" name="fname" id="" value="" required="required" />
                    </div>

                    <div class="form-textbox">
                        <label for="name">Sir name</label>
                        <input type="text" name="sirname" id="" value="" required="required" />
                    </div>

                    
                    <div class="form-textbox">
                        <label for="address">Address</label>
                        <input type="text" name="address" required="required" />
                    </div>

                    <div class="form-textbox">
                        <label for="address">Email</label>
                        <input type="text" name="email" required="required" />
                    </div>
                    <div class="form-textbox">
                        <label for="phone">Phone_Number</label>
                        <input type="text" name="phone" placeholder="    xx-xxxx-xxxx" required="required" />
                    </div>
                    
                    <div class="form-textbox">
                        <label for="username">Username</label>
                        <input type="text" name="username" required="required" />
                    </div>
                    <div class="form-textbox">
                        <label for="password">Password</label>
                        <input type="password" name="password" required="required" />
                    </div>
                     <h4 class="form-title">What is your gender ?</h4>
                    <div class="form-radio">
                        <input type="radio" name="gender" value="Male" id="" checked="checked" />
                        <label for="newbie">Male</label>

                        <input type="radio" name="gender" value="Female" id="average" />
                        <label for="average">Female</label>
                    </div>
                    <div class="form-textbox">
                        <input type="submit" name="submit" id="submit" class="submit" value="Create account" />
                    </div>
                </form>

                <p class="loginhere">
                    Already have an account ?<a href="login.php" class="loginhere-link"> Log in</a><br>
                    Go to index Page ?  <a href="INDEX/index.php" class="loginhere-link">Click Here</a>
                </p>
                
            </div>
        </div>

    </div>

    <!-- JS -->
    <script src="REGISTRATION/vendor/jquery/jquery.min.js"></script>
    <script src="REGISTRATION/js/main.js"></script>
</body>
</html>