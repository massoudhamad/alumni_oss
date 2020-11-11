
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
<link href="http://netdna.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
<script src="popup/sweetalert2.js"></script>
<script src="popup/sweetalert2.min.js"></script>
<script src="popup/sweetalert2.all.js"></script>
<script src="sweetalert2.all.min.js"></script>
  <script src="form/vendor/jquery/jquery.min.js"></script>
  <script src="form/js/global.js"></script>

   <style type="text/css">
      body{margin-top:20px;}

.groups__item,
.messages {
    background-color: rgba(0, 0, 0, .2);
    border-radius: 2px;
    box-shadow: 0 1px 5px rgba(0, 0, 0, .1)
}

@media (max-width:575px) {
    .groups {
        margin: 0 -5px
    }
    .groups [class*=col-] {
        padding: 0 5px
    }
    .groups .groups__item {
        margin-bottom: 10px
    }
}

.groups__item {
    position: relative;
    text-align: center;
    padding: 2rem 1rem 1.5rem;
    margin-bottom: 30px
}

.groups__item:hover .actions {
    opacity: 1
}

.groups__item .actions {
    position: absolute;
    top: .7rem;
    right: .5rem;
    z-index: 1;
    opacity: 0
}

.groups__img {
    width: 6.5rem;
    display: inline-block
}

.groups__img .avatar-img {
    display: inline-block;
    margin: 0 1px 4px 0;
    vertical-align: top
}

.avatar-char, .avatar-img {
    border-radius: 2px;
    width: 3rem;
    height: 3rem;
    margin-right: 1.2rem;
}

.avatar-char {
    color: #fff;
    background-color: rgba(255,255,255,.08);
}

.avatar-char {
    line-height: 2.9rem;
    font-size: 1.2rem;
    text-align: center;
    font-style: normal;
}

.groups__info {
    margin-top: 1rem
}

.groups__info>strong {
    color: #fff;
    display: block;
    font-weight: 600
}

.messages,
.messages__body {
    display: -webkit-box;
    display: -ms-flexbox;
    -webkit-box-direction: normal
}

.groups__info>small {
    font-size: .9rem;
    color: rgba(255, 255, 255, .7)
}


.toolbar {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-direction: normal;
    -ms-flex-direction: row;
    flex-direction: row;
    height: 4.5rem;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    padding: .05rem 2.2rem 0;
    position: relative
}

.toolbar:not(.toolbar--inner) {
    background-color: rgba(0, 0, 0, .2);
    border-radius: 2px;
    margin-bottom: 30px;
    box-shadow: 0 1px 5px rgba(0, 0, 0, .1)
}

.toolbar .actions {
    margin: .05rem -.8rem 0 auto
}

.toolbar--inner {
    margin-bottom: 1rem;
    border-radius: 2px 2px 0 0;
    background-color: rgba(0, 0, 0, .1)
}

.toolbar__nav {
    white-space: nowrap;
    overflow-x: auto
}

.toolbar__nav>a {
    display: inline-block;
    transition: color .3s
}

.toolbar__nav>a+a {
    padding-left: 1rem
}

.toolbar__nav>a.active,
.toolbar__nav>a:hover {
    color: rgba(255, 255, 255, .85)
}

.toolbar__search {
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    border-radius: 2px;
    padding-left: 3rem;
    display: none;
    background-color: rgba(0, 0, 0, .96)
}

.toolbar__search input[type=text] {
    width: 100%;
    height: 100%;
    border: 0;
    padding: 0 1.6rem;
    font-size: 1.2rem;
    background-color: transparent;
    color: rgba(255, 255, 255, .85)
}

.toolbar__search input[type=text]::-webkit-input-placeholder {
    color: rgba(255, 255, 255, .5)
}

.toolbar__search input[type=text]:-moz-placeholder {
    color: rgba(255, 255, 255, .5)
}

.toolbar__search input[type=text]::-moz-placeholder {
    color: rgba(255, 255, 255, .5)
}

.toolbar__search input[type=text]:-ms-input-placeholder {
    color: rgba(255, 255, 255, .5)
}

.toolbar__search__close,
.toolbar__search__close:hover {
    color: rgba(255, 255, 255, .85)
}

.toolbar__search__close {
    transition: color .3s;
    cursor: pointer;
    position: absolute;
    top: 1.5rem;
    left: 1.8rem;
    font-size: 1.5rem
}

.toolbar__label {
    margin: 0;
    font-size: 1.1rem
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
     <section class="container">
                <div class="content__inner">
                    <header class="content__title">
                        <h1>ALL APPROVED ALUMNI AVAILABLE IN OUR SYSTEM</h1>

                        <div class="actions">
                            <a href="" class="actions__item zmdi zmdi-trending-up"></a>
                            <a href="" class="actions__item zmdi zmdi-check-all"></a>

                          
                        </div>
                    </header>
                       <?php
                    $query2 = "SELECT COUNT(login_id) FROM login,users WHERE login.user_role ='ALUMNI'AND users.approval='approved' AND users.user_ID=login.login_id";
                    $run2 = $conn->query($query2);
                    $fetch2  = $run2->fetch(PDO::FETCH_BOTH);
                    ?>
                    <div class="toolbar">
                        <div class="toolbar__label">
                            <?php echo $fetch2['COUNT(login_id)'];?> Total Users
                        </div>

                        <div class="actions">
                            <i class="actions__item zmdi zmdi-search" data-sa-action="toolbar-search-open"></i>
                            <a href="" class="actions__item zmdi zmdi-info-outline hidden-xs-down"></a>
                        </div>

                        <div class="toolbar__search">
                            <input type="text" placeholder="Search...">

                            <i class="toolbar__search__close zmdi zmdi-long-arrow-left" data-sa-action="toolbar-search-close"></i>
                        </div>
                    </div>
                    <div class="row groups">
                    <?php
                    $query = "SELECT * FROM users,login WHERE users.user_ID = login.login_id AND login.user_role ='ALUMNI' AND users.approval = 'approved'";
                    $run = $conn->query($query);
                    $rowcount = $run->rowCount();
                    if ($rowcount > 0)
                    {
                      while($row = $run->fetch(PDO::FETCH_ASSOC))
                         {
                             $path = "../../PROFILE/".$row["profile"];
                           ?>
                    
                        <div class="col-xl-2 col-lg-3 col-sm-4 col-6">
                            <div class="groups__item">
                                <a href="user_info.php?user_info_id=<?php echo $row['user_ID'];?>">
                                    <div class="groups__img">
                                        <img class="avatar-img" src="<?php echo $path;?>" alt="">
                                        
                                    </div>

                                    <div class="groups__info">
                                        <strong><?php echo $row["f_name"]." ".$row["l_name"]; ?></strong>
                                        <small>View Info</small>
                                    </div>
                                </a>  
                            </div>
                        </div>
                    

                    <?php
                  }
                }
                ?>
                </div>
                </div>
            </section>

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
  <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<!-- <script src="http://netdna.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script> -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
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
