<?php include "includes/header.php" ?>

<?php 
global $connection;
if (isset($_POST['register'])) {
	$username = $_POST['username'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	$username = mysqli_real_escape_string($connection,$username);
	$phone = mysqli_real_escape_string($connection,$phone);
	$email = mysqli_real_escape_string($connection,$email);
	$password = mysqli_real_escape_string($connection,$password);
	
	///image file query
      $user_phto = $_FILES['user_phto']['name'];
      $destination = "assets/img/" . $user_phto;  
      $file = $_FILES['user_phto']['tmp_name'];
      move_uploaded_file($file, $destination);

	$chk_eml_query = "SELECT user_email FROM users WHERE user_email= '$email' ";
	$chk_eml_query_result = mysqli_query($connection,$chk_eml_query);
	if (!$chk_eml_query_result) {
		die("chk_eml_query_result ".mysqli_error($connection));
	}
	while ($row = mysqli_fetch_assoc($chk_eml_query_result)) {
		$db_email=$row['user_email'];
	}
	if (!empty($db_email)) {
		echo "<p style='color:red' class='text-center mt-3'>You Already Have an Account</p>";
	}else{

	$password = password_hash($password, PASSWORD_BCRYPT,  array('cost' => 12 ));

	$signup_query = "INSERT INTO users(user_email,user_name,user_phone,user_photo,user_pass) ";
	$signup_query .= "VALUES('{$email}','{$username}','{$phone}','{$user_phto}','{$password}') ";
	$signup_query_result = mysqli_query($connection,$signup_query);
	if (!$signup_query_result) {
		die('signup_query_result failed '.mysqli_error($connection));
	}else{

		echo "<h4 style='color:green' class='text-center mt-3'>Your Account Has been created Succesfully</br>You Can Now login</h4>";
	}

	}

	
	
}




 ?>
 
<script language="javascript">
function check()
{
  
  e=document.form.email.value;
		f1=e.indexOf('@');
		f2=e.indexOf('@',f1+1);
		e1=e.indexOf('.');
		e2=e.indexOf('.',e1+1);
		n=e.length;

		if(!(f1>0 && f2==-1 && e1>0 && e2==-1 && f1!=e1+1 && e1!=f1+1 && f1!=n-1 && e1!=n-1))
		{
			alert("Please Enter valid Email");
			document.form.email.focus();
			return false;
		}
  
  if(document.form.password.value!=document.form.cpass.value)
  {
	  Swal.fire({
        icon: 'error',
        title: 'Something went wrong...',
        text: 'Password does not matched!',
        
    })
	document.form.cpass.focus();
	return false;
  }
  
  
  return true;
 }
  
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>



		<div class="container main-body">
			<div class="row mt-5">
				<div class="col-md-6 offset-md-3">
				    <h2 align="center" style="font-family:Segoe Script;"><b>Register now</b></h2>
					<div class="jumbotron">
						<form action="signup.php" name="form" method="post" enctype="multipart/form-data"  onSubmit="return check();">
							<div class="form-group">
								<label for="">Name</label>
								<input type="text" name="username" class="form-control" required placeholder="Enter your name">
							</div>
							<div class="form-group">
								<label for="">Phone</label>
								<input type="text" name="phone" class="form-control" required placeholder="Enter your phone">
							</div>
							<div class="form-group">
								<label for="">Email</label>
								<input type="email" name="email" class="form-control" required placeholder="Enter your email">
							</div>
							
							<div class="form-group">
								<label for="">Profile Photo</label></br>
								<input type="file" name="user_phto" required>
							</div>
							<div class="form-group">
								<label for="">Password</label>
								<input type="password" name="password" class="form-control" required  placeholder="Enter password">
							</div>
							<div class="form-group">
								<label for="">Confirm Password</label>
								<input type="password" name="cpass" class="form-control" placeholder="Confirm password" required>
							</div>
							<div class="form-group">
								<input type="submit" value="Register" name="register" class="btn btn-primary btn-block">
							</div>
						</form>
						<a href="login.php" class="text-center">Already have an account? Login..</a>
					</div>
				</div>
			</div>
		</div>
		
		<br><br>
	<?php include "includes/footer.php" ?>		