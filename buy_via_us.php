<?php include "includes/header.php" ?>
<div class="container">


	<h2 style="border-bottom: 3px solid #ddd;" class="text-center mt-4 mb-4">Order processing</h2>
	<p style="border-bottom: 3px solid green;color:red;" class="text-center mt-4 mb-4">***[ If The Product is Delivered By Kenabecha then You have to pay Delivery Charge as Your Product Category and Type When Receiving Your Product. ]***</p>
	<div class="row" style="min-height: 550px;">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-6">
					<h2 style="background-color: grey;color:white" class="text-center">Product Details</h2>

					<?php 
						global $connection;
						if (isset($_GET['pro_id'])) {
							$the_post_id=$_GET['pro_id'];


							$post_edit_query = "SELECT * FROM post WHERE post_id = $the_post_id AND post_status = 1 ";
							$post_edit_query_result = mysqli_query($connection,$post_edit_query);
							if (!$post_edit_query_result) {
								die("view_add_query_result failed ".mysqli_error($connection));
							}

							while ($row=mysqli_fetch_assoc($post_edit_query_result)) {
								$post_id=$row['post_id'];
								$post_user_email=$row['post_user_email'];
								$post_title=$row['post_title'];
								$post_price=$row['post_price'];
								$post_contact=$row['post_contact'];
								$post_condition=$row['post_condition'];
								$post_category=$row['post_category_id'];
								$post_location=$row['post_location'];
								$post_image=$row['post_image'];
								$post_details=$row['post_details'];

							
							}
						}

						 ?>
			           
					  <table class="table table-bordered">
					    <thead>
					      <tr>
					       <!--  <label class="form-control text-center" for=""><?php echo $post_title; ?></label> -->
					       <th style="width:27%;">Product Title</th>
					        <td><?php echo $post_title; ?></td>
					      </tr>
					      <tr>
					        <th>Price</th>
					        <td><?php echo $post_price." Tk"; ?></td>
					      </tr>
					      <tr>
					        <th>Condition</th>
					        <td><?php echo $post_condition; ?></td>
					      </tr>
					       <tr>
					        <th style="text-align:top">Product Details</th>
					        <td style="text-align:justify"><?php echo $post_details; ?></td>
					      </tr>
					    </thead>
					  </table>
					 
					</div>

					<div class="col-md-5">
						<h3 class="text-center">Order Information</h3>

					<form action="confirm_order.php" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                         <label class="" for="">Receiver Name</label>
                        <input type="text" required name="customer_name" placeholder="Enter receiver name" value="<?php echo   $_SESSION['user_name']; ?>" class="form-control">
                      </div>
                     <div class="form-group">
                        <label class="" for="">Receiver Mobile No</label>
                      <input type="text" required name="customer_number" placeholder="Enter receiver mobile no" value="<?php echo   $_SESSION['user_phone']; ?>" class="form-control">
                     </div>
                     <div class="form-group">
                       <label class="" for="">Receiver Address Details</label>
                      <input type="text" required name="customer_adrss" placeholder="Enter receiver address" class="form-control">
                     </div>


                    

                     <div class="form-group">
                       <label class="" for="">Payment Method</label>
					    <input type="text" readonly="" required name="p_method" value="cash_on_delivery" class="form-control">
                     
                       
                     </div>
					 
					
                     <input type="hidden" name="seller_email" value="<?php echo $post_user_email; ?>">
                     <input type="hidden" name="buyer_email" value="<?php echo $_SESSION['user_email']; ?>">
                     <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
                     <input type="hidden" name="product_price" value="<?php echo $post_price; ?>">
 
                     <br>
                     <div class="form-group">
                     	<input type="submit" class="btn btn-success" name="confirm_order" value="Confirm Order" >
                     </div>
                          
                 </form>
					</div>

				
			</div>

		</div>
	</div>
	
</div>
<br><br>
		
<?php include "includes/footer.php" ?>	
