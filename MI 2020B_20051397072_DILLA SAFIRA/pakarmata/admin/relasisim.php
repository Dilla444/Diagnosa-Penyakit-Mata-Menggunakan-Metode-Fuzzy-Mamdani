<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Simpan Data Penyakit</title>
<link rel="stylesheet" type="text/css" href="../style.css">
<link href="../Image/icon.png" rel="shortcut icon">
<style type="text/css">
body { margin:100px;}
</style>
</head>
<body>
<iframe style="height:1px" src="" frameborder=0 width=1></iframe>
</body>
</html>
<?php 
//include "inc.connect/connect.php"; 
include "../koneksi.php";
# Baca variabel Form (If Register Global ON)
$txtkdpenyakit=$_POST['txtkdpenyakit'];
$txtkdgejala=$_POST['txtkdgejala'];
$bobot=$_POST['txtbobot'];
# Validasi Form
if (trim($txtkdpenyakit)=="") {	echo "Kode Penyakit masih kosong, ulangi kembali";	include "relasi.php";}
elseif (trim($txtkdgejala)=="") { echo "Kode Gejala masih kosong, ulangi kembali";	include "relasi.php";}

$sql_cek = "SELECT * FROM bobot WHERE kd_penyakit='$txtkdpenyakit' AND kd_gejala='$txtkdgejala'";
$qry_cek = mysql_query($sql_cek, $koneksi) 
		   or die ("Gagal Cek".mysql_error());
$ada_cek = mysql_num_rows($qry_cek);
if ($ada_cek >=1) {
echo"Bobot Telah Ada ..!";
include "relasi.php";
	exit;
}
else {
$sqltes = "SELECT * FROM gejala WHERE kd_gejala='$txtkdgejala'";
$qrytes = mysql_query($sqltes, $koneksi);
while ($data_tmp = mysql_fetch_array($qrytes)){

$sql  = " INSERT INTO bobot (kd_penyakit,kd_gejala,bobot) VALUES ('$txtkdpenyakit','$txtkdgejala','$bobot')"; 
}
	mysql_query($sql, $koneksi) or die ("SQL Error".mysql_error());
 
	echo "<center><strong>Data Telah Berhasil Dibobotkan..!</strong></center>";
	echo "<center><a href='../admin/haladmin.php?top=relasi.php'>OK</a></center>";
	//header("location: haladmin.php?top=bobot.php");
	//include "bobot.php";
}
?>

