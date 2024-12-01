<?php
  if(isset($_POST['input'])){

    foreach($_POST['pilih'] as $item){  
	$kelas=$_POST['c_kelas'];
	  
		if($kelas='Lulus'){
			$simpan=mysqli_query($con,"update siswa set status='$kelas' where c_siswa='$item'");
		}else{
			$simpan=mysqli_query($con,"update siswa set c_kelas='$kelas' where c_siswa='$item'");
		}
    }
	
    if($simpan){
       echo "<script>alert('Kenaikan kelas berhasil dilakukan')</script>";
    }
  }
?>
<div class="row">
  <div class="col-xs-12 col-md-12 col-lg-12">
    <div class="box box-info">
      <div class="box-header with-border">
       <h3 class="box-title">Kenaikan Kelas</h3>
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
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="10%">Naik Ke Kelas : </td>
    <td width="29%"><select name="c_kelas" class="form-control select2" required="">
            		<option disabled="" selected="">Pilih Kelas</option>
	            <?php $opkel=mysqli_query($con,"SELECT * FROM kelas order by kelas asc ");while($dopkel=mysqli_fetch_array($opkel)){ ?>
	              <option value="<?php echo $dopkel['c_kelas']; ?>"><?php echo $dopkel['kelas']; ?></option>
	            <?php } ?>
                <option value="Lulus">Lulus</option>
        </select>    </td>
    <td width="2%">&nbsp;</td>
    <td width="59%">
    <input name="input" type="submit" value="Naik Kelas" class="btn btn-success"/>    </td>
  </tr>
</table>
      </div>
<?php } ?>
      </form>
    </div>
    
  </div>
</div>
<?php } ?>
<?php if($_SESSION['pesan']!=NULL){ $_SESSION['pesan']=''; ?>
<?php } ?>