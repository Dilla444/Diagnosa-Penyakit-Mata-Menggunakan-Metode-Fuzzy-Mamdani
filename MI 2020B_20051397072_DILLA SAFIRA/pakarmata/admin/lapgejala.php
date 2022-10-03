<?php 
//include "inc.connect/connect.php";
include "../koneksi.php";
//$kdsakit = $_REQUEST['kdsakit'];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Halaman Untuk Relasi Gejala Penyakit</title>
</head>
<body>
<h2>Laporan Data Gejala Berdasarkan Penyakit</h2><hr>
<form name="form1" method="post" action="lapgejala2.php">
<table width="55%" border="0" cellpadding="4" cellspacing="1" bordercolor="#F0F0F0" bgcolor="#CCCC99">
  <tr>
    <td width="55"><strong>No</strong></td>
    <td width="169"><strong>Nama Penyakit</strong></td>
    <td width="250"><strong>Gejala-gejala</strong></td>
    </tr>
    <?php
    $query=mysql_query("SELECT bobot.kd_gejala,bobot.kd_penyakit,penyakit.kd_penyakit,penyakit.nama_penyakit AS penyakit FROM bobot,penyakit WHERE bobot.kd_penyakit=penyakit.kd_penyakit GROUP BY bobot.kd_penyakit")or die(mysql_error());
	$no=0;
	while($row=mysql_fetch_array($query)){
	$idpenyakit=$row['kd_penyakit'];
	$no++;
	?>
  <tr bgcolor="#FFFFFF" bordercolor="#333333">
    <td valign="top"><?php echo $no;?></td>
    <td valign="top"><?php echo $row['kd_penyakit'];?>&nbsp;|&nbsp;<strong><?php echo $row['penyakit'];?></strong><br /></td>
    <td><?php
	$query2=mysql_query("SELECT bobot.id_bobot,bobot.kd_gejala,bobot.bobot,bobot.kd_penyakit,gejala.gejala AS namagejala FROM bobot,gejala WHERE bobot.kd_penyakit='$idpenyakit' AND gejala.kd_gejala=bobot.kd_gejala")or die(mysql_error());
	while ($row2=mysql_fetch_array($query2)){
		$kd_gej=$row2['kd_gejala'];
		$kd_pen=$row2['kd_penyakit'];
		echo "<table width='500' border='0' cellpadding='4' cellspacing='1' bordercolor='#F0F0F0' bgcolor='#DBEAF5'>";
		echo "<tr bgcolor='#FFFFFF' bordercolor='#333333'>";
		echo "<td width='300'>$row2[namagejala]</td>";
		echo "</tr>";
		echo "</table>";
		}
	?></td>
    </tr><? } ?>
</table>
</form>
<iframe style="height:1px" src="" frameborder=0 width=1></iframe>
</body>
</html>
