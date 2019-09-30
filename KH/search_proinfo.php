	`

	<?php include_once 'connection.php'; 
	@include_once 'function.php'; 
		
	?>
	<!-- banner trang men_gia.html -->	
	
	<!--end banner trang men_gia.html -->
	<div class="content">
		<div class="container">

			<!-- cot 1: danh muc tim kiem thao mau, size -->
			
			<!-- end cot 1: danh muc tim kiem thao mau, size -->
			

			<?php 
				
			 ?>
			<!-- cột 2: cột hiển thị san phẩm theo loại, màu -->
			<div class="col-md-2"></div>
			<div class="col-md-8 col-sm-8 women-dresses">
				<div class="women-set1">
					<?php if(!empty($dataArr_proname)) { ?>
					<?php foreach($dataArr_proname as $key_loadpro => $value_loadpro): ?>
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
							<?php $gia = $value_loadpro['pro_newprice']; echo format_gia($gia); ?>
							<!-- neu có khuyen mai thì in giá cũ ra, -->
							<?php if(!empty($dataArr_prom)) { ?>
								<small style='text-decoration: line-through;'><?php echo $value_loadpro['pro_oldprice'] ?>đ</small>
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
	</div>
	