<?php 
// menghubungkan dengan library excel reader
include "excel_reader2.php";

//melakukan upload ketika tombol diklik
if(isset($_POST['upload'])){
// upload file xls
$target = basename($_FILES['filesiswa']['name']) ;
move_uploaded_file($_FILES['filesiswa']['tmp_name'], $target);

// beri permisi agar file xls dapat di baca
chmod($_FILES['filesiswa']['name'],0777);

// mengambil isi file xls
$data = new Spreadsheet_Excel_Reader($_FILES['filesiswa']['name'],false);
// menghitung jumlah baris data yang ada
$jumlah_baris = $data->rowcount($sheet_index=0);

// jumlah default data yang berhasil di import
$berhasil = 0;
for ($i=2; $i<=$jumlah_baris; $i++){

	// menangkap data dan memasukkan ke variabel sesuai dengan kolumnya masing-masing
    $id     = $data->val($i, 1);
    $kelas = $_GET['q'];
	$nis  = $data->val($i, 2);
    $nama = $data->val($i, 3);
    $jenkel     = $data->val($i, 4);
	$tempat  = $data->val($i, 5);
	$tanggal = $data->val($i, 6);
    $ortu     = $data->val($i, 7);
	$hp  = $data->val($i, 8);
	$alamat = $data->val($i, 9);
	if($nama != "" && $id != "" ){
		// input data ke database (table data_pegawai)
		$masuk=mysqli_query($con,"INSERT into siswa values('$id','$kelas','$nis','$nama','$jenkel','$tempat','$tanggal','$ortu','$hp','$alamat')");
		$berhasil++;
	}
}
//echo "$id $kelas $nis $nama $jenkel $tempat $tanggal $ortu $hp $alamat";
if($masuk){
    // hapus kembali file .xls yang di upload tadi
    unlink($_FILES['filesiswa']['name']);

    // alihkan halaman ke index.php dan munculkan pesan
    echo "<script>alert('Siswa Berhasil Diimport')</script>";
    echo "<script>document.location='../siswa/$kelas'</script>";
}
}
?>

<form method="post" enctype="multipart/form-data" action="">
	Pilih File: 
	<input name="filesiswa" type="file" required="required" class="form-control"> 
	<input name="upload" type="submit" value="Import Data Siswa" class="btn btn-success">
</form>
<br>
Unduh Format Excel : <a href="../importsiswa/data_siswa.xls" target="blank">Di Sini</a>