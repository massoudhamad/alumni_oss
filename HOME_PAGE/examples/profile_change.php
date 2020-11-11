
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
 
  <title>
    ALUMNI INFORMATION SYSTEM
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
  <link href="../assets/demo/demo.css" rel="stylesheet" />

  <link rel="stylesheet" href="password_change/fonts/material-icon/css/material-design-iconic-font.min.css">
  <link rel="stylesheet" href="password_change/css/style.css">

<script src="popup/sweetalert2.js"></script>
<script src="popup/sweetalert2.min.js"></script>
<script src="popup/sweetalert2.all.js"></script>
<script src="popup/sweetalert2.all.min.js"></script> 
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet"> 
</head>

<body class="">   
<?php
  if(isset($_GET['msg']))
  {?>
  <script>
    Swal.fire({
      position: 'top-center',
      icon: 'success',
      title: 'Profile has been Updated',
      showConfirmButton: false,
      timer:1500
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
            <label style="margin-left: 90px; font-size: 20px; margin-top: 80px;"><?php echo $_SESSION['username']; ?></label>
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
        ?>
        <?php
        $x = $_SESSION['username'];
          $query = "SELECT * FROM users,login WHERE login.login_id = users.user_ID AND login.username='$x'";
          $run = $conn->query($query);
          $num = $run->rowCount();
          $row = $run->fetch(PDO::FETCH_ASSOC);
          $path = "../../PROFILE/".$row["profile"];
        ?>
      <div class="content">
        <div class="row">
          <div class="col-md-4">
            <div class="card card-user">
              <div class="image">
                <img src="../assets/img/damir-bosnjak.jpg" alt="...">
              </div>
              <div class="card-body">
                <div class="author">
                
                    <img class="avatar border-gray" src="<?php echo $path; ?>" alt="...">
                    <h5 class="title"><?php echo $row["username"];?></h5>
                  
                    <?php if($_SESSION["user_role"]=="ADMIN")
                    {?>
                      <p class="description">
                  
                       Administrator
                      </p> <?php
                    }
                    else 
                    { ?>
                       <p class="description">
                  
                         Student
                    </p> <?php  
                    } ?>  
                </div>
                <p class="description text-center">
                 <?php
                  $user_ID = $_SESSION['user_ID'];
                  $biog = "SELECT user_bio FROM users WHERE user_ID = $user_ID";
                  $set = $conn->query($biog);
                  $fetch = $set->fetch(PDO::FETCH_ASSOC);
                  echo $fetch["user_bio"];
                 ?>
                </p>
              </div>
              <div class="card-footer">
                <hr>
               
                <div class="col-lg-9 col-md-6 col-6 ml-auto">
                      <h5><?php include("update_bio_popup.php");?></h5>
                </div> 
              </div>
            </div>
          </div>
          
          <div class="col-md-8">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">Change Your Profile Here</h5>
              </div>
              <div class="card-body">
                <form method="POST" action="../../pro_hand.php" enctype="multipart/form-data">
                        <input type="file" value="" name="picture" required="required">
                  
                  <div class="row">
                    <div class="update ml-auto mr-auto">
                      <button type="submit" class="btn btn-primary btn-round" name="save" style="margin-right: 300px; margin-top: 50px;">Upload</button>
                      <!-- <img class="avatar border-gray" src="<?php echo $path; ?>" alt="..."> -->
                    </div>
                  </div>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
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
   <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>

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

