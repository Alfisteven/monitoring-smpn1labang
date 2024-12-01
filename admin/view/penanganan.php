   
      <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
          <div class="box box-info">
            <div class="box-header  with-border">
              <h3 class="box-title"></span>&nbsp;Laporan Penanganan Siswa</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
            <a href="print/penanganan.php" target="blank"><h3><i class="glyphicon glyphicon-print"></i></h3></a>
              <table id="example1" class="table table-bordered table-hover" width="100%">
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
                  <td><a href="../photo/<?php echo "$foto";?>" target="_blank"><img src="../photo/<?php echo "$foto";?>" height="50"></a></td>
                </tr>
<?php $vr++; } ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->