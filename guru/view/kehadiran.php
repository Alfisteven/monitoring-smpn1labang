<?php
  if(isset($_POST['input'])){

    foreach($_POST['pilih'] as $item){  
      //generate no pelanggaran otomatis
      $c_pelanggaran=random(4);
      $c_guru=$_SESSION['c_guru'];

      //ambil tanggal
      $tgl=$_POST['tanggal'];
      $tg=date('H:i:s');
      $tanggal=$tgl.' '.$tg;

      //mencari bentuk pelanggaran dan bobot
      $ab=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM benpel where c_benpel='LBUjYfx7X' ")); 
        $bobot=$ab['bobot'];
      //mencari kelas siswa
      $ak=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM siswa where c_siswa='$item' "));
        $c_kelas=$ak['c_kelas'];

      $simpan=mysqli_query($con,"INSERT INTO pelanggaran set c_pelanggaran='$c_pelanggaran',c_siswa='$item',c_kelas='$c_kelas',c_benpel='LBUjYfx7X',bobot='$bobot',c_guru='$c_guru',at='$tanggal',tp='$tp' ");
     }
    
      if($simpan){
       echo "<script>alert('Ketidakhadiran berhasil dimasukkan')</script>";
      }
      
  }
?>
<div class="row">
  <div class="col-xs-12 col-md-12 col-lg-12">
    <div class="box box-info">
      <div class="box-header with-border">
       <h3 class="box-title">Cari Siswa</h3>
       	<div class="pull-right box-tools">
         	<button class="btn btn-default btn-xs" data-widget="collapse" data-toggle="tooltip" title="Sembunyikan/Tampilkan">
          <i class="glyphicon glyphicon-minus"></i></button>
       	</div>
      </div>
      <div class="box-body">
      <form action="" method="post" enctype="multipart/form-data">
      	<div class="row">
      		<div class="col-md-3 col-xs-12">
      			<div class="form-group">
              <select name="c_kelas" class="form-control select2" required="">
            		<option disabled="" selected="">Pilih Kelas</option>
	            <?php $opkel=mysqli_query($con,"SELECT * FROM kelas order by kelas asc ");while($dopkel=mysqli_fetch_array($opkel)){ ?>
	              <option value="<?php echo $dopkel['c_kelas']; ?>"><?php echo $dopkel['kelas']; ?></option>
	            <?php } ?>
            	</select>
            </div>
      		</div>
          <div class="col-md-2 col-xs-12">
      			<div class="form-group">
                <input name="tanggal" type="date" class="form-control"/>
            </div>
      		</div>
      		<div class="col-md-2 col-xs-12">
      			<div class="form-group">
                <input name="cari" type="submit" value="Cari ..." class="btn btn-success"/>
            </div>
      		</div>
      	</div>
      </form>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-xs-12 col-md-12 col-lg-12">
    <div class="box box-info">
      <div class="box-header with-border">
      <?php
	  if(isset($_POST['cari'])){
	  $k=$_POST['c_kelas'];
    $tanggal=$_POST['tanggal'];
	  $data=mysqli_query($con, "select * from kelas where c_kelas='$k'");
	  $kel=mysqli_fetch_array($data);
	  ?>
       Hasil Pencarian Dari Kelas <b><?php echo $kel['kelas']; ?></b>
      </div>
      <form action="" method="post" enctype="multipart/form-data">
      <div class="box-body">
       	<table class="table table-bordered table-hover">
         	<thead>
          <tr>
            <th>NAMA</th>
            <th>OPSI</th>
          </tr>
          </thead>
          <tbody>
<?php $smk=mysqli_query($con,"SELECT * FROM siswa where c_kelas='$k' and status='Aktif' order by nama asc ");$vr=1;$jumakh=mysqli_num_rows($smk);
      if($jumakh>NULL){
        while($akh=mysqli_fetch_array($smk)){ ?>                
          <tr>
            <td><?php echo $akh['nama']; ?></td>
            <td><label><input type="checkbox" name="pilih[]" value="<?php echo $akh['c_siswa']; ?>">&nbsp;Pilih Siswa</label></td>
          </tr>
        <?php $vr++; }
      }else{
        echo '<tr><td colspan="3">Tidak Ada Data</td</tr>';
      }?> 
          </tbody>
       </table>
    	</div>
<?php if($jumakh>NULL){ ?>
      <div class="box-footer">
        <input type="hidden" name="tanggal" value="<?php echo $tanggal?>">
        <input name="input" type="submit" value="Input Ketidakhadiran" class="btn btn-success"/>
      </div>
<?php } ?>
      </form>
    </div>
    
  </div>
</div>
<?php } ?>
<?php if($_SESSION['pesan']!=NULL){ $_SESSION['pesan']=''; ?>
<?php } ?>