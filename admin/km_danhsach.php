<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
               		<div class="col-lg-12">
                        <h1 class="page-header">
                            <small></small>
                        </h1>
                    </div>
                    <div class="col-lg-12">
                        <h1 class="page-header">Khuyễn mãi
                            <small>Danh sách</small>
                        </h1>
                        <?php 
                            include_once 'connection.php';
                            $sql_pro = 'select * from promotion';
                            $query_pro = mysqli_query($conn, $sql_pro);
                            $dataArr = array();
                            while($row=mysqli_fetch_assoc($query_pro))
                            {
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
                                <th>Khuyến mãi chi tiết</th>
                                <th>Giá trị khuyến mãi</th>
                                <th>Quà tặng</th>
								<th>Ngày bắt đầu</th>
								<th>Ngày kết thúc</th>
                                <th>Xóa</th>
                                <th>Sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($dataArr as $key => $value): ?>
                            <tr class="odd gradeX" align="center">
                                <td><?php echo $key+1; ?></td>
                                <td><?php echo $value['prom_discription']; ?></td>
                                <td><?php echo $value['prom_percent'].'%'; ?></td>
                                <td><?php echo $value['prom_gift']; ?></td>
                                <td><?php echo $value['prom_day_start']; ?></td>
                                <td><?php echo $value['prom_day_end']; ?></td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a class="delete" href="xoakm.php?ma=<?php echo $value['prom_id'];?>"> Xóa</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="index.php?page=suakhuyenmai&ma=<?php echo $value['prom_id'];?>">Sửa</a></td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>