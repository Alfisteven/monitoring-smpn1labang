<?php
$tgl=$_GET['per'];
require '../../php/config.php'; require '../../php/function.php';
session_start();
if(empty($_SESSION['c_admin'])){header('location:'.$base.'');}
?>
<html>
<head>
	<title>Rekap Pelanggaran Siswa</title>
</head>
<body onLoad="javascript:window.print()">
<div align="center"><strong>SELURUH PELANGGARAN SISWA<br />
  ( TANGGAL <?php echo "$tgl";?> )
  </strong><br />
  <br />
</div>
<table width=95% border="1" align="center" cellpadding="5">
                <thead>
                <tr>
                  <th width="5%">NO</th>
                  <th width="25%">NAMA SISWA</th>
                  <th width="15%">TANGGAL</th>
                  <th width="60%">PELANGGARAN</th>
                  <th width="15%">POIN</th>
                </tr>
                </thead>
                <tbody>
<?php 
  $smk=mysqli_query($con,"SELECT * from pelanggaran,siswa where pelanggaran.c_siswa=siswa.c_siswa and at like '%$tgl%'");
  $vr=1;
while($akh=mysqli_fetch_array($smk)){
  $kls=$akh['c_kelas'];
  $kelas=mysqli_fetch_array(mysqli_query($con,"select * from kelas where c_kelas='$kls'"));
  $langgar=$akh['c_benpel'];
  $benpel=mysqli_fetch_array(mysqli_query($con,"select * from benpel where c_benpel='$langgar'"));
?>
                <tr>
                  <td><?php echo $vr; ?></td>
                  <td><?php echo $akh['nama']; ?><br>(<?php echo $kelas['kelas']?>)</td>
                  <td><?php echo $akh['at']; ?></td>
                  <td><?php echo $benpel['benpel']; ?></td>
                  <td align="center"><?php echo $akh['bobot']; ?></td>
                </tr>

<?php $vr++; } ?>
                </tbody>
              </table>
</body>
</html>