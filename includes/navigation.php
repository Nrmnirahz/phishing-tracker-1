

    <!-- Header -->
      <nav class="navbar navbar-expand-lg" style="background-color: #470ab1;">
        <div class="container">
          <a class="navbar-brand" href="/index.php"><h2>Phishing Tracker</h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <?php
          if (isset($_SESSION['username'])) { ?>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
               <li class="nav-item">
                <a class="nav-link" href="/admin/schedule.php">Schedule</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href=" /history.php">History</a>
              </li>

              <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Account</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="/account/profile.php">Edit Profile</a>
                  <a class="dropdown-item" href="/account/changepassword.php">Change Password</a>
                </div>
              </li>
                <li class="nav-item" style="margin-left: 450px">

                <a class="nav-link"  href=" /logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </ul>
          </div>
          <?php } else { ?>
            
      
              <div class="functional-buttons">
                <ul>
                  <li><a href="/login.php">Log in</a></li>
                  <li><a href="/signup.php">Sign Up</a></li>
                </ul>
              </div>
          <?php } ?>
            
          
        </div>
      </nav>



