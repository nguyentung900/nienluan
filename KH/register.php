<div class="container-fluid">
		<div class="row-fluid">
			<div class="col-md-offset-4 col-md-4" id="box">
				<h2>ĐĂNG KÝ TÀI KHOẢN</h2>
				<hr>
				<?php

					$sql_info_acc = "select acc_email, acc_password from accounts";
					$query_info_acc = mysqli_query($conn, $sql_info_acc);
					$dataArr_info_acc = array();
					while($row=mysqli_fetch_assoc($query_info_acc)) {
						$dataArr_info_acc[]=$row;
					}
					/*echo '<pre>';
					print_r($dataArr_info_acc);
					echo '</pre>';*/

					$acc_email="";
					$acc_password="";
					$acc_fullname="";
					$acc_phone="";
					$acc_birthday="";
					$acc_sex="";
					$acc_address="";
					$acc_role=0;
					$reacc_password="";

					$email_err="";
					$pass_err="";
					$pass_err2="";
					$name_err="";
					$birth_err="";
					$sex_err="";
					$addre_err="";
					$phone_err="";

					if(isset($_POST['btnDangKy'])) {
						//echo 'submit ne';
						$acc_email=trim($_POST['acc_email']);
						$acc_password=trim($_POST['acc_password']);
						$reacc_password=trim($_POST['reacc_password']);
						$acc_fullname= trim($_POST['acc_fullname']);
						$acc_phone= trim($_POST['acc_phone']);
						$acc_birthday= trim($_POST['acc_birthday']);
						@$acc_sex= trim($_POST['acc_sex']);
						$acc_address= trim($_POST['acc_address']);

						//echo $acc_email.' -- '.$acc_password.' -- '.$acc_fullname.' -- '.$acc_phone.' -- '.$acc_birthday.' -- '.$acc_sex.' -- '.$acc_address;
						
						//trùng email va mat khau
						foreach($dataArr_info_acc as $value) {
							if($value['acc_email']==$acc_email and $value['acc_password']==$acc_password) {
								$pass_err="Mật khẩu đã tồn tại, vui lòng chọn mật khẩu khác!";
								$email_err="Email đã tồn tại, vui lòng chọn email khác!";
							}
							else if($value['acc_email']==$acc_email) {
								$email_err="Email đã tồn tại, vui lòng chọn email khác!";
							}
							else if($value['acc_password']==$acc_password) {
								$pass_err="Mật khẩu đã tồn tại, vui lòng chọn mật khẩu khác!";
							}
						}
						if($acc_password != $reacc_password) {
							$pass_err2 = "Xác nhận mật khẩu chưa khớp!";
						}

						if($pass_err =="" and $acc_email !=""and $acc_password !="" and $acc_fullname !="" and $acc_phone !="") {
							 $sql_insert_acc = "insert into accounts(acc_email, acc_password, acc_fullname, acc_phone, acc_birthday, acc_address, acc_role) values('$acc_email', '$acc_password', '$acc_fullname', '$acc_phone', '$acc_birthday', '$acc_address', '$acc_role')";
							 $query = mysqli_query($conn, $sql_insert_acc);
							 if($query) {
							 	echo '<script>alert("Đăng ký tài khoản thành công!");location.href="main.php?khoatrang=login";</script>';
							 }
						}
					}
				 ?>
				<form class="form-horizontal" method="post" id="frmDangNhap">
					<div class="form-group">
						<div class="col-md-12">
							<label> Email đăng nhập: </label>
							<div class="input-group">
								<span class="input-group-addon">
									<i class="glyphicon glyphicon-user"></i>
								</span>
								<input required="" name="acc_email" value="<?php echo $acc_email; ?>" id="acc_email" placeholder="" class="form-control" type="email">
							</div>
							<small class="text-danger"><?php echo $email_err; ?></small>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-12">
							<label> Mật khẩu </label>
							<div class="input-group">
								<span class="input-group-addon">
									<i class="glyphicon glyphicon-lock"></i>
								</span>
								<input required="" name="acc_password" value="<?php echo $acc_password; ?>" id="acc_password" placeholder="" class="form-control" type="password">
							</div>
							<small class="text-danger"><?php echo $pass_err; ?></small>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-12">
							<label>Nhập lại mật khẩu</label>
							<div class="input-group">
								<span class="input-group-addon">
									<i class="glyphicon glyphicon-lock"></i>
								</span>
								<input required="" name="reacc_password" id="reacc_password" value="<?php echo $reacc_password; ?>" placeholder="" class="form-control" type="password">

							</div>
							<small class="text-danger"><?php echo $pass_err2; ?></small>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-12">
							<label> Họ và tên: </label>
							<div class="input-group">
								<span class="input-group-addon">
									<i class="glyphicon glyphicon-user"></i>
								</span>
								<input required="" name="acc_fullname" id="acc_fullname" value="<?php echo $acc_fullname; ?>" placeholder="" class="form-control" type="text">
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-12">
							<label>Giới tính: </label> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
							<input <?php if($acc_sex==0){echo "checked=''";} ?> name="acc_sex" id="acc_sex" type="radio"  value="0" /> Nam &nbsp; &nbsp; &nbsp; &nbsp;
							<input <?php if($acc_sex==1){echo "checked=''";} ?> required="" name="acc_sex" id="acc_sex" type="radio"  value="1" /> Nữ
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-12">
							<label> Ngày sinh: </label>
							<div class="input-group">
								<span class="input-group-addon">
									<i class="glyphicon glyphicon-calendar"></i>
								</span>
								<input  type="date" class="form-control" name="acc_birthday" id="acc_birthday"  value="<?php echo $acc_birthday; ?>"/>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-12">
							<label> Địa chỉ: </label>
							<div class="input-group">
								<span class="input-group-addon">
									<i class="glyphicon glyphicon-map"></i>
								</span>
								<input required="" name="acc_address" id="acc_address" value="<?php echo $acc_address; ?>" placeholder="" class="form-control" type="text">
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-12">
							<label> Số điện thoại: </label>
							<div class="input-group">
								<span class="input-group-addon">
									<i class="glyphicon glyphicon-phone"></i>
								</span>
								<input required="" name="acc_phone" id="acc_phone" value="<?php echo $acc_phone; ?>" placeholder="" class="form-control" type="tel">
							</div>
						</div>
					</div>


					<div class="form-group">
						<div class="col-md-12">
							<button type="submit" name="btnDangKy" class="btn btn-md btn-success pull-right"> Đăng ký </button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>