
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
                        <small>Thêm mới</small>
                        </h1>
                        <?php 
                            include_once 'connection.php';

                            $sql_catename="select cate_name from categorys";
                            $query_catename=mysqli_query($conn, $sql_catename);
                            $dataArr_catename=array();
                            while($row=mysqli_fetch_assoc($query_catename)){
                                $dataArr_catename[]=$row;
                            }
                                /*echo '<pre>';
                                print_r($dataArr_catename);
                                echo '</pre>';*/

                            $cate_description="";
                            $cate_name="";
                            $err_match="";
                            if(isset($_POST['btnInsert'])) {
                                //echo 'vua click ne';
                                $cate_description=trim($_POST['cate_description']);
                                $cate_name = trim($_POST['cate_name']);

                                $sql="insert into categorys(cate_name, cate_description) values('$cate_name', '$cate_description')";

                                foreach($dataArr_catename as $value) {
                                    if($cate_name==$value['cate_name']){
                                        $err_match .= 'Loại cây này đã tồn tại!';
                                    }
                                }

                                if($err_match==""){
                                    if(mysqli_query($conn, $sql)) {
                                        echo "<script language='javascript'>window.location='index.php?page=danhsachloaisanpham'</script>";
                                    }
                                }
                                
                            }
                         ?>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="" method="POST" enctype="multipart/form-data" name="frmThemLSP" id="frmThemLSP">
                            <div class="form-group">
                                <label>Tên loại sản phẩm</label>
                                <input required="" type="text" class="form-control" name="cate_name" id="cate_name" value="<?php echo $cate_name ?>" placeholder="Vui lòng nhập tên loại sản phẩm" />
                                <small style="color: red"><?php echo $err_match; ?></small>
                            </div>
                            
                             <div class="form-group">
                                <label>Mô tả</label>
                                <textarea required="" name="cate_description" id="cate_description" class="form-control" rows="5"><?php echo $cate_description ?></textarea>
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