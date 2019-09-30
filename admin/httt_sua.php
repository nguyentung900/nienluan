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
                        <h1 class="page-header">Hình thức thanh toán
                        <small>Sửa</small>
                        </h1>
                        <?php 
                            include_once 'connection.php';
                            $pay_id=$_GET['ma'];
                            $sql = "select * from payment where pay_id='$pay_id'";
                            $query=mysqli_query($conn, $sql);
                            $dataArr[]=mysqli_fetch_assoc($query);
                                /*echo '<pre>';
                                print_r($dataArr);
                                echo '</pre>';*/
                                $pay_name="";
                                $pay_content="";
                            if(isset($_POST['btnUpdate'])) {
                                //echo 'nhan ne';
                                $pay_name=trim($_POST['pay_name']);
                                $pay_content=trim($_POST['pay_content']);
                                //echo $pay_name.' '.$pay_content;
                                $sql="update payment set pay_content='$pay_content' where pay_id='$pay_id'";
                                if(mysqli_query($conn, $sql)) {
                                    echo "<script language='javascript'>window.location='index.php?page=danhsachhinhthucthanhtoan'</script>";
                                }
                            }

                         ?>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="" method="POST" enctype="multipart/form-data" name="frmSuaHttt" id="frmSuaHtt">
                            <div class="form-group">
                                <label>Tên hình thức thanh toán</label>
                                <input value="<?php 
                                    if($dataArr[0]['pay_content']==0){
                                        echo 'Thanh toán khi nhận hàng';
                                    }
                                    else{
                                        echo 'Chuyển khoản';
                                    }
                                 ?>" type="text" class="form-control" name="pay_name" id="pay_name" placeholder="Vui lòng nhập tên hình thức thanh toán" />
                            </div>
                            <div class="form-group">
                                <label>Mô tả</label>
                               	<textarea rows="5" name="pay_content" id="pay_content" class="form-control"><?php   echo $dataArr[0]['pay_content'];  ?></textarea>
                            </div>
                            <button type="submit" name="btnUpdate" class="btn btn-default">Sửa</button>
                            <button type="reset" class="btn btn-default">Hủy</button>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->