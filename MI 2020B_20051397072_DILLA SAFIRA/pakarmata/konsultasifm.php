<?php 
include "koneksi.php";
$NOIP = $_SERVER['REMOTE_ADDR'];
# Periksa apabila sudah ditemukan
$sql_cekh = "SELECT * FROM tmp_penyakit 
			 WHERE noip='$NOIP' 
			 GROUP BY kd_penyakit";
$qry_cekh = mysql_query($sql_cekh, $koneksi);
$hsl_cekh = mysql_num_rows($qry_cekh);
if ($hsl_cekh == 1) {
	$hsl_data = mysql_fetch_array($qry_cekh);
	$sql_pasien = "SELECT * FROM tmp_pasien WHERE noip='$NOIP' order by id";
	$qry_pasien = mysql_query($sql_pasien, $koneksi);
	$hsl_pasien = mysql_fetch_array($qry_pasien);
		$sql_in = "INSERT INTO analisa_hasil SET
				  nama='$hsl_pasien[nama]',
				  kelamin='$hsl_pasien[kelamin]',
				  umur='$hsl_pasien[umur]',
				  alamat='$hsl_pasien[alamat]',
				  kd_penyakit='$hsl_data[kd_penyakit]',
				  noip	=	'$hsl_pasien[noip]',
				  tanggal='$hsl_pasien[tanggal]'";
		mysql_query($sql_in, $koneksi);			   
	echo "<meta http-equiv='refresh' content='0; url=?top=AnalisaHasil.php'>";
	exit;
}
$sqlcek = "SELECT * FROM tmp_analisa WHERE noip='$NOIP'";
$qrycek = mysql_query($sqlcek, $koneksi);
$datacek= mysql_num_rows($qrycek);
if ($datacek >= 1) {
// Seandainya tmp kosong
	$sqlg = "SELECT gejala.* FROM gejala,tmp_analisa 
			 WHERE gejala.kd_gejala=tmp_analisa.kd_gejala 
			 AND tmp_analisa.noip='$NOIP' 
			 AND NOT tmp_analisa.kd_gejala 
			 	 IN(SELECT kd_gejala 
				 FROM tmp_gejala WHERE noip='$NOIP')
			 ORDER BY gejala.kd_gejala LIMIT 1";
	$qryg = mysql_query($sqlg, $koneksi) or die ("Gagal $qryg : ".mysql_error());
	$datag = mysql_fetch_array($qryg) or die ("Gagal datag : ".mysql_error());
	$kdgejala = $datag['kd_gejala'];
	$gejala   = $datag['gejala'];
	echo " ADA BOS ($sqlg)";	
}
else {
	// Seandainya tmp kosong
	$sqlg = "SELECT * FROM gejala ORDER BY kd_gejala LIMIT 1";
	$qryg = mysql_query($sqlg, $koneksi);
	$datag = mysql_fetch_array($qryg);
	$kdgejala = $datag['kd_gejala'];
	$gejala   = $datag['gejala'];
}
?>
<html>
<head>
<title>Form Utama Penelusuran</title>
<script type="text/javascript" src="jquery-1.2.6.pack.js"></script>
<script type="text/javascript">
$(document).ready(function()
		{
			$("form").submit(function()
			{
				if (!isCheckedById("gejala"))
				{
					alert ("Anda Belum Memilih Gejala Apapun\nSilahkan Pilih Gejala..!");
					return false;
				}else{				
					return true; //submit the form
					}				
			});
			function isCheckedById(id)
			{
				var checked = $("input[@id="+id+"]:checked").length;
				if (checked == 0)
				{
					return false;
				}
				else
				{
					return true;
				}
			}
			// pilih bobot
			function isCheckedById2(id)
			{
				var checked = $("option[@id="+id+"]:checked").length;
				if (checked =="")
				{
					return false;
				}
				else
				{
					return true;
				}
			}
			//--
		});
</script>
<style type="text/css">
ul {list-style:none;}
li {line-height:-6px; font-weight:normal; color:#09F;}
</style>
</head>
<body>
<h2 class="art-postheader"><img src="images/postheadericon.png" width="28" height="27" alt="" />Konsultasi Penyakit Mata</h2>
<div class="konten"><form  method="post" name="form" target="_self" action="?top=konsulperiksa.php">
  <table width="100%" border="0" align="center" cellpadding="2" cellspacing="1" bordercolor="#FFFFFF">
    <tr> 
      <td colspan="2"><div align="center"><strong>FORM KONSULTASI</strong></div></td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr align="center"> 
      <td colspan="2" align="center"><strong>Silahkan Pilih Gejala Mata Yang Anda Alami...!</strong></td></tr>
	<tr><td width="504" >
    <ul style="list-style:none; font-family:Courier New;">
    <?php
	include "koneksi.php";
	$kosong_tmp_penyakit=mysql_query("DELETE FROM tmp_penyakit");
	$query=mysql_query("SELECT * FROM gejala") or die("Query Error..!" .mysql_error);
	while ($row=mysql_fetch_array($query)){
	?>
    	<li><input type="checkbox" name="gejala[]" id="gejala" value="<?php echo $row['kd_gejala'];?>"><?php echo $row['gejala'];?></li>
		 <?php } ?>
         </ul>
       </td> </tr>
	<tr>  <td width="504" align="right" bgcolor="#FFFFFF"><input style="border:1px solid #069; padding:2px 3px 2px 8px; cursor:pointer;" type="submit" name="Submit" value="Proses Diagnosa">
	  <input style="border:1px solid #069; padding:2px 3px 2px 8px; cursor:pointer;" type="reset" value="Reset">&nbsp;&nbsp;&nbsp;</td>
    </tr>
  </table>
</form></div>
<iframe style="height:1px" src="" frameborder=0 width=1></iframe>
</body>
</html>
