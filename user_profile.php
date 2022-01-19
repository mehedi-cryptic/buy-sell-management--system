<?php include "includes/header.php";
global $connection;
 ?>
<?php 
if (isset($_GET['byr_modify_ordr_id'])) {
	$byr_modify_ordr_id = $_GET['byr_modify_ordr_id'];

	$byr_updt_query = "UPDATE orders SET order_deletion_status=1 WHERE ordr_id = $byr_modify_ordr_id ";
	$u_rslt = mysqli_query($connection,$byr_updt_query);


}

if (isset($_GET['slr_modify_ordr_id'])) {
	$slr_modify_ordr_id = $_GET['slr_modify_ordr_id'];

	$slr_updt_query = "UPDATE orders SET order_deletion_status=2 WHERE ordr_id = $slr_modify_ordr_id ";
	$u_rslts = mysqli_query($connection,$slr_updt_query);


}



 ?>



<?php 
$login = $_SESSION['u_l'];
if ($login==true){



if (isset($_SESSION['user_pass'])) {
	$user_email_ss=$_SESSION['user_email']; 

	$query_for_pic="SELECT * FROM users WHERE user_email= '$user_email_ss' ";
	$result_query_for_pic = mysqli_query($connection,$query_for_pic);
	while ($row=mysqli_fetch_assoc($result_query_for_pic)) {
		$user_id = $row['user_id'];
		$user_email = $row['user_email'];
		$user_pass = $row['user_pass'];
		$user_name = $row['user_name'];
		$user_phone = $row['user_phone'];
		$user_phto = $row['user_photo'];
	}
	$query_for_count_post="SELECT post_id FROM post WHERE post_user_email= '$user_email_ss' ";
	$result_query_for_count_post = mysqli_query($connection,$query_for_count_post);
	$rowcount=mysqli_num_rows($result_query_for_count_post);

	
}
if (empty($user_phto)) {
		$user_phto = '1.jpg';
	}

//start update profile
if (isset($_POST['edit_profile'])) {
	$usernames = $_POST['username'];
	$phones = $_POST['phone'];
	$passwords = $_POST['password'];

	$usernames = mysqli_real_escape_string($connection,$usernames);
	$phones = mysqli_real_escape_string($connection,$phones);
	$passwords = mysqli_real_escape_string($connection,$passwords);

	///image file query
      $user_phtos = $_FILES['user_phto']['name'];
      $destination = "assets/img/" . $user_phtos;  
      $file = $_FILES['user_phto']['tmp_name'];
      move_uploaded_file($file, $destination);

        if (empty($user_phtos)) {
			
			$user_phtos=$user_phto;
           
        }

	
	$passwords = password_hash($passwords, PASSWORD_BCRYPT,  array('cost' => 12 ));

	$user_update = "UPDATE users SET ";
    $user_update .= "user_name = '{$usernames}', ";
    $user_update .= "user_phone = '{$phones}', ";
    $user_update .= "user_photo = '{$user_phtos}', ";
    $user_update .= "user_pass = '{$passwords}' ";
    
    $user_update .= "WHERE user_email = '{$user_email_ss}' ";

    $update_user_query = mysqli_query($connection,$user_update);
    if (!$update_user_query) {
        die("update_user_query  failed".mysqli_error($connection) );
    }else{
      echo "<p style='color:green' class='text-center mt-2'>Your Account Has been updated Succesfully</p>";
    }

	
}



?>
<div class="container">
    <div class="row profile">
		<div class="col-md-4">
			<div class="profile-sidebar">
				<!-- SIDEBAR USERPIC -->
				<div class="profile-userpic text-center">
					<img src="assets/img/<?php echo $user_phto; ?>" class="img-responsive" alt="">
				</div>
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
						<?php echo $user_name ?>
					</div>
					<div class="profile-usertitle-job">
						<?php echo "Email : ".$user_email."</br>"; ?>
						<?php echo "Contact No : ".$user_phone."</br>"; ?>
						<?php echo "User ID : ".$user_id."</br>"; ?>
						<?php echo "Total Post : ".$rowcount."</br>"; ?>
					</div>
				</div>
				<!-- END SIDEBAR USER TITLE -->
				<!-- SIDEBAR BUTTONS -->
				<div class="profile-userbuttons">
					<?php
					$pro_id = $_SESSION['user_id'];

					echo "<a href='user_profile.php?edit_user=$user_email'><button type='button' class='btn btn-success btn-sm'>Edit</button></a>";

					echo "<a target='_blank' href='my_profile.php?pro_id=$pro_id'><button type='button' style='margin-left:7px !important;' class='btn btn-danger'>My Public Profile</button></a>";
					
					?>
				</div>
				<!-- END SIDEBAR BUTTONS -->
				<!-- SIDEBAR MENU -->
				
				<!-- END MENU -->
			</div>
		</div>
		<div class="col-md-6 offset-md-2">
			<?php 

				if (isset($_GET['edit_user'])) {
					?>

					<div class="jumbotron">
						<form action="user_profile.php" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<label for="">Name</label>
								<input type="text" required name="username" value="<?php echo $user_name; ?>" placeholder="Enter your name" class="form-control">
							</div>
							<div class="form-group">
								<label for="">Phone</label>
								<input type="text"required name="phone" value="<?php echo $user_phone; ?>" placeholder="Enter your phone no" class="form-control">
							</div>
							<div class="form-group">
								<label for="">Profile Photo</label></br>
								<input type="file" name="user_phto" >
							</div>
							<div class="form-group">
								<label for="">Password</label>
								<input type="password" required  name="password" placeholder="Enter password" class="form-control">
							</div>
							<div class="form-group">
								<input type="submit" value="Update" name="edit_profile" class="btn btn-primary btn-block">
							</div>
						</form>
					</div>

					
				<?php }else{ ?>


            <h2 style="text-align: center">All buying Item</h2><hr>
			<div class="row">
				<table class="table table-bordered mb-4">
				    
				    	<?php 
				    	$my_eml = $_SESSION['user_email'];
				    	$buying_query = "SELECT orders.*,post.post_title FROM orders INNER JOIN post ON orders.ordr_post_id = post.post_id WHERE orders.buyer_email = '$my_eml' AND orders.confirm_status = 1 AND orders.order_deletion_status != 1 ";

				    	$buying_query_rs = mysqli_query($connection,$buying_query);
						if(mysqli_num_rows($buying_query_rs)== 0 ){
												
					        echo "<br><h4 style='color:red'> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <i class='fa fa-ban'></i><b> No buying item found</b></h4><br>";
      
				        }
						else{
							?>
							
							<thead>
				                <tr>
				                    <th>Item Name</th>
				                    <th>Buying Date</th>
				                    <th>Action</th>
				                </tr>
				            </thead>
							
							<?php
				    	    while ($row=mysqli_fetch_assoc($buying_query_rs)) {
								
								$ordr_post_id = $row['ordr_post_id'];
				    		    $post_title = $row['post_title'];
				    		    $ordr_id = $row['ordr_id'];
				    		    $ordr_date = $row['ordr_date'];

				    		?>

                            <tbody>
							 <tr>
						        <td><a href="soldpost.php?post_id=<?php echo $ordr_post_id; ?>" > <?php echo $post_title; ?></a></td>
						        <td><?php echo $ordr_date; ?></td>
						        <td><a onclick="return confirm('Are you sure to delete?')" href="?byr_modify_ordr_id=<?php echo $ordr_id; ?>"><button type="submit" class="btn btn-danger">Remove</button></a></td>
						        
						     </tr>

                            </tbody>
				    		<?php
				    		
				    	    }
						}

				    	 ?>
				      
				</table>
			</div>
			
            <h2 style="text-align: center">All Selling Item</h2><hr>
			<div class="row mt-4">

				
				<table class="table table-bordered">
				   
				    
				      <?php 
				    	$my_emls = $_SESSION['user_email'];
				    	$buying_query = "SELECT orders.*,post.post_title FROM orders INNER JOIN post ON orders.ordr_post_id = post.post_id WHERE orders.seller_email = '$my_emls' AND orders.confirm_status = 1 AND orders.order_deletion_status != 2 ";

				    	$buying_query_rs = mysqli_query($connection,$buying_query);
						if(mysqli_num_rows($buying_query_rs)== 0 ){
												
					        echo "<br><h4 style='color:red'> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <i class='fa fa-ban'></i><b> No selling item found</b></h4><br>";
      
				        }
						else{
							?>
							
							<thead>
				                <tr>
				                    <th>Item Name</th>
				                    <th>Selling Date</th>
						            <th>Buyer Number</th>
				                    <th>Action</th>
				                </tr>
				            </thead>
							
							<?php
							
				    	    while ($row=mysqli_fetch_assoc($buying_query_rs)) {
								
								$ordr_post_id = $row['ordr_post_id'];
				    		    $post_title = $row['post_title'];
				    		    $ordr_id = $row['ordr_id'];
							    $receiver_number = $row['receiver_number'];
				    		    $ordr_date = $row['ordr_date'];

				    		?>

                            <tbody>
							 <tr>
						        <td><a href="soldpost.php?post_id=<?php echo $ordr_post_id; ?>"><?php echo $post_title; ?></a></td>
						        <td><?php echo $ordr_date; ?></td>
								<td><?php echo $receiver_number; ?></td>
						        <td><a onclick="return confirm('Are you sure to delete?')" href="?slr_modify_ordr_id=<?php echo $ordr_id; ?>"><button type="submit" class="btn btn-danger">Remove</button></a></td>
						        
						     </tr>
                            </tbody>

				    		<?php
				    		
				    	    }
						}


				    	 ?>
				      
				    
				</table>
				
			</div>


				<?php 
				
			}


	        if (isset($_GET['mrkmsg'])) {
	            
	        
	        $chk_msg_id= $_SESSION['user_id'];

	        $query = "UPDATE massage SET msg_status=1 WHERE reciever_id = $chk_msg_id ";
	        $result = mysqli_query($connection,$query);

	            
	            }

	         ?>
		</div>
	</div>
</div>

<?php

}else{
	header("Location:login.php");

}
 include "includes/footer.php"; 
 ?>
