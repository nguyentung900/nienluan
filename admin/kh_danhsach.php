<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
               		<div class="col-lg-12">
                        <h1 class="page-header">
                            <small></small>
                        </h1>
                    </div>
                    <div class="col-lg-12">
                        <h1 class="page-header">Thành viên
                            <small>Danh sách</small>
                        </h1>
                        <?php 
                        	include_once 'connection.php';
                        	$sql = "select * from accounts where acc_role=1";
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
                            </tr>
                             <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
