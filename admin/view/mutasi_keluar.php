<?php 
if(isset($_GET['q'])){
  $poskelas=mysqli_query($con,"SELECT * FROM kelas where c_kelas='$_GET[q]' ");$dkelas=mysqli_fetch_array($poskelas); 
}
?>
      <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
        <?php if(isset($_SESSION['pesan']) && $_SESSION['pesan']=='edit'){?>
          <div style="display: none;" class="alert alert-success alert-dismissable">Siswa Berhasil Diedit
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          </div>
        <?php } ?>
        <?php if(isset($_SESSION['pesan']) && $_SESSION['pesan']=='hapus'){?>
          <div style="display: none;" class="alert alert-danger alert-dismissable">Mutasi Siswa Berhasil Dihapus
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          </div>
        <?php } ?>
        <?php $_SESSION['pesan'] = '';?>
          <div class="box box-info">
            <div class="box-header with-border">
            <?php if(isset($_GET['q'])){ ?>
              <h3 class="box-title"></span>&nbsp;Seluruh Siswa Kelas <?php echo $dkelas['kelas']; ?></h3>
              <span style="float:right;"> <a href="<?php echo $basead; ?>addsiswa/<?php echo $_GET['q']; ?>" class="btn btn-circle btn-primary"><i class="glyphicon glyphicon-plus"></i> Tambah Siswa</a></span>
              <span style="float:right;"> <a href="<?php echo $basead; ?>impsiswa/<?php echo $_GET['q']; ?>" class="btn btn-circle btn-success"><i class="glyphicon glyphicon-download-alt"></i> Import Siswa</a> &nbsp; &nbsp;</span>
            <?php }else{?>
              <h3 class="box-title"></span>&nbsp;Data Mutasi Keluar</h3>
            <?php } ?>
             <span style="float:right;"><a href="<?php echo $basead; ?>input_mutasikeluar" class="btn btn-circle btn-primary btn-sm"><i class="glyphicon glyphicon-plus"></i> Tambah Mutasi Keluar</a></span>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th width="5%">NO</th>
                  <th>NIS</th>
                  <th>NAMA</th>
                  <th>TGL. MUTASI</th>
                  <th>MENINGGALKAN KELAS</th>
                  <th>KE SEKOLAH</th>
                  <th>AKSI</th>
                </tr>
                </thead>
                <tbody>
<?php
$vr=1;
$smk=mysqli_query($con,"select * from mutasi,siswa where siswa.c_siswa=mutasi.c_siswa and mutasi.jenis='2'");
while($akh=mysqli_fetch_array($smk)){ 
	$SMK=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM kelas where c_kelas='$akh[c_kelas]'"));
?>                
                <tr>
                  <td><?php echo $vr; ?></td>
                  <td><?php echo $akh['nisn']; ?></td>
                  <td><?php echo $akh['nama']; ?></td>
                  <td><?php echo $akh['tgl_mutasi']; ?></td>
                  <td><?php echo $SMK['kelas']; ?></td>
                  <td><?php echo $akh['sekolah']; ?></td>
                  <TD>
                  <a class="btn btn-danger btn-sm" data-target="#hapus<?php echo $akh['c_siswa']; ?>" data-toggle="modal"><i class="glyphicon glyphicon-remove"></i></a>
                  </TD>
                </tr>
<div id="hapus<?php echo $akh['c_siswa']; ?>" class="modal" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Konfirmasi Hapus Mutasi Keluar</h4>
        </div>
        <div class="modal-body">
          <p>Jika Anda Menghapus Data Ini, Akan Berpengaruh Pada</p>
          <b>1. Data Siswa (<?php echo $akh['nama']; ?>) menjadi aktif kembali</b>
        </div>
        <div class="modal-footer">
        
          <a href="<?php echo $basead; ?>a-control/<?php echo md5('hapusmutasikeluar').'/'.$akh['c_siswa']; ?>" class="btn btn-primary btn-circle"><i class="glyphicon glyphicon-ok"></i> Lanjutkan</a> 
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
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->