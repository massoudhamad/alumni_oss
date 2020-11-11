
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
          
          
                   <div class="row">

                        <?php 
                          $x = $_SESSION['member_ID'];
                          $r = "SELECT * FROM groupss,group_members,members WHERE group_members.m_id=$x AND groupss.group_id = group_members.grou_id and members.m_id=group_members.m_id";

                          $exe = $conn->query($r);

                          $t = $exe->rowCount();

                          
                        ?>
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">OPEN OR CREATE A GROUP TODAY</h3>
                                <h4><a href = create_group.php> <button class = "au-btn au-btn-icon au-btn--green au-button--small" >CREATE GROUP</button></a></h4>
                                   
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
                                                
                                                <th>Group Name</th>
                                                <th>Description of Group</th>
                                                <th>Group Picture</th>
                                                <th>OPEN GROUP</th>
                                                <th>LEAVE GROUP</th>
                                              
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        if ($t > 0)
                                        {
                                          while ($row = $exe->fetch(PDO::FETCH_ASSOC))
                                          {
                                           $path2 = "../../GROUP/".$row["g_picture"];
                                            ?>
                                            <tr class="tr-shadow">
                                                <td>
                                                    <label class="au-checkbox">
                                                        <input type="checkbox" name="id" value="<?php echo $row['m_id'];?>">
                                                        <span class="au-checkmark"></span>
                                                    </label>
                                                </td>
                                               
                                                <td>
                                                    <span class="block-email"><?php echo $row["g_name"];?></span>
                                                </td>
                                                <td class="desc"><?php echo $row["gdesc"]; ?></td>
                                                <td>
                                                    <span class="status--process"><img style="width: 80px;"src="<?php echo $path2;?>"></span>
                                                </td>
                                                   <td>
                                                       <div class="table-data-feature">
                                                           <h4><a href="chat_group.php?id=<?php echo $row['group_id'];?>"><button class = "au-btn au-btn-icon au-btn--green au-button--small" >OPEN GROUP</button></a></h4>
                                                        </div>   
                                                    </td>
                                                    <td>
                                                       <div class="table-data-feature">
                                                           <h4><a onclick="return confirm('Are you sure you want to exit this group??')" href="my_groups.php?g_id=<?php echo $row['grou_id'];?>"><button  id="exit" name="exit" class = "au-btn au-btn-icon au-btn--green au-button--small">LEAVE GROUP</button></a></h4>
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
<!-- <script>
          $(document) .ready(function()
          {
            $('#exit') .click(function()
            {
            if(confirm("Are you sure You want to Exit this Group??"))
            {
              var id = [];
              $(':checkbox:checked') .each(function(i)
              {
                id[i]  = $(this).val();
              });
              if(id.length === 0)
              {
                alert("Please select at least on check box");
              }
              else
              {
              $.ajax({
                url:'_groups.php',
                method:'POST',
                data:{id:id},
                success: function()
                {
                  for(var i=0; i<id.length: i++)
                  {
                    $('tr#'+id[i]+'').css('background-color', '#ccc');
                    $('tr#'+id[i]+'').fadeOut('slow');
                  }
                }
              });
            }
            }else
            {
              return false;
            }
          });
          });
        </script>
                    -->
<?php 
  if(isset($_GET['g_id']))
  {
  $g_id = $_GET['g_id'];
  $m_id = $_SESSION['member_ID'];
  $query = $conn->query("DELETE FROM group_members WHERE m_id = $m_id AND grou_id = $g_id");
  header("location:my_groups.php");
  }
?>