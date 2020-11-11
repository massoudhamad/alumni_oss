
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

  <!-- DATA TABLE -->
  <link href="DATATABLE/css/font-face.css" rel="stylesheet" media="all">
    <link href="DATATABLE/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="DATATABLE/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="DATATABLE/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="DATATABLE/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="DATATABLE/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="DATATABLE/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="DATATABLE/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="DATATABLE/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="DATATABLE/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="DATATABLE/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="DATATABLE/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <link href="DATATABLE/css/theme.css" rel="stylesheet" media="all">

    <!--  SWEET ALERT -->
  <link rel="stylesheet" type="text/css" href="popup/sweetalert2.css">
  <link rel="stylesheet" type="text/css" href="popup/sweetalert2.min.css">

<script src="popup/sweetalert2.js"></script>
<script src="popup/sweetalert2.min.js"></script>
<script src="popup/sweetalert2.all.js"></script>
<script src="popup/sweetalert2.all.min.js"></script>

<!-- pop up modal -->
<link rel="stylesheet" type="text/css" href="pop_up_form/bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="pop_up_form/font-awesome/css/font-awesome.min.css" />

    <script type="text/javascript" src="pop_up_form/js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="pop_up_form/bootstrap/js/bootstrap.min.js"></script>
</head>

<body class="">     
<?php
        if (isset($_GET["sts"]))
        {   ?>
                 <script>
                Swal.fire({
                  position: 'top-center',
                  icon: 'success',
                  title: 'User has been Deleted Successifully',
                  showConfirmButton: false,
                  timer:2500
                     });
                 </script>
                 <?php
               }
               ?>  

                <?php
        if (isset($_GET["sms"]))
        {   ?>
   <script>
                Swal.fire({
                  position: 'top-center',
                  icon: 'error',
                  title: 'User deletion process failed, try again please !!',
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
       
          <br><br>
          
                                  <?php
                                  $query = "SELECT * FROM users,login WHERE login.login_id = users.user_ID";
                                  $run = $conn->query($query);
                                  $num = $run->rowCount();
                                    ?>
                            <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">LIST OF USERS AVAILABLE IN A SYSTEM</h3>
                                <div class="table-data__tool">
                                   
                                    <div class="table-data__tool-right">
                                        <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                            <i class="zmdi zmdi-plus"></i><a href="admin_registration.php">add user</a></button>
                                        
                                    </div>
                                </div>
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <label class="au-checkbox">
                                                        <input type="checkbox">
                                                        <span class="au-checkmark"></span>
                                                    </label>
                                                </th>
                                                <th>profile</th>
                                                <th>name</th>
                                                <th>email</th>
                                                <th>address</th>
                                                <th>status</th>
                                                <th>role</th>
                                                <th>gender</th>
                                                <th>contact</th>
                                                <th>action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php
                                          if($num > 0)
                                          {

                                            while($row = $run->fetch(PDO::FETCH_ASSOC))
                                              {
                                                $path = "../../PROFILE/".$row["profile"];
                                               ?>
                                            <tr class="tr-shadow">
                                                <td>
                                                    <label class="au-checkbox">
                                                        <input type="checkbox">
                                                        <span class="au-checkmark"></span>
                                                    </label>
                                                </td>
                                                <td><img style="width: 50px;" src="<?php echo $path; ?>"></td>
                                                <td><?php echo $row["f_name"]." ".$row["l_name"]; ?></td>
                                                <td>
                                                    <span class="block-email"><?php echo $row["email"]; ?></span>
                                                </td>
                                                <td><?php echo $row["address"]; ?></td>
                                                <td>
                                                  <?php
                                                    if ( $row["approval"] =="approved" )
                                                      { ?>
                                                    <span class="status--process"><?php echo $row["approval"]; ?></span><?php }else{ ?>
                                                    <span class="status--denied"><?php echo $row["approval"]; ?></span><?php } ?>

                                                </td>
                                                 <td>
                                                  <?php
                                                    if ( $row["user_role"] =="ADMIN" )
                                                      { ?>
                                                     <span class="block-email"><span class="status--process"><?php echo $row["user_role"]; ?></span></span><?php }else{ ?>
                                                     <span class="block-email"><span class="status--denied"><?php echo $row["user_role"]; ?></span></span><?php } ?>

                                                </td>
                                                <td><?php echo $row["gender"]; ?></td>
                                                <td><?php echo $row["contact"]; ?></td>
                                                <td>
                                                    <div class="table-data-feature">
                                                      <a onclick="javascript: return confirm('edit this user')" href="admin_registration.php?edit=<?php echo $row['login_id'];?>">
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </button></a>
                                                        <a onclick="javascript: return confirm('delete this user')" href="view_users.php?delete=<?php echo $row['login_id'];?>">
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </button>
                                                      </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php
                                          } 
                                        }else{
                                          echo "No Data Available this time";
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE -->
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


<?php

if (isset($_GET['delete']))
{
  $x = $_GET['delete'];
  $query2 = "DELETE FROM login WHERE login.login_id = ?";
  $runq2 = $conn->prepare($query2);
  $delete = array($x);
  $exec = $runq2->execute($delete);

    if ($exec)
    {
      header("location:view_users.php?sts="); ?>
       <script>
                  Swal.fire({
                    icon: 'success',
                    title: 'User Has Been Deleted',
                  })
                  
                </script>
<?php    }
    else{ ?>
         <script>
                  Swal.fire({
                    icon: 'error',
                    title: 'Un Successifully',
                  })
                  
                </script>
                <?php
      header("location:view_users.php?sms=");
    }
}
    ?>
