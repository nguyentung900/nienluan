

	<?php include_once 'connection.php'; 
	@include_once '../sanpham/function.php'; 
		$cate_name=$_GET['ma'];
		$khoatrang=$_GET['khoatrang'];
	?>
	<!-- banner trang men_gia.html -->	
	<div class="sub-banner my-banner3">
	</div>
	<!--end banner trang men_gia.html -->
	<div class="content">
		<div class="container">
			<?php if(isset($dataArr_proname)){include_once 'search_proinfo.php';} else { ?>
			<!-- cot 1: danh muc tim kiem thao mau, size -->
			<div class="col-md-4 w3ls_dresses_grid_left">
				<div class="w3ls_dresses_grid_left_grid">
					<h3>Màu</h3>
					<div class="w3ls_dresses_grid_left_grid_sub">
						<div class="ecommerce_dres-type">
					<?php 
						$sql_pro_color="select distinct pro_color from products";
						$query_pro_color=mysqli_query($conn, $sql_pro_color);
						while($row=mysqli_fetch_assoc($query_pro_color)){
							$dataArr_pro_color[]=$row;
						}
						/*echo '<pre>';
						print_r($dataArr_pro_color);
						echo '</pre>';*/
					?>
							<ul>
								<?php foreach($dataArr_pro_color as $value_procolor): ?>
									<li><a href="main.php?khoatrang=sanpham_thuong_hieu01<?php echo $value_procolor['pro_color'] ?>&ma=<?php echo $cate_name ?>"><?php echo $value_procolor['pro_color'] ?></a></li>
								<?php endforeach ?>
							</ul>
						</div>
					</div>
				</div>
				<div class="w3ls_dresses_grid_left_grid">
					<h3>Có hoa?</h3>
					<div class="w3ls_dresses_grid_left_grid_sub">
						<div class="ecommerce_color">
							<ul>
								<li><a href="main.php?khoatrang=sanpham_thuong_hieu011&ma=<?php echo $cate_name ?>"><i></i>Có hoa</a></li>
								<li><a href="main.php?khoatrang=sanpham_thuong_hieu010&ma=<?php echo $cate_name ?>"><i></i>Không có hoa</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="w3ls_dresses_grid_left_grid">
					<h3>Size</h3>
					<div class="w3ls_dresses_grid_left_grid_sub">
						<div class="ecommerce_color ecommerce_size">
							<?php 
								$sql_size="select size_name from size";
								$query_size=mysqli_query($conn, $sql_size);
								while($row=mysqli_fetch_assoc($query_size)){
									$dataArr_size[]=$row;
								}
							 ?>
							<ul>
								<?php foreach($dataArr_size as $value_size): ?>
								<li><a href="main.php?khoatrang=sanpham_thuong_hieu01<?php echo $value_size['size_name'] ?>&ma=<?php echo $cate_name ?>"><?php echo $value_size['size_name']; ?></a></li>
								<?php endforeach ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<!-- end cot 1: danh muc tim kiem thao mau, size -->
			

			<?php 
				$cate_name;
				$khoatrang;
				//lay ra ten size, vd: Nhỏ	
				$size_name=trim(substr($khoatrang, 21));

				//lay pro_size
				$sql_sizename="select size_id from size where size_name='$size_name'";
				$query_sizeid=mysqli_query($conn, $sql_sizename);
				$size_id=mysqli_fetch_assoc($query_sizeid);
				//
				$size_id=$size_id['size_id'];
				//$cate_name.' '.$khoatrang;
				
				//lay ten mang3 loai cay
				$sql_cate="select cate_name from categorys";
				$query_cate=mysqli_query($conn, $sql_cate);
				$dataArr_catename=array();
				while($row=mysqli_fetch_assoc($query_cate)){
					$dataArr_catename[]=$row;
				}
				/*echo '<pre>';
				print_r($dataArr_catename);
				echo '</pre>';*/
				
				//lap mang3 loai cay
				foreach ($dataArr_catename as $value_catename) {
					//echo $value_catename;
					//neu ten loai cay trog mang bang cate_name tu72 url
					if($value_catename['cate_name']==$cate_name) {
						foreach($dataArr_size as $value_prosize_toload){
							//$value_prosize_toload=$value_procolor_toload['pro_color'];
							if($value_prosize_toload['size_name']==$size_name){
								$sql_sizename_toload="select * from products pro join categorys cate on  pro.cate_id=cate.cate_id join pictures pic on pro.pro_id=pic.pro_id where pic.pic_type=0 and cate_name='$cate_name' and size_id='$size_id'";
							}
							
						}
						
					}
				}
				$query_prosize_toload=mysqli_query($conn, $sql_sizename_toload);
				$dataArr_prosize_toload=array();
				while($row=mysqli_fetch_assoc($query_prosize_toload)){
					$dataArr_prosize_toload[]=$row;
				}
					/*echo '<pre>';
					print_r($dataArr_procolor_toload);
					echo '</pre>';*/
				
			 ?>
			<!-- cột 2: cột hiển thị san phẩm theo loại, màu -->
			<div class="col-md-8 col-sm-8 women-dresses">
				<div class="women-set1">
					<?php if(!empty($dataArr_prosize_toload)) { ?>
					<?php foreach($dataArr_prosize_toload as $key_loadpro => $value_loadpro): ?>
					<div class="col-md-4 mb-3 women-grids wp2 animated wow slideInUp" data-wow-delay=".5s">
						<a href="main.php?khoatrang=single&ma=<?php echo $value_loadpro['pro_id']; ?>"><div class="product-img">
							<img src="img/product/<?php echo $value_loadpro['pic_name'] ?>" alt="" />
							<!-- chuyen den trang gio hang -->
							<div class="p-mask">
								<form action="#" method="post">
									<!-- mac dinh so luong la 1 khi nhan vao nut them vao gio hang -->
									<input type="hidden" name="sl_sp" value="1" /> 
									<button type="submit" class="w3ls-cart pw3ls-cart"><a class="link-cart" href="main.php?khoatrang=add_to_card&ma=<?php echo $value_loadpro['pro_id'] ?>"><i class="fa fa-cart-plus" aria-hidden="true"></i> Thêm vào giỏ hàng</a></button>
								</form>
							</div>
							<?php 
								//tim xem san pham này có giảm giá không?
								$pro_id_prom=$value_loadpro['pro_id'];
								$sql_prom="select prom.prom_percent from promotion prom join products pro on pro.prom_id=prom.prom_id where pro_id=$pro_id_prom";
								$query_prom=mysqli_query($conn, $sql_prom);
								$dataArr_prom=mysqli_fetch_assoc($query_prom);
								//neu có khuyen mãi
								if(!empty($dataArr_prom)){
							 ?>
							<!-- them vao dong nay nếu có giảm giá -->
							<!-- thì in dòng này ra -->
							<div class="giatri-giamgia"><?php echo $dataArr_prom['prom_percent'] ?>%</div>
						<?php } ?>
							<!-- chuyen den trang gio hang -->
						</div></a>
						<h4><?php echo $value_loadpro['pro_name'] ?></h4>
						<h5>
							<?php  $gia=$value_loadpro['pro_newprice']; echo format_gia($gia) ?>
							<!-- neu có khuyen mai thì in giá cũ ra, -->
							<?php if(!empty($dataArr_prom)) { ?>
								<small style='text-decoration: line-through;'><?php $oldprice=$value_loadpro['pro_oldprice']; echo format_gia($oldprice); ?></small>
							<?php } ?>	
						</h5>
					</div>
					<?php endforeach ?>
					<div class="clearfix"></div>
				<?php }else { ?>
					 <div class="alert alert-warning">
					 	Shop hiện tại chưa có <strong>sản phẩm</strong> này! Quý khách vui lòng chọn sản phẩm khác
					 </div>
				<?php } ?>
				</div>
				
			</div>
			<!-- end cột 2: cột hiển thị san phẩm theo loại, màu -->
		</div>
	<?php } ?>
	</div>
	