<?PHP
require '../../php/config.php'; require '../../php/function.php';
$tp=$_GET['tp'];
$q=$_GET['kelas'];
$poskelas=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM kelas where c_kelas='$q' "));
$dkelas=strtoupper($poskelas['kelas']); 
?>
<body onLoad="javascript:window.print()">
<div align="center">
LAPORAN<br>
KETIDAKHADIRAN SISWA KELAS <?php echo "$dkelas";?><br>
TAHUN PELAJARAN <?php echo "$tp";?><br>
<br>
<br>
</div>
<table width="100%" border="1" cellspacing="1" cellpadding="5">
  <tr>
    <td width="3%">NO.</td>
    <td width="17%">NIS</td>
    <td width="51%">NAMA</td>
    <td width="18%">JML. KETIDAKHADIRAN</td>
    <td width="11%">POIN</td>
  </tr>
  <?PHP
   $smk=mysqli_query($con,"SELECT * FROM siswa where c_kelas='$q' and status='Aktif' order by nama asc ");
   $vr=1;while($akh=mysqli_fetch_array($smk)){ $kk=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM kelas where c_kelas='$akh[c_kelas]' ")); 
$jpe=mysqli_num_rows(mysqli_query($con,"SELECT * from pelanggaran where c_siswa='$akh[c_siswa]' and tp='$tp' AND c_benpel='LBUjYfx7X'"));
$p=mysqli_fetch_array(mysqli_query($con,"SELECT sum(bobot) as p from pelanggaran where c_siswa='$akh[c_siswa]' and tp='$tp' AND c_benpel='LBUjYfx7X'")); 
?>
  <tr>
    <td><?php echo $vr; ?>.</td>
    <td><?php echo $akh['nisn']; ?></td>
    <td><?php echo strtoupper($akh['nama']); ?></td>
    <td><?php echo $jpe; ?> Kali</td>
    <td align="center"><?php echo $p['p']; ?></td>
  </tr>
  <?php 
  $vr++; 
  } 
  ?>
</table>
</body>