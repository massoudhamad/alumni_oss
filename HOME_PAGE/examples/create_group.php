
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
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
  <link href="form/css/main.css" rel="stylesheet" media="all">
  <link rel="stylesheet" type="text/css" href="HOME_PAGE/examples/popup/sweetalert2.css">
<link rel="stylesheet" type="text/css" href="HOME_PAGE/examples/popup/sweetalert2.min.css">

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
                    <h2 class="title" style="color: red;">CREATE GROUP</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="create_group.php" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="name">Group Name</div>
                            <div class="value">
                                <input class="input--style-6" type="text" name="g_name" required="required">
                            </div>
                        </div>
                       
                        <div class="form-row">
                            <div class="name">Description</div>
                            <div class="value">
                                <div class="input-group">
                                    <textarea class="textarea--style-6" name="gdesc" placeholder="Describe the content of group" required="required"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Group Picture</div>
                            <div class="value">
                                <div class="input-group js-input-file">
                                    <input type="file" name="g_picture" id="file" required="required">
                                </div>
                                <div class="label--desc">Upload your Group Profile Picture</div>
                            </div>
                        </div>
                         <div class="card-footer">
                    <button class="btn btn--radius-2 btn--blue-2" type="submit" name="submit">Create</button>
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
    $g_name = $_POST["g_name"];
    $description = $_POST["gdesc"];
    $pic= $_FILES['g_picture'];
    $alowed_ext=array("png","jpg","gif");
    $picname = explode(".",$pic["name"]);
    $ext=strtolower(end($picname));
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
  $path="../../GROUP/".$filename;
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
    $query5 = "INSERT INTO groupss (user_ID, g_name, gdesc, g_picture) VALUES (:user_ID, :g_name, :gdesc, :g_picture)";
    $runq5 = $conn->prepare($query5);
    $runq5->bindParam(":user_ID",$parameter_x);
    $runq5->bindParam(":g_name",$parameter_y);
    $runq5->bindParam(":gdesc",$parameter_z);
    $runq5->bindParam(":g_picture",$parameter_a);
    $parameter_x = $user_ID;
    $parameter_y = $g_name;
    $parameter_z = $description;
    $parameter_a = $filename; 
   if($runq5->execute())


    {
      $sql=$conn->query("SELECT groupss.group_id, members.m_id from members, groupss,users where users.user_ID=members.user_id AND users.user_ID=groupss.user_id AND groupss.user_id=$user_ID");
      $aisha =$sql->fetch(PDO::FETCH_ASSOC);
      $_SESSION['group'] = $aisha['group_id'];
      $group_id=$aisha['group_id'];
      $member_id=$aisha['m_id'];

      $sql2=$conn->query("INSERT INTO group_members(grou_id,m_id) VALUES($group_id,$member_id)");
       if($sql2)
       {
      
     ?>
      <script>
                  Swal.fire({
                    icon: 'success',
                    title: 'Group Created',
                  })
                  
                </script>
   <?php }
   } 
  }  
else
  {
  $_SESSION["ERROR"]=$err;
  header("location:create_group.php?sts=Upload failed, try again ");
  }

  }
}
}

?>