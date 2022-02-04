<?php include '../includes/config.php'; ?>
<?php include '../includes/header.php'; ?>
  

<?php
if (isset($_POST['new_password']) && isset($_POST['confirm_password'])) {
  if (!empty($_POST['new_password']) && !empty($_POST['confirm_password'])) {

     $new_password = $_POST['new_password'];
     $confirm_password = $_POST['confirm_password'];
     $user_id = $_SESSION['id'];

     if (strcmp($new_password, $confirm_password)) {
      alert("password not match");
      header("Location: /account/changepassword.php");
      exit();
     }

     //update information
     $sql = "UPDATE user SET password = '$confirm_password' WHERE user_id = $user_id";
     $result = mysqli_query($conn, $sql);

      if (mysqli_affected_rows($conn) == 1) {
        alert("Password update successfull");
        header("Location: /account/changepassword.php");
        exit();
      } else {
        alert("Error on updating password");
        header("Location: /account/changepassword.php");
        exit();
      } 
    }else {
     alert("All fields are required");
     header("Location: /account/changepassword.php");
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
          <h1><center><i class="fas fa-user-plus" style="color: white; font-size: 1.5em;"></i><i style="color: white;"> Change Password</i></h1></center>

          <div class="mb-3">
            <label for="inputPassword4">New Password</label>
            <input type="password" name="new_password"  class="form-control" id="inputPassword4">
          </div>

          <div class="mb-3">
            <label for="inputPassword4">Confirm Password</label>
            <input type="password" name="confirm_password"  class="form-control" id="inputPassword4">
          </div>
          <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary">Change Password</button>
          </div>
      </form>
    </div>
  </div>
</section>

 <?php include '../includes/script.php'; ?> 


</body>
</html>


