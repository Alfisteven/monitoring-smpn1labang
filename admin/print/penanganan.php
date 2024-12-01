<?php
require '../../php/config.php'; require '../../php/function.php';
session_start();
if(empty($_SESSION['c_admin'])){header('location:'.$base.'');}
?>
<html>
<head>
	<title>Rekap Penanganan Siswa</title>
</head>
<body onLoad="javascript:window.print()">
<div align="center"><strong>LAPORAN PENANGANAN SISWA<br />
 
  </strong><br />
  <br />
</div>
<table width="90%" border="1" align="CENTER" cellpadding="5">
                <thead>
                <tr>
                  <th>NO</th>
                  <th>NAMA</th>
                  <th>TANGGAL</th>
                  <th>JENIS</th>
                  <th>PEMBINAAN</th>
                  <th>PEMBINA</th>
                  <th>BUKTI</th>
                </tr>
                </thead>
                <tbody>
<?php 
  $smk=mysqli_query($con,"SELECT * from penanganan,siswa where penanganan.c_siswa=siswa.c_siswa");
  $vr=1;
while($akh=mysqli_fetch_array($smk)){
  $kls=$akh['c_kelas'];
  $gur=$akh['c_guru'];
  $foto=$akh['photo'];
  $kelas=mysqli_fetch_array(mysqli_query($con,"select * from kelas where c_kelas='$kls'"));
  $guru=mysqli_fetch_array(mysqli_query($con,"select * from guru where c_guru='$gur'"));
?>
                <tr>
                  <td width="5%"><?php echo $vr; ?></td>
                  <td><?php echo $akh['nama']; ?><br>(<?php echo $kelas['kelas']?>)</td>
                  <td><?php echo $akh['tanggal']; ?></td>
                  <td><?php echo $akh['jenis']; ?></td>
                  <td><?php echo $akh['pembinaan']; ?></td>
                  <td><?php echo $guru['nama']?></td>
                  <td><img src="../../photo/<?php echo "$foto";?>" height="50"></td>
                </tr>
<?php $vr++; } ?>
                </tbody>
              </table>
</body>
</html>