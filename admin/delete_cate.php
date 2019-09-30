<?php 
include_once 'connection.php';
	$cate_id=$_GET['ma'];
	$sql = "delete from categorys where cate_id='$cate_id'";
	if(mysqli_query($conn, $sql)) {
		echo "<script language='javascript'>window.location='index.php?page=danhsachloaisanpham'</script>";
	}
 ?>