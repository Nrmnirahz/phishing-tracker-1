<?php

if (isset($_GET['submit'])) {
	// echo"<script>alert('apak aaa')</script>";



	// $search = $_GET['s_param'];
	// $url = 'http://192.168.8.122:5000/api/v1/domain/query?domain='. $search;
	// // echo $url;

	// header("Location:". $url);


	//get req
	header("Location: http://192.168.8.122:5000/api/v1/domain/query?domain=" . $_GET['s_param']);

}

ajax