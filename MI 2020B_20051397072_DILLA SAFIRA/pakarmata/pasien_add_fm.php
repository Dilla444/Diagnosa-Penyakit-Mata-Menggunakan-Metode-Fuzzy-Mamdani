<div class="art-post">
<div class="art-post-body">
<div class="art-post-inner art-article">
<div class="art-postcontent">
<h2 class="art-postheader"><img src="images/postheadericon.png" width="28" height="27" alt="" />Registrasi Pengguna</h2>
<p>Silahkan melakukan registrasi untuk menggunakan aplikasi ini...!</p>
<script type="text/javascript">
function validasi(form){
	if(form.TxtNama.value==""){
		alert("Masukkan nama !");
		form.TxtNama.focus(); return false;
		}else if(form.cbojk.value==0){
		alert("Masukkan jenis kelamin !");
		form.cbojk.focus(); return false;	
		}else if(form.TxtUmur.value==""){
			alert("Masukkan umur anda !");
			form.TxtUmur.focus(); return false;
			}else if(form.TxtAlamat.value==""){
				alert("Masukkan alamat anda !");
				form.TxtAlamat.focus(); return false;
				}else if(form.textemail.value==""){
					alert("Masukkan email !");
					form.textemail.focus(); return false;
					}
		form.submit();
	}
</script>
<form onSubmit="return validasi(this)" method="post" name="form1" target="_self" action="?top=save_registrasi.php">
<table width="505" style="border:0px;"  border="0" align="center">
    <tr> 
      <td colspan="2"><div align="center"><b>MASUKKAN DATA ANDA</b></div></td>
    </tr>
    <tr> 
      <td>Nama</td>
      <td> 
      <input name="TxtNama" id="TxtNama" type="text" size="35" maxlength="30"></td>
    </tr>
    <tr> 
      <td>Kelamin</td>
      <td> 
      <select name="cbojk" id="cbojk">
      <option value="0" selected="selected">- Jenis Kelamin -</option>
      <option value="Laki-laki">Laki-laki</option>
      <option value="Wanita">Wanita</option>
      </select>
      </td>
    </tr>
    <tr> 
      <td>Umur</td>
      <td> 
      <input name="TxtUmur" id="TxtUmur" type="text" size="3" maxlength="3"></td>
    </tr>
    <tr> 
      <td width="76">Alamat</td>
      <td width="312"> 
      <input name="TxtAlamat" id="TxtAlamat" type="text" size="50" maxlength="50"></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><input type="text" name="textemail" id="textemail" size="25" maxlength="25"></td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="Daftar"><input type="reset" value="Reset" /></td>
    </tr>
  </table>
</form>

      </div>
                <div class="cleared"></div>
                </div>

		<div class="cleared"></div>
    </div>
</div>
