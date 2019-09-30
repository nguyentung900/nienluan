<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php session_start();
	include_once 'function.php'; 
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Fashion Club an Ecommerce Online Shopping Category  Flat Bootstrap responsive Website Template | Home :: w3layouts</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Fashion Club Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- css -->
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" media="all" />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<!--// css -->
	<!-- font -->
	<link href="//fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
	<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
	<!-- //font -->
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.js"></script>
	<!--flex slider-->
	<script defer src="js/jquery.flexslider.js"></script>
	<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
	<script>
	// Can also be used with $(document).ready()
	$(window).load(function() {
		$('.flexslider').flexslider({
			animation: "slide",
			controlNav: "thumbnails"
		});
	});
</script>
<!--flex slider-->

<script src="js/imagezoom.js"></script>
</head>

<body>
	<!-- header-top-w3layouts -->
	<div class="header-top-w3layouts">
		<div class="container">
			<div class="col-md-6 logo-w3">
				<a href="?khoatrang=index"><img src="img/logo.png" alt=" " /><h1>BeGreen</h1></a>
			</div>
			<div class="col-md-6 phone-w3l">
				<ul>
					<li><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span></li>
					<li>+18045403380</li>
				</ul>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<!-- #header-top-w3layouts -->

	<div class="header-bottom-w3ls">
		<!-- #container of menu -->
		<div class="container">
			<!-- #COLUMN 1 OF MENU -->
			<div class="col-md-6 navigation-agileits">
				<!-- nav, menu -->
				<nav class="navbar navbar-default">
					<div class="navbar-header nav_2">
						<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div> 
					<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
						<ul class="nav navbar-nav ">
							<li class="active n"><a href="index.html" class="hyper "><span>Trang chủ</span></a></li>	
							<!-- dong hồ cho nam -->
							<li class="dropdown n">
								<!-- dong hồ cho nam -->
								<a href="#" class="dropdown-toggle  hyper" data-toggle="dropdown" ><span>Sản phẩm<b class="caret"></b></span></a>
								<ul class="dropdown-menu multi">
									<div class="row">

										<div class="col-sm-4">
											<h4 class="menu-title-price">Khoảng giá</h4>
											<ul class="multi-column-dropdown">
												<?php 
												$dataArr_price=array('Dưới 100', '100 -200', '200-300', 'Trên 300');
												foreach($dataArr_price as $value_price):
												 ?>
												<li><a href="?khoatrang=sanpham_gia01&ma=<?php echo $value_price ?>"><i class="fa fa-angle-right" aria-hidden="true"></i><?php echo $value_price ?></a></li>
												<?php endforeach ?>
											</ul>
										</div>

										<div class="col-sm-4">
											<h4 class="menu-title-price">Loại cây</h4>
											<?php 
												include_once 'connection.php';
												$sql_cate="select cate_name from categorys";
												$query_cate=mysqli_query($conn, $sql_cate);
												while($row=mysqli_fetch_assoc($query_cate)){
													$cate_name[]=$row;
												}
													/*echo '<pre>';
													print_r($cate_name);
													echo '</pre>';*/
											 ?>
											<ul class="multi-column-dropdown">
												<?php foreach($cate_name as $value_catename): ?>
												<li><a href="?khoatrang=sanpham_thuong_hieu01<?php echo $value_catename['cate_name'] ?>&ma=<?php echo $value_catename['cate_name'] ?>"><i class="fa fa-angle-right" aria-hidden="true"></i><?php echo $value_catename['cate_name'] ?></a></li>
												<?php endforeach ?>
											</ul>						
										</div>

										<div class="col-sm-4 w3l">
											<a href="women.html"><img src="img/banner/bg06.jpg" class="img-responsive" alt=""></a>
										</div>
										<div class="clearfix"></div>
									</div>	
								</ul>
							</li>
							<!-- end dong hồ cho nam -->

							<!-- đồng hồ cho nữ -->
							
							<!--end  dong hồ cho nam -->
							<li class="n"><a href="?khoatrang=about" class="hyper"><span>Giới thiệu</span></a></li>
							<li class="n"><a href="?khoatrang=blog" class="hyper"><span>Tin tức</span></a></li>
							<li class="n"><a href="?khoatrang=contact" class="hyper"><span>Liên hệ</span></a></li>
						</ul>
					</div>
				</nav>
				<!-- end nav, menu -->
			</div>
			<!-- #end COLUMN 1 OF MENU -->
			<script>
				$(document).ready(function(){
					$(".dropdown").hover(            
						function() {
							$('.dropdown-menu', this).stop( true, true ).slideDown("fast");
							$(this).toggleClass('open');        
						},
						function() {
							$('.dropdown-menu', this).stop( true, true ).slideUp("fast");
							$(this).toggleClass('open');       
						}
						);
				});
			</script>
			<?php 
				$pro_name="";
				if(isset($_POST['btnSearch'])) {
					//echo 'nguyen thanh tungeee';
					$pro_name=trim($_POST['Search']);
					$sql_proname="select * from products pro join pictures pic on pro.pro_id=pic.pro_id where pic.pic_type=0 and(  pro_name like '%$pro_name%' or  pro_newprice like '%$pro_name%' or  pro_color like '%$pro_name%')";
					$query_proname=mysqli_query($conn, $sql_proname);
					$dataArr_proname=array();
					while($row=mysqli_fetch_assoc($query_proname)){
						$dataArr_proname[]=$row;
					}
					/*echo '<pre>';
					print_r($dataArr_proname);
					echo '</pre>';*/
				}
			 ?>	
			<!-- #FORM SERACH -->		
			<div class="col-md-4 search-agileinfo">
				<form action="#" method="post">
					<input type="search" name="Search" placeholder="Tìm kiếm sản phẩm ..." required="">
					<button type="submit" name="btnSearch" class="btn btn-default search" aria-label="Left Align">
						<i class="fa fa-search" aria-hidden="true"> </i>
					</button>
				</form>
			</div>
			<!-- #END FORM SERACH -->	

			<!-- #CARD SHOP -->
			<div class="col-md-2 cart-wthree">
				<div class="row">
					<div class="col-md-5">
						<div class="cart"> 
							<!-- <form action="#" method="post" class="last"> --> 
								<!-- <input type="hidden" name="cmd" value="_cart" />
									<input type="hidden" name="display" value="1" /> -->
									<a class="link-cart2" href="?khoatrang=shopping-cart"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i><a/>
									<?php
										@$pro_amount_incart=count($_SESSION[cart]);
									 	if(isset($_SESSION['cart']) and $pro_amount_incart>0) {
									 ?>
										<div class="sl-sp-cart">
											<?php echo @count($_SESSION[cart]); ?>
										</div>
									<?php } ?>
										<!-- </form> -->
									</div>
								</div>
								<div class="col-md-2">
									<?php if(isset($_SESSION['acc']) and $_SESSION['acc']['acc_role']==1){ ?>
									<a href="main.php?khoatrang=logout"><i class="fas fa-user-circle icon-login" aria-hidden="true"></i></a>
									<span id="name_acc"><?php echo $_SESSION['acc']['acc_fullname']; ?></span>
									<?php } else if(isset($_SESSION['acc']) and $_SESSION['acc']['acc_role']==0) { ?>
									<a href="main.php?khoatrang=logout"><i class="fas fa-user-circle icon-login" aria-hidden="true"></i></a>
									<span id="name_acc"><?php echo 'Admin'; ?></span>
									<?php } else { ?>
										<a href="main.php?khoatrang=login"><i class="fas fa-user-circle icon-login" aria-hidden="true"></i></a>
									<?php } ?>
								</div>
							</div>


						</div>
						<!-- #END CARD SHOP -->
						<div class="clearfix"></div>
					</div>

					<!-- #end container of menu -->
				</div>
				<!-- end header-bottom-w3l -->

	<!-- phần load nd vao day -->
	<?php 
						//include_once 'DanhSachND.php';

						if(isset($_GET['khoatrang'])){
							$khoatrang = $_GET['khoatrang'];

							if($khoatrang == 'shopping-cart'){
								include_once 'shopping-cart.php';
							}
							if($khoatrang == 'add_to_card'){
								include_once 'add_to_card.php';
							}
							if($khoatrang == 'thongtingiaohang'){
								include_once 'thongtingiaohang.php';
							}
							if($khoatrang == 'emptycart'){
								include_once 'emptycart.php';
							}
							if($khoatrang == 'logout'){
								include_once 'logout.php';
							}
							else if($khoatrang == 'login') {
								include_once 'login.php';
							}
							else if($khoatrang == 'updateAcc') {
								include_once 'updateAcc.php';
							}
							else if($khoatrang == 'sanpham_gia01') {
								include_once 'sanpham/sanpham_gia01.php';
							}
							else if($khoatrang == 'sanpham_gia02') {
								include_once 'sanpham/sanpham_gia01.php';
							}
							else if($khoatrang == 'sanpham_gia03') {
								include_once 'sanpham/sanpham_gia01.php';
							}
							else if($khoatrang == 'sanpham_gia04') {
								include_once 'sanpham/sanpham_gia01.php';
							}



							else if($khoatrang == 'sanpham_thuong_hieu01') {
								include_once 'sanpham/sanpham_thuong_hieu01.php';
							}
							else if($khoatrang == 'sanpham_thuong_hieu02') {
								include_once 'sanpham/sanpham_thuong_hieu01.php';
							}
							else if($khoatrang == 'sanpham_thuong_hieu03') {
								include_once 'sanpham/sanpham_thuong_hieu01.php';
							}
							else if($khoatrang == 'sanpham_thuong_hieu04') {
								include_once 'sanpham/sanpham_thuong_hieu01.php';
							}
							




							else if($khoatrang == 'blog') {
								include_once 'blog.php';
							}
							else if($khoatrang == 'contact') {
								include_once 'contact.php';
							}
							else if($khoatrang == 'about') {
								include_once 'about.php';
							}
							else if($khoatrang == 'register') {
								include_once 'register.php';
							}
							else if($khoatrang == 'single') {
								include_once 'single.php';
							}
							else if($khoatrang == 'index') {
								include_once 'index.php';
							}
							else if($khoatrang == 'thanhtoan') {
								include_once 'thanhtoan.php';
							}
							
						}
						else {
							if(isset($dataArr_proname)) {
								include_once 'search_proinfo.php';
							}
							else {
								include_once 'index.php';
							}
						}
					 ?>
						<!-- trang loai san pham -->
					 <?php 
					 	if(isset($_GET['khoatrang'])){
					 		$khoatrang=$_GET['khoatrang'];
					 		foreach($cate_name as $value_catename_kt){
					 			if($khoatrang=='sanpham_thuong_hieu01'.$value_catename_kt['cate_name']){
					 				include_once 'sanpham/sanpham_thuong_hieu01.php';
					 			}
					 		}
					 	}
					  ?>

					  <!-- trang size giá san pham---------------------------------- -->
					  <?php 
					 	if(isset($_GET['khoatrang'])){
							$khoatrang = $_GET['khoatrang'];

					 		$sql_size="select size_name from size";
					 		$query_size=mysqli_query($conn, $sql_size);
					 		while($row=mysqli_fetch_assoc($query_size)){
					 			$dataArr_size_kt[]=$row;
					 		}
					 		/*echo '<pre>';
					 		print_r($dataArr_size);
					 		echo '</pre>';*/
					 		foreach($dataArr_size_kt as $value_size){
					 			if($khoatrang=='sanpham_gia01'.$value_size['size_name']){
					 				include_once 'sanpham/sanpham_gia01_size.php';
					 			}
					 		}


					 	}
					  ?>
					  <!-- end trang size san pham -->


					  <!-- trang maàu giá san pham------------------------------- -->
					  <?php 
					 	if(isset($_GET['khoatrang'])){
							$khoatrang = $_GET['khoatrang'];

							$sql_pro_color="select distinct pro_color from products";
							$query_pro_color=mysqli_query($conn, $sql_pro_color);
							while($row=mysqli_fetch_assoc($query_pro_color)){
								$dataArr_pro_color_kt[]=$row;
							}
					 		/*echo '<pre>';
					 		print_r($dataArr_size);
					 		echo '</pre>';*/
					 		foreach($dataArr_pro_color_kt as $value_color){
					 			if($khoatrang=='sanpham_gia01'.$value_color['pro_color']){
					 				include_once 'sanpham/sanpham_gia01_mau.php';
					 			}
					 		}


					 	}
					  ?>
					  <!-- end trang mau san pham -->


					  <!-- trang hoa giá
					   san pham----------------------------- -->
					  <?php 
					 	if(isset($_GET['khoatrang'])){
							$khoatrang = $_GET['khoatrang'];

							$dataArr_flower=array(0, 1);
					 		/*echo '<pre>';
					 		print_r($dataArr_size);
					 		echo '</pre>';*/
					 		foreach($dataArr_flower as $value_flower){
					 			if($khoatrang=='sanpham_gia01'.$value_flower){
					 				include_once 'sanpham/sanpham_gia01_flower.php';
					 			}
					 		}

					 	}
					  ?>
					  <!-- end trang hoa san pham -->



					 <!--  LOAI SAN PHAM --------------------------------------------->
					 <!-- trang size giá san pham---------------------------------- -->
					  <?php 
					 	if(isset($_GET['khoatrang'])){
							$khoatrang = $_GET['khoatrang'];

					 		$sql_size="select size_name from size";
					 		$query_size=mysqli_query($conn, $sql_size);
					 		while($row=mysqli_fetch_assoc($query_size)){
					 			$dataArr_size_kt[]=$row;
					 		}
					 		/*echo '<pre>';
					 		print_r($dataArr_size);
					 		echo '</pre>';*/
					 		foreach($dataArr_size_kt as $value_size){
					 			if($khoatrang=='sanpham_thuong_hieu01'.$value_size['size_name']){
					 				include_once 'sanpham/sanpham_thuong_hieu_size.php';
					 			}
					 		}


					 	}
					  ?>
					  <!-- end trang size san pham -->


					  <!-- trang maàu giá san pham------------------------------- -->
					  <?php 
					 	if(isset($_GET['khoatrang'])){
							$khoatrang = $_GET['khoatrang'];

							$sql_pro_color="select distinct pro_color from products";
							$query_pro_color=mysqli_query($conn, $sql_pro_color);
							while($row=mysqli_fetch_assoc($query_pro_color)){
								$dataArr_pro_color_kt[]=$row;
							}
					 		/*echo '<pre>';
					 		print_r($dataArr_size);
					 		echo '</pre>';*/
					 		foreach($dataArr_pro_color_kt as $value_color){
					 			if($khoatrang=='sanpham_thuong_hieu01'.$value_color['pro_color']){
					 				include_once 'sanpham/sanpham_thuong_hieu_mau.php';
					 			}
					 		}


					 	}
					  ?>
					  <!-- end trang mau san pham -->


					  <!-- trang hoa giá
					   san pham----------------------------- -->
					  <?php 
					 	if(isset($_GET['khoatrang'])){
							$khoatrang = $_GET['khoatrang'];

							$dataArr_flower=array(0, 1);
					 		/*echo '<pre>';
					 		print_r($dataArr_size);
					 		echo '</pre>';*/
					 		foreach($dataArr_flower as $value_flower){
					 			if($khoatrang=='sanpham_thuong_hieu01'.$value_flower){
					 				include_once 'sanpham/sanpham_thuong_hieu_flower.php';
					 			}
					 		}

					 	}
					  ?>
					  <!-- end trang hoa san pham -->
	<!-- end phần load nd vao day -->


	<div class="footer">
		<div class="container">
			<div class="col-md-3 footer-grids fgd1">
				<a href="index.html"><img src="images/logo2.png" alt=" " /><h3>FASHION<span>CLUB</span></h3></a>
				<ul>
					<li>1234k Avenue, 4th block,</li>
					<li>New York City.</li>
					<li><a href="mailto:info@example.com">info@example.com</a></li>
					<a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
					<a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a>
					<a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
					<a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
				</ul>
			</div>
			<div class="col-md-3 footer-grids fgd2">
				<h4>Information</h4> 
				<ul>
					<li><a href="contact.html">Contact Us</a></li>
					<li><a href="icons.html">Web Icons</a></li>
					<li><a href="typography.html">Typography</a></li>
					<li><a href="faq.html">FAQ's</a></li>
				</ul>
			</div>
			<div class="col-md-3 footer-grids fgd3">
				<h4>Shop</h4> 
				<ul>
					<li><a href="jewellery.html">Jewellery</a></li>
					<li><a href="cosmetics.html">Cosmetics</a></li>
					<li><a href="Shoes.html">Shoes</a></li>
					<li><a href="deos.html">Deos</a></li>
				</ul>
			</div>
			<div class="col-md-3 footer-grids fgd4">
				<h4>Tài khoản</h4> 
				<ul>
					<?php if(isset($_SESSION['acc'])){ ?>
					<li><a href="main.php?khoatrang=updateAcc&ma=<?php echo $_SESSION['acc']['acc_id']; ?>">Cập nhật</a></li>
					<li><a href="main.php?khoatrang=logout">Đăng xuất</a></li>
				<?php }else{ ?>
					<li><a href="main.php?khoatrang=login">Đăng nhập</a></li>
					<li><a href="main.php?khoatrang=register">Đăng ký</a></li>
				<?php } ?>
				</ul>
			</div>
			<div class="clearfix"></div>
			<p class="copy-right">© 2016 Fashion Club . All rights reserved | Design by <a href="http://w3layouts.com"> W3layouts.</a></p>
		</div>
				</div>
				<!-- cart-js -->
				<!-- <script src="js/minicart.js"></script> -->
				<script>
					w3ls1.render();

					w3ls1.cart.on('w3sb1_checkout', function (evt) {
						var items, len, i;

						if (this.subtotal() > 0) {
							items = this.items();

							for (i = 0, len = items.length; i < len; i++) {
								items[i].set('shipping', 0);
								items[i].set('shipping2', 0);
							}
						}
					});
				</script>  
				<!-- //cart-js --> 
				<script src="js/menu.js"></script> 
			</body>
			</html>