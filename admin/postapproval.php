<?php include "include/header.php" ;

?>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <?php include "include/sidebar.php" ?>
            <!-- /.navbar-collapse -->
        

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row" style="padding-bottom: 25%;">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            List of unapproved post
                            <!-- <small>External User List</small> -->
                        </h1>
                        <br><br>
                        <!-- <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i>extrnl_user_mnjmnt
                            </li>
                        </ol> -->
                        
                        <div class="row" >
                            <?php 
                                    if (isset($_GET['post_id'])) {
                                        $post_id = $_GET['post_id'];

                                        $query = "update post set post_status='1' where post_id = $post_id";
                                        $result = $db->update($query);
                                        if ($result) {
                                            echo "<p style='color:green;text-align:center;font-size:20px;'>Post approved successfully</p>";
                                        }else{
                                            echo "<p style='color:red;text-align:center;font-size:20px;'>fail to approve the post</p>";
                                        }
                                    }

                                 ?>
                            <div class="col-md-12">
                               <!--  <h2 style="text-align: center;">View List</h2> -->
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                       <!--  <h2>Users Management</h2> -->
                                       
                                            <?php 
											  
											$query = "SELECT * FROM post where post_status='0'   ";
                                            $select_users =$db->select($query);
											if($select_users==""){?>
												
												<h2 style="color:red"class="text-center"> <i class="fa fa-ban" aria-hidden="true"></i> No unapproved post available</h2>
												<br>
												<?php
												
											}
											else{
                                                 ?>
												 
                                                <thead>
                                                <tr>
											        <th>Photo</th>
                                                    <th>Post title</th>
                                                    <th>Post details</th>
                                                    <th>User email</th>
                                                    <th>Location</th>                                           
                                                    <th>Action</th>

                                               
                                                </tr>
                                                </thead>
                                            <tbody>


                                                <?php												 
												
												
												while ($row=mysqli_fetch_assoc($select_users)) {
														
													
													$post_id = $row['post_id'];
                                                    $post_image = $row['post_image'];
                                                    $post_title = $row['post_title'];
                                                    $post_details = $row['post_details'];
                                                    $post_user_email = $row['post_user_email'];             
                                                    $post_location = $row['post_location'];

                                                       ?>
                                                        <tr>
                                                          
                                                            <td> <img width='90px' height='70' src='../assets/img/<?php echo $post_image; ?>' alt='image'></td>
                                                            <td><?php echo $post_title; ?></td>
                                                            <td style="text-align: justify"><?php echo $post_details; ?></td>
                                                            <td><?php echo $post_user_email; ?></td>
														    <td><?php echo $post_location; ?></td>

                                                            <td><a onclick="return confirm('Are you sure to approve?')" href="postapproval.php?post_id=<?php echo $post_id; ?>"><button type="submit" class="btn btn-success">Approve</button></a></td>
                                                          
                                                        </tr>

                                                      <?php      
                                                      
                                                }
												  
											}
                                            ?>
                                              

                                             
                                            </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


                        

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
<?php include "include/footer.php" ?>