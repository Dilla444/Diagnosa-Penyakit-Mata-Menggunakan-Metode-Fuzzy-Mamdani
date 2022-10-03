<?php 
//include "librari/inc.koneksidb.php";
include "koneksi.php";
# Baca variabel Form (If Register Global ON)
$TxtNama 	= $_REQUEST['TxtNama'];
$RbKelamin 	= $_POST['cbojk'];
$TxtUmur	= $_REQUEST['TxtUmur'];
$TxtAlamat 	= $_REQUEST['TxtAlamat'];
$email=$_POST['textemail'];
$NOIP = $_SERVER['REMOTE_ADDR'];
# Validasi Form
if (trim($TxtNama)=="") {
	include "PasienAddFm.php";
	echo "Nama belum diisi, ulangi kembali";
}
elseif (trim($TxtUmur)=="") {
	include "PasienAddFm.php";
	echo "Umur masih kosong, ulangi kembali";
}
elseif (trim($TxtAlamat)=="") {
	include "PasienAddFm.php";
	echo "Alamat masih kosong, ulangi kembali";
}
else {
    $NOIP = $_SERVER['REMOTE_ADDR'];

	//$sqldel = "DELETE FROM pasien WHERE noip='$NOIP'";	mysql_query($sqldel, $koneksi);
	
	$sql  = " INSERT INTO pasien (nama,kelamin,umur,alamat,tanggal,email) 
		 	  VALUES ('$TxtNama','$RbKelamin','$TxtUmur','$TxtAlamat',NOW(),'$email')";
	mysql_query($sql) 
		  or die ("SQL Error 2".mysql_error());
	
	$sqlhapus = "DELETE FROM tmp_penyakit WHERE noip='$NOIP'";
	mysql_query($sqlhapus, $koneksi) or die ("SQL Error 1".mysql_error());
	
	$sqlhapus2 = "DELETE FROM tmp_analisa WHERE noip='$NOIP'";
	mysql_query($sqlhapus2, $koneksi) or die ("SQL Error 2".mysql_error());
			
	$sqlhapus3 = "DELETE FROM tmp_gejala WHERE noip='$NOIP'";
	mysql_query($sqlhapus3, $koneksi) or die ("SQL Error 3".mysql_error());
#	$sqlhapus4 = "DELETE FROM analisa_hasil WHERE noip='$NOIP'";
#	mysql_query($sqlhapus4, $koneksi) or die ("SQL Error 4".mysql_error());	
	echo "<meta http-equiv='refresh' content='0; url=proses-diagnosa.php?top=konsultasifm.php'>";
}
?>
	