
	<div class="login">
	<?php 
		include_once 'connection.php';
		$sql_acc="select * from accounts";
		$query_acc=mysqli_query($conn, $sql_acc);
		$dataArr_acc=array();
		while($row=mysqli_fetch_assoc($query_acc)) {
			$dataArr_acc[]=$row;
		}
			

	 ?>
		<div class="main-agileits">
				<div class="form-w3agile">
					<h3>Đăng nhập</h3>
					<?php 
					$pass="";
					$email="";
					
						if(isset($_POST['btnLogin'])) {
							//echo 'submit ne';
							$pass=trim($_POST['pass']);
							$email=trim($_POST['email']);
							//echo $pass.' '.$email;
							
							foreach($dataArr_acc as $value_acc){
								//neu ton tai pass va mail
								if($pass==$value_acc['acc_password'] and $email==$value_acc['acc_email']){
									$_SESSION['acc']['acc_id']=$value_acc['acc_id'];
									$_SESSION['acc']['acc_fullname']=$value_acc['acc_fullname'];
									$_SESSION['acc']['acc_role']=$value_acc['acc_role'];
									//neu acc_role=o chuyen den trang admin
									//acc_role=1 chuyen den trang  khach hang
									if($value_acc['acc_role']==1) {
										echo '<script>location.href="main.php?khoatrang=index";</script>';
									}
									else if($value_acc['acc_role']==0){
										echo '<script>location.href="../admin/index.php";</script>';
									}
								}
								//nguoc lai k ton tai pass va mail
								else {
									'location.href="main.php?khoatrang=login";</script>';
								}
							}
							echo '<pre>';
							print_r($dataArr_acc);
							echo '</pre>';


						}
					 ?>
					<form action="#" method="post">
						<div class="key">
							<i class="fa fa-envelope" aria-hidden="true"></i>
							<input  type="text" name="email" required="" placeholder="Tên đăng nhập">
							<div class="clearfix"></div>
						</div>
						<div class="key">
							<i class="fa fa-lock" aria-hidden="true"></i>
							<input  type="password" name="pass" required="" placeholder="Mật khẩu">
							<div class="clearfix"></div>
						</div>
						<input type="submit" name="btnLogin" value="Đăng nhập">
					</form>
				</div>
				<div class="forg">
					<a href="#" class="forg-left">Forgot Password</a>
					<a href="main.php?khoatrang=register" class="forg-right">Đăng kí</a>
				<div class="clearfix"></div>
				</div>
			</div>
		</div>
		<!-- newsletter -->
	