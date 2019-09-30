<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
               		<div class="col-lg-12">
                        <h1 class="page-header">
                            <small></small>
                        </h1>
                    </div>
                    <div class="col-lg-12">
                        <h1 class="page-header">Loại sản phẩm
                            <small>Danh sách</small>
                        </h1>
                        <?php 
                            include_once 'connection.php';
                            $sql_cate = 'select * from categorys';
                            $query_cate = mysqli_query($conn, $sql_cate);
                            $dataArr = array();
                            while($row=mysqli_fetch_assoc($query_cate))
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
                                <th>Tên loại sản phẩm</th>
                                <th>Mô tả</th>
                                <th>Xóa</th>
                                <th>Sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($dataArr as $key => $value): ?>
                            <tr class="odd gradeX" align="center">
                                <td><?php echo $key+1; ?></td>
                                <td><?php echo $value['cate_name']; ?></td>
                                <td><?php echo $value['cate_description']; ?></td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a class="delete" href="delete_cate.php?ma=<?php echo $value['cate_id']; ?>"> Xóa</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="index.php?page=sualoaisanpham&ma=<?php echo $value['cate_id']; ?>">Sửa</a></td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>