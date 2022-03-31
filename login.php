

<?php include 'includes/config.php'; ?>
<?php include 'includes/header.php'; ?>


<?php
session_start();
//check if email and password field post data exits
if (isset($_POST['email']) && isset($_POST['password'])) {
	if (!empty($_POST['email']) && !empty($_POST['password'])) {
	$email = $_POST['email'];
	$password = $_POST['password'];
} else {
	alert("Email and Password is required");
	header("Location: /login.php");
    exit();
}

//perform sql login

$sql = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) == 1) {
	$row = mysqli_fetch_assoc($result);
	if ($row['role'] == 1) {
		$_SESSION['is_admin'] = True;
	} else {
		$_SESSION['is_admin'] = False;
	}


	$_SESSION['user_id'] = $row['user_id'];
	$_SESSION['username'] = $row['username'];
	$_SESSION['email'] = $row['email'];
	
	alert("Welcome " . $_SESSION['username']);
	header("Location: /search.php");
	exit();
}	else {
	alert("email or password is incorrect");
	header("Location: /login.php");
	exit();
}

}
?>

<!-- main -->
<section class="vh-100" style="background-color: #470ab1;">
<div class="grandParentContaniner">
<div class="parentContainer">
	<form method="POST">
		<div class="form-group">
		<div class="mb-3">
              <h1><center><i class="fas fa-user-plus" style="color: white; font-size: 1.5em;"></i><i style="color: white"> Login </h1></center>
    		<label for="InputEmail4">Email address</label>
    		<input type="email" name="email" class="form-control" id="InputEmail4">
 		</div>
  		<div class="mb-3">
    		<label for="InputPassword4">Password</label>
    		<input type="password"  name="password" class="form-control" id="InputPassword4">
  		</div>
  		<button type="submit" class="btn btn-primary">Login</button>
  		</div>
	</form>
</div>
</div>
</section>


<?php include 'includes/footer.php'; ?>

</body>
</html>
