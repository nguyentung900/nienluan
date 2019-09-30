<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
               		<div class="col-lg-12">
                        <h1 class="page-header">
                            <small></small>
                        </h1>
                    </div>
                    <div class="col-lg-12">
                        <h1 class="page-header">Hình thức thanh toán
                            <small>Danh sách</small>
                        </h1>
                        <?php 
                            include_once 'connection.php';
                            $sql = 'select * from payment';
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
                                <th>Hình thức thanh toán</th>
								<th>Mô tả</th>
                                <th style="width:40px;">Sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($dataArr as $key => $value): ?>
                            <tr class="odd gradeX" align="center">
                                <td><?php echo $key+1; ?></td>
                                <td><?php 
                                    if($value['pay_name']==0) {
                                        echo 'Thanh toán khi nhận hàng';
                                    }
                                    else {
                                        echo 'Chuyển khoản';
                                    }
                                ?></td>
                                <td><?php echo $value['pay_content'];?></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="index.php?page=suahinhthucthanhtoan&ma=<?php echo $value['pay_id'];?>">Sửa</a></td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>