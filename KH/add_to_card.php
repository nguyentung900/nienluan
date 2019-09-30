
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	
</head>
<body>
	<?php 
	
	
	include_once 'connection.php';
	include_once 'function.php';
	$pro_id = $_GET['ma'];
	
	//echo $_GET['khoatrang'];
	$sql_info_pro = "select * from products pro join pictures pic
	on pro.pro_id=pic.pro_id where pro.pro_id=$pro_id and pic.pic_type='0'";
	$sql_km="select prom.prom_percent from promotion prom join products pro
	on prom.prom_id=pro.prom_id where pro_id=$pro_id";

	$query_info_pro = mysqli_query($conn, $sql_info_pro);
	$query_km = mysqli_query($conn, $sql_km);

	$arrData_info_pro = array();
	$arrData_info_pro[]=mysqli_fetch_assoc($query_info_pro);
	$dataArr_km[]=mysqli_fetch_assoc($query_km);

	//lay
	$cart_id=$arrData_info_pro[0]['pro_id'];
	$pro_amount=$arrData_info_pro[0]['pro_amount'];

		/*echo '<pre>';
		print_r($arrData_info_pro);
		echo '</pre>';

		echo '<pre>';
		print_r($dataArr_km);
		echo '</pre>';*/

		
		if($arrData_info_pro[0]['pro_amount']<1) {
			
			echo '<script>alert("Hết hàng! Bạn có thể chọn mua một sản phẩm khác");location.href="main.php";</script>';
		}
		
		else {
			//neu như them san pham từ trang spchi tiet
			if(isset($_SESSION['tamp'])) {
				$sl_tamp = $_SESSION['tamp'];
				//neu da co gio hàng
				if(isset($_SESSION['cart'][$cart_id])) {
				//neu sl sp hien tai trong kho het
				
					// if($sp_id-$_SESSION['cart'][$cart_id]['cart_qty']<1) {
						if(($_SESSION['cart'][$cart_id]['cart_qty']+$sl_tamp)>$pro_amount) {
						$main='main.php';
						echo '<script>alert("Bạn đã chọn đủ số lượng cho sản phẩm này, hiện đã hết hàng!");location.href="main.php?khoatrang=shopping-cart";</script>';
						unset($_SESSION['tamp']);

					}
					else {
						$_SESSION['cart'][$cart_id]['cart_qty']+=$sl_tamp;
						echo '<script>location.href="main.php?khoatrang=shopping-cart";</script>';
						unset($_SESSION['tamp']);
					}

				}
			//neu chua co gio hang
				else {
					$_SESSION['cart'][$cart_id]['cart_id'] =$cart_id;
					$_SESSION['cart'][$cart_id]['cart_name'] = $arrData_info_pro[0]['pro_name'];
					$_SESSION['cart'][$cart_id]['cart_pic'] = $arrData_info_pro[0]['pic_name'];
					$_SESSION['cart'][$cart_id]['cart_qty']=$sl_tamp;
					$_SESSION['cart'][$cart_id]['cart_gia']=$arrData_info_pro[0]['pro_newprice'];

					if(!empty($dataArr_km)) {
						$_SESSION['cart'][$cart_id]['cart_km']=$dataArr_km[0]['prom_percent'];
					}
					echo '<script>location.href="main.php?khoatrang=shopping-cart";</script>';
					unset($_SESSION['tamp']);

				}

			}
			//nguoc lai them san pham tu cac trang khac
			else {
				//neu ton tai gio hang
				if(isset($_SESSION['cart'][$cart_id])) {
				//
					if($pro_amount-$_SESSION['cart'][$cart_id]['cart_qty']<1) {
						//$main='main.php';
						echo '<script>alert("Bạn đã chọn đủ số lượng cho sản phẩm này, hiện đã hết hàng!");location.href="main.php?khoatrang=shopping-cart";</script>';

					}
					else {
						$_SESSION['cart'][$cart_id]['cart_qty']++;
						echo '<script>location.href="main.php?khoatrang=shopping-cart";</script>';
					}

				}
			//neu chua co gio hang
				else {
					$_SESSION['cart'][$cart_id]['cart_id'] =$cart_id;
					$_SESSION['cart'][$cart_id]['cart_name'] = $arrData_info_pro[0]['pro_name'];
					$_SESSION['cart'][$cart_id]['cart_pic'] = $arrData_info_pro[0]['pic_name'];
					$_SESSION['cart'][$cart_id]['cart_qty']=1;
					$_SESSION['cart'][$cart_id]['cart_gia']=$arrData_info_pro[0]['pro_newprice'];

					if(!empty($dataArr_km)) {
						$_SESSION['cart'][$cart_id]['cart_km']=$dataArr_km[0]['prom_percent'];
					}
					echo '<script>location.href="main.php?khoatrang=shopping-cart";</script>';

			} //end dieu them vao gio hang khi k ton tai gio hang, them lan dau
		}
		}//end dieu kien het hang


		?>
	</body>
	</html>