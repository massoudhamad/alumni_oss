
      <?php
        session_start();
        if(!isset($_SESSION['username']))
        {
          header("location:../../login.php");
        }
      ?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    ALUMNI INFORMATION SYSTEM
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
  <link href="../assets/demo/demo.css" rel="stylesheet" />

   <link rel="stylesheet" href="password_change/fonts/material-icon/css/material-design-iconic-font.min.css">
  <link rel="stylesheet" href="password_change/css/style.css">

  <link rel="stylesheet" type="text/css" href="popup/sweetalert2.css">
  <link rel="stylesheet" type="text/css" href="popup/sweetalert2.min.css">

<script src="popup/sweetalert2.js"></script>
<script src="popup/sweetalert2.min.js"></script>
<script src="popup/sweetalert2.all.js"></script>
<script src="popup/sweetalert2.all.min.js"></script>

</head>

<body class="">         

  <?php
        if (isset($_GET["ssmmss"]))
        {   ?>
   <script>
                Swal.fire({
                  position: 'top-center',
                  icon: 'success',
                  title: 'SUCCESSIFULLY CHANGED',
                  showConfirmButton: false,
                  timer:2000
                     });
                 </script>
                 <?php
               }
               ?> 

          <?php
        if (isset($_GET["ssmmss3"]))
        {   ?>
   <script>
                Swal.fire({
                  position: 'top-center',
                  icon: 'error',
                  title: 'Password Do Not Match',
                  showConfirmButton: false,
                  timer:2500
                     });
                 </script>
                 <?php
               }
               ?>

                <?php
        if (isset($_GET["ssmmss2"]))
        {   ?>
   <script>
                Swal.fire({
                  position: 'top-center',
                  icon: 'error',
                  title: 'Current Password is Not Correct',
                  showConfirmButton: false,
                  timer:2500
                     });
                 </script>
                 <?php
               }
               ?>

  <div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo">
          <div class="logo-image-big">
             <?php
              include("../../profile.php");
            ?> 
            <br><br><br>
            <label style="margin-left: 80px; font-size: 20px; margin-top: 90px;"><?php echo $_SESSION['username']; ?></label>
          </div> 
      </div>
      <?php
      include("left_nav.php");
      ?>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
     <?php
     include("up_bar.php");
     ?>
     <div class="main">
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">CHANGE PASSWORD</h2>
                        <form method="POST" class="register-form" id="register-form" action="../../password_process.php">
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="pass" placeholder="Current Password"/ required="required">
                            </div>
                             <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="new_pass" id="pass" placeholder="New Password"/ required="required">
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password"/ required="required">
                            </div>
                           
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Change"/>

                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="password_change/images/signup-image.jpg" alt="sing up image"></figure>
                    </div>
                </div>
            </div>
        </section>
    </div>  

        <footer class="footer footer-black  footer-white ">
        <div class="container-fluid">
          <div class="row">
            <nav class="footer-nav">
              <ul>
                <li><a target="_blank">About Us</a></li>
                <li><a target="_blank">More Info</a></li>
                <li><a target="_blank">Contact Us</a></li>
              </ul>
            </nav>
            <div class="credits ml-auto">
              <span class="copyright">
                © <script>
                  document.write(new Date().getFullYear())
                </script>, MADE BY  <i class="fa fa-heart heart"></i> HMY FIELD STUDENTS
              </span>
            </div>
          </div>
        </div>
      </footer> 
    </div>
  </div>

  <script src="password_change/vendor/jquery/jquery.min.js"></script>
  <script src="password_change/js/main.js"></script>

  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <script src="../assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script>
  <script src="../assets/demo/demo.js"></script>
  <script>
    $(document).ready(function() 
    {
      demo.initChartsPages();
    });
  </script>
</body>

</html>


