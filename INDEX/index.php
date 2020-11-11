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
    <?php
    include("../connection.php");
    $query = $conn->query("SELECT * FROM collagenews");
    $num = $query->rowCount();
    ?>

    <section class="hero--area section-padding-80">
        <div class="container">
            <div class="row no-gutters">

                <div class="col-12 col-md-12 col-lg-12">
                            <div class="section-heading" style="">
            <h4>Announcement News</h4>
             <div class="line"></div>
         </div>
                      <?php
                        if($num   >  0)
                        {
                                while($rows = $query->fetch(PDO::FETCH_ASSOC))
                                {
                                    $path3 ="../NEWS/".$rows['attachment'];
                                    $path4 ="../NEWS/".$rows['attachment2'];
                                ?>   
                                <br> 
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="post-1" role="tabpanel" aria-labelledby="post-1-tab">
                            <!-- Single Feature Post -->
                            <div class="single-feature-post video-post bg-img" style="background-image: url(<?php echo $path3; ?>);">
                                
                                <div class="post-content">
                                    <a href="#" class="post-cata">University News</a>
                                    <a href="#" class="post-title"><?php echo $rows['news_description'];?></a>
                                   
                                </div>
                            </div>
                        </div>       
                    </div>
                    <?php
                }
            }
            ?>
                </div>

                
            </div>
        </div>
    </section>

    <?php
    $query2 = $conn->query("SELECT * FROM opportunity");
    $num2 = $query2->rowCount();
    ?>
    <section class="trending-posts-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Heading -->
                    <div class="section-heading">
                        <h4>Opportunities News</h4>
                        <div class="line"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Single Blog Post -->
                <?php
                if ($num2 > 0)
                {
                    while($rows2 = $query2->fetch(PDO::FETCH_ASSOC))
                        { 
                            $picture = "../OPPORTUNITY/".$rows2["attachment"];
                          ?>
                <div class="col-12 col-md-4">
                    <div class="single-post-area mb-90">
                        
                        <div class="post-thumbnail">
                            <img src="img/bg-img/18.jpg" alt="">
                        </div>

                        <!-- Post Content -->
                        <div class="post-content">
                            <a href="#" class="post-cata cata-sm cata-success"><?php echo $rows2['opportunity_type'];?></a>
                            <a href="#" class="post-cata cata-sm cata-business"><?php echo $rows2['skills'];?></a>
                            <a href="#" class="post-cata cata-sm cata-success"><?php echo $rows2['contact'];?></a>
                            <a href="single-post.html" class="post-title"><?php echo $rows2["opportunity_descrip"];?></a>
                           
                        </div>
                    </div>
                </div>
                <?php
                        }
                }   ?>
            </div>

        </div>
    </section>
    <footer class="footer-area">
        <div class="container">
            <div class="row">
            </div>
        </div>
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
    
    <script src="js/bootstrap/popper.min.js"></script>
        <script src="js/bootstrap/bootstrap.min.js"></script>
    
    <script src="js/plugins/plugins.js"></script>
     <script src="js/active.js"></script>
</body>

</html>