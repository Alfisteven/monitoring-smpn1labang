<?php
function upload($fupload_name){
  //direktori file
  $vdir_upload = "../../photo/";
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan file
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
}

function upl($fupload_name){
  //direktori file
  $vdir_upload = "../photo/";
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan file
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
}
?>
