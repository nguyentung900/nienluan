<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
               		<div class="col-lg-12">
                        <h1 class="page-header">
                            <small></small>
                        </h1>
                    </div>
                    <div class="col-lg-12">
                        <h1 class="page-header">Quản trị viên
                            <small>Danh sách</small>
                        </h1>
                        <?php 
                        	include_once 'connection.php';
                            if(isset($_GET['ma'])) {
                                $acc_id = $_GET['ma'];
                                $sql_dele = "delete from accounts where acc_id=$acc_id";
                                if(mysqli_query($conn, $sql_dele)) {
                                    echo '<script>location.href="index.php?page=danhsachtaikhoan";</script>';
                                }

                            }
                        	$sql = "select * from accounts where acc_role=0";
                        	$query = mysqli_query($conn, $sql);
                        	$dataArr=array();
                        	while($row=mysqli_fetch_assoc($query)){
                        		$dataArr[]=$row;
                        	}
                        	/*echo '<pre>';
                        	print_r($dataArr);
                        	echo '</pre>';*/
                        	
                         ?>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        	
                            <tr align="center">
                                <th>STT</th>
                                <th>Email </th>
                                <th>Họ và tên</th>
                                <th>Ngày sinh</th>
                                <th>Giới tính</th>
                                <th>Sđt</th>
                                <th>Địa chỉ</th>
                                <th>Xóa</th>
                                <th>Sửa</th>
                            </tr>
                       
                        </thead>
                        <tbody>
                        	<?php foreach($dataArr as $key => $value): ?>
                            <tr class="odd gradeX" align="center">
                                <td><?php echo $key+1; ?></td>
                                <td><?php echo $value['acc_email'] ?></td>
                                <td><?php echo $value['acc_fullname'] ?></td>
                                <td><?php echo $value['acc_birthday'] ?></td>
                                <td><?php
                                 	$acc_sex = $value['acc_sex'];
                                 	if($acc_sex==0) {echo "Nam";}
                                    else {echo "Nữ";}
                                 ?></td>
                                <td><?php echo $value['acc_phone'] ?></td>
                                <td><?php echo $value['acc_address'] ?></td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a class="delete" href="index.php?page=danhsachtaikhoan&ma=<?php echo $value['acc_id']; ?>"> Xóa</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="index.php?page=suataikhoan&ma=<?php echo $value['acc_id']; ?>">Sửa</a></td>
                            </tr>
                             <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
