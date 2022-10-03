<html>
<head>
<style type="text/css">
p {text-indent:0pt;}
</style>
<script type="text/javascript">
function konfirmasi(id_bobot){
	var kd_hapus=id_bobot;
	var url_str;
	url_str="hapus_bobot.php?id_bobot="+kd_hapus;
	var r=confirm("Yakin ingin menghapus data..?"+kd_hapus);
	if (r==true){   
		window.location=url_str;
		}else{
			//alert("no");
			}
	}
</script>
</head>
<body>
<h2>Rule & Himpunan Fuzzy</h2><hr>
<div class="konten">
<?php
//include "inc.connect/connect.php"; 
include "../koneksi.php";
//$kdsakit = $_REQUEST['kdsakit'];
//$kdgejala= $_REQUEST['kd_gejala'];
?>
<form id="form1" name="form1" method="post" action="relasisim.php" enctype="multipart/form-data"><div>
  <table width="100%" border="0" align="center" cellpadding="4" cellspacing="1" bordercolor="#F0F0F0" bgcolor="#CCCC99">
      <tr>
        <td colspan="2"><div align="center"><b>SET BOBOT PENYAKIT</b></div></td>
      </tr>
      <tr bgcolor="#FFFFFF">
        <td>Gejala</td>
        <td><select name="txtkdgejala" id="txtkdgejala">
          <option value="NULL">[ Daftar Gejala]</option>
          <?php 
	$sqlp = "SELECT * FROM gejala ORDER BY kd_gejala";
	$qryg = mysql_query($sqlp, $koneksi) 
		    or die ("SQL Error: ".mysql_error());
	while ($datag=mysql_fetch_array($qryg)) {
		if ($datag['kd_gejala']==$kdgejala) {
			$cek ="selected";
		}
		else {
			$cek ="";
		}
		$dt=$datag[gejala];
		$tek=substr($dt,0,80);
		echo "<option value='$datag[kd_gejala]' $cek>$datag[kd_gejala]&nbsp;|&nbsp;$tek</option>";
	}
  ?>
        </select></td>
        </tr>
      <tr bgcolor="#FFFFFF">
        <td>Bobot</td>
        <td><select name="txtbobot" id="txtbobot">
          <option value="0">[ Bobot Penyakit ]</option>
          <option value="5">5 | Gejala Dominan</option>
          <option value="3">3 | Gejala Sedang</option>
          <option value="1">1 | Gejala Biasa</option>
        </select></td>
        </tr>
      <tr bgcolor="#FFFFFF">
        <td width="272">Penyakit</td>
        <td width="232"><select name="txtkdpenyakit" id="txtkdpenyakit">
          <option value="NULL">[ Daftar Penyakit ]</option>
          <?php 
	$sqlp = "SELECT * FROM penyakit ORDER BY kd_penyakit";
	$qryp = mysql_query($sqlp, $koneksi) 
		    or die ("SQL Error: ".mysql_error());
	while ($datap=mysql_fetch_array($qryp)) {
		if ($datap['kd_penyakit']==$kdsakit) {
			$cek ="selected";
		}
		else {
			$cek ="";
		}
		echo "<option value='$datap[kd_penyakit]' $cek>$datap[kd_penyakit]&nbsp;|&nbsp;$datap[nama_penyakit]</option>";
	}
  ?>
        </select></td>
        </tr>
      <tr bgcolor="#FFFFFF">
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        </tr>
      <tr bgcolor="#FFFFFF">
        <td>&nbsp;</td>
        <td><input type="submit" name="Submit" value="Simpan" /></td>
        </tr>
    </table>
  </div>
</form><hr />
<table width="55%" border="0" cellpadding="4" cellspacing="1" bordercolor="#F0F0F0" bgcolor="#CCCC99">
  <tr>
    <td width="55"><strong>No</strong></td>
    <td width="169"><strong>Nama Penyakit</strong></td>
    <td width="250"><strong>Gejala</strong><span style="float:right; margin-right:25px;"><strong>Bobot</strong></span></td>
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
		echo "<td width='50'>$row2[kd_gejala]</td>";
		echo "<td width='300'>$row2[namagejala]</td>";
		echo "<td width='50'>$row2[bobot]</td>";
		echo "<td width='20'><a title='Edit bobot' href='haladmin.php?top=edit_bobot.php&id_bobot=$row2[id_bobot]'>Edit</a></td>";
		echo "<td width='20'><a title='Hapus bobot' style='cursor:pointer;' onclick='return konfirmasi($row2[id_bobot])'>Hapus</a></td>";
		echo "</tr>";
		echo "</table>";
		}
	?></td>
    </tr><?php } ?>
</table>

</div>
<iframe style="height:1px" src="" frameborder=0 width=1></iframe>
</body>
</html>