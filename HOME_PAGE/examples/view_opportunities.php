
      <?php
        session_start();
        error_reporting(0);
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
     <link rel="stylesheet" type="text/css" href="popup/sweetalert2.css">
  <link rel="stylesheet" type="text/css" href="popup/sweetalert2.min.css">

<script src="popup/sweetalert2.js"></script>
<script src="popup/sweetalert2.min.js"></script>
<script src="popup/sweetalert2.all.js"></script>
<script src="popup/sweetalert2.all.min.js"></script>

    <!--  SWEET ALERT -->

</head>

<body class="">                      
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
if(isset($_GET['delete']))
{
  $y   = $_GET['delete'];
  $query2  = $conn->query("DELETE FROM opportunity WHERE opportunity_id = $y");
  if($query2)
  { ?>
         <script>
         Swal.fire({
             icon: 'success',
             title: 'Successfully Deleted',
                  });
        </script>
        <?php
  header("location:view_opportunities.php");
  }
}
?>


 <div class="row">
         <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">OPPORTUNITIES THAT UPPLOADED</h3>
                               
                                <?php 
                        
                        $r = "SELECT * FROM opportunity,users,login WHERE users.user_ID = opportunity.user_id AND login.login_id=users.user_ID";

                        $run = $conn->query($r);

                        $num = $run->rowCount();

                        
                      ?>
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
                                                <th>Category</th>
                                                <th>Description</th>
                                                <th>Skill Required</th>
                                                <th>Posted by</th>
                                                <th>Contact</th>
                                                <th>Admin Profile</th>
                                                <th>Opportunity Attachment</th>
                                                <th>delete</th>
                                            </tr>
                                        </thead>
                                      <tbody>
                                          <?php
                                          if ($num > 0 )
                                            { 
                                              while($fetch = $run->fetch(PDO::FETCH_ASSOC))

                                                {
                                                  $path = "../../PROFILE/".$fetch["profile"];
                                                  $path4 = "../../OPPORTUNITY/".$fetch["attachment"];
                                                 ?>
                                            <tr class="tr-shadow">
                                                <td>
                                                    <label class="au-checkbox">
                                                        <input type="checkbox">
                                                        <span class="au-checkmark"></span>
                                                    </label>
                                                </td>
                                                
                                                <td class="desc"><?php echo $fetch["opportunity_type"];?></td>
                                                
                                                <td>
                                                    <span class="status--process"><?php echo $fetch["opportunity_descrip"];?></span>
                                                </td>
                                                <td>
                                                    <span class="status--process"><?php echo $fetch["skills"];?></span>
                                                </td>
                                                <td>
                                                    <span class="status--process"><?php echo $fetch["f_name"]." ".$fetch["l_name"];?></span>
                                                </td>
                                                 <td>
                                                    <span class="status--process"><?php echo $fetch["contact"];?></span>
                                                </td>
                                                <td><img style="width: 50px;" src="<?php echo $path; ?>"></td>

                                                <td><img style="width: 90px;" src="<?php echo $path4;?>"></td>
                                                <td>
                                                    <div class="table-data-feature">                   
                                                        <a onclick="javascript: return confirm('Delete this opportunity')" href="view_opportunities.php?delete=<?php echo $fetch['opportunity_id'];?>"><button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </button></a>
                                                       
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php
                                          }
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