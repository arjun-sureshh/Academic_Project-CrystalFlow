<?php
$Servername="localhost";
$Username="root";
$Password="";
$Database="db_crystalflow";

$Conn=mysqli_connect($Servername,$Username,$Password,$Database);

if(!$Conn)
{
	echo "not connected";
}
?>