<?php 
include_once 'connection.php';
	$prom_id=$_GET['ma'];
	$sql = "delete from promotion where prom_id='$prom_id'";
	if(mysqli_query($conn, $sql)) {
		echo "<script language='javascript'>window.location='index.php?page=danhsachkhuyenmai'</script>";
	}
 ?>