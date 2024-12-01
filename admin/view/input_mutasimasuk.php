<?php
if(isset($_POST['simpan'])){
	//untuk data siswa baru
  	$c_siswa=random(9); 
  	$tl=date('Y-m-d',strtotime($_POST['tl']));
	$c_kelas=$_POST['kelas'];
	$nisn=$_POST['nisn'];
	$nama=$_POST['nama'];
	$jk=$_POST['jk'];
	$alamat=$_POST['alamat'];
	$ortu=$_POST['ortu'];
	$hp=$_POST['hp'];
	$tinggal=$_POST['tinggal'];
	
	//untuk data mutasi
	$idmutasi=random(9);
	$asal=$_POST['asal'];
	$tanggal=$_POST['tanggal'];
	
 $akh=mysqli_query($con,"INSERT INTO siswa set c_siswa='$c_siswa',c_kelas='$c_kelas',nisn='$nisn',nama='$nama',jk='$jk',alamat='$alamat',tl='$tl',ortu='$ortu',hp='$hp',tinggal='$tinggal',status='Aktif'");
 
 $mutasi=mysqli_query($con,"INSERT INTO mutasi set id_mutasi='$idmutasi',tgl_mutasi='$tanggal',c_siswa='$c_siswa',jenis='1',c_kelas='$c_kelas',sekolah='$asal'");
 
 if($akh && $mutasi){
 	echo "<script>alert('Input Data Mutasi Masuk Berhasil!')</script>";
 	echo "<script>document.location='$basead/mmasuk'</script>";
 }else{
 	echo "<script>alert('Input Data Mutasi Masuk Gagal!')</script>";
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
              <h3 class="box-title">TAMBAH MUTASI MASUK </h3><span style="float:right;"></span>
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
                  <label>NAMA LENGKAP</label>
                  <input type="text" required="" name="nama" class="form-control">
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>ALAMAT LAHIR</label>
                      <input type="text" required="" name="alamat" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>TANGGAL LAHIR</label>
                      <div class="controls input-append date form_date" data-date="1998-10-14" data-date-format="dd MM yyyy" data-link-field="dtp_input1">
                          <input class="form-control" type="text" name="tl" value="" required="">
                          <span class="add-on"><i class="icon-th"></i></span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>JENIS KELAMIN</label>&nbsp;&nbsp;&nbsp;
                  <label><input type="radio" name="jk" value="L"> Laki-Laki</label>&nbsp;&nbsp;
                  <label><input type="radio" name="jk" value="P"> Perempuan</label>
                </div>
               
                <div class="form-group">
                  <label>NAMA ORANG TUA / WALI</label>
                  <input type="text" required="" name="ortu" class="form-control">
                </div>
                <div class="form-group">
                  <label>NO. HP</label>
                  <input type="text" required="" name="hp" class="form-control">
                </div>
                <div class="form-group">
                  <label>ALAMAT TINGGAL</label>
                  <input type="text" required="" name="tinggal" class="form-control">
                </div>
                 <div class="form-group">
                  <label>TGL. MUTASI</label>
                  <input type="date" required="" name="tanggal" class="form-control">
                </div>
                <div class="form-group">
                  <label>ASAL SEKOLAH</label>
                  <input type="text" required="" name="asal" class="form-control">
                </div>
                <div class="form-group">
                  <label>DITERIMA DI KELAS</label>
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
