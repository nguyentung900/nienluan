
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
                        <h1 class="page-header">Loại sản phẩm
                        <small>Sửa</small>
                        </h1>
                        <?php 
                            include_once 'connection.php';
                            $cate_id = $_GET['ma'];
                            $sql_cate = "select * from categorys where cate_id='$cate_id'";
                            $query_cate = mysqli_query($conn, $sql_cate);
                            $dataArr_cate[]=mysqli_fetch_assoc($query_cate);
                                /*echo '<pre>';
                                print_r($dataArr_cate);
                                echo '</pre>';*/
                            $cate_name="";
                            $cate_description="";
                            if(isset($_POST['btnUpdate'])) {
                                //echo 'clicl update ne';
                                $cate_name = trim($_POST['cate_name']);
                                $cate_description = trim($_POST['cate_description']);
                                //echo $cate_name.'--------- '.$cate_description;
                                $sql_update = "update categorys set cate_name='$cate_name', cate_description='$cate_description' where cate_id=$cate_id";
                                $query_update = mysqli_query($conn, $sql_update);

                                if($query_update) {
                                    echo "<script language='javascript'>window.location='index.php?page=danhsachloaisanpham'</script>";
                                }
                            }
                         ?>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="" method="POST" enctype="multipart/form-data" name="frmSuaLSP" id="frmSuaLSP">
                            <div class="form-group">
                                <label>Tên loại sản phẩm</label>
                                <input required="" type="text" class="form-control" name="cate_name" id="cate_name" value="<?php echo $dataArr_cate[0]['cate_name'] ?>" placeholder="Vui lòng nhập tên loại sản phẩm" />
                            </div>
                            
                             <div class="form-group">
                                <label>Mô tả</label>
                                <textarea required="" name="cate_description" id="cate_description" class="form-control" rows="5"><?php echo $dataArr_cate[0]['cate_description'] ?></textarea>
                            </div>
                            <button type="submit" name="btnUpdate" class="btn btn-default">Cập nhật</button>
                            <a href="index.php?page=danhsachloaisanpham"><button type="reset" class="btn btn-default">Quay lại</button></a>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
