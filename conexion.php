<?php

	/*$mysqli = new mysqli("localhost","UsrCajeroUT","C4jer0UT.2019","utags_bd");

	if(mysqli_connect_errno()){
		echo 'Conexion Fallida : ', mysqli_connect_error();
		exit();
	}
	else {
		echo "Todo bien, chido, fine";
	}*/

	$servername = "localhost";
	$username = "UsrCajeroUT";
	$password = "C4jer0UT.2019";
	$dbname = "utags_db";
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	if (mysqli_connect_errno()) {
	printf("Connect failed: %sn", mysqli_connect_error());
	exit();
	}

?>