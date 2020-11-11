

			<?php

			if ($_SESSION['user_role']  == "ADMIN")
			{	
              $hasuko = array("not-approved");
              $query = "SELECT * FROM users WHERE users.approval = ?";
              $run = $conn->prepare($query);
              $exec = $run->execute($hasuko);
              $num = $run->rowCount();
        ?>

				<div class="row">
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-globe text-warning"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">VIEW THEM</p>
                      <p class="card-title"><?php echo $num; ?><p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-refresh"></i>
                  UN_APPROVED ALUMNI
                </div>
              </div>
            </div>
          </div>

          <?php
          $a = $conn->query("select * from login");
          $aa = $a->rowCount();
          ?>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-money-coins text-success"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">TOTAL</p>
                      <p class="card-title"><?php echo $aa;?><p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-calendar-o"></i>
                  Total Users
                </div>
              </div>
            </div>
          </div>
          <?php
          $q = $conn->query("select * from groupss");
          $q2 = $q->rowCount();
          ?>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-vector text-danger"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">GROUPS</p>
                      <p class="card-title"><?php echo $q2;?><p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-clock-o"></i>
                  Total Groups
                </div>
              </div>
            </div>
          </div>
          <?php
          $x =$conn->query("select * from forum");
          $xx = $x->rowCount();
          ?>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-favourite-28 text-primary"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">FORUMS</p>
                      <p class="card-title"><?php echo $xx; ?><p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-refresh"></i>
                  Total Forums
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php
			}
			else
			{	?>
			
        <?php
			}
			?>