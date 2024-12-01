<?php
$id=$_GET['id'];
require '../../php/config.php';
$smk=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM siswa,kelas where siswa.c_kelas=kelas.c_kelas and siswa.c_siswa='$id'"));
$nama=$smk['nama'];
$kelas=$smk['kelas'];
$jurusan=$smk['jurusan'];
$ortu=$smk['ortu'];
$hp=$smk['hp'];
$wali=$smk['wali'];
$tinggal=$smk['tinggal'];

$d=date('D');
	if($d=='Mon'){
		$hari='Senin';
	}else if($d=='Tue'){
		$hari='Selasa';
	}else if($d=='Wed'){
		$hari='Rabu';
	}else if($d=='Thu'){
		$hari='Kamis';
	}else if($d=='Fri'){
		$hari='Jumat';
	}else if($d=='Sat'){
		$hari='Sabtu';
	}else if($d=='Sun'){
		$hari='Minggu';
	}

$m=date('m');
	if($m=='1'){
		$bulan='Januari';
	}else if($m=='2'){
		$bulan='Februari';
	}else if($m=='3'){
		$bulan='Maret';
	}else if($m=='4'){
		$bulan='April';
	}else if($m=='5'){
		$bulan='Mei';
	}else if($m=='6'){
		$bulan='Juni';
	}else if($m=='7'){
		$bulan='Juli';
	}else if($m=='8'){
		$bulan='Agusteus';
	}else if($m=='9'){
		$bulan='September';
	}else if($m=='10'){
		$bulan='Oktober';
	}else if($m=='11'){
		$bulan='November';
	}else if($m=='12'){
		$bulan='Desember';
	}
$tanggal=date('d')." ".$bulan." ".date('Y');
$jam=date('H:i');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.:: Surat Home Visit ::.</title>
<style type="text/css">
<!--
.style2 {font-size: 12px}
-->
</style>
</head>

<body onload="javascript:window.print()">
<table width="800" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="112" height="169"><div align="center"><img src="LOGO 1.jpg" width="100" height="150" /></div></td>
    <td width="546"><div align="center"><strong>PEMERINTAH  PROVINSI JAWA TIMUR</strong><br />
        <strong>DINAS PENDIDIKAN</strong><br />
        <strong>CABANG DINAS WILAYAH  BOJONEGORO</strong><br />
        <strong>(KABUPATEN BOJONEGORO –  KABUPATEN TUBAN)</strong><br />
        <strong>SEKOLAH MENENGAH KEJURUAN NEGERI</strong><br />
        <strong>TAMBA</strong><strong>KBOYO</strong><br />
        <span class="style2">Jl. Sawir No. 09 <strong>|</strong> Telp.(0356 ) 4160064 <strong>|</strong> e-mail  : smeksata@gmail.com</span><br />
TUBAN 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
62393
</div></td>
    <td width="142"><div align="center"><img src="LOGO 2.jpg" width="130" height="130" /></div></td>
  </tr>
  <tr>
    <td colspan="3"><hr /></td>
  </tr>
  <tr>
    <td colspan="3">
<br />
<br />
<table width="800" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="39">No</td>
    <td width="483">: </td>
    <td width="278">Tambakboyo, <?php echo "$tanggal";?></td>
  </tr>
  <tr>
    <td>Hal</td>
    <td>: Kunjungan Rumah</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Kepada : </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Yth. Bapak/Ibu</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Orang Tua dari <b><?php echo "$nama";?></b></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Kelas <b><?php echo "$kelas";?></b></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; Di Tempat</td>
  </tr>
</table>

<div align="justify"><br /> 
Dengan hormat,<br />
Yang bertanda tangan di bawah ini :<br />
<table width="800" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="38">&nbsp;</td>
    <td width="124">Nama </td>
    <td width="10">:</td>
    <td width="628"><strong>
      <?php
          $adm=$_GET['adm'];
          $admin=mysqli_query($con,"select * from guru");
          $arr=mysqli_fetch_array($admin);
          $nmadmin=$arr['nama'];
          echo "$nmadmin";
          ?>
    </strong></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>NIP</td>
    <td>:</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Jabatan</td>
    <td>:</td>
    <td><strong>Guru Bimbingan Konseling</strong></td>
  </tr>
</table>
</div>

<br />
Selaku  Guru Bimbingan dan Konseling / Wali Kelas / Guru SMK Negeri Tambakboyo untuk  mengadakan kunjungan ke rumah bapak/ibu/wali murid pada :<br />
<table width="800" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="38">&nbsp;</td>
    <td width="127">Hari dan Tanggal</td>
    <td width="10">:</td>
    <td width="629"><b><?php echo "$hari";?></b>, <b><?php echo "$tanggal";?></b></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Jam</td>
    <td>:</td>
    <td><b><?php echo "$jam";?></b></td>
  </tr>
</table>
<br />
Keperluan membicarakan permasalahan  putra/putri bapak/ibu/wali yaitu:
<br />
<table width="800" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="38">&nbsp;</td>
    <td width="124">Nama </td>
    <td width="10">:</td>
    <td width="628"><b><?php echo "$nama";?></b></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Kelas / Jurusan</td>
    <td>:</td>
    <td><b><?php echo "$kelas";?></b></td>
  </tr>
</table>
<br />
Demikian  atas perhatiannya kami sampaikan terima kasih.
<br />
<br /></td>
  </tr>
  <tr>
    <td colspan="3"><table width="800" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="525"><br /></td>
        <td width="275">Tuban, <?php echo "$tanggal";?><br />
          Kepala SMK Negeri Tambakboyo<br />
          <br />
          <br />
          <br />
          <br />
          Dra. RATNA AYUMILIA, S.Pd<br />
          NIP. 19640621 198903 2 010</td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
