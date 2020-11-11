    <?php
    error_reporting(0);
    ?>
<!DOCTYPE html>
<php lang="en">

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
                            <!-- Top Social Info -->
                           
                            <!-- Top Search Area -->
                            
                            <!-- Login -->
                            <a href="login2.php" class="login-btn"><i class="fa fa-user" aria-hidden="true"></i></a>
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
                                  
                                    <li><a href="contact.php">Feedback</a></li>
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
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Contact Area Start ##### -->
    <section class="contact-area mb-80">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-7 col-lg-8">
                    <!-- Section Heading -->
                    <div class="section-heading style-2">
                        <h4>Please Provide Your Feedback based on Our System</h4>
                        <div class="line"></div>
                    </div>

                    <p>Alumni Information System is a Web designing System #############################
                    3333################################################################################
                    ####################################################################################
                    ####################################################################################
                    ####################################################################################
                    ####################################################################################
                    </p>

                    <!-- Contact Form Area -->
                    <div class="contact-form-area mt-50">
                        <form action="contact.php" method="post">
                            <div class="form-group">
                                <label for="name">Name*</label>
                                <input type="text" name="names" class="form-control" id="name" required="required">
                            </div>
                            <div class="form-group">
                                <label for="email">Email*</label>
                                <input type="email" name="email" class="form-control" id="email" required="required">
                            </div>
                            <div class="form-group">
                                <label for="message">Message*</label>
                                <textarea name="feedback" class="form-control" id="message" cols="30" rows="10" required="required"></textarea>
                            </div>
                            <button class="btn vizew-btn mt-30" name="save" type="submit">Send Now</button>
                        </form>
                    </div>
                </div>

                <div class="col-12 col-md-5 col-lg-4">
                    <div class="sidebar-area">
                        <!-- ***** Single Widget ***** -->

                         <div class="single-widget add-widget">
                            <a href="#"><img src="motion.jpg" alt=""></a>
                        </div>
                        <!-- ***** Single Widget ***** -->
                        <div class="single-widget add-widget">
                            <a href="#"><img src="motionless.jpg" alt=""></a>
                        </div>
                         <div class="single-widget add-widget">
                            <a href="#"><img src="chande.jpg" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
 
    <footer class="footer-area">
        <!-- Copywrite Area -->
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

x/php>


<?php

include("../connection.php");

    if(isset($_POST["save"]))
{
    $name = $_POST["names"];
    $email = $_POST["email"];
    $feedback = $_POST["feedback"];

    $query = $conn->query("INSERT INTO feedback (name,email,feedbacks) VALUES ('$name','$email','$feedback')");

    if($query)
    {
        ?>
        <script type="text/javascript">
             Swal.fire({
                    icon: 'success',
                    title: 'Thank you for Your Feedback'
                  });
        </script>
        <?php
        header("location:contact.php");
    }
}
?>