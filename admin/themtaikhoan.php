
<!-- Page Content -->
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <small></small>
                        </h1>
                    </div>
                    <div class="col-lg-12">
                        <h1 class="page-header">Tài khoản
                        <small>Thêm mới</small>
                        </h1>
                        <?php
                        include_once 'connection.php';
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

                    if(isset($_POST['btnInsert'])) {
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
                             echo $sql_insert_acc = "insert into accounts(acc_email, acc_password, acc_fullname, acc_phone, acc_birthday, acc_address, acc_role) values('$acc_email', '$acc_password', '$acc_fullname', '$acc_phone', '$acc_birthday', '$acc_address', '$acc_role')";
                             $query = mysqli_query($conn, $sql_insert_acc);
                             if($query) {
                                echo '<script>alert("Đăng ký tài khoản thành công!");location.href="index.php?page=danhsachtaikhoan";</script>';
                             }
                        }
                    }
                 ?>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="" method="POST" enctype="multipart/form-data" name="frmThemSP" id="frmThemSP">
                            <div class="form-group">
                                <label>Email đăng nhập</label>
                                <input required="" type="email" class="form-control" name="acc_email" id="acc_email" value="<?php echo $acc_email; ?>" placeholder="Vui lòng nhập Email đăng nhập" />
                                <small class="text-danger"><?php echo $email_err; ?></small>
                            </div>
                            
                            <div class="form-group">
                                <label>Mật khẩu</label>
                                <input required="" type="password" class="form-control" name="acc_password" id="acc_password" value="<?php echo $acc_password; ?>" placeholder="Vui lòng nhập Mật khẩu" />
                                 <small class="text-danger"><?php echo $pass_err; ?></small>
                            </div>
                           
                            <div class="form-group">
                                <label>Nhập lại mật khẩu</label>
                                <input required="" type="password" class="form-control" name="reacc_password" id="reacc_password" value="<?php echo $reacc_password; ?>" placeholder="Vui lòng xác nhận mật khẩu" />
                                 <small class="text-danger"><?php echo $pass_err2; ?></small>
                            </div>
                           
                            <div class="form-group">
                                <label>Họ và tên</label>
                                <input required="" type="text" class="form-control" name="acc_fullname" id="acc_fullname" value="<?php echo $acc_fullname; ?>" placeholder="Vui lòng nhập Họ và Tên" />
                            </div>
                            <div class="form-group">
                                <label>Giới tính</label>
                                <select id="acc_sex" name="acc_sex" class="form-control">
                                	<option value="">Vui lòng chọn giới tính</option>
                                    <option value="0">Nam</option>
                                    <option value="1">Nữ</option>
                                </select>
                            </div>
                             <div class="form-group">
                                <label>Ngày sinh</label>
                                <input required="" type="date" class="form-control" name="acc_birthday" id="acc_birthday" value="<?php echo $acc_birthday ?>" placeholder="Vui lòng nhập giá cho sản phẩm" />
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <input type="text" class="form-control" name="acc_address" id="acc_address" value="<?php echo $acc_address ?>" placeholder="Vui lòng nhập màu cho sản phẩm" />
                            </div>
                             <div class="form-group">
                                <label>Số điện thoại</label>
                                <input type="text" class="form-control" name="acc_phone" id="acc_phone" value="<?php echo $acc_phone ?>" placeholder="Vui lòng nhập số điện thoại" />
                            </div>

                            <button type="submit" name="btnInsert" class="btn btn-default">Thêm mới</button>
                            <button type="reset" class="btn btn-default">Hủy</button>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->