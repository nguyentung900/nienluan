<?php 
	include_once 'connection.php';
	$pro_id=$_GET['ma'];
	//echo $pro_id;
	
	//lay thong tin san pham theo $pro_id: thong tin san pham, thong tin size
	$sql_pro="select * from products pro join categorys cate on pro.cate_id=cate.cate_id join size s on s.size_id=pro.size_id where pro_id=$pro_id";
	$query_pro=mysqli_query($conn, $sql_pro);
	$pro_info=mysqli_fetch_assoc($query_pro);

	//lay hình của sanpham theo pro_id
	$sql_pic="select pic_name, pic_type from pictures where pro_id=$pro_id";
	$query_pic=mysqli_query($conn, $sql_pic);
	while($row=mysqli_fetch_assoc($query_pic)){
		$pro_pic[]=$row;
	}

	//lay thong tin giam gia cua sanpham theo pro_id
	$sql_prom="select prom_percent, prom_gift, prom_day_start, prom_day_end  from products pro join promotion prom on pro.prom_id=prom.prom_id where pro_id=$pro_id";
	$query_prom=mysqli_query($conn, $sql_prom);
	$pro_prom=mysqli_fetch_assoc($query_prom);
	
		/*echo '<pre>';
		print_r($pro_info);
		echo '</pre>';*/
	//echo $sp_sl=$pro_info['pro_amount'];
	//them so luong san pham vao gio hang tai trang single
	$sl="";
	if(isset($_POST['btnspct'])) {
		//echo 'echo nhan submit mua sp ne';
		$sl = trim($_POST['sl_sp']);
		$sp_id=$pro_info['pro_id'];
		$sp_sl=$pro_info['pro_amount'];

		if($sp_sl==0){
			echo "<script>alert('Đã hết hàng!');</script>";
		
		} else if($sp_sl < $sl){
			echo "<script>alert('Không đủ số lượng trong kho!');</script>";
		}
		else{
		$_SESSION['tamp']=$sl;
		echo "<script>
			location.href='main.php?khoatrang=add_to_card&ma=".$sp_id."';
		</script>";
		}
		//header('location:main.php?khoatrang=add_to_card');
	}
	
 ?>	
	<div class="products">	 
		<div class="container">  
			<div class="single-page">
				<div class="single-page-row" id="detail-21">
					<div class="col-md-6 single-top-left">	
						<div class="flexslider">
							<ul class="slides">
								<?php foreach($pro_pic as $value_pic): ?>
								<li data-thumb="img/product/<?php echo $value_pic['pic_name'] ?>">
									<div class="thumb-image detail_images"> <img style="object-fit: cover" src="img/product/<?php echo $value_pic['pic_name'] ?>" data-imagezoom="true" class="img-responsive" alt=""> </div>
								</li>
							<?php endforeach ?>
							</ul>
						</div>
					</div>
					<div class="col-md-6 single-top-right">
						<h3 class="item_name"> <?php echo $pro_info['pro_name'] ?> </h3>
						<form action="#" method="post" class="form-inline">
							<p>Loại sản phẩm: <?php echo $pro_info['cate_name'] ?></p>
							<p>Kích thước: <?php echo $pro_info['size_name'] ?></p>
							<p>Màu sản phẩm: <?php echo $pro_info['pro_color'] ?></p>
							<p>Số lượng: <input required="" type="number" name="sl_sp" id="sl_sp" value="1" class="form-control input-sl"></p>
						<!-- <div class="single-rating">
							<ul>
								<li class="rating">20 reviews</li>
								<li><a href="#">Add your review</a></li>
							</ul> 
						</div> -->
						<div class="single-price">
							<ul>
								<li><?php echo $pro_info['pro_newprice'].'đ' ?></li>
								 <?php if(!empty($pro_prom)){ ?>
								<li><del><?php echo $pro_info['pro_oldprice'].'đ' ?></del></li> 
								<li><span class="w3off"><?php echo $pro_prom['prom_percent'] ?>% giảm giá</span></li> 
							<?php } ?>
								<!-- <li>Ends on: Oct,15th</li> -->
								
							</ul>	
						</div> 
						<p class="single-price-text"><?php echo $pro_info['pro_titlecontent'] ?></p>
						
						<button type="submit" name="btnspct" class="w3ls-cart" ><i class="fa fa-cart-plus" aria-hidden="true"></i> Thêm vào giỏ hàng</button>

					</form>
						<!-- <button class="w3ls-cart w3ls-cart-like"><i class="fa fa-heart-o" aria-hidden="true"></i> Add to Wishlist</button>
						-->					</div>
						<div class="clearfix"> </div>  
					</div>
				</div>
			</div> <!-- end col-md-6 single-top-right -->
			<hr class="describe-detail-line">
			<!-- mô tả chi tiet san pham và phản hồi khach hàng ve san pham -->
			<div class="describe-detail">
				<div class="container">
					<div class="row describe-pro">
						<div class="col-md-6">
							<h4 class="describe-pro-title">Mô tả sản phẩm</h4>
							<p> <span class="describe-pro-cont"><?php echo $pro_info['pro_detailcontent'] ?></p>
						</div>
						<div class="col-md-6"></div>
					</div>

					<div class="row feback-pro">
						<div class="col-md-10">
							<h4 class=" describe-pro-title">Đánh giá sản phẩm</h4>
							<div class="row">
								<p>
									<form>
										<div class="col-md-6 w3agile_newsletter_right">
											<form action="#" method="post">
												<input type="text" name="phanhoi" value=""  required="">
												<input type="submit" value="Gửi" />
											</form>
										</div>
									</form>
								</p>
							</div>
							<div class="row">
								<h6 class="modal-title"><span class="avt-bar"><img class="img-fluid" src="https://images.pexels.com/photos/260447/pexels-photo-260447.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt=""></span>Chiêu Thái</h6>
								<p class="cmt-text"><span class="describe-pro-cont"></span >phan hoi san phphaphan hoi san phphan hoi san pha phan hoi san pha phan hoi san phaann hoi san pha phan hoi san pha phan hoi san phaan</p>
							</div>
							<div class="row">
								<h6 class="modal-title"><span class="avt-bar"><img class="img-fluid" src="https://images.pexels.com/photos/260447/pexels-photo-260447.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt=""></span>Chiêu Thái</h6>
								<p class="cmt-text"><span class="describe-pro-cont"></span >phan hoi san phphaphan hoi san phphan hoi san pha phan hoi san pha phan hoi san phaann hoi san pha phan hoi san pha phan hoi san phaan</p>
							</div>
							<div class="row">
								<h6 class="modal-title"><span class="avt-bar"><img class="img-fluid" src="https://images.pexels.com/photos/260447/pexels-photo-260447.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt=""></span>Chiêu Thái</h6>
								<p class="cmt-text"><span class="describe-pro-cont"></span >phan hoi san phphaphan hoi san phphan hoi san pha phan hoi san pha phan hoi san phaann hoi san pha phan hoi san pha phan hoi san phaan</p>
							</div>
						</div>
					</div>
				</div>
			</div> <!-- end describe-detail  -->
		</div>
		
	