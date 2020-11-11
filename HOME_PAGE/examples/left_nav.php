

			<?php
		if ($_SESSION['user_role'] == "ADMIN")
				{	?>
		<div class="sidebar-wrapper">
        <ul class="nav">
          <li class="active ">
            <a href="home.php">
              <i class="nc-icon nc-bank"></i>
              <p style="color: black;">HOME DASHBOARD</p>
            </a>
          </li>
          <li>
            <a href="admin_registration.php">
              <i class="nc-icon nc-single-02"></i>
              <p style="color: black;">REGISTRATION SITE</p>
            </a>
          </li>
          <li>
            <a href="event_upload.php">
              <i class="nc-icon nc-pin-3"></i>
              <p style="color: black;">EVENT SITE</p>
            </a>
          </li>
          <li>
            <a href="upload_news.php">
              <i class="nc-icon nc-bell-55"></i>
              <p style="color: black;">NEWS SITE</p>
            </a>
          </li>
          <li>
            <a href="create_group.php">
              <i class="nc-icon nc-single-02"></i>
              <p style="color: black;">GROUPS SITE</p>
            </a>
          </li>
          <li>
            <a href="forum.php">
              <i class="nc-icon nc-tile-56"></i>
              <p style="color: black;">FORUM SITE</p>
            </a>
          </li>
          <li>
            <a href="opportunity.php">
              <i class="nc-icon nc-caps-small"></i>
              <p style="color: black;">OPPORTUNITY SITE</p>
            </a>
          </li>
          <li>
            <a href="feedback.php">
              <i class="nc-icon nc-pin-3"></i>
              <p style="color: black;">Feedback</p>
            </a>
          </li>
      </div>
      		<?php
				}
				else
				{	?>

		<div class="sidebar-wrapper">
        <ul class="nav">
          <li class="active ">
            <a href="home.php">
              <i class="nc-icon nc-bank"></i>
              <p>Dashboard</p>
            </a>
          </li>
            <li>
            <a href="create_group.php">
              <i class="nc-icon nc-single-02"></i>
              <p>Groups</p>
            </a>
          </li>
                    <li>
            <a href="forum.php">
              <i class="nc-icon nc-single-02"></i>
              <p>Forum</p>
            </a>
          </li>
          <li>
            <a href="event_upload.php">
              <i class="nc-icon nc-pin-3"></i>
              <p>Events</p>
            </a>
          </li>
      </div>
      <?php

				}

			  ?>