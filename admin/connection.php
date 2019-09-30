<?php 
	$conn = mysqli_connect('localhost', 'root', '', 'begreen')
			or die("Không thể kết nối với CSDL ".mysqli_error());
			mysqli_set_charset($conn,'UTF8');
?>