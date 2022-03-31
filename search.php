<?php
include 'includes/config.php';
include 'includes/header.php';

session_start();

// init if user logged in
if($_SESSION['user_id']) {
	$namapengguna = $_SESSION['username'];
    $iduser = $_SESSION['user_id'];
    $email = $_SESSION['email'];
}

// capture post data
if (isset($_POST['submit'])) {
    if (empty($_POST['s_param'])) {
      $errors = "You must fill in";
    } else {
	    $txtbox = $_POST['s_param'];
	    // if login user, add the search query into the database.
    	if($_SESSION['user_id']) {
	        $sql = "INSERT INTO user_history (user_id, history_query, user_email) VALUES ('$iduser', '$txtbox', '$email')";
	        mysqli_query($conn, $sql);
		}

		// perform php curl to api server
  	    $url = "http://192.168.8.153:5000/api/v1/domain/query?domain=".$txtbox;
	    $ch_session = curl_init();
	    curl_setopt( $ch, CURLOPT_CUSTOMREQUEST, 'GET' );
	    curl_setopt($ch_session, CURLOPT_RETURNTRANSFER, 1);
	    curl_setopt($ch_session, CURLOPT_URL, $url);
  	    $result_url = curl_exec($ch_session);
    }
 } 

?>

</div>
    <div class="banner">
        <div class="row">
          <div class="col-md-8 offset-md-2">
            <div class="header-text caption">
              <h2>Search your domain</h2>
              <?php if ($_SESSION['user_id']) { 
              	 echo "<h3>Hi, ".$namapengguna."</h3>"; 
               } else {
                 echo "<h3>Hi, guest</h3>";
          	   } ?>
              <div id="search-section" class="text-white">
	              <form method="POST">
	                <input class="searchText" style="background-color: black; opacity: 0.6;"  type="text" name="s_param" id="s_param" placeholder="Enter your domain here..."/>
	                <input class="main-button" style="background-color: black; opacity: 0.6;" type="submit" name="submit" id="sendData" value="Search Now">                 
	              </form>
                  <div class="container-fluid">


                    <!-- table -->
                    <table class="table table-dark table-striped" style="font-size: 16px;">
                      <thead>
                        <tr>
                          <!-- <th scope="col">#</th> -->
                          <th scope="col">Domain</th>
                          <th scope="col">Fuzzer</th>
                          <th scope="col">IPV4</th>
                          <th scope="col">IPV6</th>
                          <th scope="col">DNS Server</th>
                          <th scope="col">MX Server</th>
                          <th scope="col">Geo IP</th>
                        </tr>
                      </thead>
                      <tbody id="results">
                      	<?php if (isset($result_url)) { ?>
                      	<script type="text/javascript">
                      		data = <?php echo $result_url; ?>;
                      		for(var i = 0; i < <?php if ($_SESSION['user_id']) { echo "data.length"; } else { echo "5"; } ?>; i++) {
							  var html = '<tr>';
							  
							  if(data[i].hasOwnProperty('domain')) {
							    html += '<th scope="row">'+ data[i].domain +'</th>';
							  }else {
							    html += '<th scope="row">Empty</th>';
							  }

							  if(data[i].hasOwnProperty('fuzzer')) {
							    html += '<th scope="row">'+ data[i].fuzzer +'</th>';
							  }else {
							    html += '<th scope="row">Empty</th>';
							  }

							  if(data[i].hasOwnProperty('dns_a')) {
							    html += '<th scope="row">'+ data[i].dns_a +'</th>';
							  }else {
							    html += '<th scope="row">Empty</th>';
							  }

							  if(data[i].hasOwnProperty('dns_aaaa')) {
							    html += '<th scope="row">'+ data[i].dns_aaaa +'</th>';
							  }else {
							    html += '<th scope="row">Empty</th>';
							  }

							  if(data[i].hasOwnProperty('dns_ns')) {
							    html += '<th scope="row">'+ data[i].dns_ns +'</th>';
							  }else {
							    html += '<th scope="row">Empty</th>';
							  }

							  if(data[i].hasOwnProperty('dns_mx')) {
							    html += '<th scope="row">'+ data[i].dns_mx +'</th>';
							  }else {
							    html += '<th scope="row">Empty</th>';
							  }

							  if(data[i].hasOwnProperty('geoip')) {
							    html += '<th scope="row">'+ data[i].geoip +'</th>';
							  }else {
							    html += '<th scope="row">Empty</th>';
							  }

							  $("#results").prepend(html)
							}
                      	</script>
                      	<?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                </div>
               </div>
              </div>
            </div>
          </div>
        </div>
    </div>


<center><h3>Download Your Result</h3></center>
<center><button onClick="window.print()">Print</button></center>

<?php include 'includes/footer.php'; ?>

</body>
</html>