<?php
$tp=$_GET['tp'];
require '../../php/config.php'; require '../../php/function.php';
session_start();
if(empty($_SESSION['c_admin'])){header('location:'.$base.'');}
?>
<html>
<head>
	<title>Seluruh Pelanggaran Siswa <?php echo "$tp";?></title>
</head>
<body onLoad="javascript:window.print()">
<div align="center"><strong>SELURUH PELANGGARAN SISWA<br />
  TAHUN PELAJARAN <?php echo "$tp";?>
  </strong><br />
  <br />
</div>
<table width="85%" border="1" align="center" cellpadding="5" cellspacing="0">
  <tr>
    <td width="4%">NO</td>
    <td width="17%">SISWA</td>
    <td width="46%">BENTUK PELANGGARAN</td>
    <td width="10%">BOBOT</td>
    <td width="12%">GURU BK</td>
    <td width="11%">TANGGAL</td>
  </tr>
<?php
$smk=mysqli_query($con,"SELECT * FROM pelanggaran where tp='$tp' order by at desc ");$vr=1;while($akh=mysqli_fetch_array($smk)){
$sis=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM siswa where c_siswa='$akh[c_siswa]' "));
$kel=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM kelas where c_kelas='$akh[c_kelas]' "));
$gur=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM admin where c_admin='$akh[c_guru]' "));
$oleh=$gur['nama'];
$ben=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM benpel where c_benpel='$akh[c_benpel]' "));
?>
  <tr>
    <td><div align="center"><?PHP echo "$vr";?></div></td>
    <td><?php echo $sis['nama'].'<br>'.$kel['kelas'];?></td>
    <td><?PHP echo $ben['benpel']?></td>
    <td><?PHP echo $akh['bobot'];?></td>
    <td><?PHP echo $oleh;?></td>
    <td><?PHP echo date("d/m/Y", strtotime($akh['at']));?></td>
  </tr>
<?PHP
$vr++; }
?>
</table>
</body>
</html>