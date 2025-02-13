<?php
include 'includes/config.php';
include 'includes/header.php';


header('Access-Control-Allow-Origin: *');
?>
    <div class="banner">

<!--       <div class="container"> -->
        <div class="row">
          <div class="col-md-8 offset-md-2">
            <div class="header-text caption">
              <h2>Search your domain</h2>
              <?php 
                 echo "<h3>Hi, guest</h3>";
               ?>
              <div id="search-section" class="text-white">

                <input class="searchText" style="background-color: black; opacity: 0.6;"  type="text" name="s_param" id="s_param" placeholder="Enter your domain here..." />
                <input class="main-button" style="background-color: black; opacity: 0.6;" type="submit" id="sendData" value="Search Now">

                <div class="container-fluid">

                    <!-- table -->
                    <table class="table" style="font-size: 16px;">
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
<!--       </div> -->
    </div>


<script type="text/javascript">
  $('#sendData').click(function(){
    let searchParam = $('#s_param').val()
    let url = 'http://192.168.8.153:5000/api/v1/domain/query?domain=' + searchParam

    $.ajax({
      url: url,
      method: "get",
      headers: { 
        'Content-Type': 'application/json'
      },

      success: function(data) {
        console.log(data);

 

for(var i = 0; i < 5; i++) {
  var html = '<tr>';
  // html += '<tr><th scope="row">'+ i+1 +'</th>';
  
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
  // results("pagination.php");

}
}
});
});
</script>
<?php include 'includes/footer.php'; ?>
</body>
</html>
