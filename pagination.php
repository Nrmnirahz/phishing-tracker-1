<?php
## Database configuration
include 'config.php';

## Read value
$draw = $_POST['draw'];
$row = $_POST['start'];
$rowperpage = $_POST['length']; // Rows display per page
$columnIndex = $_POST['order'][0]['column']; // Column index
$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
$searchValue = mysqli_real_escape_string($con,$_POST['search']['value']); // Search value

## Search 
$searchQuery = " ";
if($searchValue != ''){
   $searchQuery = " and (domain like '%".$searchValue."%' or 
        fuzzer like '%".$searchValue."%' or 
        dns_a like'%".$searchValue."%' or 
        dns_aaaa like '%".$searchValue."%' or 
        dns_ns like'%".$searchValue."%') or 
        dns_mx like '%".$searchValue."%' or 
        geoip like'%".$searchValue."%')  ";
}


## Total number of records without filtering
$sel = mysqli_query($con,"select count(*) as allcount from s_param");
$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['allcount'];

## Total number of record with filtering
$sel = mysqli_query($con,"select count(*) as allcount from s_param WHERE 1 ".$searchQuery);
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['allcount'];

## Fetch records
$domQuery = "select * from s_param WHERE 1 ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
$empRecords = mysqli_query($con, $empQuery);
$data = array();

while ($row = mysqli_fetch_assoc($domRecords)) {
   $data[] = array( 
      "domain"=>$row['domain'],
      "fuzzer"=>$row['fuzzer'],
      "dns_a"=>$row['IPV4'],
      "dns_aaaa"=>$row['IPV6'],
      "dns_ns"=>$row['DNS Server'],
      "dns_mx"=>$row['MX Server'],
      "geoip"=>$row['Geo IP']
   );
}

## Response
$response = array(
  "draw" => intval($draw),
  "iTotalRecords" => $totalRecords,
  "iTotalDisplayRecords" => $totalRecordwithFilter,
  "aaData" => $data
);

echo json_encode($response);