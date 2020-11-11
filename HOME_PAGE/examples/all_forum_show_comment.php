
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
<link rel="stylesheet" type="text/css" title="Red" href="forum/style_red.css" />
<link rel="alternate stylesheet" type="text/css" title="Blue" href="forum/style_blue.css" />
<link rel="alternate stylesheet" type="text/css" title="Green" href="forum/style_green.css" />
<link rel="alternate stylesheet" type="text/css" title="Brown" href="forum/style_brown.css" />
<link rel="alternate stylesheet" type="text/css" title="Magenta" href="forum/style_magenta.css" />
<script src="forum/styleswitch.js" type="text/javascript"></script>
<!----- CDN  ------>
<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
</head>
<style type="text/css">
      body{margin-top:20px;}

.comment-wrapper .panel-body {
    max-height:650px;
    overflow:auto;
}

.comment-wrapper .media-list .media img {
    width:64px;
    height:64px;
    border:2px solid #e5e7e8;
}

.comment-wrapper .media-list .media {
    border-bottom:1px dashed #efefef;
    margin-bottom:25px;
}
    </style>
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
  
      <?php
      include("up_bar.php");
      ?>
      <br><br>
   <?php
   if (isset($_GET["id"]))
   {

   $x= $_GET["id"];
   $query = "SELECT * FROM forum,users,login WHERE login.login_id = users.user_ID AND users.user_ID = forum.user_ID AND forum.forum_id = ?";
   $run = $conn->prepare($query);
   $hasuko = array($x);
   $execute = $run->execute($hasuko);
   $num = $run->rowCount();
   ?>  
<div class="content">
  <h2>SELECTED FORUM </h2>
  <?php
    if ($num == 1)
    {
        $row = $run->fetch(PDO::FETCH_ASSOC);
           
            $_SESSION['forum'] = $row["forum_id"];
            $comment = "SELECT COUNT(comment.forum_id) from comment where comment.forum_id = :a";
            $p = $_SESSION["forum"];
            $runcomment = $conn->prepare($comment);
            $runcomment->bindParam(":a",$parameter1);
            $parameter1 = $p;
            $runcomment->execute();
            $aa = $runcomment->fetch(PDO::FETCH_ASSOC);
            $path ="../../FORUM/".$row["forum_attachment"];
            ?>          
<div id="main">
  <div id="main_inner" class="fluid">
    <div id="primaryContent_columnless">
      <div id="columnA_columnless">
        <h3><?php echo $row["forum_tittle"];?></h3>
        <img width="30%" src="<?php echo $path;?>" class="floatTL" alt="Something scenic" />
        <p><?php echo $row["forum_description"];?></p>
        <br class="clear" />
        <div class="post">
          <h3>Forum Details</h3>
          <ul class="post_info">
            <h3><li class="date">Posted by <a href="#"><?php echo $row["f_name"]." ".$row["l_name"]; ?></a> on <?php echo $row["forum_date"];?></li>
            <li class="comments"> <a href="#"><?php echo $aa['COUNT(comment.forum_id)'];?> comments</a></li></h3>
          </ul>
        </div>

  <?php
  
}
?>

        <br><br><br>
       <div style="">
<div style="margin-left: -5%;">
<div class="container">
<div class="row bootstrap snippets bootdeys">
    <div class="col-md-8 col-sm-12">
        <div class="comment-wrapper">
            <div class="panel panel-info">
                <div class="panel-heading" id="x">
                    Comment area with list of Comments
                </div>
                
                <div class="panel-body">
                    <form method="POST" action="comment_hand_all.php">
                      <input type="hidden" name="forum" value="<?php echo $x;?>">
                    <textarea class="form-control" placeholder="write a comment..." rows="3" name="comment"></textarea>
                    <br>
                    <button class="btn btn-info pull-right">Comment</button>
                    
                    </form>

                      <?php 
                      $ff = $_SESSION['forum'];
                      
                      $query5 = "SELECT a.comment_time, a.comment_description, b.*, c.profile from comment a, users b,  login c, forum d where c.login_id = b.user_ID && a.forum_id = $ff && a.forum_id = d.forum_id && b.user_ID = a.user_ID ORDER BY comment_description DESC";
                      $q5 = $conn->query($query5);
                      // $ex = $q5->execute();
                      $idadi=$q5->rowCount();
                      ?>
                    <div class="clearfix"></div>
                    <hr>
                    <?php
                    if($idadi > 0)
                    {
                      while($get=$q5->fetch(PDO::FETCH_ASSOC))
                        
                        {
                          $path3 = "../../PROFILE/".$get["profile"];  
                         ?>
                    <ul class="media-list">
                        <li class="media">
                            <a href="#" class="pull-left">
                                <img src="<?php echo $path3;?>" alt="" class="img-circle">
                            </a>
                            <div class="media-body">
                                <span class="text-muted pull-right">
                                    <small class="text-muted"><?php echo $get["comment_time"];?></small>
                                </span>
                                <strong class="text-success">@<?php echo $get["f_name"]."@".$get["l_name"];?></strong>
                                <p>
                                    <?php echo $get["comment_description"];?>
                                </p>
                            </div>
                        </li> 
                    </ul>
                    <?php
                    }
                  }
                  ?>
                </div>
            </div>
        </div>

    </div>
</div>
</div>
</div>
      </div>
    </div>
    <br class="clear" />
  </div>
</div>
    <?php
}
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
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <script src="../assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script>
  <script src="../assets/demo/demo.js"></script>
  <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script type="text/javascript">
  <script>
    $(document).ready(function() 
    {
      demo.initChartsPages();
    });
  </script>
</body>

</html>