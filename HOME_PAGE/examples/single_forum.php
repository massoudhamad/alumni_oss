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
        <?php
        include("up_navbar.php");
        ?>
     <style type="text/css">
          .hasuko
          {
            background-color:black;
            padding: 40px 10px 5px 10px;
          }
        </style>
  <div class="hasuko">
     <?php
   if (isset($_GET["id"]))
   {

   $x= $_GET["id"];
   $query = "SELECT * FROM forum,users,login WHERE login.login_id = users.user_ID AND users.user_ID = forum.user_ID AND forum.forum_id = ?";
   $run = $conn->prepare($query);
   $hasuko = array($x);
   $execute = $run->execute($hasuko);
   $num = $run->rowCount();
    if ($num == 1)
    {
        $row = $run->fetch(PDO::FETCH_ASSOC);
           
            
            $comment = "SELECT COUNT(comment.forum_id) from comment where comment.forum_id = :a";
            //$p = $_SESSION["forum"];
            $runcomment = $conn->prepare($comment);
            $runcomment->bindParam(":a",$parameter1);
            $parameter1 = $x;
            $runcomment->execute();
            $aa = $runcomment->fetch(PDO::FETCH_ASSOC);
            $picture = "../../PROFILE/".$row['profile'];
            $path ="../../FORUM/".$row["forum_attachment"];
             
    }
   } 
   ?>     
    <section class="post-details-area mb-80">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="post-details-thumb mb-50">
                        <img style="width: 100%;" src="<?php echo $path;?>" alt="">
                    </div>
                </div>
            </div>
             <div class="section-heading style-2">
                                   
                                    <div class="line"></div>
                                </div>
     <div class="row justify-content-center">
                <!-- Post Details Content Area -->
                <div class="col-12 col-lg-8 col-xl-7">
                    <div class="post-details-content">
                        <!-- Blog Content -->
                        <div class="blog-content">
                            <!-- Post Content -->
                            <div class="post-content mt-0">
                                <a href="#" class="post-cata cata-sm cata-danger">FORUM DETAILS</a>
                                <a href="#" class="post-title mb-2"><?php echo $row["forum_tittle"];?></a>

                                <div class="d-flex justify-content-between mb-30">
                                    <div class="post-meta d-flex align-items-center">
                                        <a href="#" class="post-author">By <?php echo $row["f_name"]." ".$row["l_name"]; ?></a>
                                        <i class="fa fa-circle" aria-hidden="true"></i>
                                        <a href="#" class="post-date">on <?php echo $row["forum_date"];?></a>
                                    </div>
                                    <div class="post-meta d-flex">
                                        <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> <?php echo $aa['COUNT(comment.forum_id)'];?></a>
                                    </div>
                                </div>
                            </div>

                            
                            <blockquote class="vizew-blockquote mb-15">
                                <h5 class="blockquote-text">“<?php echo $row["forum_description"];?>.”</h5>
                                <h6>By <?php echo $row["f_name"]." ".$row["l_name"]; ?></h6>
                            </blockquote>
                            
                            <div class="comment_area clearfix mb-50">

                                <!-- Section Title -->
                                <?php 
                      //$ff = $_SESSION['forum'];
                      if(isset($_GET['id']))
                      {
                        $ff = $_GET['id'];
                      $query5 = "SELECT a.comment_time, a.comment_description, b.*, c.profile from comment a, users b,  login c, forum d where c.login_id = b.user_ID && a.forum_id = $ff && a.forum_id = d.forum_id && b.user_ID = a.user_ID ORDER BY comment_description ASC";
                      $q5 = $conn->query($query5);
                      
                      $idadi=$q5->rowCount();
                      }?>
                                <div class="section-heading style-2">
                                    <h4>Comment</h4>
                                    <div class="line"></div>
                                </div>

                                <ul> 
                        <?php
                    if($idadi > 0)
                    {
                      while($get=$q5->fetch(PDO::FETCH_ASSOC))
                        
                        {
                          $path3 = "../../PROFILE/".$get["profile"];  
                         ?>
                                    <li class="single_comment_area">
                                       
                                        <div class="comment-content d-flex">
                                            
                                            <div class="comment-author">
                                                <img src="<?php echo $path3;?>" alt="author">
                                            </div>
                                            
                                            <div class="comment-meta">
                                                <a href="#" class="comment-date"><?php echo $get["comment_time"];?></a>
                                                <h6><?php echo $get["f_name"]." ".$get["l_name"];?></h6>
                                                <p><?php echo $get["comment_description"];?></p>
                                                
                                            </div>
                                        </div>
                                    </li>
                                    <?php
                    }
                  }else {?>
                    <p><?php echo "No comment on this forrum";?></p>
                        <?php } ?>
                                </ul>
                            </div>

                            <!-- Post A Comment Area -->
                           
                        </div>
                    </div>
                </div>

                <!-- Sidebar Widget -->
                <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                    <div class="sidebar-area">
                        <div class="single-widget p-0 author-widget">
                            <div class="p-4">
                                <img class="author-avatar" src="<?php echo $picture;?>" alt="">
                                <a href="#" class="author-name"><?php echo $row["f_name"]." ".$row["l_name"]; ?></a>
                                
                                <p><?php echo $row['user_bio'];?></p>
                            </div>

                            <div class="authors--meta-data d-flex">
                                <p>Likes<span class="counter"><?php echo $aa['COUNT(comment.forum_id)'];?></span></p>
                                <p>Comments<span class="counter"><?php echo $aa['COUNT(comment.forum_id)'];?></span></p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
          </div>

        </section>
      </div>
      <br><br><br><br>
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
  <script src="../../INDEX/js/jquery/jquery-2.2.4.min.js"></script>
    
    <script src="../../INDEX/js/bootstrap/popper.min.js"></script>
    
    <!-- <script src="../../INDEX/js/bootstrap/bootstrap.min.js"></script> -->
   
    <script src="../../INDEX/js/plugins/plugins.js"></script>
    
    <script src="../../INDEX/js/active.js"></script>
  <script>
    $(document).ready(function() 
    {
      demo.initChartsPages();
    });
  </script>
</body>

</html>