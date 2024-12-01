<?php if(isset($_GET['q'])){ $s=str_replace("_", " ", $_GET['q']); }else{$s='@';}
$sea=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM siswa where c_siswa='$s' or nama like'%$s%' ")); 
$kelas=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM kelas where c_kelas='$sea[c_kelas]' ")); 
$pel=mysqli_num_rows(mysqli_query($con,"SELECT * FROM pelanggaran where c_siswa='$sea[c_siswa]' ")); 
$totalpel=mysqli_fetch_array(mysqli_query($con,"SELECT sum(bobot) as total FROM pelanggaran where c_siswa='$sea[c_siswa]' ")); $wali=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM orangtua where c_siswa='$sea[c_siswa]' ")); 
?>
<div class="judul">Hasil Pencarian Dari <?php echo $s.' '; if($sea==NULL){echo 'Tidak Ada Data';} ?> </div>
<?php if($sea!=NULL and isset($_GET['q'])){ ?>
<div class="row">
  <div class="col-md-4">
          <!-- Widget: user widget style 1 -->
    <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
      <div class="widget-user-header bg-green">
        <div class="widget-user-image">
          <img class="img-square" src="" alt="User Avatar">
        </div>
              <!-- /.widget-user-image -->
        <h4 class="widget-user-username" style="font-size: 20px;"><?php echo $sea['nama']; ?></h4>
        <h5 class="widget-user-desc"><?php echo $kelas['kelas']; ?></h5>
        <h5 class="widget-user-desc"><?php echo $sea['alamat'].', '.tgl($sea['tl']); ?></h5>
        <h5 class="widget-user-desc"><?php if($sea['jk']=='L'){echo 'Laki - Laki';}elseif($sea['jk']=='P'){echo 'Perempuan';} ?></h5>
      </div>
      <div class="box-footer no-padding">
        <ul class="nav nav-stacked">
          <li><a>Total Pelanggaran <span style="font-size: 20px;margin-top:-3px;color: #428bca;" class="pull-right"><?php echo $pel; ?></span></a><li>
          <li><a>Poin Pelanggaran <span style="font-size: 20px;margin-top:-3px;color: #d9534f;" class="pull-right"><?php if($totalpel['total']>0){echo $totalpel['total'];}else{echo "0";} ?></span></a></li>
          
        </ul>
      </div>
    </div>
          <!-- /.widget-user -->
  </div>
  <div class="col-xs-12 col-md-8 col-lg-8">
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">&nbsp;Pelanggaran <?php echo $sea['nama'] ?></h3>
      </div>
      <div class="box-body">
        <table id="example3" class="table table-hover">
          <thead>
            <tr>
              <td>NO</td>
              <td>PELANGGARAN</td>
              <td>GAMBAR</td>
              <td>B</td>
              <td>OLEH</td>
              <td>PADA</td>
            </tr>
          </thead>
          <tbody>
<?php $smk=mysqli_query($con,"SELECT * FROM pelanggaran where c_siswa='$sea[c_siswa]' order by at desc ");$vr=1;while($akh=mysqli_fetch_array($smk)){
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
              <td><?php echo $vr; ?></td>
              <td><?php echo $ben['benpel']; ?></td>
              <td><a class="btn" data-target="#sanksi<?php echo $akh['c_pelanggaran']; ?>" data-toggle="modal"><img src="../../photo/<?php echo $akh['photo']; ?>" height="50" width="50"/></a></td>
              <td><?php echo $akh['bobot']; ?></td>
              <td><?php echo $isi; ?></td>
              <td><?php echo date("d/m/Y", strtotime($akh['at'])); ?></td>
            </tr>
            <div id="sanksi<?php echo $akh['c_pelanggaran']; ?>" class="modal" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Bukti Pelanggan / Pembinaan</h4>
        </div>
        <div class="modal-body">
        <img src="../../photo/<?php echo $akh['photo']; ?>" width="570"/>
        </div>
        <div class="modal-footer">
          <button class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Tutup</button>
        </div>
        </div>
    </div>
</div>
<?php $vr++; } ?>
          
          

          </tbody>
        </table>
      </div>
            <!-- /.box-body -->
  </dsiv>
</div>
</div>
<?php } ?>
