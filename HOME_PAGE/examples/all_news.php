
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
  
      <?php
      include("up_bar.php");
      ?>
      <br><br>
   <?php
   $x= $_SESSION['user_ID'];
   $query = "SELECT * FROM collagenews, users, login WHERE login.login_id = users.user_ID AND users.user_ID = collagenews.user_ID";
   $run = $conn->query($query);
   $num = $run->rowCount();
   ?>  

<style type = "text/css">
 h2 
 {
   text-align: center;
   font-family: Arial, sans-serif, times;
   font-style: italic;
 }

</style>   
<div class="content">
  <h2>NEWS HUB</h2>
  <h3>
  <div class="table-data__tool">
                        
   </div>

  </h3>

  <?php
    if ($num > 0)
    {
        while($row = $run->fetch(PDO::FETCH_ASSOC))
          { 
            $_SESSION['collagenews'] = $row["co_news_id"];
            
            $path1 ="../../NEWS/".$row["attachment"];
            $path2 = "../../NEWS/".$row["attachment2"];
            ?>          
<div id="main">
  <div id="main_inner" class="fluid">
    <div id="primaryContent_columnless">
      <div id="columnA_columnless">
        <h3><?php echo $row["news_tittle"];?></h3>
        <img style="width: 30%;" src="<?php echo $path1; ?>" class="floatTL" alt="Something scenic" />
        <p><?php echo $row["news_description"];?></p>
        <br class="clear" />
        <div class="post">
          <h3>Forum Details</h3>
          <ul class="post_info">
            <h3><li class="date">Posted by <a href="#"><?php echo $row["f_name"]." ".$row["l_name"]; ?></a> on <?php echo $row["date_created"];?></li>
          </ul>
        </div>
              </div>
    </div>
    <br class="clear" />
  </div>
</div>
    <?php
  }
}else
   echo   "No News Avaiable Right Now";
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
                ?? <script>
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