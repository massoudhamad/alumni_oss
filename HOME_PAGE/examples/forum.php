
      <?php
      error_reporting();
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
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
  <link href="form/css/main.css" rel="stylesheet" media="all">
  <link rel="stylesheet" type="text/css" href="HOME_PAGE/examples/popup/sweetalert2.css">
<link rel="stylesheet" type="text/css" href="HOME_PAGE/examples/popup/sweetalert2.min.css">
<script src="ckeditor/ckeditor.js"></script>
<script src="popup/sweetalert2.js"></script>
<script src="popup/sweetalert2.min.js"></script>
<script src="popup/sweetalert2.all.js"></script>
<script src="sweetalert2.all.min.js"></script>
  <script src="form/vendor/jquery/jquery.min.js"></script>
  <script src="form/js/global.js"></script>
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
      <div class="content">
         <div class="card card-6">
                <div class="card-heading">
                    <h2 class="title" style="color: red;">  CREATE YOUR FORUM HERE</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="forum.php" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="name">Forum Name</div>
                            <div class="value">
                                <input class="input--style-6" type="text" name="f_name" required="required">
                            </div>
                        </div>
                        
                         
                        <div class="form-row">
                            <div class="name">Description of the Forum</div>
                            <div class="value">
                                <div class="input-group">
                                    <textarea class="ckeditor" name="description" placeholder="Describe the content of the Event" required="required"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Forum Attachment</div>
                            <div class="value">
                                <div class="input-group js-input-file">
                                    <input type="file" name="picture" id="file" required="required">
                                </div>
                                <div class="label--desc">Upload your Event Attachment</div>
                            </div>
                        </div>
                         <div class="card-footer">
                    <button class="btn btn--radius-2 btn--blue-2" type="submit" name="submit">Create Forum</button>
                </div>
            </div> 
                    </form>
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
   if ($_SERVER["REQUEST_METHOD"] == "POST")
  {
    $forum_name = $_POST["f_name"];
    $description = $_POST["description"];
    $pic= $_FILES['picture'];
    $alowed_ext=array("png","jpg","gif");
    $ext=strtolower(end(explode(".",$pic["name"])));
    $err=array();
    if(!in_array($ext,$alowed_ext))
    {
      $err[count($err)]="Invalid FIle Type. only JPG, PNG and GIF are allowed";
    }
    if($pic["size"]>10097152)
    {
    $err[count($err)]="Invalid FIle Size. Maximum size allowed is 10MB";
    }
    if(sizeof($err)==0)
    {
  $logged_user=$_SESSION['username'];
  $filename=$logged_user.".".$ext;
  $path="../../FORUM/".$filename;
  if(move_uploaded_file($pic["tmp_name"],$path))
  {
    $query = "SELECT user_ID FROM users,login WHERE login.login_id = users.user_ID AND username = :username";
    $run = $conn->prepare($query);
    $run->bindParam(":username",$p1);
    $p1 = $logged_user;
      $exe = $run->execute();
      $num=$run->rowCount();
      if ($num == 1)
      { 
        $row = $run->fetch(PDO::FETCH_ASSOC);
        $user_ID = $row["user_ID"];
    $query5 = "INSERT INTO forum (user_ID,forum_tittle,forum_description,forum_date,forum_attachment) VALUES (:a,:b,:c,:d,:e)";
    $runq5 = $conn->prepare($query5);
    $runq5->bindParam(":a",$parameter_x);
    $runq5->bindParam(":b",$parameter_y);
    $runq5->bindParam(":c",$parameter_z);
    $runq5->bindParam(":d",$parameter_a);
    $runq5->bindParam(":e",$parameter_b);
    $parameter_x = $user_ID;
    $parameter_y = $forum_name;
    $parameter_z = $description;
    $parameter_a = date("Y-m-d h:i:sa");
    $parameter_b = $filename; 
   if($runq5->execute())
    {
      header("location:list_of_forums.php");
     ?>
      <script>
                  Swal.fire({
                    icon: 'success',
                    title: 'Forum Created',
                  })
                  
                </script>
   <?php
   
    }
   }   
else
  { ?>
    <script>
                  Swal.fire({
                    icon: 'error',
                    title: 'Forum Was Not Created',
                  })
                  
                </script>
                <?php
  $_SESSION["ERROR"]=$err;
  header("location:forum.php?sts=Upload failed, try again ");
  }

  }
}
}

?>