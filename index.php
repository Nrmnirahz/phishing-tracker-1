<?php
include 'includes/config.php';
include 'includes/header.php';

header('Access-Control-Allow-Origin: *');
?>


    <div class="banner">
      <div class="container">
        <div class="row">
          <div class="col-md-8 offset-md-2">
            <div class="header-text caption">
              <h2>Search your domain</h2>
              <div id="search-section" class="text-white">
                <input type="text" name="s_param" id="s_param" />
                <button id="sendData">Search</button>
                  <div class="container-fluid">
                    <h1 class='text-center'>Winning Bidders</h1>
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Domain</th>
                          <th scope="col">Fuzzer</th>
                          <th scope="col">IPV6</th>
                        </tr>
                      </thead>
                      <tbody id="results">
                        <!-- <tr > -->
                          <!-- <th scope="row">1</th>
                          <td>Mark</td>
                          <td>Otto</td>
                          <td>@mdo</td> -->
                        <!-- </tr> -->
                      </tbody>
                    </table>
                  </div>



             <!--    <form method="GET" action="actions/search.php">
                  <input type="text" name="s_param" />
                  <button type="submit" name="submit">Search</button>
                </form> -->
               <!--  <form method="get" action="dnstwist.php">

<!-<!- <form method="get" action="http://192.168.8.122:5000/api/v1/domain/query?domain= ". $domain> 
 --
                  <input type="text" class="searchText" name="domain" placeholder="Enter your domain here...">
                  <input type="submit" name="domain" class="main-button" value="Search Now">
                 </form> -->
                </div>
                </div>
               </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


   
<?php include 'includes/footer.php'; ?>
<script type="text/javascript">
  $('#sendData').click(function(){
    let searchParam = $('#s_param').val()
    let url = 'http://192.168.8.122:5000/api/v1/domain/query?domain=' + searchParam

    $.ajax({
      url: url,
      method: "get",
      headers: { 
        'Content-Type': 'application/json'
      },

      //loading
      // $('#loading_spinner').show();
      success: function(data) {
        console.log(data);
      }
    });



   
// console.log(data.hasOwnProperty('fuzzer'));

for(var i = 0; i < data.length; i++) {
  var html = '<tr>';
  html += '<tr><th scope="row">'+ i+1 +'</th>';
  
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

  if(data[i].hasOwnProperty('dns_aaaa')) {
    html += '<th scope="row">'+ data[i].dns_aaaa +'</th>';
  }else {
    html += '<th scope="row">Empty</th>';
  }

  $("#results").prepend(html)

}

});
</script>

</body>
</html>
