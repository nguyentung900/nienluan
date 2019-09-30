<?php 
session_start();
include 'connection.php';
$cartqty = $_POST['cartqty'];
$cartid = $_POST['cartid'];
$sql = "select pro_amount from products where pro_id=$cartid";
$query = mysqli_query($conn, $sql);
$sp_sl=mysqli_fetch_assoc($query);
$sp_sl=$sp_sl['pro_amount'];

if($cartqty<=$sp_sl) {
	if($cartqty>$_SESSION['cart'][$cartid]['cart_qty']) {
		$cartqty = $cartqty-$_SESSION['cart'][$cartid]['cart_qty'];
		$_SESSION['cart'][$cartid]['cart_qty'] +=$cartqty;
	}
	else if($cartqty<$_SESSION['cart'][$cartid]['cart_qty']) {
		$cartqty = $_SESSION['cart'][$cartid]['cart_qty']-$cartqty;
		$_SESSION['cart'][$cartid]['cart_qty'] -=$cartqty;
	}
	else if($cartqty==$_SESSION['cart'][$cartid]['cart_qty']){
		$_SESSION['cart'][$cartid]['cart_qty']=$cartqty;
	}
}

?>
		

<!-- endgiỏ hàng -->
<div class="content-cart" id="giohangn">
	<?php 
		/*echo '<pre>';
		print_r($_SESSION['cart']);
		echo '</pre>';*/
		include_once 'function.php';
	 ?>
	<div class="container">
		<?php 
			if(@count(@$_SESSION['cart'])>0) {

			
		 ?>
		<div class="row">
			<h3 style="padding-top:20px; padding-bottom: 20px;" class="text-left">Giỏ hàng(<span style="font-size: 13px; font-weight: bold"><?php echo count($_SESSION['cart']) ?> sản phẩm</span>)</h3>

			<div class="col-md-9 leftcart">
					<table style="border:none !important" class="table table-striped">
						<thead>
							<tr>
								<th>STT</th>
								<th>Sản phẩm</th>
								<th>Hình ảnh</th>
								<th>Số lượng</th>
								<th>Giá</th>
								<th>Thao tác</th>
							</tr>
						</thead>
						<tbody id="list">

							<?php $i=1; $total_price=array(); foreach($_SESSION['cart'] as $key => $value): ?>
							<tr class="line">
								<td style=" padding-top:29px"><?php echo $i; ?></td>
								<td style=" padding-top:29px"><?php echo $value['cart_name'] ?></td>
								<td>
									<img style="object-fit: cover;width: 100px !important" src="img/product/<?php echo $value['cart_pic'] ?>" alt="" width="100px" height="100px">
								</td>
								<?php  ?>
								<td style="width: 100px !important; padding-top:29px">
									<input data-cartid="<?php echo $value['cart_id']  ?>" style="width: 90%" type="number" name="cartqty" id="cartqty2" value="<?php echo $value['cart_qty'] ?>" class="form-control cartqty" min="1">
								</td>
								<td style="width: 100px !important; text-align: center !important; padding-top:29px">
									<div class="row">
										<div style="font-weight: bold" class="col-md-12"><?php
										
										$qty = $value['cart_qty'];
										$gia = $value['cart_gia']*$qty;
										$total_price[$key]=$gia;

									 //$gia = $value['cart_gia'];
										$gia1 = substr($gia, 0, 3);
										$gia1_7 = substr($gia, 0, 1);
										$gia1_8 = substr($gia, 0, 2);
										$gia2 = substr($gia, 3, 3);
										$gia2_7 = substr($gia, 1, 3);
										$gia2_8 = substr($gia, 2, 3);
										//$gia3 = substr($gia, 6, 3);
										$gia3_7 = substr($gia, 4, 3);
										$gia3_8 = substr($gia, 5, 3);

										//hang chuc5 nghin
										$gia1_5 = substr($gia, 0, 2);
										$gia2_5 = substr($gia, 2);

										//hàng nghìn
										
										if(strlen($gia)==6){
											$gia = $gia1.' '.$gia2.'đ';
										}
										else if(strlen($gia)==7) {
											$gia = $gia1_7.' '.$gia2_7.' '.$gia3_7.'đ';
										}
										else if(strlen($gia)==8) {
											$gia = $gia1_8.' '.$gia2_8.' '.$gia3_8.'đ';
										}
										else if(strlen($gia)==5) {
											$gia = $gia1_5.' '.$gia2_5;
										}
										else if(strlen($gia)==4) {
											$gia = $gia;
										}
										echo $gia;
										?></div>
										<?php
										
										
										$km = $value['cart_km']; 
										if($value['cart_km']!="") {
											echo '<div style="text-decoration: line-through;" class="col-md-12">'.$gia.'</div>
											<div style="color: red" class="col-md-12">-'.$km.'%</div>';
										}

										?>

									</div>
								</td>
								<td style=" padding-top:29px">
									<button data-cartid="<?php echo $value['cart_id']  ?>" type="" name="btndelete" class="btn btn-danger delete" id="">Xóa</button>
								</td>
							</tr>
						<?php $i++; endforeach ?>
					</tbody>
					</table>
			</div>

			<div style="background: #8080801f; padding: 7px" class="col-md-3 cart-pay-right">
				<div class="cart-wrap">
					<p style="margin-right: 109px !important;" class="tamtinh">Tạm tính:</p>
					<p style="font-weight: bold" class="tamtinh2">
						<?php
						

							$gia=0;
							foreach($total_price as $key => $value) {
								$gia += $value;
							}
							$gia;
							 $gia1 = substr($gia, 0, 3);
										$gia1_7 = substr($gia, 0, 1);
										$gia1_8 = substr($gia, 0, 2);
										$gia2 = substr($gia, 3, 3);
										$gia2_7 = substr($gia, 1, 3);
										$gia2_8 = substr($gia, 2, 3);
										//$gia3 = substr($gia, 6, 3);
										$gia3_7 = substr($gia, 4, 3);
										$gia3_8 = substr($gia, 5, 3);

										//hang chuc5 nghin
										$gia1_5 = substr($gia, 0, 2);
										$gia2_5 = substr($gia, 2);

										//hàng nghìn
										
										if(strlen($gia)==6){
											$gia = $gia1.' '.$gia2.'đ';
										}
										else if(strlen($gia)==7) {
											$gia = $gia1_7.' '.$gia2_7.' '.$gia3_7.'đ';
										}
										else if(strlen($gia)==8) {
											$gia = $gia1_8.' '.$gia2_8.' '.$gia3_8.'đ';
										}
										else if(strlen($gia)==5) {
											$gia = $gia1_5.' '.$gia2_5;
										}
										else if(strlen($gia)==4) {
											$gia = $gia;
										}
							echo $gia;

						 ?>
					</p>
					<div class="clearfix"></div>
					<hr class="cart-pay-line">
					<p class="thanhtien">Thành tiền</p>
					<p class="thanhtien2"><?php echo $gia; ?></p>
				</div>
				<div class="cart-but">
					<a href="main.php?khoatrang=thongtingiaohang">
						<button type="" class="cart-right-pay-but">Tiến hành thanh toán</button>
					</a>
				</div>
			</div>

		</div>
	<?php } else {

		echo '<script>location.href="main.php?khoatrang=emptycart";</script>';
	} ?>

	</div>
</div>
<script>
	
		$('.cartqty').click(function() {
				$.ajax({
					url: 'update_peo_cart.php',
					type: 'POST',
					dataType: 'html',
					data: {
						cartqty: $(this).val(),
						cartid:$(this).attr('data-cartid')
					//cartid: $(this).val()
				}
				
				//alert("test");
			})
				.done(function() {
				//console.log("success");
				//$('#list').html(data);
			})
				.fail(function() {
					console.log("error");
				})
				.always(function(data) {

					$('#giohangn').html(data);
					//return true;
				 //location.reload();
				});

	});

	//xoa
	$('.delete').click(function() {
				$.ajax({
					url: 'delete_pro_cart_ajax.php',
					type: 'POST',
					dataType: 'html',
					data: {
						//cartqty: $(this).val(),
						cartid:$(this).attr('data-cartid')
					//cartid: $(this).val()
				}
				
				//alert("test");
			})
				.done(function() {
				//console.log("success");
				//$('#list').html(data);
			})
				.fail(function() {
					console.log("error");
				})
				.always(function(data) {

					$('#giohangn').html(data);
					//return true;
				 //location.reload();
				});

	});
	
</script>
<!-- endgiỏ hàng -->


