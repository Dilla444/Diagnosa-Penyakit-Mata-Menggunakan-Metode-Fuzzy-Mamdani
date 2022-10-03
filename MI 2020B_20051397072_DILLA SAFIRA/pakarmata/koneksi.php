<?php
$host="localhost";
$user="root";
$pass="";
$dbName="fuzzy_mata";
$koneksi=mysql_connect($host,$user,$pass);
$db=mysql_select_db($dbName,$koneksi);
if(!$koneksi){
	echo"<center><font color='#ff0000'>Koneksi Gagal</font></center>";
	}else {}
?>