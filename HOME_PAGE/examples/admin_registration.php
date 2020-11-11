
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


  <link rel="stylesheet" type="text/css" href="popup/sweetalert2.css">
  <link rel="stylesheet" type="text/css" href="popup/sweetalert2.min.css">

<script src="popup/sweetalert2.js"></script>
<script src="popup/sweetalert2.min.js"></script>
<script src="popup/sweetalert2.all.js"></script>
<script src="popup/sweetalert2.all.min.js"></script>
</head>

<body class="">  


 <?php
        if (isset($_GET["sms"]))
        {   ?>
   <script>
                Swal.fire({
                  position: 'top-center',
                  icon: 'success',
                  title: 'User Registration Successifully',
                  showConfirmButton: false,
                  timer:2500
                     });
                 </script>
                 <?php
               }
               ?> 

          <?php
        if (isset($_GET["sms2"]))
        {   ?>
   <script>
                Swal.fire({
                  position: 'top-center',
                  icon: 'error',
                  title: 'Registration failed, try again please !!',
                  showConfirmButton: false,
                  timer:2500
                     });
                 </script>
                 <?php
               }
               ?>
                <?php
                if (isset($_GET["sms3"]))
        {   ?>
   <script>
                Swal.fire({
                  position: 'top-center',
                  icon: 'error',
                  title: 'Registration failed, username already exist !!',
                  showConfirmButton: false,
                  timer:2500
                     });
                 </script>
                 <?php
               }
               ?>

               <<?php 
                if(isset($_GET['x']))
                { ?>
                   <script>
               Swal.fire({
                    icon: 'success',
                    title: 'Updated Successfully',
                  })
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
            <!-- End Navbar -->
            <?php
            include("up_bar.php");
            ?>
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
              <?php 
                  $role = $_SESSION['user_role'];
                  if($role=="ADMIN")
                    { ?>
              <div class="card-body">
                <div class="author">
                
                    <img class="avatar border-gray" src="<?php echo $path; ?>" alt="...">
                    <h5 class="title"><?php echo $row["username"];?></h5>
                  
                  <p class="description">
                    Administrator
                  </p>
                </div>
                <p class="description text-center">
                  "The one who manage the System <br>
                  Include Registration <br>
                  Approval and all Functionality"
                </p>
              </div>
            <?php  }else {  ?>
              <div class="card-body">
                <div class="author">
                
                    <img class="avatar border-gray" src="<?php echo $path; ?>" alt="...">
                    <h5 class="title"><?php echo $row["username"];?></h5>
                  
                  <p class="description">
                    ALUMNI
                  </p>
                </div>
                <p class="description text-center">
                  "The former college student <br>capable of viewing news,
                  <br>events and availabe opportunities<br>" </p>
              </div>
              <?php
            } ?>
              <div class="card-footer">
                <hr>
               <div class="button-container">
                  <div class="row">
                    <div class="col-lg-3 col-md-6 col-6 ml-auto">
                      
                    </div>
                    <div class="col-lg-4 col-md-6 col-6 ml-auto mr-auto">
                      <h5><?php include("update_bio_popup.php");?></h5>
                    </div>
                    <div class="col-lg-3 mr-auto">
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php  
          $update = false;
            $first   ='';
            $last   ='';
            $username   ='';
             $gender   ='';
             $contact   ='';
             $address   ='';
             $email   =''; 
             $role = '';
            if(isset($_GET['edit']))
            {
              $update = true;
              $id = $_GET['edit'];
              $query = "SELECT * from users,login where login.login_id=users.user_ID AND login.login_id = $id";
              $runquery = $conn->query($query);
              $fetch = $runquery->fetch(PDO::FETCH_ASSOC);
              $first = $fetch['f_name'];
              $last = $fetch['l_name'];
              $username = $fetch['username'];
              $gender = $fetch['gender'];
              $contact = $fetch['contact'];
              $address = $fetch['address'];
              $email = $fetch['email'];
              $role  = $fetch['user_role'];
            }
            ?>
          <div class="col-md-8">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">REGISTER A NEW USER HERE</h5>
              </div>
              <div class="card-body">
                <form method="POST" action="../../process.php">
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <input type="hidden" name="id" value="<?php echo $fetch['login_id']; ?>">
                        <input type="hidden" name="id2" value="<?php echo $fetch['user_ID']; ?>">

                        <label>Names</label>
                        <input type="text" class="form-control" placeholder="First Names" value="<?php echo $first; ?>" name="first" required="required">
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Sir Name</label>
                        <input type="text" class="form-control" placeholder="Sir Name" name="last" value="<?php echo $last; ?>" required="required">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" placeholder="Username" value="<?php echo $username; ?>" name="username" required="required">
                      </div>
                    </div>
                    <?php 
                    if ($update == true)
                      { ?>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Password</label>
                        <input type="password" disabled="selected" class="form-control" placeholder="Password" name="password" value="" required="required">
                      </div>
                    </div>
                  <?php }else{ ?>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" placeholder="Password" name="password" value="" required="required">
                      </div>
                    </div>
                  <?php } ?>
                  </div>
                 
                  <div class="row">

                     <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label>Role</label>
                    <select name="role" class="form-control" required="required">
                      <option value="" disabled selected>User Role</option>
                      <option <?php if($role == "ALUMNI"){ ?> selected <?php } ?> value="ALUMNI">ALUMNI</option>
                      <option <?php if($role == "ADMIN"){ ?> selected <?php } ?> value="ADMIN">ADMIN</option>
                    </select>
                      </div>
                    </div>
                  
                    <div class="col-md-4 px-1">
                      <div class="form-group">
                        <label>Contact</label>
                        <input type="text" class="form-control" placeholder="Contact Number" name="phone" value="<?php echo $contact;?>" required="required">
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label>Gender</label>
                    <select name="gender" class="form-control" required="required">
                      <option value="" disabled selected>Gender</option>
                      <option <?php if($gender == "Male"){ ?> selected <?php } ?> value="Male">Male</option>
                      <option <?php if($gender == "Female"){?> selected <?php } ?> value="Female">Female</option>
                    </select>
                      </div>
                    </div>
                  </div>
                 <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" placeholder="Email Address" value="<?php echo $email;?>" name="email" required="required">
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" placeholder="Address" name="address" value="<?php echo $address;?>" required="required">
                      </div>
                    </div>
                  </div>
                  <?php
                  if($update == true)
                    { ?>
                  <div class="row">
                    <div class="update ml-auto mr-auto">
                      <button type="submit" class="btn btn-primary btn-round" name="submit">Update Data</button>
                    </div>
                  </div>
                <?php  }else{ ?>
                  <div class="row">
                    <div class="update ml-auto mr-auto">
                      <button type="submit" class="btn btn-primary btn-round" name="save">Save Data</button>
                    </div>
                  </div>
                <?php } ?>
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