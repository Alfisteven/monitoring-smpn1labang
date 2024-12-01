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
<title>.:: Surat Peringatan 1 ::.</title>
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
    <td colspan="3"><div align="center"><strong><br />
    SURAT PERNYATAAN </strong><br />
    <br />
    </div>
Yang bertanda tangan di bawah ini :<br />
<br />
<table width="800" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="127">Nama</td>
    <td width="10">:</td>
    <td width="663"><strong><?php echo "$nama";?></strong></td>
  </tr>
  <tr>
    <td>Kelas / Jurusan</td>
    <td>:</td>
    <td><strong><?php echo "$kelas / $jurusan";?></strong></td>
  </tr>
  <tr>
    <td>Nama Wali Kelas</td>
    <td>:</td>
    <td><strong><?php echo "$wali";?></strong></td>
  </tr>
  <tr>
    <td>Nama Orang Tua</td>
    <td>:</td>
    <td><strong><?php echo "$ortu";?></strong></td>
  </tr>
  <tr>
    <td>Alamat Rumah</td>
    <td>:</td>
    <td><strong><?php echo "$tinggal";?></strong></td>
  </tr>
  <tr>
    <td>No Telp. / HP</td>
    <td>:</td>
    <td><strong><?php echo "$hp";?></strong></td>
  </tr>
</table><br />

<table width="800" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="285">Pada Hari : <?php echo "$hari";?></td>
    <td width="280">Tgl. : <?php echo "$tanggal";?></td>
    <td width="235">Pukul : <?php echo "$jam";?></td>
  </tr>
</table>
<div align="justify">Saya terbukti telah melanggar peraturan sekolah berupa :<br />
  <table width="800" border="1" align="center" cellpadding="5" cellspacing="0">
  <tr>
    <td width="4%">NO</td>
    <td width="46%">BENTUK PELANGGARAN</td>
    <td width="10%">BOBOT</td>
    <td width="12%">GURU BK</td>
    <td width="11%">TANGGAL</td>
  </tr>
<?php
$smk=mysqli_query($con,"SELECT * FROM pelanggaran where c_siswa='$id' order by at desc ");$vr=1;while($akh=mysqli_fetch_array($smk)){
$sis=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM siswa where c_siswa='$akh[c_siswa]' "));
$kel=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM kelas where c_kelas='$akh[c_kelas]' "));
$gur=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM guru where c_guru='$akh[c_guru]' "));
$oleh=$gur['nama'];
if(!empty($oleh)){
  $isi=$oleh;
}else{
  $isi='Admin';
}
$ben=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM benpel where c_benpel='$akh[c_benpel]' "));
?>
  <tr>
    <td><div align="center"><?PHP echo "$vr";?></div></td>
    <td><?PHP echo $ben['benpel'];?></td>
    <td><?PHP echo $akh['bobot'];?></td>
    <td><?PHP echo $isi;?></td>
    <td><?PHP echo date("d/m/Y", strtotime($akh['at']));?></td>
  </tr>
<?PHP
$vr++; }
?>
</table>
    <br />
  
  maka saya dengan kesadaran atas kesalahan tersebut bersedia menerima sanksi dari sekolah dan berjanji tidak akan mengulangi kesalahan yang sama, apabila dengan sengaja melakukan pelanggaran  terhadap peraturan sekolah, saya bersedia :</div>
<ol>
	<li>Panggilan Siswa dan Membuat Surat Pernyataan yang diketahui orang tua</li>
	<li>Panggilan Orang Tua dan Membuat Surat Pernyataan yang diketahui Orang tua, Wali Kelas, Guru BK ,Ketua Jurusan dan Kepala Sekolah</li>
    <li>Mengundurkan Diri atau Dikembalikan kepada Orang Tua</li>
</ol>

Demikian surat pernyataan ini saya buat dengan sebenar-benarnya.

<br />
<br />
<br />
<br /></td>
  </tr>
  <tr>
    <td colspan="3"><table width="800" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="576">Mengetahui,<br />
          Yang Menangani Kasus<br />
          <br />
          <br />
          <br />
          <br />
          <?php
          $adm=$_GET['adm'];
          $admin=mysqli_query($con,"select * from guru where c_guru='$adm'");
          $arr=mysqli_fetch_array($admin);
          $nmadmin=$arr['nama'];
          echo "( $nmadmin )";
          ?>
          </td>
        <td width="224">Tuban, <?php echo "$tanggal";?><br />
          Yang Menyatakan<br />
          <br />
          <br />
          <br />
          <br />
          ( <b><?php echo "$nama";?></b> )<br /></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
