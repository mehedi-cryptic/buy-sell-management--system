<?php include "includes/header.php" ?>

<?php 
global $connection;
$amar_email = $_SESSION['user_email'];

if (isset($_GET['accept_id']) && isset($_GET['postid'])) {
	
	$accept_id = $_GET['accept_id'];
	$postid = $_GET['postid'];

	


	$queryss = "UPDATE post SET selling_status = 1 WHERE post_id = $postid AND  post_user_email = '$amar_email' ";
	$updatess = mysqli_query($connection,$queryss);

	$query = "UPDATE orders SET confirm_status = 1 WHERE ordr_id = $accept_id AND  seller_email = '$amar_email' ";
	$update = mysqli_query($connection,$query);
	if ($update) {
		echo "<script>alert('Order Request Accepted Successfully');</script>";
		echo "<script>window.location.href = 'user_profile.php';</script>";
	}

}

if (isset($_GET['reject_id'])) {
	
	$reject_id = $_GET['reject_id'];

	$query = "UPDATE orders SET confirm_status = 2 WHERE ordr_id = $reject_id AND  seller_email = '$amar_email' ";
	$update = mysqli_query($connection,$query);
	if ($update) {
		echo "<script>alert('Selling Request is Rejected');</script>";
		echo "<script>window.location.href = 'user_profile.php';</script>";
	}

}





 ?>

<div class="container">
	<div class="row">
		<div class="col-md-6 offset-md-3">

			<table class="table table-dark table-hover">
			    <thead>
			      <tr>
			        <th>Post Title</th>
					<th>Buyer Name</th>
			        <th>Selling Confirmation</th>
			        <th>Reject</th>
			      </tr>
			    </thead>
			    <tbody>

			    	<?php
						 
						

						$order_req_query = "SELECT * FROM orders WHERE seller_email = '$amar_email' AND confirm_status = 0 ";

						$order_req_query_rslt = mysqli_query($connection,$order_req_query);
						if ($order_req_query_rslt) {
							while ($row = mysqli_fetch_assoc($order_req_query_rslt)) {

								$ordr_id = $row['ordr_id'];
								$ordr_post_id = $row['ordr_post_id'];
								$receiver_name = $row['receiver_name'];
								$buyer_email = $row['buyer_email'];
								
								
                                //post title query
								$ordr_post_qry = "SELECT * FROM post WHERE post_id = '$ordr_post_id' ";

								$ordr_post_qry_rslt = mysqli_query($connection,$ordr_post_qry);
								$rww = mysqli_fetch_array($ordr_post_qry_rslt);
								$post_title = $rww['post_title'];
								
								
								//user id query
								$sql = "SELECT * FROM users WHERE user_email = '$buyer_email' ";

								$qry_rslt = mysqli_query($connection,$sql);
								$rw = mysqli_fetch_assoc($qry_rslt);
								$user_id = $rw['user_id'];
								
								

								?>

							 <tr>
						        <td><a href="single.php?post_id=<?php echo $ordr_post_id; ?>" ><?php echo $post_title ?></a></td>
                                
								<td><a href="my_profile.php?pro_id=<?php echo $user_id; ?>" ><?php echo $receiver_name ?></a></td>
						        
								
								<td><a href="?postid=<?php echo $ordr_post_id; ?>&accept_id=<?php echo $ordr_id; ?> "><button type="submit" class="btn btn-success">Confirm</button></a></td>

						        <td><a href="?reject_id=<?php echo $ordr_id; ?> "><button type="submit" class="btn btn-danger">Reject</button></a></td>
						       
						      </tr>


								<?php								
							}
						}else{
							die("error".mysqli_error($connection));
						}

					?>


			     
			    </tbody>
			</table>
		</div>
	</div>
</div>



<?php //include "includes/footer.php" ?>