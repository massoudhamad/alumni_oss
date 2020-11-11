
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
 
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
  <link href="../assets/demo/demo.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
  <link href="http://netdna.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
<script src="popup/sweetalert2.js"></script>
<script src="popup/sweetalert2.min.js"></script>
<script src="popup/sweetalert2.all.js"></script>
<script src="sweetalert2.all.min.js"></script>
<script src="form/vendor/jquery/jquery.min.js"></script>
<script src="form/js/global.js"></script>

   <style type="text/css">
      body{margin-top:20px;
background: #f5f5f5;
}
.theme-bg-white {
    background-color: #fff !important;
}
.ui-w-100 {
    width: 100px !important;
    height: auto;
}
.ui-w-40 {
    width: 40px !important;
    height: auto;
}
.row-bordered>.col::before, .row-bordered>[class^="col-"]::before, .row-bordered>[class*=" col-"]::before, .row-bordered>[class^="col "]::before, .row-bordered>[class*=" col "]::before, .row-bordered>[class$=" col"]::before, .row-bordered>[class="col"]::before {
    content: "";
    position: absolute;
    right: 0;
    bottom: -1px;
    left: 0;
    display: block;
    height: 0;
    border-top: 1px solid rgba(24,28,33,0.06);
}
.row-bordered>.col::after, .row-bordered>[class^="col-"]::after, .row-bordered>[class*=" col-"]::after, .row-bordered>[class^="col "]::after, .row-bordered>[class*=" col "]::after, .row-bordered>[class$=" col"]::after, .row-bordered>[class="col"]::after {
    content: "";
    position: absolute;
    top: 0;
    bottom: 0;
    left: -1px;
    display: block;
    width: 0;
    border-left: 1px solid rgba(24,28,33,0.06);
}

.ui-bg-cover {
    background-color: rgba(0,0,0,0);
    background-position: center center;
    background-size: cover;
}

.ui-square {
    padding-top: 100% !important;
}
.ui-square, .ui-rect, .ui-rect-30, .ui-rect-60, .ui-rect-67, .ui-rect-75 {
    position: relative !important;
    display: block !important;
    padding-top: 100% !important;
    width: 100% !important;
}
    </style>
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
        <br><br><br>
        <br><br>
        <?php
        if(isset($_GET['user_info_id']))
        {
            $id = $_GET['user_info_id'];

            $query = "SELECT * from users,login where users.user_ID=login.login_id and users.user_ID = $id";
              $run = $conn->query($query);
              $fetch = $run->fetch(PDO::FETCH_ASSOC);
              $path = "../../PROFILE/".$fetch["profile"];
        }
        ?>
       <div class="layout-content">
          <div class="container flex-grow-1 container-p-y">
             <div class="container-m-nx container-m-ny theme-bg-white mb-4">
              <div class="media col-md-10 col-lg-8 col-xl-7 py-5 mx-auto">
                <img src="<?php echo $path; ?>" alt="" class="d-block ui-w-100 rounded-circle">
                <div class="media-body ml-5">
                  <h4 class="font-weight-bold mb-4"><?php echo $fetch['f_name']." ".$fetch['l_name']; ?></h4>

                  <div class="text-muted mb-4">
                   <?php echo $fetch["user_bio"]; ?>
                  </div>

                  
                </div>
              </div>
              <hr class="m-0">
            </div>

            <div class="row">
              <div class="col">
                      <?php 
                  if(isset($_GET['user_info_id']))
                  {
                    $user = $_GET['user_info_id'];
                    $query ="SELECT * FROM  profile WHERE user_ID = :user";
                    $run = $conn->prepare($query);
                    $value = array(":user"=>$user);
                    $exec = $run->execute($value);
                    $fetch = $run->fetch(PDO::FETCH_ASSOC);
                  }
                ?>
                <!-- Info -->
                <h2>EDUCATIONAL INFORMATION</h2>
                <div class="card mb-4">
                  <div class="card-body">

                    <div class="row mb-2">
                      <div class="col-md-3 text-muted">Primary Education:</div>
                      <div class="col-md-9">
                        <?php echo $fetch['primary_education']; ?>
                      </div>
                    </div>
                    <div class="row mb-2">
                      <div class="col-md-3 text-muted">Secondary Education:</div>
                      <div class="col-md-9">
                        <?php echo $fetch['secondary']; ?>
                      </div>
                    </div>

                    <div class="row mb-2">
                      <div class="col-md-3 text-muted">Advance Education:</div>
                      <div class="col-md-9">
                        <a href="javascript:void(0)" class="text-body"><?php echo $fetch['advance']; ?></a>
                      </div>
                    </div>

                    <div class="row mb-2">
                      <div class="col-md-3 text-muted">Programm Study:</div>
                      <div class="col-md-9">
                        <a href="javascript:void(0)" class="text-body"><?php echo $fetch['program_study']; ?></a>
                      </div>
                    </div>

                    

                    <div class="row mb-2">
                      <div class="col-md-3 text-muted">Year Graduated:</div>
                      <div class="col-md-9">
                        <?php echo $fetch['year_graduated']; ?>
                      </div>
                    </div>
                     <div class="row mb-2">
                      <div class="col-md-3 text-muted">Total Year:</div>
                      <div class="col-md-9">
                        <?php echo $fetch['program_year']; ?>
                      </div>
                    </div>
                     <div class="row mb-2">
                      <div class="col-md-3 text-muted">University:</div>
                      <div class="col-md-9">
                        <?php echo $fetch['university']; ?>
                      </div>
                    </div>

                    <div class="row mb-2">
                      <div class="col-md-3 text-muted">Grade Point Averge:</div>
                      <div class="col-md-9">
                        <a href="javascript:void(0)" class="text-body"><?php echo $fetch['gpa']; ?></a>
                      </div>
                    </div>

                  </div>
                  <?php
                  // $id   = $_SESSION['user_ID'];
                   if(isset($_GET['user_info_id']))
                   {
                   $id2 = $_GET['user_info_id'];
                  $query  = $conn->query("SELECT COUNT(forum_id) FROM forum WHERE forum.user_ID =$id2");
                  $fetch3   = $query->fetch(PDO::FETCH_ASSOC);
                }
                  ?>
                  <div class="card-footer text-center p-0">
                    <div class="row no-gutters row-bordered row-border-light">
                      <a href="javascript:void(0)" class="d-flex col flex-column text-body py-3">
                        <div class="font-weight-bold"><?php echo $fetch3['COUNT(forum_id)']; ?></div>
                        <div class="text-muted small"> forum posts</div>
                      </a>
                      <?php
                      $query5 =$conn->query("SELECT *, COUNT(g_member_id) from group_members,groupss WHERE groupss.group_id = group_members.grou_id and group_members.m_id = (SELECT m_id from members where members.user_id = (SELECT user_ID from users WHERE user_ID = $id))");
                      $fetch4 = $query5->fetch(PDO::FETCH_ASSOC);
                      ?>
                      <a href="javascript:void(0)" class="d-flex col flex-column text-body py-3">
                        <div class="font-weight-bold"><?php echo $fetch4['COUNT(g_member_id)'];?></div>
                        <div class="text-muted small">groups enrolled</div>
                      </a>
                      <a href="javascript:void(0)" class="d-flex col flex-column text-body py-3">
                        <div class="font-weight-bold">6</div>
                        <div class="text-muted small">photos</div>
                      </a>
                    </div>
                  </div>
                </div>
                <!-- / Info -->

                  <h2>BACK GROUND INFORMATION</h2>
                 <div class="card mb-4">
                  <div class="card-body">

                    <div class="row mb-2">
                      <div class="col-md-3 text-muted">Date of Birthday:</div>
                      <div class="col-md-9">
                        <?php echo $fetch['date_of_birth']; ?>
                      </div>
                    </div>

                    <div class="row mb-2">
                      <div class="col-md-3 text-muted">Country:</div>
                      <div class="col-md-9">
                        <a href="javascript:void(0)" class="text-body"><?php echo $fetch['country']; ?></a>
                      </div>
                    </div>
                    <div class="row mb-2">
                      <div class="col-md-3 text-muted">City:</div>
                      <div class="col-md-9">
                        <a href="javascript:void(0)" class="text-body"><?php echo $fetch['city']; ?></a>
                      </div>
                    </div>
                    <div class="row mb-2">
                      <div class="col-md-3 text-muted">Languages:</div>
                      <div class="col-md-9">
                        <a href="javascript:void(0)" class="text-body"><?php echo $fetch['language']; ?></a>
                      </div>
                    </div>
                     <div class="row mb-2">
                      <div class="col-md-3 text-muted">Skills:</div>
                      <div class="col-md-9">
                        <a href="javascript:void(0)" class="text-body"><?php echo $fetch['skill'];?></a>
                      </div>
                    </div>
                    <h6 class="my-3">Physical Characteristic</h6>

                    <div class="row mb-2">
                      <div class="col-md-3 text-muted">Health Problem:</div>
                      <div class="col-md-9">
                        <?php echo $fetch['health']; ?>
                      </div>
                    </div>
                    <div class="row mb-2">
                      <div class="col-md-3 text-muted">Appearance:</div>
                      <div class="col-md-9">
                        <?php echo $fetch['appearance']; ?>
                      </div>
                    </div>

                    <h6 class="my-3">Personal Characteristic</h6>

                    <div class="row mb-2">
                      <div class="col-md-3 text-muted">Characteristic:</div>
                      <div class="col-md-9">
                        <a href="javascript:void(0)" class="text-body"><?php echo $fetch['characteristic']; ?></a>
                        <a href="javascript:void(0)" class="text-body">Patient to Others</a> 
                      </div>
                    </div>
                  </div>
                
                </div>
                <?php
                if(isset($_GET['user_info_id']))
                {
                  $user = $_GET['user_info_id'];
                  $query = $conn->query("SELECT * FROM users,login WHERE users.user_ID = login.login_id AND user_ID = $user");
                  $rows = $query->fetch(PDO::FETCH_ASSOC);

                } ?>
                <h2>PERSONAL INFORMATION</h2>
                <div class="card mb-4">
                  <div class="card-body">

                    <div class="row mb-2">
                      <div class="col-md-3 text-muted">First name:</div>
                      <div class="col-md-9">
                        <?php echo $rows['f_name']; ?>
                      </div>
                    </div>

                    <div class="row mb-2">
                      <div class="col-md-3 text-muted">Sir Name:</div>
                      <div class="col-md-9">
                        <a href="javascript:void(0)" class="text-body"><?php echo $rows['l_name']; ?></a>
                      </div>
                    </div>

                    <div class="row mb-2">
                      <div class="col-md-3 text-muted">Address:</div>
                      <div class="col-md-9">
                        <a href="javascript:void(0)" class="text-body"><?php echo $rows['address']; ?></a>
                      </div>
                    </div>

                    <h6 class="my-3">Contacts</h6>

                    <div class="row mb-2">
                      <div class="col-md-3 text-muted">Phone:</div>
                      <div class="col-md-9">
                        <?php echo $rows['contact']; ?>
                      </div>
                    </div>

                    <h6 class="my-3">Other Info</h6>

                    <div class="row mb-2">
                      <div class="col-md-3 text-muted">Email Address:</div>
                      <div class="col-md-9">
                        <a href="javascript:void(0)" class="text-body"><?php echo $rows['email']; ?></a>
                      </div>
                      <div class="col-md-3 text-muted">Gender:</div>
                       <div class="col-md-9">
                        <a href="javascript:void(0)" class="text-body"><?php echo $rows['gender']; ?></a>
                      </div>
                    </div>
                  </div>
                </div>
                
              </div>
              <div class="col-xl-4">

                <!-- Side info -->
              
                
                  <div class="card-body">
                    <a href="javascript:void(0)" class="btn btn-primary rounded-pill">&nbsp; <?php echo $rows['user_role'];?></a>
                      <span class="ion ion-md-mail"></span>
                    </a>
                  </div>
                  <hr class="border-light m-0">
                <div class="card mb-4">
                  <div class="card-header with-elements">
                    <span class="card-header-title">Friends &nbsp;
                      <?php
                      $r2 = $_SESSION['user_ID'];
                      $query  = $conn->query("SELECT *,COUNT(user_ID) FROM users,login WHERE users.user_ID = login.login_id AND login.user_role != 'ADMIN' AND users.approval='approved' AND users.user_ID != $r2");
                          $find = $query->fetch(PDO::FETCH_ASSOC);
                      ?>
                      <small class="text-muted"><?php echo $find['COUNT(user_ID)']; ?></small>
                    </span>
                    <div class="card-header-elements ml-md-auto">
                      <a href="javascript:void(0)" class="btn btn-default md-btn-flat btn-xs">Show All</a>
                    </div>
                  </div>
                  <?php
                  $rr = $_SESSION['user_ID'];
                  $query  = $conn->query("SELECT * FROM users,login WHERE users.user_ID = login.login_id AND login.user_role != 'ADMIN' AND users.approval='approved' AND users.user_ID != $rr");
                      $num = $query->rowCount();
                      ?>
                  <div class="row no-gutters row-bordered row-border-light">
                    <?php
                    if ($num > 0)
                      {
                        while($find2 = $query->fetch(PDO::FETCH_ASSOC))
                        {
                          $path = "../../PROFILE/".$find2['profile'];
                  ?>
                    <a href="javascript:void(0)" class="d-flex col-4 col-sm-3 col-md-4 flex-column align-items-center text-body py-3 px-2">
                      <img src="<?php echo $path; ?>" alt="" class="d-block ui-w-40 rounded-circle mb-2">
                      <div class="text-center small"><?php echo $find2['f_name']." ".$find2['l_name']; ?></div>
                    </a>
                      <?php
                }
              }
              ?>
                  </div>
                </div>
                
                <br><br>
                <div class="card mb-4">
                  <div class="card-header with-elements">
                    <span class="card-header-title">Group Enrolled &nbsp;
                      <small class="text-muted"><?php echo $fetch4['COUNT(g_member_id)'];?></small>
                    </span>
                    <div class="card-header-elements ml-md-auto">
                      <a href="javascript:void(0)" class="btn btn-default md-btn-flat btn-xs">Show All</a>
                    </div>
                  </div>
                  <?php
                      $query6 =$conn->query("SELECT * from group_members,groupss WHERE groupss.group_id = group_members.grou_id and group_members.m_id = (SELECT m_id from members where members.user_id = (SELECT user_ID from users WHERE user_ID = $id))");
                        $v =$query6->rowCount(); 
                      ?>
                  <div class="row no-gutters row-bordered row-border-light">
                    <?php 
                    if($v > 0)
                    {
                        while($fetch6 = $query6->fetch(PDO::FETCH_ASSOC))
                        {
                          $group_picture = "../../GROUP/".$fetch6['g_picture'];
                          ?>
                    <a href="javascript:void(0)" class="d-flex col-4 col-sm-3 col-md-4 flex-column align-items-center text-body py-3 px-2">
                      <img src="<?php echo $group_picture; ?>" alt="" class="d-block ui-w-40 rounded-circle mb-2">
                      <div class="text-center small"><?php echo $fetch6['g_name'];?></div>
                    </a>
                    <?php }
                    } ?>
                  </div>
                </div>
                
                <div class="card mb-4">
                  <div class="card-header with-elements">
                    <span class="card-header-title">Forum Crated by this User &nbsp;
                      <small class="text-muted"><?php echo $fetch3['COUNT(forum_id)']; ?></small>
                    </span>
                    <div class="card-header-elements ml-md-auto">
                      <a href="javascript:void(0)" class="btn btn-default md-btn-flat btn-xs">Show All</a>
                    </div>
                  </div>
                  <?php
                  if(isset($_GET['user_info_id']))
                  {
                    $id3 = $_GET['user_info_id'];
                   $query10  = $conn->query("SELECT * FROM forum WHERE forum.user_ID =$id3");
                    $vv2 = $query10->rowCount();
                  }
                    ?>
                  <div class="row no-gutters row-bordered row-border-light">
                    <?php
                    if($vv2 > 0)
                    {
                        while($fetch9= $query10->fetch(PDO::FETCH_ASSOC))
                        {
                          $forum_picture = "../../FORUM/".$fetch9['forum_attachment'];
                          ?>
                    <a href="javascript:void(0)" class="d-flex col-4 col-sm-3 col-md-4 flex-column align-items-center text-body py-3 px-2">
                      <img src="<?php echo $forum_picture; ?>" alt="" class="d-block ui-w-40 rounded-circle mb-2">
                      <div class="text-center small"><?php echo $fetch9['forum_tittle']; ?></div>
                    </a>
                    <?php 
                        }
                    } ?>
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
  <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
  <!-- <script src="http://netdna.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> -->
  <script>
    $(document).ready(function() 
    {
      demo.initChartsPages();
    });
  </script>
</body>

</html>
