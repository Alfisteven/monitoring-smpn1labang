<?php
$id=$_GET['q'];
$input=mysqli_query($con,"delete from penanganan where id='$id'");
	
	if($input){
		echo "<script>document.location='$basead/peringatan'</script>";
	}	
?>