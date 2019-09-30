<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
               		<div class="col-lg-12">
                        <h1 class="page-header">
                            <small></small>
                        </h1>
                    </div>
                    <div class="col-lg-12">
                        <h1 class="page-header">Sản phẩm
                            <small>Danh sách</small>
                        </h1>
                        <?php 
                            include_once 'connection.php';
                            $sql = "select * from products ORDER BY pro_id desc";
                            $query = mysqli_query($conn, $sql);
                            $dataArr=array();
                            while($row=mysqli_fetch_assoc($query)) {
                                $dataArr[]=$row;
                            }

                                /*echo '<pre>';
                                print_r($dataArr);
                                echo '</pre>';*/
                            //thuc hien xoa san pham
                            if(isset($_GET['ma'])) {
                                $pro_id=$_GET['ma'];
                                $sql_pro_to_delete = "delete from products where pro_id='$pro_id'";
                                if(mysqli_query($conn, $sql_pro_to_delete)) {
                                    echo "<script language='javascript'>window.location='index.php?page=danhsachsanpham'</script>";
                                }
                            }
                         ?>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>STT</th>
                                <th>Tên sản phẩm</th>
                                <th>Loại sản phẩm</th>
                                <th>Giá</th>
                                <th>Mô tả ngắn</th>
                                <th>Màu</th>
                                <th>Kích thước</th>
                                <th>Xóa</th>
                                <th>Sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($dataArr as $key => $value): ?>
                            <tr class="odd gradeX" align="center">
                                <td><?php echo $key+1; ?></td>
                                <td><?php echo $value['pro_name']; ?></td>
                                <td><?php 
                                    $cate_id = $value['cate_id'];
                                    $sql_cate="select cate_name from categorys where cate_id='$cate_id'";
                                    $query_cate=mysqli_query($conn, $sql_cate);
                                    $dataArr_cate=mysqli_fetch_assoc($query_cate);
                                    echo $dataArr_cate['cate_name'];
                                        
                                 ?></td>
                                <td><?php
                                    echo $value['pro_newprice'];
                                    if($value['prom_id']!=""){
                                        $prom_id = $value['prom_id'];
                                        $sql_prom = "select prom_percent from promotion where prom_id=$prom_id";
                                        $query_prom = mysqli_query($conn, $sql_prom);
                                        $dataProm=array();
                                        $dataProm=mysqli_fetch_assoc($query_prom);
                                        $prom_percent=$dataProm['prom_percent'];
                                        echo "(<span style='color: red'>-$prom_percent%</span>)";

                                    }
                                ?></td>
                                <td><?php echo $value['pro_titlecontent']; ?></td>
                                <td><?php echo $value['pro_color']; ?></td>
                                <td style="width: 10%"><?php
                                 $size_id=$value['size_id'];
                                 $sql_sizename="select size_name from size where size_id=$size_id";
                                 $query_size=mysqli_query($conn, $sql_sizename);
                                 $sizename=mysqli_fetch_assoc($query_size);
                                 echo $sizename['size_name']; 
                                 ?></td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a class="delete" href="index.php?page=danhsachsanpham&ma=<?php echo $value['pro_id']; ?>"> Xóa</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="index.php?page=suasanpham&ma=<?php echo $value['pro_id']; ?>">Sửa</a></td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>