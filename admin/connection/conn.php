<?php

$con = new mysqli('localhost','root','','rms');

if($con->connect_errno != 0){
	echo $con->connect_error;
	exit;
}

?>