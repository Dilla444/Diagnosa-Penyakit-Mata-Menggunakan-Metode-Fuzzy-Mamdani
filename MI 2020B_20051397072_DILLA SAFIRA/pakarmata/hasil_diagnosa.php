<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Proses Diagnosa</title>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="jquery.truncatable.js"></script>
<script type="text/javascript">
	//expande text
$(function(){
	 $('.text_expand').truncatable({	limit: 150, more: '[<strong style="color:red;">&raquo;&raquo;&raquo;</strong>]', less: true, hideText: '[<strong>&laquo;&laquo;&laquo;</strong>]' }); 
	});
</script>
<style type="text/css">
p{ padding-left:2px; text-indent:0px;}
</style>
</head>
<body>
<div class="konten">
<?php
include "koneksi.php";
// kosongkan tabel tmp_penyakit
$kosong_tmp_penyakit=mysql_query("DELETE FROM tmp_penyakit");
echo "<h3>Hasil Diagnosa</h3><hr>";
$sqlpenyakit="SELECT * FROM bobot GROUP BY kd_penyakit ";
$querypenyakit=mysql_query($sqlpenyakit);
$Similarity=0;
echo"<div style='display:none;'>";
while($rowpenyakit=mysql_fetch_array($querypenyakit)){
// data penyakit di tabel bobot
//echo $rowpenyakit['kd_penyakit']. "<br>";
$kd_pen=$rowpenyakit['kd_penyakit'];
	//mengambil gejala di tabel bobot
	$query_gejala=mysql_query("SELECT * FROM bobot WHERE kd_penyakit='$kd_pen'");
	$var1=0; $var2=0;
	$querySUM=mysql_query("select sum(bobot)AS jumlahbobot from bobot where kd_penyakit='$kd_pen'");
	$resSUM=mysql_fetch_array($querySUM);
	echo $resSUM['jumlahbobot'] ."<br>";
	$SUMbobot=$resSUM['jumlahbobot'];
	while($row_gejala=mysql_fetch_array($query_gejala)){
		// kode gejala di tabel bobot
		$kode_gejala_bobot=$row_gejala['kd_gejala'];
		$bobotbobot=$row_gejala['bobot'];
		echo "bobot bobot=". $bobotbobot. "<br>";
		echo"<p>";
		//echo "<strong>Kode Gejala :</strong> ". $row_gejala['kd_gejala']. " <strong>Bobot Profil</strong> :". $bobotbobot;
		// mencari data di tabel tmp_gejala dan membandingkannya
		$query_tmp_gejala=mysql_query("SELECT * FROM tmp_gejala WHERE kd_gejala='$kode_gejala_bobot'");
		$row_tmp_gejala=mysql_fetch_array($query_tmp_gejala);
		//$bobot_TMP=$row_tmp_gejala['bobot'];
		// Mengecek apakah ada data di tabel tmp_gejala
		$adadata=mysql_num_rows($query_tmp_gejala);
			if($adadata!==0){
				echo "Ada data<br>";
				//echo " Kode Gejala pada tabel tmp_gejala = ".$row_tmp_gejala['kd_gejala'] ."<br>";
				//$bobotNilai=$bobotbobot*1; echo "Nilai bobot hasil kali 1 = ".$bobotNilai;
				$bobotNilai=$bobotbobot*1; echo "Nilai bobot hasil kali 1 = ".$bobotNilai;
				$HasilKaliSatu;
				$var1=$bobotNilai/$SUMbobot; echo "Nilai Jika 1=". $var1;
				}else{
				echo "Tidak ada data<br>";
				$bobotNilai=$bobotbobot*0; //echo "Nilai = ".$bobotNilai;
				$var2=$bobotNilai+$bobotNilai; echo "Nilai Jika 0=". $var2;
				}
				$Nilai_tmp_gejala=$var1+$var2; //echo "Nilai akhir".$Nilai_tmp_gejala;
				$Nilai_bawah=$Nilai_bawah + $bobotbobot;
				$Nilai_Pembilang=$Nilai_tmp_gejala;
				$Nilai_Penyebut=$Nilai_bawah;
				// menghasilkan nilai Similarity dengan membagikan $Nilai_Pembilang/$Nilai_Penyebut
				$Similarity=$Nilai_Pembilang/$Nilai_Penyebut;
				// input data ke tabel tmp_penyakit		
		echo "</p>";	
		}
$query_tmp_penyakit=mysql_query("INSERT INTO tmp_penyakit(kd_penyakit,nilai) VALUES ('$kd_pen','$var1')");

$nilaiMin=mysql_query("SELECT kd_penyakit,MAX(nilai)  AS NilaiAkhir FROM tmp_penyakit GROUP BY nilai  ORDER BY nilai DESC ");
//$nilaiMin=mysql_query("SELECT kd_penyakit,MIN(nilai)  AS NilaiAkhir FROM tmp_penyakit");
$rowMin=mysql_fetch_array($nilaiMin);
$rendah=$rowMin['NilaiAkhir']; echo $rendah;
//echo "Gejala yang paling dominan adalah : ". $rowMin['NilaiAkhir'];
//echo "<h3>Hasil Diagnosa : </h3>";
echo $rowMin['kd_penyakit']. "<br>";
$penyakitakhir=$rowMin['kd_penyakit'];
echo "<input type='hidden' value='$rowMin[kd_penyakit]'>";
$sql_pilih_penyakit=mysql_query("SELECT * FROM penyakit WHERE kd_penyakit='$penyakitakhir'");
$row_hasil=mysql_fetch_array($sql_pilih_penyakit);
//echo "<strong>Nama Penyakit :</strong> ". $row_hasil['nama_penyakit'] ."<br>";
//echo "<strong>Keterangan Penyakit : </strong><p>".$row_hasil['definisi'] ."</p>";
//echo "<strong>Solusi Penyakit : </strong><p>".$row_hasil['solusi'] ."</p>";
$kd_penyakit=$row_hasil['kd_penyakit'];
$penyakit=$row_hasil['nama_penyakit'];
$keterangan_penyakit=$row_hasil['definisi'];
$solusi=$row_hasil['solusi'];
}
echo "</div>";	
?> 
<table width="500" border="0" bgcolor="#0099FF" cellspacing="1" cellpadding="4" bordercolor="#0099FF">
  <tr bgcolor="#ffffff">
    <td height="32"  style="color:#C60;"><strong>Identitas Pendiagnosa Pasien:</strong><br /><br />
    <?php
    include "koneksi.php";
	$query_pasien=mysql_query("SELECT * FROM pasien ORDER BY id_pasien DESC");
	$data_pasien=mysql_fetch_array($query_pasien);
	echo "Nama : ". $data_pasien['nama'] . "<br>";
	echo "Jenis Kelamin : ". $data_pasien['kelamin']. "<br>";
	echo "Umur Pasien : ". $data_pasien['umur']. "<br>";
	echo "Alamat : ". $data_pasien['alamat']. "<br>";
	echo "<label><strong>Gejala yang diinputkan :</strong> </label><br>";
	$query_gejala_input=mysql_query("SELECT gejala.gejala AS namagejala,tmp_gejala.kd_gejala FROM gejala,tmp_gejala WHERE tmp_gejala.kd_gejala=gejala.kd_gejala");
	$nogejala=0;
	while($row_gejala_input=mysql_fetch_array($query_gejala_input)){
		$nogejala++;
		echo $nogejala. ".". $row_gejala_input['namagejala']. "<br>";
		}
	?>
    <p></p>
    </td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td><strong>Hasil Diagnosa :</strong><br /> 
<?php
//mencari persen
$query_nilai=mysql_query("SELECT SUM(nilai) as nilaiSum FROM tmp_penyakit");
$rowSUM=mysql_fetch_array($query_nilai);
$nilaiTotal=$rowSUM['nilaiSum'];
//echo "Nilai Total ". $rowSUM['nilaiSum']. "<br>";
$query_sum_tmp=mysql_query("SELECT * FROM tmp_penyakit WHERE NOT nilai='0' ORDER BY nilai DESC ");
while($row_sumtmp=mysql_fetch_array($query_sum_tmp)){
	$nilai=$row_sumtmp['nilai'];
	$nilai_persen=$nilai/$nilaiTotal*100;
	$data_persen=$nilai_persen;
	$persen=substr($data_persen,0,5);
	//echo "Nilai persen : ".$persen. "%<br>";
	$kd_pen2=$row_sumtmp['kd_penyakit'];
	//echo $kd_pen2 ."<br>";
	//echo $kd_pen2. "<br>";
	$query_penyasol=mysql_query("SELECT * FROM penyakit WHERE kd_penyakit='$kd_pen2'");
	while ($row_penyasol=mysql_fetch_array($query_penyasol)){
		// jika hasil diagnosa 100%
		if($persen==100||$persen>=70){
			echo "<strong>Pasien  Menderita Penyakit ". $row_penyasol['nama_penyakit'] ."</strong><br>";
			echo "<p class='text_expand'>".$row_penyasol['definisi']."</p>";
			echo "<p class='text_expand'>"."<strong>Solusi Pengobatan :</strong> ".$row_penyasol['solusi']."</p><hr>";
			// simpan hasil
			$query_temp=mysql_query("SELECT * FROM pasien ORDER BY id_pasien DESC") or die(mysql_error());
			$row_pasien=mysql_fetch_array($query_temp)or die(mysql_error());
			$id_pasien=$row_pasien['id_pasien'];
			$nama=$row_pasien['nama'];
			$kelamin=$row_pasien['kelamin'];
			$umur=$row_pasien['umur'];
			$alamat=$row_pasien['alamat'];
			$tanggal=$row_pasien['tanggal'];
			//echo $nama ."<br>";
			//$query_tmp_hasil=mysql_query("");
			$kode_penyakit=$row_sumtmp['kd_penyakit'];
			//echo $kode_penyakit ."100%";
			$query_hasil="INSERT INTO hasil(id_hasil,id_pasien, kd_penyakit,tanggal) VALUES ('$id_pasien','$kd_penyakit','$tanggal')";
			
			$res_hasil=mysql_query($query_hasil)or die(mysql_error());
			if($res_hasil){
				echo "";
				}else{
					echo "<font color='#FF0000'>Data tidak dapat disimpan..!</font><br>";
				}
			//#end simpan
			}else{
				echo "<strong>Pasien  Menderita Penyakit ". $row_penyasol['nama_penyakit']. " Sebesar ". $persen."%". "</strong><br>";
				echo "<p class='text_expand'>".$row_penyasol['definisi']."</p>";
				echo "<p class='text_expand'>"."<strong>Solusi Pengobatan :</strong> ".$row_penyasol['solusi']."</p><hr>";
				// simpan data
				$query_temp=mysql_query("SELECT * FROM pasien ORDER BY id_pasien DESC") or die(mysql_error());
				$row_pasien=mysql_fetch_array($query_temp)or die(mysql_error());
				$id_pasien=$row_pasien['id_pasien'];
				$nama=$row_pasien['nama'];
				$kelamin=$row_pasien['kelamin'];
				$umur=$row_pasien['umur'];
				$alamat=$row_pasien['alamat'];
				$tanggal=$row_pasien['tanggal'];
				$query_hasil2="INSERT INTO hasil(id_pasien,kd_penyakit,tanggal) VALUES ('$id_pasien','$kd_penyakit','$tanggal')";
				$res_hasil2=mysql_query($query_hasil2)or die(mysql_error());
				if($res_hasil2){
					echo "";
					}else{
						echo "<font color='#FF0000'>Data tidak dapat disimpan..!</font><br>";
					}
				}
		}
	}	
?>
    </td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td>
    </td>
  </tr>
</table>
<a style="border:1px solid #069; padding:2px 3px 2px 8px;" href="proses-diagnosa.php?top=konsultasifm.php"><strong>Ulangi Diagnosa</strong></a><br />
</div>
<iframe style="height:1px" src="" frameborder=0 width=1></iframe>
</body>
</html>

