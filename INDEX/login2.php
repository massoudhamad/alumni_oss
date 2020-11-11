<?php

session_start();
require_once("../connection.php");
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
                header("location:../HOME_PAGE/examples/home.php");
                    }
                    else{
                    $user = $_SESSION['user_ID'];
                    $checkprofile = $conn->query("SELECT * FROM profile,users WHERE users.user_ID=profile.user_ID AND profile.user_ID =$user");
                    $ourrows = $checkprofile->fetch(PDO::FETCH_ASSOC);
                        if($calculate = $checkprofile->rowCount() == 0)
                                {
                                    
                                    header("location:../HOME_PAGE/examples/fill_info.php");
                                }else{
                                    header("location:../HOME_PAGE/examples/home.php");
                                }
                        }
                    

                }
                else
                {
                    header("location:login2.php?sms=");
                }
            }
        }
        else{
            header("location:login2.php?sts=");
        }
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>ALUMNI INFORMATION SYSTEM</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="style.css">
     <link rel="stylesheet" type="text/css" href="../HOME_PAGE/examples/popup/sweetalert2.css">
  <link rel="stylesheet" type="text/css" href="../HOME_PAGE/examples/popup/sweetalert2.min.css">

<script src="../HOME_PAGE/examples/popup/sweetalert2.js"></script>
<script src="../HOME_PAGE/examples/popup/sweetalert2.min.js"></script>
<script src="../HOME_PAGE/examples/popup/sweetalert2.all.js"></script>
<script src="../HOME_PAGE/examples/popup/sweetalert2.all.min.js"></script>
</head>

<body>

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
                            <?php       }   ?>

    <!-- Preloader -->
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="lds-ellipsis">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">
        <!-- Top Header Area -->
        <div class="top-header-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12 col-md-6">
                        <!-- Breaking News Widget -->
                        <div class="breaking-news-area d-flex align-items-center">

                            <div id="breakingNewsTicker" class="ticker">
                                <ul>
                                   <li><a href="#">ALUMNI INFORMATION SYSTEM</a></li>
                                    <li><a href="#">ALUMNI INFORMATION SYSTEM</a></li>
                                    <li><a href="#">ALUMNI INFORMATION SYSTEM</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="top-meta-data d-flex align-items-center justify-content-end">
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navbar Area -->
        <div class="vizew-main-menu" id="sticker">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">

                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="vizewNav">

                        <!-- Nav brand -->
                        <a href="index.php" class="nav-brand"><img src="img/core-img/logo.png" alt=""></a>

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <div class="classy-menu">

                            <!-- Close Button -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul>
                                    <li class="active"><a href="index.php">Home</a></li>
                                    
                                    <li><a href="#">Pages</a>
                                        <ul class="dropdown">
                                            <li><a href="../registration.php">- Registration</a></li>
                                            <li><a href="../login.php">- Login</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="contact.php">Contact</a></li>
                                </ul>
                            </div>
                            <!-- Nav End -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->

    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="vizew-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                       
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="vizew-login-area section-padding-80">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6">
                    <div class="login-content">
                        <!-- Section Title -->
                        <div class="section-heading">
                            <h4>Please login Here!</h4>
                            <div class="line"></div>
                        </div>

                        <form action="login2.php" method="post">
                            <div class="form-group">
                                <input type="text" name="username" class="form-control" id="" placeholder="User Name">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox mr-sm-2">
                                    <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                                    <label class="custom-control-label" for="customControlAutosizing">Remember me</label>
                                </div>
                            </div>
                            <button type="submit" class="btn vizew-btn w-100 mt-30">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Login Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    <footer class="footer-area">
        <div class="copywrite-area">
            <div class="container">
                <div class="row align-items-center">
                    <!-- Copywrite Text -->
                    <div class="col-12 col-sm-6">
                        <p class="copywrite-text">
Copyright &copy;<script>document.write(new Date().getFullYear());</script> This System is made <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="#" target="_blank">HMY/ Field Students</a>
                        </p>
                    </div>
                    
                </div>
            </div>
        </div>
    </footer>
    <!-- ##### Footer Area End ##### -->

    <!-- ##### All Javascript Script ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>
</body>

</html>