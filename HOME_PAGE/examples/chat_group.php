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
    <meta charset="utf-8">
   <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    ALUMNI INFORMATION SYSTEM
  </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
      html,
body,
div,
span {
  height: 100%;
  width: 100%;
  overflow: hidden;
  padding: 0;
  margin: 0;
  box-sizing: border-box;
}

body {
  background: url("http://shurl.esy.es/y") no-repeat fixed center;
  background-size: cover;
}

.fa-2x {
  font-size: 1.5em;
}

.app {
  position: relative;
  overflow: hidden;
  top: 19px;
  height: calc(100% - 38px);
  margin: auto;
  padding: 0;
  box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .06), 0 2px 5px 0 rgba(0, 0, 0, .2);
}

.app-one {
  background-color: #f7f7f7;
  height: 100%;
  overflow: hidden;
  margin: 0;
  padding: 0;
  box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .06), 0 2px 5px 0 rgba(0, 0, 0, .2);
}

.side {
  padding: 0;
  margin: 0;
  height: 100%;
}
.side-one {
  padding: 0;
  margin: 0;
  height: 100%;
  width: 100%;
  z-index: 1;
  position: relative;
  display: block;
  top: 0;
}

.side-two {
  padding: 0;
  margin: 0;
  height: 100%;
  width: 100%;
  z-index: 2;
  position: relative;
  top: -100%;
  left: -100%;
  -webkit-transition: left 0.3s ease;
  transition: left 0.3s ease;

}


.heading {
  padding: 10px 16px 10px 15px;
  margin: 0;
  height: 60px;
  width: 100%;
  background-color: #eee;
  z-index: 1000;
}

.heading-avatar {
  padding: 0;
  cursor: pointer;

}

.heading-avatar-icon img {
  border-radius: 50%;
  height: 40px;
  width: 40px;
}

.heading-name {
  padding: 0 !important;
  cursor: pointer;
}

.heading-name-meta {
  font-weight: 700;
  font-size: 100%;
  padding: 5px;
  padding-bottom: 0;
  text-align: left;
  text-overflow: ellipsis;
  white-space: nowrap;
  color: #000;
  display: block;
}
.heading-online {
  display: none;
  padding: 0 5px;
  font-size: 12px;
  color: #93918f;
}
.heading-compose {
  padding: 0;
}

.heading-compose i {
  text-align: center;
  padding: 5px;
  color: #93918f;
  cursor: pointer;
}

.heading-dot {
  padding: 0;
  margin-left: 10px;
}

.heading-dot i {
  text-align: right;
  padding: 5px;
  color: #93918f;
  cursor: pointer;
}

.searchBox {
  padding: 0 !important;
  margin: 0 !important;
  height: 60px;
  width: 100%;
}

.searchBox-inner {
  height: 100%;
  width: 100%;
  padding: 10px !important;
  background-color: #fbfbfb;
}


/*#searchBox-inner input {
  box-shadow: none;
}*/

.searchBox-inner input:focus {
  outline: none;
  border: none;
  box-shadow: none;
}

.sideBar {
  padding: 0 !important;
  margin: 0 !important;
  background-color: #fff;
  overflow-y: auto;
  border: 1px solid #f7f7f7;
  height: calc(100% - 120px);
}

.sideBar-body {
  position: relative;
  padding: 10px !important;
  border-bottom: 1px solid #f7f7f7;
  height: 72px;
  margin: 0 !important;
  cursor: pointer;
}

.sideBar-body:hover {
  background-color: #f2f2f2;
}

.sideBar-avatar {
  text-align: center;
  padding: 0 !important;
}

.avatar-icon img {
  border-radius: 50%;
  height: 49px;
  width: 49px;
}

.sideBar-main {
  padding: 0 !important;
}

.sideBar-main .row {
  padding: 0 !important;
  margin: 0 !important;
}

.sideBar-name {
  padding: 10px !important;
}

.name-meta {
  font-size: 100%;
  padding: 1% !important;
  text-align: left;
  text-overflow: ellipsis;
  white-space: nowrap;
  color: #000;
}

.sideBar-time {
  padding: 10px !important;
}

.time-meta {
  text-align: right;
  font-size: 12px;
  padding: 1% !important;
  color: rgba(0, 0, 0, .4);
  vertical-align: baseline;
}

/*New Message*/

.newMessage {
  padding: 0 !important;
  margin: 0 !important;
  height: 100%;
  position: relative;
  left: -100%;
}
.newMessage-heading {
  padding: 10px 16px 10px 15px !important;
  margin: 0 !important;
  height: 100px;
  width: 100%;
  background-color: #00bfa5;
  z-index: 1001;
}

.newMessage-main {
  padding: 10px 16px 0 15px !important;
  margin: 0 !important;
  height: 60px;
  margin-top: 30px !important;
  width: 100%;
  z-index: 1001;
  color: #fff;
}

.newMessage-title {
  font-size: 18px;
  font-weight: 700;
  padding: 10px 5px !important;
}
.newMessage-back {
  text-align: center;
  vertical-align: baseline;
  padding: 12px 5px !important;
  display: block;
  cursor: pointer;
}
.newMessage-back i {
  margin: auto !important;
}

.composeBox {
  padding: 0 !important;
  margin: 0 !important;
  height: 60px;
  width: 100%;
}

.composeBox-inner {
  height: 100%;
  width: 100%;
  padding: 10px !important;
  background-color: #fbfbfb;
}

.composeBox-inner input:focus {
  outline: none;
  border: none;
  box-shadow: none;
}

.compose-sideBar {
  padding: 0 !important;
  margin: 0 !important;
  background-color: #fff;
  overflow-y: auto;
  border: 1px solid #f7f7f7;
  height: calc(100% - 160px);
}

/*Conversation*/

.conversation {
  padding: 0 !important;
  margin: 0 !important;
  height: 100%;
  /*width: 100%;*/
  border-left: 1px solid rgba(0, 0, 0, .08);
  /*overflow-y: auto;*/
}

.message {
  padding: 0 !important;
  margin: 0 !important;
  background: url("w.jpg") no-repeat fixed center;
  background-size: cover;
  overflow-y: auto;
  border: 1px solid #f7f7f7;
  height: calc(100% - 120px);
}
.message-previous {
  margin : 0 !important;
  padding: 0 !important;
  height: auto;
  width: 100%;
}
.previous {
  font-size: 15px;
  text-align: center;
  padding: 10px !important;
  cursor: pointer;
}

.previous a {
  text-decoration: none;
  font-weight: 700;
}

.message-body {
  margin: 0 !important;
  padding: 0 !important;
  width: auto;
  height: auto;
}

.message-main-receiver {
  /*padding: 10px 20px;*/
  max-width: 60%;
}

.message-main-sender {
  padding: 3px 20px !important;
  margin-left: 40% !important;
  max-width: 60%;
}

.message-text {
  margin: 0 !important;
  padding: 5px !important;
  word-wrap:break-word;
  font-weight: 200;
  font-size: 14px;
  padding-bottom: 0 !important;
}

.message-time {
  margin: 0 !important;
  margin-left: 50px !important;
  font-size: 12px;
  text-align: right;
  color: #9a9a9a;

}

.receiver {
  width: auto !important;
  padding: 4px 10px 7px !important;
  border-radius: 10px 10px 10px 0;
  background: #ffffff;
  font-size: 12px;
  text-shadow: 0 1px 1px rgba(0, 0, 0, .2);
  word-wrap: break-word;
  display: inline-block;
}

.sender {
  float: right;
  width: auto !important;
  background: #dcf8c6;
  border-radius: 10px 10px 0 10px;
  padding: 4px 10px 7px !important;
  font-size: 12px;
  text-shadow: 0 1px 1px rgba(0, 0, 0, .2);
  display: inline-block;
  word-wrap: break-word;
}


/*Reply*/

.reply {
  height: 60px;
  width: 100%;
  background-color: #f5f1ee;
  padding: 10px 5px 10px 5px !important;
  margin: 0 !important;
  z-index: 1000;
}

.reply-emojis {
  padding: 5px !important;
}

.reply-emojis i {
  text-align: center;
  padding: 5px 5px 5px 5px !important;
  color: #93918f;
  cursor: pointer;
}

.reply-recording {
  padding: 5px !important;
}

.reply-recording i {
  text-align: center;
  padding: 5px !important;
  color: #93918f;
  cursor: pointer;
}

.reply-send {
  padding: 5px !important;
}

.reply-send i {
  text-align: center;
  padding: 5px !important;
  color: #93918f;
  cursor: pointer;
}

.reply-main {
  padding: 2px 5px !important;
}

.reply-main textarea {
  width: 100%;
  resize: none;
  overflow: hidden;
  padding: 5px !important;
  outline: none;
  border: none;
  text-indent: 5px;
  box-shadow: none;
  height: 100%;
  font-size: 16px;
}

.reply-main textarea:focus {
  outline: none;
  border: none;
  text-indent: 5px;
  box-shadow: none;
}

@media screen and (max-width: 700px) {
  .app {
    top: 0;
    height: 100%;
  }
  .heading {
    height: 70px;
    background-color: #009688;
  }
  .fa-2x {
    font-size: 2.3em !important;
  }
  .heading-avatar {
    padding: 0 !important;
  }
  .heading-avatar-icon img {
    height: 50px;
    width: 50px;
  }
  .heading-compose {
    padding: 5px !important;
  }
  .heading-compose i {
    color: #fff;
    cursor: pointer;
  }
  .heading-dot {
    padding: 5px !important;
    margin-left: 10px !important;
  }
  .heading-dot i {
    color: #fff;
    cursor: pointer;
  }
  .sideBar {
    height: calc(100% - 130px);
  }
  .sideBar-body {
    height: 80px;
  }
  .sideBar-avatar {
    text-align: left;
    padding: 0 8px !important;
  }
  .avatar-icon img {
    height: 55px;
    width: 55px;
  }
  .sideBar-main {
    padding: 0 !important;
  }
  .sideBar-main .row {
    padding: 0 !important;
    margin: 0 !important;
  }
  .sideBar-name {
    padding: 10px 5px !important;
  }
  .name-meta {
    font-size: 16px;
    padding: 5% !important;
  }
  .sideBar-time {
    padding: 10px !important;
  }
  .time-meta {
    text-align: right;
    font-size: 14px;
    padding: 4% !important;
    color: rgba(0, 0, 0, .4);
    vertical-align: baseline;
  }
  /*Conversation*/
  .conversation {
    padding: 0 !important;
    margin: 0 !important;
    height: 100%;
    /*width: 100%;*/
    border-left: 1px solid rgba(0, 0, 0, .08);
    /*overflow-y: auto;*/
  }
  .message {
    height: calc(100% - 140px);
  }
  .reply {
    height: 70px;
  }
  .reply-emojis {
    padding: 5px 0 !important;
  }
  .reply-emojis i {
    padding: 5px 2px !important;
    font-size: 1.8em !important;
  }
  .reply-main {
    padding: 2px 8px !important;
  }
  .reply-main textarea {
    padding: 8px !important;
    font-size: 18px;
  }
  .reply-recording {
    padding: 5px 0 !important;
  }
  .reply-recording i {
    padding: 5px 0 !important;
    font-size: 1.8em !important;
  }
  .reply-send {
    padding: 5px 0 !important;
  }
  .reply-send i {
    padding: 5px 2px 5px 0 !important;
    font-size: 1.8em !important;
  }
}
    </style>
</head>
<body>

	<?php
        	include("../../connection.php");
        	if(isset($_GET['id']))
        	{
        		$xx  = $_GET['id'];
        		$query2  = $conn->query("SELECT * from groupss WHERE group_id = $xx");
        		$row2=$query2->fetch(PDO::FETCH_ASSOC);
        		$path2 = "../../GROUP/".$row2['g_picture'];
        	}
        	?>
          <style>
            .caldera
            {
              display: inline-block;
              border-radius: 4px;
              background-color: #f4511e;
              border: none;
              color: #FFFFFF;
              text-align: center;
              font-size: 20px;
              padding: 10px;
              width: 200px;
              transition: all 0.5s;
              cursor: pointer;
              margin: 5px;  
            }
            .caldera span
            {
              cursor: pointer;
              display: inline-block;
              position: relative;
              transition: 0.5s; 
            }
            .caldera span:after
            {
              content: '\00bb';
              position: absolute;
              opacity: 0;
              top: 0;
              right: -20px;
              transition: 0.5s;
            }
            .caldera:hover span
            {
              padding-right: 25px;
            }
            .caldera:hover span:after
            {
              opacity: 1;
              right: 0;
            }
          </style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="container app">
  <div class="row app-one">
    <div class="col-sm-4 side">
      <div class="side-one">
        <div class="row heading">
          <div class="col-sm-3 col-xs-3 heading-avatar">
            <div class="heading-avatar-icon">
              <img src="<?php echo $path2;?>">
            </div>
          </div>
          <div class="col-sm-2 col-xs-2 heading-compose  pull-right">
            <i class="fa fa-comments fa-2x  pull-right" aria-hidden="true"></i>
          </div>
        </div>

        <div class="row searchBox">
          <div class="col-sm-12 searchBox-inner">
            <div class="form-group has-feedback">
              <input id="searchText" type="text" class="form-control" name="searchText" placeholder="Search">
              <span class="glyphicon glyphicon-search form-control-feedback"></span>
            </div>
          </div>
        </div>
        <?php
        	
        	if(isset($_GET['id']))
        	{
        		$x  = $_GET['id'];
        		$query  = $conn->query("SELECT * from group_members,members,groupss,users,login where login.login_id= users.user_ID and users.user_ID=members.user_id and members.m_id = group_members.m_id and groupss.group_id = group_members.grou_id AND group_members.grou_id = $x");
        		$num = $query->rowCount();
        	}
        	?>
        <div class="row sideBar">
        	<?php
        	if ($num > 0)
        	{
        			while($row=$query->fetch(PDO::FETCH_ASSOC))
        			{
        				$path = "../../PROFILE/".$row['profile'];
        				
        			?>
          <div class="row sideBar-body" id="hasuko">
            <div class="col-sm-3 col-xs-3 sideBar-avatar">
              <div class="avatar-icon">
                <img src="<?php echo $path;?>">
              </div>
            </div>
            <div class="col-sm-9 col-xs-9 sideBar-main">
              <div class="row">
                <div class="col-sm-8 col-xs-8 sideBar-name">
                  <span class="name-meta"><?php echo $row['f_name']." ".$row['l_name'];?>
                </span>
                </div>
                <div class="col-sm-4 col-xs-4 pull-right sideBar-time">
                  <span class="time-meta pull-right"><?php echo $row['last_login']; ?>
                </span>
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
    <a onclick="return confirm('Do you want to go to main menu??')" href="my_groups.php"><button class="caldera" style="vertical-align: middle"><span>BACK</span></button></a>
    <div class="col-sm-8 conversation">
      <div class="row heading">     
      </div>
      <?php
      if(isset($_GET['id']))
        	{
        $x  = $_GET['id'];
      	$show  = "SELECT chat.*, login.profile FROM chat,login,users,members,groupss,group_members WHERE login.login_id=users.user_ID AND users.user_ID=members.user_id AND users.user_ID=groupss.user_id AND groupss.group_id=group_members.grou_id and members.m_id= group_members.m_id AND group_members.g_member_id=chat.g_member_id and group_members.grou_id = :id";
      	$runshow  = $conn->prepare($show);
      	$ourID = array(":id"=>$x);
      	$execute  = $runshow->execute($ourID);
      	$ourRows  = $runshow->rowCount();
      		}
      ?>
      	<br><br>			
      <div class="row message" id="conversation">
      	<?php
      					if($ourRows)
      					{
      						while($fetchdata  = $runshow->fetch(PDO::FETCH_ASSOC))
      						{
      							$picture  = "../../PROFILE/".$fetchdata['profile'];
      						
      					?>
       
        <?php
        $xx = $_SESSION['member_ID'];
        ?>
        <div class="row message-body">
           <div class="col-sm-12 <?php if($fetchdata['m_id'] == $xx) echo "message-main-sender"; else echo "message-main-receiver"; ?>">
             <?php if($fetchdata['m_id'] == $xx)
             {  ?>
              <img style="width: 50px; margin-top: 0px; margin-left: 140px;" src="<?php echo $picture; ?>">
              <?php }else{ ?>
                <img style="width: 50px; margin-top: -50px;" src="<?php echo $picture; ?>">
              <?php } ?>
            <div class="<?php if($fetchdata['m_id'] == $xx) echo "sender"; else echo "receiver"; ?>">
              
              <div class="message-text">
                <?php echo $fetchdata['message'];?>
              </div>
              <span class="message-time pull-right">
                <?php echo $fetchdata['time_posted'];?>
              </span>
            </div>
          </div>
        </div>
         <?php
          }
        }
        ?>
      </div>
      <style>
        .hasuko
        {
          margin-top: -105px;
        }
      </style>
      <div class="hasuko">
      <div class="row reply">
        <div class="col-sm-1 col-xs-1 reply-emojis">
          
        </div>
        <form method="post" action="chat_group_hand.php">
        	<input type="hidden" name="id" value="<?php echo $x;?>">
        <div class="col-sm-9 col-xs-9 reply-main">
          <textarea class="form-control" rows="1" id="comment" name="chat" required="required"></textarea>
        </div>
        <div class="col-sm-1 col-xs-1 reply-recording">
        </div>
        <div class="col-sm-1 col-xs-1 reply-send">
          <button name="save"><i class="fa fa-send fa-2x" aria-hidden="true"></i></button>
        </div>
        </form>
      </div>
      </div>
    </div>
  </div>
</div>


<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript">
  $(function(){
    $(".heading-compose").click(function() {
      $(".side-two").css({
        "left": "0"
      });
    });

    $(".newMessage-back").click(function() {
      $(".side-two").css({
        "left": "-100%"
      });
    });
})
</script>
</body>
</html>


 <!--   -->