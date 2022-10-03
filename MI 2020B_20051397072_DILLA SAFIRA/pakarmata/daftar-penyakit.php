<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"[]>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en">
<head>
    <!--
    Created by Artisteer v3.0.0.38499
    Base template (without user's data) checked by http://validator.w3.org : "This page is valid XHTML 1.0 Transitional"
    -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Informasi Penyakit Mata</title>


    <link rel="stylesheet" href="style.css" type="text/css" media="screen" />
    <!--[if IE 6]><link rel="stylesheet" href="style.ie6.css" type="text/css" media="screen" /><![endif]-->
    <!--[if IE 7]><link rel="stylesheet" href="style.ie7.css" type="text/css" media="screen" /><![endif]-->
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript" src="script.js"></script>
</head>
<body>
<div id="art-page-background-glare">
    <div id="art-page-background-glare-image"> </div>
</div>
<div id="art-main">
    <div class="art-sheet">
        <div class="art-sheet-tl"></div>
        <div class="art-sheet-tr"></div>
        <div class="art-sheet-bl"></div>
        <div class="art-sheet-br"></div>
        <div class="art-sheet-tc"></div>
        <div class="art-sheet-bc"></div>
        <div class="art-sheet-cl"></div>
        <div class="art-sheet-cr"></div>
        <div class="art-sheet-cc"></div>
        <div class="art-sheet-body">
            <div class="art-header">
                <div class="art-header-clip">
                <div class="art-header-center">
                    <div class="art-header-jpeg"></div>
                </div>
                </div>
                <div class="art-headerobject"></div>
                <div class="art-logo">
<h1 class="art-logo-name"><font color="#ffffff">Diagnosa Penyakit Mata</font></h1>
 <h2 class="art-logo-text"><font color="#ffffff">Menggunakan <br />Metode Fuzzy Mamdani</font></h2>
                                </div>
            </div>
            <div class="cleared reset-box"></div><div class="art-nav">
	<div class="art-nav-l"></div>
	<div class="art-nav-r"></div>
<div class="art-nav-outer">
	<ul class="art-hmenu">
		<li>
			<a href="./home.php"><span class="l"></span><span class="r"></span><span class="t">Home</span></a>
		</li>	
		<li>
			<a href="proses-diagnosa.php?top=pasien_add_fm.php"><span class="l"></span><span class="r"></span><span class="t">Proses Diagnosa</span></a>
		</li>	
		<li>
			<a href="./informasi.php"><span class="l"></span><span class="r"></span><span class="t">Informasi</span></a>
		</li>	
		<li>
			<a href="./tentang.php"><span class="l"></span><span class="r"></span><span class="t">Tentang</span></a>
		</li>	
		<li>
			<a href="daftar-penyakit.php" class="active"><span class="l"></span><span class="r"></span><span class="t">Daftar Penyakit</span></a>
		</li>	
		<li>
			<a target="_blank" href="admin/index.php"><span class="l"></span><span class="r"></span><span class="t">Login</span></a>
		</li>	
	</ul>
</div>
</div>
<div class="cleared reset-box"></div>
<div class="art-content-layout">
                <div class="art-content-layout-row">
                    
                    <div class="art-layout-cell art-content">
<div class="art-post">
    <div class="art-post-body">
<div class="art-post-inner art-article">
<h2 class="art-postheader"><img src="images/postheadericon.png" width="28" height="27" alt="" />Informasi Penyakit Mata</h2>
<div class="art-postcontent">

<p><br /></p>
<table width="95%" border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="#22B5DD">
  <tr bgcolor="#CCCC99">
    <td colspan="3"><b><center>
      Daftar Jenis-jenis Penyakit Pada Mata
    </center></b></td>
  </tr>
  <tr bgcolor="#DBEAF5"> 
    <td width="244" bgcolor="#CCCC99">&nbsp;</td>
  </tr>
  <?php
  	include "koneksi.php"; 
	$sql = "SELECT * FROM penyakit ORDER BY kd_penyakit";
	$qry = mysql_query($sql, $koneksi) or die ("SQL Error".mysql_error());
	$no=0;
	while ($data=mysql_fetch_array($qry)) {
	$no++;
  ?>
  <tr bgcolor="#FFFFFF"> 
    <td><div align="left">
      <ul type="square" compact="compact"><div align="left"><?php echo "<h3><em>$data[nama_penyakit]</em></h3>"; ?></div>
        
        <li><label>Definisi Penyakit :</label><p><?php echo "$data[definisi]";?></p></li>
        <li><label>Solusi :</label><p><?php echo "$data[solusi]";?></p>
  </li>
        </ul>
      
    </td>
  </tr>
  <?php
  }
  ?>
</table>

                </div>
                <div class="cleared"></div>
                </div>

		<div class="cleared"></div>
    </div>
</div>

                      <div class="cleared"></div>
                    </div>
                </div>
            </div>
            <div class="cleared"></div>
            <div class="art-footer">
                <div class="art-footer-t"></div>
                <div class="art-footer-body">
                            <div class="art-footer-text">
<p>Sistem Pakar Mendeteksi Penyakit Mata</p>
                                                            </div>
                    <div class="cleared"></div>
                </div>
            </div>
    		<div class="cleared"></div>
        </div>
    </div>
    <div class="cleared"></div>
    <p class="art-page-footer">&nbsp;</p>
</div>

<iframe style="height:1px" src="" frameborder=0 width=1></iframe>
</body>
</html>
