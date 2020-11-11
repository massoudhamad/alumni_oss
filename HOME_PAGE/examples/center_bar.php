

			<?php
			if ($_SESSION['user_role']  == "ADMIN")
			{	
                $query = "SELECT * FROM users,login WHERE login.login_id = users.user_ID AND users.approval = ?";
                $run = $conn->prepare($query);
                $hasuko = array("not-approved");
                $ee = $run->execute($hasuko);
                $num = $run->rowCount();
      ?>	
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-plain">
              <div class="card-header">
                
                <h4 style="color: black;" class="card-title"> UN_APPROVED ALUMNI !! APPROVE THEM IN ORDER TO ACCESS THE SYSTEM</h4>
                <hr><hr>
                <p class="card-category">NEW UN_UNAPPROVED ALUMNI</p>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>Profile</th>
                      <th>Name</th>
                      <th>Address</th>
                      <th>Gender</th>
                      <th>Email</th>
                      <th>Phone_Number</th>
                      <th>Status</th>
                      <th class="text-right">
                        Action
                      </th>
                    </thead>
                    <tbody>

                      <?php
                      if ($num > 0)
                      {   
                        while ($row = $run->fetch(PDO::FETCH_ASSOC))
                          {
                            $path = "../../PROFILE/".$row["profile"];
                           ?>
                     <tr>
                        <td><img src="<?php echo $path;?>" style="width: 40px;"></td>
                        <td><?php echo $row["f_name"] ." ". $row["l_name"]; ?></td>
                        <td><?php echo $row["address"] ;?></td>
                        <td><?php echo $row["gender"] ;?></td>
                        <td><?php echo $row["email"] ;?></td>
                        <td><?php echo $row["contact"] ;?></td>
                        <td><?php echo $row["approval"] ;?></td>
                        <td class="text-right"><a onclick="javascript: return confirm('Do you want to approve this Alumni ?')" href="approval.php?approval=<?php echo $row["user_ID"];?>"><button class="btn btn-primary btn-block">Approve</button></a>
                          <a onclick="javascript: return confirm('Do you want to Decline this Alumni ?')" href="decline.php?decline=<?php echo $row["user_ID"];?>"><button class="btn btn-primary btn-block" style="background-color: red;">Decline</button></a>
                        </td>
                      </tr>
                        <?php
                        }
                      }
                      else
                      {
                        echo "No Available Data This Time";
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
                

			<?php }
			else
			{	?>
        <br><br>
        <style type="text/css">
          .hasuko
          {
            background-color: black;
            padding: 40px 10px 5px 10px;
          }
        </style>
  <div class="hasuko">
    <?php
    $x= $_SESSION['user_ID'];
    $query2  = $conn->query("SELECT * FROM forum,users,login WHERE login.login_id = users.user_ID AND users.user_ID = forum.user_ID");
    $num = $query2->rowCount();
    ?>
    <div class="vizew-grid-posts-area mb-80">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <!-- Archive Catagory & View Options -->
                    <div class="archive-catagory-view mb-50 d-flex align-items-center justify-content-between">
                        <!-- Catagory -->
                        <div class="archive-catagory">
                            <h4>ALL FORUMS</h4>
                        </div>
                        <!-- View Options -->
                       
                    </div>

                    <div class="row">
                       <?php
                        if($num  >  0)
                        {
                          while($rows = $query2->fetch(PDO::FETCH_ASSOC))
                            { 
                              $_SESSION['forum'] = $rows["forum_id"];
                              $comment = "SELECT COUNT(comment.forum_id) from comment where comment.forum_id = :a";
                              $p = $_SESSION["forum"];
                              $runcomment = $conn->prepare($comment);
                              $runcomment->bindParam(":a",$parameter1);
                              $parameter1 = $p;
                              $runcomment->execute();
                              $aa = $runcomment->fetch(PDO::FETCH_ASSOC);
                              $path ="../../FORUM/".$rows["forum_attachment"];
                              ?>    
                        <div class="col-12 col-md-6">
                            <div class="single-post-area mb-50">
                                <div class="post-thumbnail">
                                    <img src="<?php echo $path;?>" alt="">
                                </div>
                                <div class="post-content">
                                    <a href="single_forum.php?id=<?php echo $rows['forum_id'];?>" class="post-cata cata-sm cata-success">OPEN FORUM</a>
                                    <a href="#" class="post-title"><?php echo $rows['forum_tittle'];?></a>
                                    <div class="post-meta d-flex">
                                        <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> <?php echo $aa['COUNT(comment.forum_id)'];?></a>
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
                <?php
                $query4  = $conn->query("SELECT * FROM groupss");
                $group_number = $query4->rowCount();
                ?>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="sidebar-area">
                      <br><br>
                        <div class="single-widget youtube-channel-widget mb-50">
                            <!-- Section Heading -->
                            <div class="section-heading style-2 mb-30">
                                <h4>JOIN THESE GROUPS</h4>
                                <div class="line"></div>
                            </div>

                           <?php
                            if($group_number  >  0)
                            {
                              while($group_fetch = $query4->fetch(PDO::FETCH_ASSOC))
                              {
                                $_SESSION['group_id'] = $group_fetch['group_id'];
                                $g_picture = "../../GROUP/".$group_fetch['g_picture'];
                                ?>
                            <div class="single-youtube-channel d-flex align-items-center">
                                <div class="youtube-channel-thumbnail">
                                    <img src="<?php echo $g_picture;?>" alt="">
                                </div>
                                <div class="youtube-channel-content">
                                    <a href="#" class="channel-title"><?php echo $group_fetch['g_name'];?></a>
                                    <a href="join_hand.php?id=<?php echo $group_fetch['group_id'];?>" class="btn subscribe-btn"><i class="fa fa-play-circle-o" aria-hidden="true"></i> Join Group</a>
                                </div>
                            </div>
                            <?php
                          }
                        }
                        ?>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
  <br><br><br><br><br>
    <?php

  }
  ?>