<script type="text/javascript">
  // var spinner = new Spin.Spinner(opts).spin(target);
  $('#sendData').click(function(){
    let searchParam = $('#s_param').val()
    let url = 'http://192.168.8.153:5000/api/v1/domain/query?domain=' + searchParam

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

    
// console.log(data.hasOwnProperty('fuzzer'));

for(var i = 0; i < data.length; i++) {
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

}
}
});
});
</script>