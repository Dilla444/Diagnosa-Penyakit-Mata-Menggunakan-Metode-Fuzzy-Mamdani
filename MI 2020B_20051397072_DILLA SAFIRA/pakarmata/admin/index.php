<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Login Admin</title>
<link href="../favicon.ico" rel='shortcut icon'>
<link rel="stylesheet" type="text/css" href="../style.css">
<script type="text/javascript">
	function validasi(form){
		if(form.username.value==""){
			alert("Masukkan Username..!");
			form.username.focus();
			return false;
			}else if(form.password.value==""){
				alert("Masukkan Password Anda..!");
				form.password.focus();
				return false;
				}
			form.submit();
		}
		function fokus(){
	document.getElementById("username").focus();
	}
</script>

</head>

<body onLoad="fokus();">

<div style="margin-top:100px;">
<center>
  <H2 class="art-postheader">Sistem Pakar Deteksi Penyakit Mata</H2></center>
<table width="315" border="0" align="center">
    <tr>
    <td width="310" height="220">
	<form name="form1" method="post" onSubmit="return validasi(this)" action="cekpswd.php" >
<table width="251" border="0" align="center" cellpadding="3" cellspacing="0">
  <tr>
    <td colspan="3"><div align="center"><strong>Login Administrator</strong></div></td>
    </tr>
  <tr>
    <td width="86">Username</td>
    <td width="5">:</td>
    <td width="146">
      <input name="username" type="text" id="username">
    </td>
  </tr>
  <tr>
    <td>Password</td>
    <td>:</td>
    <td>
      <input name="password" type="password" id="password">
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="Submit" value="Login"><input type="reset" value="Reset"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="right"><a href="../index.php">Kembali</a></td>
	</tr>
</table>
    </form>
	</td>
  </tr>
</table></div>

<iframe style="height:1px" src="" frameborder=0 width=1></iframe>
</body>
</html>
