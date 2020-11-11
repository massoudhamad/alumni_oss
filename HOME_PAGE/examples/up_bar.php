<?php

	if($_SESSION["user_role"]  == "ADMIN")

	{	?>

			<nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="home.php">WELCOME TO ALUMNI INFORMATION SYSTEM</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>


             <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  
                  <i>VIEW AREA</i>
                  <i></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="view_users.php">view users</a>
                  <a class="dropdown-item" href="view_news.php">view news</a>
                  <a class="dropdown-item" href="view_events.php">view events</a>
                  <a class="dropdown-item" href="view_groups.php">view groups</a>
                  <a class="dropdown-item" href="view_opportunities.php">view opportunities</a>
                  <a class="dropdown-item" href="view_forums.php">view forums</a>
                </div>
              </li>
            </ul>
          </div>

           <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  
                  <i>GROUPS</i>
                  <i></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="my_groups.php">MY GROUPS</a>
                </div>
              </li>
            </ul>
          </div>
          
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  
                  <i>FORUMS</i>
                  <i class="nc-icon nc-chat-33"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="my_forums.php">MY FORUMS</a>
                  <a class="dropdown-item" href="all_forums.php">ALL FORUMS</a>

                </div>
              </li>
            </ul>
          </div>

           <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                  <i class="nc-icon nc-single-02"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="profile_change.php">Change Profile</a>
                  <a class="dropdown-item" href="all_profile.php">Profile</a>
                  <a class="dropdown-item" href="change_password.php">Change Password</a>
                  <a class="dropdown-item" href="../../logout.php">Log Out</a>
                </div>
              </li>
            </ul>
          </div>

        </div>
      </nav>


	<?php }else
	{	?>

		<nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="home.php">WELCOME TO ALUMNI INFORMATION SYSTEM</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>


             <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  
                  <i>VIEW AREA</i>
                  <i></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="my_groups.php">MY GROUPS</a>
                    <a class="dropdown-item" href="#">MY EVENTS</a>
                </div>
              </li>
            </ul>
          </div>
          
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  
                  <i>FORUMS</i>
                  <i class="nc-icon nc-chat-33"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="my_forums.php">MY FORUMS</a>
                  <a class="dropdown-item" href="all_forums.php">ALL FORUMS</a>
                </div>
              </li>
            </ul>
          </div>

           <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                  <i class="nc-icon nc-single-02"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="profile_change.php">Change Profile</a>
                  <a class="dropdown-item" href="all_profile.php">View Profile</a>
                  <a class="dropdown-item" href="change_password.php">Change Password</a>
                  <a class="dropdown-item" href="../../logout.php">Log Out</a>
                </div>
              </li>
            </ul>
          </div>

        </div>
      </nav>

	<?php }

?>