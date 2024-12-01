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
<title>.:: Surat Peringatan 3 ::.</title>
<style type="text/css">
<!--
.style2 {font-size: 12px}
-->
</style>
</head>

<body onload="javascript:window.print()">
<table width="800" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="112" height="169"><div align="center"><img src="LOGO 1.jpg" width="86" height="131" /></div></td>
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
    <td width="142"><div align="center"><img src="LOGO 2.jpg" width="119" height="117" /></div></td>
  </tr>
  <tr>
    <td colspan="3"><hr /></td>
  </tr>
  <tr>
    <td colspan="3"><div align="center"><strong><br />
    SURAT PERNYATAAN </strong><br />
    <br />
    </div>
Yang bertanda tangan di bawah ini :<br />
<br />
<table width="800" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="146">Nama</td>
    <td width="12">:</td>
    <td width="642"><b><?php echo "$nama";?></b></td>
  </tr>
  <tr>
    <td>Kelas / Jurusan</td>
    <td>:</td>
    <td><b><?php echo "$kelas";?></b></td>
  </tr>
  <tr>
    <td>Alamat</td>
    <td>:</td>
    <td><strong><?php echo "$tinggal";?></strong></td>
  </tr>
  <tr>
    <td valign="top">Permasalahan</td>
    <td valign="top">:</td>
    <td valign="top"><?php
$smk=mysqli_query($con,"SELECT * FROM pelanggaran where c_siswa='$id' order by at desc ");$vr=1;while($akh=mysqli_fetch_array($smk)){
$ben=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM benpel where c_benpel='$akh[c_benpel]' "));
	?>
        <div align="justify"><li><?php echo $ben['benpel'];?></li></div>
      <?php
	}
	?>
    </td>
  </tr>
</table>

<div align="justify">
<div align="justify"><br />
  Setelah menerima peringatan dari sekolah, saya menyatakan akan memperbaiki perilaku saya dan akan taat pada peraturan dan tata tertib sekolah yang berlaku dan bersedia untuk tidak naik kelas atau mengundurkan diri dari sekolah apabila melanggar surat pernyataan ini.<br />
  <br />
  Demikian surat pernyataan ini saya buat dengan sebenar-benarnya.    <br />
  <br />
</div></td>
  </tr>
  <tr>
    <td colspan="3"><table width="800" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="490">Mengetahui,<br />
          Orang Tua / Wali Murid<br />
          <br />
          <br />
          <br />
          <br />
          ( <b><?php echo "$ortu";?></b> )<br />
          <br /></td>
        <td width="310">Tuban, <?php echo "$tanggal";?><br />
          Yang Menyatakan<br />
          <br />
          <br />
          <br />
          <br />
          ( <b><?php echo "$nama";?></b> )<br /></td>
      </tr>
      <tr>
        <td>Wali Kelas<br />
          <br />
          <br />
          <br />
          <br />
          <strong>( <?php echo "$wali";?> )</strong><br />
<br /></td>
        <td>Guru Bimbingan Konseling<br />
          <br />
          <br />
          <br />
          <br />
          <strong>
          <?php
          $adm=$_GET['adm'];
          $admin=mysqli_query($con,"select * from guru where c_guru='$adm'");
          $arr=mysqli_fetch_array($admin);
          $nmadmin=$arr['nama'];
          echo "( $nmadmin )";
          ?>
          </strong><br />
<br /></td>
      </tr>
      <tr>
        <td>Kepala Jurusan<br />
          <br />
          <br />
          <br />
          <br />
          <strong>( ............................................. )</strong></td>
        <td>Waka Kesiswaan<br />
          <br />
          <br />
          <br />
          <br />
          <strong>( Nur Adhim, S.Pd )</strong></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
