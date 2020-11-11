
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
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
  <link href="../assets/demo/demo.css" rel="stylesheet" />
  <link rel="stylesheet" href="../../INDEX/style.css">
  <link rel="stylesheet" type="text/css" href="popup/sweetalert2.css">
  <link rel="stylesheet" type="text/css" href="popup/sweetalert2.min.css">

<script src="popup/sweetalert2.js"></script>
<script src="popup/sweetalert2.min.js"></script>
<script src="popup/sweetalert2.all.js"></script>
<script src="popup/sweetalert2.all.min.js"></script>

  <script src="../../INDEX/js/jquery/jquery-2.2.4.min.js"></script>
    
    <script src="../../INDEX/js/bootstrap/popper.min.js"></script>
    
    <!-- <script src="../../INDEX/js/bootstrap/bootstrap.min.js"></script> -->
   
    <script src="../../INDEX/js/plugins/plugins.js"></script>
    
    <script src="../../INDEX/js/active.js"></script>
</head>

<body class="">  
<?php
  if(isset($_GET['sms']))
  {?>
  <script>
    Swal.fire({
      position: 'top-center',
      icon: 'success',
      title: 'User Info Successifully Uploaded',
      showConfirmButton: false,
      timer:1500
         });
 </script>
<?php
}
?>       

<?php
  if(isset($_GET['sms10']))
  {?>
  <script>
    Swal.fire({
      title: 'You are allready a member of this group, try another group',
      showClass: {
        popup: 'animate__animated animate__fadeInDown'
      },
      hideClass: {
        popup: 'animate__animated animate__fadeOutUp'
      }
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
            <br>
            <label style="margin-left: 80px; font-size: 20px; margin-top: 20px;"><?php echo $_SESSION['username']; ?></label>
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
      <!-- End Navbar -->
      <div class="content">
        <?php
        include("up_navbar.php");
        include("center_bar.php");
        ?>
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
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
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