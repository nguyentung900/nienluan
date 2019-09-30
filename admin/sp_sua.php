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
                        <h1 class="page-header">Sản phẩm
                        <small>Sửa</small>
                        </h1>
                        <?php 
                        include_once 'connection.php';

                        //lay thong tin sanpham load len
                        $proid_info=$_GET['ma'];
                        $sql_pro_info="select * from products where pro_id='$proid_info'";
                        $query_pro_info=mysqli_query($conn, $sql_pro_info);
                        $dataArr_pro_info=array();
                        while($row=mysqli_fetch_assoc($query_pro_info)){
                            $dataArr_pro_info[]=$row;
                        }
                        echo '<pre>';
                        print_r( $dataArr_pro_info);
                        echo '</pre>';
                        //lay thong tin loai san pham
                        $sql_cate="select cate_name, cate_id from categorys";
                        $quer_cate=mysqli_query($conn, $sql_cate);
                        $dataArr_cate=array();
                        while($row=mysqli_fetch_assoc($quer_cate)){
                            $dataArr_cate[]=$row;
                        }

                        //lay thong tin sanpham khuyen mai
                        $sql_prom="select prom_percent, prom_gift, prom_id from promotion";
                        $quer_prom=mysqli_query($conn, $sql_prom);
                        $dataArr_prom=array();
                        while($row=mysqli_fetch_assoc($quer_prom)){
                            $dataArr_prom[]=$row;
                        }

                        //lay thong tin size tu bang size
                        $sql_size="select * from size";
                        $query_size=mysqli_query($conn, $sql_size);
                        $dataArr_size=array();
                        while($row=mysqli_fetch_assoc($query_size)){
                            $dataArr_size[]=$row;
                        }
                            /*echo '<pre>';
                            print_r($dataArr_prom);
                            echo '</pre>';*/
                        //thuc hien them
                            $pro_name="";
                            $cate_id="";
                            $prom_id="";
                            $pro_price="";
                            $pro_titlecontent="";
                            $pro_detailcontent="";
                            $pro_color="";
                            $size_id="";
                            //$pro_size="";
                            $pro_amount="";
                            if(isset($_POST['btnUpdate'])) {
                                //echo 'vua click ne';
                                $pro_name=trim($_POST['pro_name']);
                                $cate_id=trim($_POST['cate_id']);
                                $prom_id=trim($_POST['prom_id']);
                                $pro_price=trim($_POST['pro_price']);
                                $pro_titlecontent=trim($_POST['pro_titlecontent']);
                                $pro_detailcontent=trim($_POST['pro_detailcontent']);
                                $pro_color=trim($_POST['pro_color']);
                                //$pro_size=trim($_POST['pro_size']);
                                $size_id=trim($_POST['size_id']);
                                $pro_amount=trim($_POST['pro_amount']);


                                //tinh ngay hiện tại, ngày nhập sản phẩm
                                $pro_inputday=date('Y-m-d', time());


                                //$cate_percent=trim($_POST['cate_percent']);
                                //tinh gia hien tai va giá đã giảm
                                if($prom_id!="") {
                                    $sql_prom_to_price="select prom_percent from promotion where prom_id='$prom_id'";
                                    $query_prom_to_price=mysqli_query($conn, $sql_prom_to_price);
                                    $dataArr_prom_to_price[]=mysqli_fetch_assoc($query_prom_to_price);
                                        /*echo '<pre>';
                                        print_r($dataArr_prom_to_price);
                                        echo '</pre>';*/
                                        $prom_percent=(100-$dataArr_prom_to_price[0]['prom_percent'])/100;
                                        $pro_oldprice=$pro_price;
                                        $pro_newprice=round($pro_price*$prom_percent);

                                          $sql_update_pro="update products set prom_id=$prom_id, cate_id='$cate_id', size_id='$size_id', pro_name='$pro_name', pro_newprice='$pro_newprice', pro_oldprice='$pro_oldprice', pro_titlecontent='$pro_titlecontent', pro_detailcontent='$pro_detailcontent', pro_color='$pro_color', pro_inputday='$pro_inputday', pro_amount='$pro_amount' where pro_id='$proid_info'";
                                }
                                else {

                                    if($dataArr_pro_info[0]['pro_newprice']==$pro_price) {
                                        $pro_oldprice=$dataArr_pro_info[0]['pro_oldprice'];
                                        $pro_newprice=$dataArr_pro_info[0]['pro_oldprice'];

                                    }
                                    else {
                                        $pro_oldprice=$pro_price;
                                        $pro_newprice=$pro_price;
                                    }
                                   
                                    
                                    $sql_update_pro="update products set prom_id=NULL, cate_id='$cate_id', size_id='$size_id', pro_name='$pro_name', pro_newprice='$pro_newprice', pro_oldprice='$pro_oldprice', pro_titlecontent='$pro_titlecontent', pro_detailcontent='$pro_detailcontent', pro_color='$pro_color', pro_inputday='$pro_inputday', pro_amount='$pro_amount' where pro_id='$proid_info'";
                                }

                                
                                

                                //echo $pro_name.' -- '.$cate_id.' -- '.$prom_id.' -- '.$pro_price.' -- '.$pro_titlecontent.' -- '.$pro_detailcontent.' -- '.$pro_color.' -- '.$pro_size.' -- '.$pro_amount;
                                //echo $sql_update_pro="update products set prom_id=NULL, cate_id='$cate_id', size_id='$size_id', pro_name='$pro_name', pro_newprice='$pro_newprice', pro_oldprice='$pro_oldprice', pro_titlecontent='$pro_titlecontent', pro_detailcontent='$pro_detailcontent', pro_color='$pro_color', pro_inputday='$pro_inputday', pro_amount='$pro_amount' where pro_id='$proid_info'";
                               // echo $sql_inser_pro="update products(prom_id, cate_id, pro_name, pro_newprice, pro_oldprice,  pro_titlecontent, pro_detailcontent, pro_color, pro_size, pro_inputday, pro_amount ) values('$prom_id', '$cate_id','$pro_name', '$pro_newprice', '$pro_oldprice', '$pro_titlecontent', '$pro_detailcontent', '$pro_color', '$pro_size', '$pro_inputday', '$pro_amount')";
                                if(mysqli_query($conn, $sql_update_pro)) {
                                    echo "<script language='javascript'>window.location='index.php?page=danhsachsanpham'</script>";
                                }
                            }
                         ?>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="" method="POST" enctype="multipart/form-data" name="frmThemSP" id="frmThemSP">
                            <div class="form-group">
                                <label>Tên sản phẩm</label>
                                <input required="" type="text" class="form-control" name="pro_name" id="pro_name" value="<?php echo $dataArr_pro_info[0]['pro_name']; ?>" placeholder="Vui lòng nhập tên sản phẩm" />
                            </div>
                            <div class="form-group">
                                <label>Loại sản phẩm</label>
                                <select id="cate_id" name="cate_id" class="form-control">
                                <option value="">Vui lòng chọn loại sản phẩm</option>
                                <?php foreach($dataArr_cate as $value_cate): ?>
                                    <?php if($dataArr_pro_info[0]['cate_id']==$value_cate['cate_id']){ ?>
                                    <option selected value="<?php echo $value_cate['cate_id'] ?>"><?php echo $value_cate['cate_name'] ?></option>
                                <?php }else{ ?>
                                    <option value="<?php echo $value_cate['cate_id'] ?>"><?php echo $value_cate['cate_name'] ?></option>
                                <?php } ?>
                                <?php endforeach ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Khuyến mãi</label>
                                <select id="prom_id" name="prom_id" class="form-control">
                                    <option value="">Vui lòng chọn khuyến mãi</option>
                                    <option value="">0%</option>
                                    <?php foreach($dataArr_prom as $key_prom => $value_prom): ?>
                                        <?php if($dataArr_pro_info[0]['prom_id']==$value_prom['prom_id']){ ?>
                                    <option selected="" value="<?php echo $value_prom['prom_id']; ?>"><?php echo $value_prom['prom_percent'].'%'; ?></option>
                                <?php }else{ ?>
                                    <option  value="<?php echo $value_prom['prom_id']; ?>"><?php echo $value_prom['prom_percent'].'%'; ?></option>
                                <?php } ?>

                                <?php endforeach ?>
                                </select>
                            </div>
                             <div class="form-group">
                                <label>Sản phẩm giá</label>
                                <input required="" type="text" class="form-control" name="pro_price" id="pro_price" value="<?php echo $dataArr_pro_info[0]['pro_newprice']; ?>" placeholder="Vui lòng nhập giá cho sản phẩm" />
                            </div>
                             <div class="form-group">
                                <label>Mô tả ngắn</label>
                                <textarea name="pro_titlecontent" id="pro_titlecontent" class="form-control" rows="5"><?php echo $dataArr_pro_info[0]['pro_titlecontent']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Mô tả chi tiết</label>
                                <textarea required="" name="pro_detailcontent" id="pro_detailcontent" class="form-control" rows="5"><?php echo $dataArr_pro_info[0]['pro_detailcontent']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Màu</label>
                                <input type="text" class="form-control" name="pro_color" id="pro_color" value="<?php echo $dataArr_pro_info[0]['pro_color']; ?>" placeholder="Vui lòng nhập màu cho sản phẩm" />
                            </div>
                            <div class="form-group">
                                <label>Kích thước</label>
                                <select id="size_id" name="size_id" class="form-control">
                                    <option value="">Vui lòng chọn kích thước</option>
                                    <?php foreach($dataArr_size as $key_prom => $value_prom): ?>
                                   
                                    <option selected="" value="<?php echo $value_prom['size_id']; ?>"><?php echo $value_prom['size_name']; ?></option>
                                <?php endforeach ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Số lượng</label>
                                <input required="" type="number" class="form-control" name="pro_amount" id="pro_amount" value="<?php echo $dataArr_pro_info[0]['pro_amount']; ?>" placeholder="Vui lòng nhập kích thước cho sản phẩm" />
                            </div>
                            <button type="submit" name="btnUpdate" class="btn btn-default">Cập nhật</button>
                            <button type="reset" class="btn btn-default">Hủy</button>
                        </form>

                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->