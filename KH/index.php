<?php if(isset($dataArr_proname)){include_once 'search_proinfo.php';} else { ?>
<div class="banner-agile">
		<div class="container">
			<h2>WELCOME TO</h2>
			<h3>FASHION <span>CLUB</span></h3>
			<p>Suspendisse sed tellus id libero pretium interdum. Suspendisse potenti. Quisque consectetur elit sit amet vehicula tristique. </p>
			<a href="about.html">Read More</a>
		</div>
	</div>
	<!-- banner-bootom-w3-agileits: phan hien thi cac san pham
		giam giá -->
		<div class="banner-bootom-w3-agileits">
			<div class="container">
				<div class="col-md-5 bb-grids bb-left-agileits-w3layouts">
					<a href="women.html"><div class="bb-left-agileits-w3layouts-inner">
						<h3>SALE</h3>
						<h4>upto<span>75%</span></h4>
					</div></a>
				</div>
				<div class="col-md-4 bb-grids bb-middle-agileits-w3layouts">
					<a href="shoes.html"><div class="bb-middle-top">
						<h3>SALE</h3>
						<h4>upto<span>55%</span></h4>
					</div></a>
					<a href="jewellery.html"><div class="bb-middle-bottom">
						<h3>SALE</h3>
						<h4>upto<span>65%</span></h4>
					</div></a>
				</div>
				<div class="col-md-3 bb-grids bb-right-agileits-w3layouts">
					<a href="watches.html"><div class="bb-right-top">
						<h3>SALE</h3>
						<h4>upto<span>50%</span></h4>
					</div></a>
					<a href="handbags.html"><div class="bb-right-bottom">
						<h3>SALE</h3>
						<h4>upto<span>60%</span></h4>
					</div></a>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<!-- end banner-bootom-w3-agileits -->

		<!-- top-products -->
		<div class="top-products">
			<div class="container">
				<h3>Sản phẩm nổi bật</h3>
				<?php 
					//lay cay ngoai troi
					include_once 'connection.php';
					include_once 'function.php';
					$sql_outdoor="select * from products sp join categorys cate on  sp.cate_id=cate.cate_id join pictures pic on sp.pro_id=pic.pro_id where pic.pic_type=0 and cate_name='Ngoài trời'
						LIMIT 8";
					$query_outdoor=mysqli_query($conn, $sql_outdoor);
					$dataArr_outdoor=array();
					while($row=mysqli_fetch_assoc($query_outdoor)){
						$dataArr_outdoor[]=$row;
					}


					//lay cay trong nha
					$sql_indoor="select * from products sp join categorys cate on  sp.cate_id=cate.cate_id join pictures pic on sp.pro_id=pic.pro_id where pic.pic_type=0 and cate_name='Trong nhà'
						LIMIT 8";
					$query_indoor=mysqli_query($conn, $sql_indoor);
					$dataArr_indoor=array();
					while($row=mysqli_fetch_assoc($query_indoor)){
						$dataArr_indoor[]=$row;
					}

					//hien thi cay moi nhat
					$sql_newpro="select * from products sp join pictures pic on sp.pro_id=pic.pro_id where pic.pic_type=0
						ORDER BY sp.pro_id DESC
						LIMIT 8";
					$query_newpro=mysqli_query($conn, $sql_newpro);
					$dataArr_newpro=array();
					while($row=mysqli_fetch_assoc($query_newpro)){
						$dataArr_newpro[]=$row;
					}
					/*echo '<pre>';
					print_r($dataArr_newpro);
					echo '</pre>';*/
				 ?>
				<div class="sap_tabs">			
					<div id="horizontalTab">
						<!-- tieu de cua top propduct -->
						<ul class="resp-tabs-list">
							<li class="resp-tab-item"><span>Ngoài trời</span></li>
							<li class="resp-tab-item"><span>Trong nhà</span></li>
							<li class="resp-tab-item"><span>Mới nhất</span></li>	
													
						</ul>
						<!-- end tieu de cua top propduct -->

						<div class="clearfix"> </div>
						<!-- hien thi san pham cua top product -->	
						<div class="resp-tabs-container">

							<!-- hien thi san pham cho tieu de trong nha -->
							<div class="tab-1 resp-tab-content">
								<?php foreach($dataArr_outdoor as $key_outdoor => $value_outdoor): ?>
								<div class="col-md-3 top-product-grids tp1 animated wow slideInUp" data-wow-delay=".5s">

									
									<a href="?khoatrang=single&ma=<?php echo $value_outdoor['pro_id']; ?>"><div class="product-img">
										<img src="img/product/<?php echo $value_outdoor['pic_name']; ?>" alt="" />
										<!-- chuyen den trang gio hang -->
										<div class="p-mask">
											<form action="#" method="post">
												<!-- mac dinh so luong la 1 khi nhan vao nut them vao gio hang -->
												<input type="hidden" name="sl_sp" value="1" /> 
												<button type="submit" class="w3ls-cart pw3ls-cart"><a class="link-cart" href="main.php?khoatrang=add_to_card&ma=<?php echo $value_outdoor['pro_id'] ?>"><i class="fa fa-cart-plus" aria-hidden="true"></i> Thêm vào giỏ hàng</a></button>
											</form>
										</div>

									<?php 
										$pro_id=$value_outdoor['pro_id'];
										$sql_prom="select prom.prom_percent from products pro join promotion prom on pro.prom_id=prom.prom_id where pro_id=$pro_id ";
										$query_prom=mysqli_query($conn, $sql_prom);
										$prom_percent=mysqli_fetch_assoc($query_prom);

										
									?>
									<?php if(!empty($prom_percent)) { ?>
										<div class="giatri-giamgia">
											<?php echo $prom_percent['prom_percent'].'%'; ?>
										</div>
										<?php } ?>
										<!-- chuyen den trang gio hang -->
									</div></a>
									<h4><?php echo $value_outdoor['pro_name'] ?></h4>
									<h5>
			<?php 
				$gia = $value_outdoor['pro_newprice'];
				echo format_gia($gia);
			?> 
			<?php if(!empty($prom_percent)) { ?>
			<small style='text-decoration: line-through;'><?php $oldprice = $value_outdoor['pro_oldprice']; echo format_gia($oldprice);  ?></small>
			<?php } ?>
									</h5>
									
					
								</div>
								<?php endforeach ?>
									<div class="clearfix"></div>
								</div>
							
							<!-- end hien thi san pham cho tieu de trong nha -->

							<!-- hien thi san pham cho tieu de ngoai troi -->
							<div class="tab-1 resp-tab-content">
								<?php foreach($dataArr_indoor as $key_indoor => $value_indoor): ?>
								<div class="col-md-3 top-product-grids tp1 animated wow slideInUp" data-wow-delay=".5s">

									
									<a href="?khoatrang=single&ma=<?php echo $value_indoor['pro_id']; ?>"><div class="product-img">
										<img src="img/product/<?php echo $value_indoor['pic_name']; ?>" alt="" />
										<!-- chuyen den trang gio hang -->
										<div class="p-mask">
											<form action="#" method="post">
												<!-- mac dinh so luong la 1 khi nhan vao nut them vao gio hang -->
												<input type="hidden" name="sl_sp" value="1" /> 
												<button type="submit" class="w3ls-cart pw3ls-cart"><a class="link-cart" href="main.php?khoatrang=add_to_card&ma=<?php echo $value_indoor['pro_id'] ?>"><i class="fa fa-cart-plus" aria-hidden="true"></i> Thêm vào giỏ hàng</a></button>
											</form>
										</div>

									<?php 
										$pro_id=$value_indoor['pro_id'];
										$sql_prom_indoor="select prom.prom_percent from products pro join promotion prom on pro.prom_id=prom.prom_id where pro_id=$pro_id ";
										$query_prom_indoor=mysqli_query($conn, $sql_prom_indoor);
										$prom_percent_indoor=mysqli_fetch_assoc($query_prom_indoor);

										
									?>
									<?php if(!empty($prom_percent_indoor)) { ?>
										<div class="giatri-giamgia">
											<?php echo $prom_percent['prom_percent'].'%'; ?>
										</div>
										<?php } ?>
										<!-- chuyen den trang gio hang -->
									</div></a>
									<h4><?php echo $value_indoor['pro_name'] ?></h4>
									<h5>
			<?php $gia = $value_indoor['pro_newprice']; echo format_gia($gia); ?> 
			<?php if(!empty($prom_percent_indoor)) { ?>
			<small style='text-decoration: line-through;'><?php $oldprice=$value_indoor['pro_oldprice']; echo format_gia($oldprice); ?></small>
			<?php } ?>
									</h5>
									
					
								</div>
								<?php endforeach ?>
									<div class="clearfix"></div>
								</div>
							<!-- end hien thi san pham cho tieu de ngoai troi-->

							<!-- hien thi san pham cho tieu de sản phẩm mới nhất	 -->
							<div class="tab-1 resp-tab-content">
								<?php foreach($dataArr_newpro as $key_newpro=> $value_newpro): ?>
								<div class="col-md-3 top-product-grids tp1 animated wow slideInUp" data-wow-delay=".5s">

									
									<a href="?khoatrang=single&ma=<?php echo $value_newpro['pro_id']; ?>"><div class="product-img">
										<img src="img/product/<?php echo $value_newpro['pic_name']; ?>" alt="" />
										<!-- chuyen den trang gio hang -->
										<div class="p-mask">
											<form action="#" method="post">
												<!-- mac dinh so luong la 1 khi nhan vao nut them vao gio hang -->
												<input type="hidden" name="sl_sp" value="1" /> 
												<button type="submit" class="w3ls-cart pw3ls-cart"><a class="link-cart" href="main.php?khoatrang=add_to_card&ma=<?php echo $value_newpro['pro_id'] ?>"><i class="fa fa-cart-plus" aria-hidden="true"></i> Thêm vào giỏ hàng</a></button>
											</form>
										</div>

									<?php 
										$pro_id=$value_newpro['pro_id'];
										$sql_prom_newpro="select prom.prom_percent from products pro join promotion prom on pro.prom_id=prom.prom_id where pro_id=$pro_id ";
										$query_prom_newpro=mysqli_query($conn, $sql_prom_newpro);
										$prom_percent_newpro=mysqli_fetch_assoc($query_prom_newpro);

										
									?>
									<?php if(!empty($prom_percent_newpro)) { ?>
										<div class="giatri-giamgia">
											<?php echo $prom_percent_newpro['prom_percent'].'%'; ?>
										</div>
										<?php } ?>
										<!-- chuyen den trang gio hang -->
									</div></a>
									<h4><?php echo $value_newpro['pro_name'] ?></h4>
									<h5>
			<?php $gia=$value_newpro['pro_newprice']; echo format_gia($gia); ?> 
			<?php if(!empty($prom_percent)) { ?>
			<small style='text-decoration: line-through;'><?php $oldprice=$value_newpro['pro_oldprice']; echo format_gia($oldprice); ?></small>
			<?php } ?>
									</h5>
									
					
								</div>
								<?php endforeach ?>
								
									<div class="clearfix"></div>
								</div>
							
							<!-- hien thi san pham cho tieu de sản phẩm mới nhất	 -->

							<!-- hien thi san pham cho tieu de sản phẩm bán cahy5	 -->	
							
							<!-- hien thi san pham cho tieu de sản phẩm bán cahy5	 -->						
						</div>
						<!-- end hien thi san pham cua top product -->	
					</div>
				</div>	
			</div>
		</div>
		<!-- end top-products -->
		<script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
		<script type="text/javascript">
			$(document).ready(function () {
				$('#horizontalTab').easyResponsiveTabs({
				type: 'default', //Types: default, vertical, accordion           
				width: 'auto', //auto or any width like 600px
				fit: true   // 100% fit in a container
			});
			});		
		</script>
		<div class="fandt">
			<div class="container">
				<div class="col-md-6 features">
					<h3>Our Services</h3>
					<div class="support">
						<div class="col-md-2 ficon hvr-rectangle-out">
							<i class="fa fa-user " aria-hidden="true"></i>
						</div>
						<div class="col-md-10 ftext">
							<h4>24/7 online free support</h4>
							<p>Praesent rutrum vitae ligula sit amet vehicula. Donec eget libero nec dolor tincidunt vulputate.</p>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="shipping">
						<div class="col-md-2 ficon hvr-rectangle-out">
							<i class="fa fa-bus" aria-hidden="true"></i>
						</div>
						<div class="col-md-10 ftext">
							<h4>Free shipping</h4>
							<p>Praesent rutrum vitae ligula sit amet vehicula. Donec eget libero nec dolor tincidunt vulputate.</p>
						</div>	
						<div class="clearfix"></div>
					</div>
					<div class="money-back">
						<div class="col-md-2 ficon hvr-rectangle-out">
							<i class="fa fa-money" aria-hidden="true"></i>
						</div>
						<div class="col-md-10 ftext">
							<h4>100% money back</h4>
							<p>Praesent rutrum vitae ligula sit amet vehicula. Donec eget libero nec dolor tincidunt vulputate.</p>
						</div>	
						<div class="clearfix"></div>				
					</div>
				</div>
				<div class="col-md-6 testimonials">
					<div class="test-inner">
						<div class="wmuSlider example1 animated wow slideInUp" data-wow-delay=".5s">
							<div class="wmuSliderWrapper">
								<article style="position: absolute; width: 100%; opacity: 0;"> 
									<div class="banner-wrap">
										<img src="images/c1.png" alt=" " class="img-responsive" />
										<p>Nam elementum magna id nibh pretium suscipit varius tortor. Phasellus in lorem sed massa consectetur fermentum. Praesent pellentesque sapien euismod.</p>
										<h4># Tùng</h4>
									</div>
								</article>
								<article style="position: absolute; width: 100%; opacity: 0;"> 
									<div class="banner-wrap">
										<img src="images/c2.png" alt=" " class="img-responsive" />
										<p>Morbi semper, risus dignissim sagittis iaculis, diam est ornare neque, accumsan risus tortor at est. Vivamus auctor quis lacus sed interdum celerisque.</p>
										<h4># Thắm</h4>
									</div>
								</article>
								<article style="position: absolute; width: 100%; opacity: 0;">
									<div class="banner-wrap">
										<img src="images/c3.png" alt=" " class="img-responsive" />
										<p>Fusce non cursus quam, in hendrerit sem. Nam nunc dui, venenatis vitae porta sed, sagittis id nisl. Pellentesque celerisque  eget ullamcorper vehicula. </p>
										<h4># Giang</h4>
									</div>
								</article>
							</div>
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
			<script src="js/jquery.wmuSlider.js"></script> 
			<script>
				$('.example1').wmuSlider();         
			</script> 
		</div>
		<!-- top-brands -->
		<div class="top-brands">
			<div class="container">
				<h3>Top Brands</h3>
				<div class="sliderfig">
					<ul id="flexiselDemo1">			
						<li>
							<img src="images/4.png" alt=" " class="img-responsive" />
						</li>
						<li>
							<img src="images/5.png" alt=" " class="img-responsive" />
						</li>
						<li>
							<img src="images/6.png" alt=" " class="img-responsive" />
						</li>
						<li>
							<img src="images/7.png" alt=" " class="img-responsive" />
						</li>
						<li>
							<img src="images/46.jpg" alt=" " class="img-responsive" />
						</li>
					</ul>
				</div>
				<script type="text/javascript">
					$(window).load(function() {
						$("#flexiselDemo1").flexisel({
							visibleItems: 4,
							animationSpeed: 1000,
							autoPlay: false,
							autoPlaySpeed: 3000,    		
							pauseOnHover: true,
							enableResponsiveBreakpoints: true,
							responsiveBreakpoints: { 
								portrait: { 
									changePoint:480,
									visibleItems: 1
								}, 
								landscape: { 
									changePoint:640,
									visibleItems:2
								},
								tablet: { 
									changePoint:768,
									visibleItems: 3
								}
							}
						});

					});
				</script>
				<script type="text/javascript" src="js/jquery.flexisel.js"></script>
			</div>
		</div>
		<?php }//end phan tim kiem san pham ?>