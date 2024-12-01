<?php
if(isset($_POST['simpan'])){
	//untuk data siswa baru
	$c_kelas=$_POST['kelas'];
	$nisn=$_POST['nisn'];
	
	//untuk data mutasi
	$idmutasi=random(9);
	$asal=$_POST['asal'];
	$tanggal=$_POST['tanggal'];
	
	$cari=mysqli_fetch_array(mysqli_query($con,"select * from siswa where nisn='$nisn' and c_kelas='$c_kelas'"));
	$idsiswa=$cari['c_siswa'];
	//cek validasi data nis dan kelas
	if(!empty($idsiswa)){
		 $mutasi=mysqli_query($con,"INSERT INTO mutasi set id_mutasi='$idmutasi',tgl_mutasi='$tanggal',c_siswa='$idsiswa',jenis='2',c_kelas='$c_kelas',sekolah='$asal'");
		 $siswa=mysqli_query($con,"update siswa set status='Mutasi' where c_siswa='$idsiswa'");
		 
		 if($siswa && $mutasi){
 			echo "<script>alert('Input Data Mutasi Keluar Berhasil!')</script>";
 			echo "<script>document.location='$basead/mkeluar'</script>";
 		}else{
 			echo "<script>alert('Input Data Mutasi Masuk Gagal!')</script>";
		}
	}else{
		echo "<script>alert('Tidak ada siswa dengan NISN itu pada kelas tersebut')</script>";
	}
}
?>
<div class="row">
        <!-- left column -->
        <div class="col-md-12">
        <?php if(isset($_SESSION['pesan']) && $_SESSION['pesan']=='tambah'){?>
          <div style="display: none;" class="alert alert-success alert-dismissable">Siswa Berhasil Ditambahkan
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          </div>
        <?php } $_SESSION['pesan'] = '';?>
          <!-- general form elements -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">TAMBAH MUTASI KELUAR </h3><span style="float:right;"></span>
            </div>
            <!-- form start -->
            <form role="form" method="post" enctype="multipart/form-data" action="">
            <input type="hidden" name="c_kelas" value="<?php echo $_GET['q']; ?>">
              <div class="box-body">
                <div class="form-group">
                  <label>NIS</label>
                  <input type="text" required="" name="nisn" class="form-control">
                </div>
                <div class="form-group">
                  <label>TGL. MUTASI</label>
                  <input type="date" required="" name="tanggal" class="form-control">
                </div>
                <div class="form-group">
                  <label>MENINGGALKAN KELAS</label>
                  <select name="kelas" id="select" class="form-control">
                    <option value="--">-- Pilih Kelas --</option>
                    <?php
					$data=mysqli_query($con,"select * from kelas order by kelas asc");
					while($arr=mysqli_fetch_array($data)){
					$id=$arr['c_kelas'];
					$nama=$arr['kelas'];
					?>
                    <option value="<?php echo "$id";?>"><?php echo "$nama";?></option>
                    <?php
					}
					?>
                  </select>
                </div>
                <div class="form-group">
                  <label>KE SEKOLAH</label>
                  <input type="text" required="" name="asal" class="form-control">
                </div>
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-success btn-circle" name="simpan"><i class="glyphicon glyphicon-ok"></i> Simpan Siswa</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
</div>
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
