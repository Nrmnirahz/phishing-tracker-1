<?php include '../includes/config.php'; ?>
<?php include '../includes/header.php'; ?>



<?php
$user_id = $_SESSION['id'];


if (isset($_POST['username']) && isset($_POST['email'])) {
	if (!empty($_POST['username']) && !empty($_POST['email'])) {
		 $username = $_POST['username'];
		 $email = $_POST['email'];
		 $user_id = $_SESSION['id'];
		
		 //update infomation
		 $sql = "UPDATE user SET username = '$username', email = '$email' WHERE user_id = $user_id";
		 $result = mysqli_query($conn, $sql);
		  if (mysqli_affected_rows($conn) == 1) {
		    alert("Profile update successfull");
		    header("Location: /account/profile.php");
		    exit();
		  } else {
		    alert("Error on updating profile");
		    header("Location: /account/profile.php");
		    exit();
		}
	}else {
		 alert("All fields are required");
		 header("Location: /account/profile.php");
		 exit();
	}
}

$sql = "SELECT * FROM user WHERE user_id = $user_id";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) == 1) {
	$row = mysqli_fetch_assoc($result);

	$username = $row['username'];
	$email = $row['email'];
	

?>
<!-- main -->



 <section class="vh-100" style="background-color: #470ab1;">
    <div class="grandParentContaniner">
      <div class="parentContainer">
        <form method="POST">
            <div class="form-group">
            <div class="mb-3" >
              <h1><center><i class="fas fa-user-plus" style="color: white; font-size: 1.5em;"></i><i style="color: white"> Edit User Profile</i></h1></center>
          	<div class="mb-3">
	         	<label for="inputUsername" class="form-label">Username</label>
		        <input type="text" name="username" value="<?php echo $username; ?>" class="form-control" id="inputUsername">
          	</div>          
       		<div class="mb-3">
		        <label for="inputEmail" class="form-label">Email address</label>
		        <input type="email" name="email" value="<?php echo $email; ?>" class="form-control" id="inputEmail" aria-describedby="emailHelp">
	        	<div id="emailHelp" class="form-text" style="color: black">We'll never share your email with anyone else.</div>
	      	</div>
			<div class="d-grid gap-2">
	        	<button type="submit" class="btn btn-primary">Update Profile</button>
	        </div>
        </form>
      </div>
    </div>
  </section>

<?php } ?>

<?php include '../includes/script.php'; ?>

</body>
</html>

