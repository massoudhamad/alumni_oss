
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
  
 <script src = "ckeditor/ckeditor.js"></script>
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
     
      <?php
      include("up_bar.php");
      ?>
      <div class="content">
       

         

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
              <div class="card-footer">
                <hr>
               <div class="button-container">
                 
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-8">
             <div class="card card-6">
                <div class="card-heading">
                    <h2 class="title" style="color: red;">UPLOAD NEWS</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="upload_news.php" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="name">News Tittle</div>
                            <div class="value">
                                <input class="input--style-6" type="text" name="n_tittle" placeholder="Tittle News" required="required">
                            </div>
                        </div>
                       
                        <div class="form-row">
                            <div class="name">Description</div>
                            <div class="value">
                                <div class="input-group">
                                    <textarea class="ckeditor" name="description" placeholder="Describe the content of group" required="required"></textarea>
                                </div>
                            </div>
                        </div>

                        
                        <div class="form-row">
                            <div class="name">News Attachment 1</div>
                            <div class="value">
                                <div class="input-group js-input-file">
                                    <input type="file" name="picture" id="file" required="required">
                                </div>
                                <div class="label--desc">Upload your News Attachment</div>
                            </div>
                        </div>
                         <div class="form-row">
                            <div class="name">News Attachment 2</div>
                            <div class="value">
                                <div class="input-group js-input-file">
                                    <input type="file" name="picture2" id="file">
                                </div>
                                <div class="label--desc">Upload your News Attachment</div>
                            </div>
                        </div>
                         <div class="card-footer">
                    <button class="btn btn--radius-2 btn--blue-2" type="submit" name="submit">Create</button>
                </div>
            </div> 
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

<?php
   if ($_SERVER["REQUEST_METHOD"] == "POST")
  {
    $ntitle = $_POST["n_tittle"];
    $n_description = $_POST["description"];
    $pic1= $_FILES['picture'];
    $pic2= $_FILES['picture2'];
    $alowed_ext=array("png","jpg","gif");
    $first = explode(".",$pic1["name"]);
    $ext=strtolower(end($first));
    $second = explode(".",$pic2["name"]);
    $ext2=strtolower(end($second));
    $err=array();
    if(!in_array($ext,$alowed_ext)){
      if(!in_array($ext2,$alowed_ext2))
    {
      $err[count($err)]="Invalid FIle Type. only JPG, PNG and GIF are allowed";
    }}
    if($pic1["size"]>10097152 || $pic2['size']>10097152)
    {
    $err[count($err)]="Invalid FIle Size. Maximum size allowed is 10MB";
    }
    if(sizeof($err)==0)
    {
  $logged_user=$_SESSION['username'];
  $filename=$logged_user.".".$ext;
  $filename2=$logged_user.".".$ext2;
  $path="../../NEWS/".$filename;
  $path2="../../NEWS/".$filename2;
  if(move_uploaded_file($pic1["tmp_name"],$path))
  {
    if(move_uploaded_file($pic2["tmp_name"],$path2))
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
    $query5 = "INSERT INTO collagenews (user_ID,news_tittle,news_description,date_created,attachment,attachment2) VALUES (:user_id,:news_tittle,:news_description,:time_created,:attachment,:attachment2)";
    $runq5 = $conn->prepare($query5);
    $runq5->bindParam(":user_id",$parameter_x);
    $runq5->bindParam(":news_tittle",$parameter_y);
    $runq5->bindParam(":news_description",$parameter_z);
    $runq5->bindParam(":time_created",$parameter_c);
    $runq5->bindParam(":attachment",$parameter_a);
    $runq5->bindParam(":attachment2",$parameter_b);
    $parameter_x = $user_ID;
    $parameter_y = $ntitle;
    $parameter_z = $n_description;
    $parameter_c = date("Y-m-d h:i:sa");
    $parameter_a = $filename;
    $parameter_b = $filename2;
   if($runq5->execute())
    {
     ?>
      <script>
                  Swal.fire({
                    icon: 'success',
                    title: 'Uploaded Successfully',
                  })
                  
                </script>
   <?php }
   }   
else
  {
  $_SESSION["ERROR"]=$err;
  header("location:upload_news.php?sts=Upload failed, try again ");
  }

  }
}
}
  }

?>