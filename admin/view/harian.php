    <div class="row">
      <div class="col-xs-12 col-md-12 col-lg-12">
      <form method="POST" name="form1">
        <input type="date" class="form-control" name="tanggal"><br>
        <input type="submit" class="btn btn-success" name="lihat" value="Tampilkan">
      </form>
      <br><br>
    </div><br><br>

    <?php
    if(isset($_POST['lihat'])){
      $tgl=$_POST['tanggal'];
    ?>
    </div>
      <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
          <div class="box box-info">
            <div class="box-header  with-border">
              <h3 class="box-title"></span>&nbsp;Laporan Pelanggaran</h3>
            </div>
            
            <!-- /.box-header -->
            <div class="box-body table-responsive">
            <a href="print/harian.php?per=<?php echo "$tgl";?>" target="blank"><h3><i class="glyphicon glyphicon-print"></i></h3></a>
              <table id="example1" class="table table-bordered table-hover">
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
                  <td><?php echo $akh['bobot']; ?></td>
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
      <?php
      }
      ?>