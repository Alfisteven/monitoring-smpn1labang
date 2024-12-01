<?php
$id=$_GET['q'];
$data=mysqli_query($con,"select * from siswa where c_siswa='$id'");
$arr=mysqli_fetch_array($data);
$nis=$arr['nisn'];
$nama=$arr['nama'];

if(isset($_POST['simpan'])){
	$poin=$_POST['point'];
  $tl=date('Y-m-d',strtotime($_POST['tanggal']));
	$pembina=$_POST['pembina'];
  $jenis=$_POST['jenis'];
	$lokasi_file    = $_FILES['fupload']['tmp_name'];
  	$tipe_file      = $_FILES['fupload']['type'];
  	$nama_file      = $_FILES['fupload']['name'];
  	upl($nama_file);
	
	$input=mysqli_query($con,"insert into penanganan (c_siswa,jenis,pembinaan,tanggal,c_guru,photo) values ('$id','$jenis','$poin','$tl','$pembina','$nama_file')");
	
	if($input){
		echo "<script>document.location='$basead/peringatan'</script>";
	}	
}
?>
<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">INPUT DATA PEMBINAAN</h3>
            </div>
<form method="post" enctype="multipart/form-data" >
              <div class="box-body">
              	<div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>NIS</label>
                      <input type="text" required="" name="nis" class="form-control" value="<?php echo $nis;?>" readonly>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>NAMA</label>
                          <input class="form-control" type="text" name="nama" value="<?php echo $nama;?>" readonly>
                      </div>
                    </div>
                  </div>
                               
                <div class="form-group">
                  <label>POINT PEMBINAAN</label>
                  <textarea name="point" cols="" rows="6" class="form-control"></textarea>
                </div>
                
                <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                    <label>JENIS PEMBINAAN</label>
                    <select name="jenis" class="form-control">
                        <option value="">Pilih Jenis</option>
                        <option value="SP1">Surat Peringatan 1</option>
                        <option value="SP2">Surat Peringatan 2</option>
                        <option value="SP3">Surat Peringatan 3</option>
                        <option value="Home Visit">Home Visit</option>
                        <option value="Pengunduran Diri">Pengunduran Diri</option>
                      </select>
                      </div>
                    </div>
                  
                <div class="col-md-4">
                    <div class="form-group">
                      <label>TANGGAL</label>
                      <div class="controls input-append date form_date" data-date="1998-10-14" data-date-format="dd MM yyyy" data-link-field="dtp_input1">
                          <input class="form-control" type="text" name="tanggal" value="" required="">
                          <span class="add-on"><i class="icon-th"></i></span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>PEMBINA</label>
                      <select name="pembina" class="form-control">
                        <option value="">Pilih Pembina</option>
                        <?php
							$data=mysqli_query($con,"select * from guru");
							while($arr=mysqli_fetch_array($data)){
							$idg=$arr['c_guru'];
							$nama=$arr['nama'];
						?>
                        <option value="<?php echo "$idg";?>"><?php echo "$nama";?></option>
                        <?php
						}
						?>
                      </select>
                    </div>
                  </div>
                  </div>
                  
                <div class="form-group">
                  <label>FILE PENDUKUNG</label>
                  <input name="fupload" type="file" class="form-control">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <input name="simpan" type="submit" class="btn btn-success btn-circle" value="Simpan">
              </div>
            </form>
<!-- jQuery 2.2.3 -->
<script src="<?php echo $base; ?>theme/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script type="text/javascript" src="<?php echo $base; ?>theme/datetime/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="<?php echo $base; ?>theme/datetime/js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
<script type="text/javascript">
    $('.form_datetime').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn:  1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    forceParse: 0,
        showMeridian: 1
    });
  $('.form_date').datetimepicker({
        weekStart: 1,
        todayBtn:  1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    minView: 2,
    forceParse: 0
    });
  $('.form_time').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 1,
    minView: 0,
    maxView: 1,
    forceParse: 0
    });
</script>
