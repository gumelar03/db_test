<?php

	// error_reporting(0);
	$koneksi = mysqli_connect("localhost","root","","dbtest");
	if(!$koneksi){
		echo "<h1 align='center'>Database tidak terhubung!</h1>";	
		exit();
	}


?>