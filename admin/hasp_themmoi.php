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
                        <h1 class="page-header">Tin tức
                        <small>Thêm mới</small>
                        </h1>
                        <?php 
                            include 'connection.php';

                            //lay pro_id trong pictures
                            $sql_proid_in_pic="select DISTINCT pro_id from pictures";
                            $query_proid_in_pic=mysqli_query($conn, $sql_proid_in_pic);
                            $dataArr_proid_in_pic=array();
                            while($row=mysqli_fetch_assoc($query_proid_in_pic)){
                                $dataArr_proid_in_pic[]=$row;
                            }
                           /* echo '<pre>';
                            print_r($dataArr_proid_in_pic);
                            echo '</pre>';*/
                            //lay pro_id trong products
                            $sql_proid_in_pro="select  pro_id, pro_name from products";
                            $query_proid_in_pro=mysqli_query($conn, $sql_proid_in_pro);
                            $dataArr_proid_in_pro=array();
                            while($row=mysqli_fetch_assoc($query_proid_in_pro)){
                                $dataArr_proid_in_pro[]=$row;
                            }
                                /*echo '<pre>';
                                print_r($dataArr_proid_in_pro);
                                echo '</pre>';*/
                            //loc ra nhung pro_id chua co hinh san pham
                            foreach($dataArr_proid_in_pro as $key => $value){
                                foreach($dataArr_proid_in_pic as $key_pic => $value_pic) {
                                    if($value['pro_id'] == $dataArr_proid_in_pic[$key_pic]['pro_id']) {
                                        unset($dataArr_proid_in_pro[$key]);
                                    }
                                    
                                    //echo $value['pro_id'].' -- '.$value_pic['pro_id'].'<br>';
                                }
                            }
                            //day la mảng pro_id da loai bo pro_id
                            //co ton tai trong pictures
                            /*echo '<pre>';
                            print_r($dataArr_proid_in_pro);
                            echo '</pre>';*/
                            
                            
                            $pic_name_0="";
                            $pic_name_1="";
                            $pic_name_2="";
                            $pic_name_3="";
                            $error_pic_0="";
                            $error_pic_1="";
                            $error_pic_2="";
                            $error_pic_3="";

                            $pro_id="";
                            $error_proid="";
                            if(isset($_POST['btnThemMoitt'])) {
                                //echo 'nhan submit roi ne';
                                $file_0 = $_FILES['fileHinhTT0'];
                                $file_1 = $_FILES['fileHinhTT1'];
                                $file_2 = $_FILES['fileHinhTT2'];
                                $file_3 = $_FILES['fileHinhTT3'];
                                //echo $file_3['tmp_name'];
                                //ten tung hinh
                                $pic_name_0 = $file_0['name'];
                                $pic_name_1 = $file_1['name'];
                                $pic_name_2 = $file_2['name'];
                                $pic_name_3 = $file_3['name'];

                                //echo $pic_name_0.' -- '.$pic_name_1.' -- '.$pic_name_2.' -- '.$pic_name_3;

                                if($pic_name_0==""){
                                    $error_pic_0 .= 'Vui lòng chọn hình sản phẩm!';
                                }

                                if($pic_name_1==""){
                                    $error_pic_1 .= 'Vui lòng chọn hình sản phẩm!';
                                }
                                else if($pic_name_1==$pic_name_0) {
                                    $error_pic_1 .= 'Trùng hình, vui lòng chọn hình sản phẩm khác!';
                                }

                                if($pic_name_2==""){
                                    $error_pic_2 .= 'Vui lòng chọn hình sản phẩm!';
                                }
                                else if($pic_name_2==$pic_name_1) {
                                    $error_pic_2 .= 'Trùng hình, vui lòng chọn hình sản phẩm khác!';
                                }
                                else if($pic_name_2==$pic_name_0) {
                                    $error_pic_2 .= 'Trùng hình, vui lòng chọn hình sản phẩm khác!';
                                }

                                if($pic_name_3==""){
                                    $error_pic_3 .= 'Vui lòng chọn hình sản phẩm!';
                                }
                                else if($pic_name_3==$pic_name_2) {
                                    $error_pic_3 .= 'Trùng hình, vui lòng chọn hình sản phẩm khác!';
                                }
                                else if($pic_name_3==$pic_name_1) {
                                    $error_pic_3 .= 'Trùng hình, vui lòng chọn hình sản phẩm khác!';
                                }
                                else if($pic_name_3==$pic_name_0) {
                                    $error_pic_3 .= 'Trùng hình, vui lòng chọn hình sản phẩm khác!';
                                }


                                //lay pro_id
                                $pro_id = trim($_POST['pro_id']);
                                $error_proid=($pro_id=="") ? 'Vui lòng chọn sản phẩm' : "";

                                //kiem tra, neu khong lỗi thì tien hanh thêm
                                
                                if($error_pic_0=="" && $error_pic_1=="" && $error_pic_2=="" && $error_pic_3=="" && $error_proid=="") {
                                    //echo 'tien hanh them ne';
                                    $sql_insert_pic_0="insert into pictures(pic_name, pic_type, pro_id) values('$pic_name_0', 0, $pro_id)";
                                    $sql_insert_pic_1="insert into pictures(pic_name, pic_type, pro_id) values('$pic_name_1', 1, $pro_id)";
                                    $sql_insert_pic_2="insert into pictures(pic_name, pic_type, pro_id) values('$pic_name_2', 2, $pro_id)";
                                    $sql_insert_pic_3="insert into pictures(pic_name, pic_type, pro_id) values('$pic_name_3', 3, $pro_id)";
                                    //echo $sql_insert_pic_0.' -- '.$sql_insert_pic_1.' -- '.$sql_insert_pic_2.' -- '.$sql_insert_pic_3;
                                    
                                    $query_0=mysqli_query($conn, $sql_insert_pic_0);
                                    $query_1=mysqli_query($conn, $sql_insert_pic_1);
                                    $query_2=mysqli_query($conn, $sql_insert_pic_2);
                                    $query_3=mysqli_query($conn, $sql_insert_pic_3);

                                    //kiem tra, neu them thanh cong, thi thuc hien
                                    //upload anh vao folder
                                    if($query_0==true && $query_1==true && $query_2==true && $query_3==true) {
                                        //echo 'them thanh cong,dua pic vao folder di';
                                        $tmp_name_0 = $file_0['tmp_name'];
                                        $tmp_name_1 = $file_1['tmp_name'];
                                        $tmp_name_2 = $file_2['tmp_name'];
                                        $tmp_name_3 = $file_3['tmp_name'];

                                        $destination_0 = 'image/produts/'.$pic_name_0;
                                        $destination_1 = 'image/produts/'.$pic_name_1;
                                        $destination_2 = 'image/produts/'.$pic_name_2;
                                        $destination_3 = 'image/produts/'.$pic_name_3;

                                        move_uploaded_file($tmp_name_0, $destination_0);
                                        move_uploaded_file($tmp_name_1, $destination_1);
                                        move_uploaded_file($tmp_name_2, $destination_2);
                                        move_uploaded_file($tmp_name_3, $destination_3);

                                        echo "<script language='javascript'>window.location='index.php?page=danhsachhinhanhsanpham'</script>";

                                        }
                                    }
                                }



                            

                         ?>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="" method="POST" enctype="multipart/form-data" name="frmThemTinTuc" id="frmThemTinTuc">
                            <div class="form-group">
                                <label>Hình ảnh 01</label>
                                <input type="file" class="form-control" name="fileHinhTT0" id="fileHinhTT01"  />
                                <input type="hidden" name="pic_type" value="0">
                                <small style="color: red" class="text-mute"><?php echo $error_pic_0; ?></small>
                            </div>
                            <div class="img">
                                <img height="100px" width="100px" src="C:\xampp\tmp\php1E9D.tmp" alt="">
                            </div>
                            <div class="form-group">
                                <label>Hình ảnh 02</label>
                                <input type="file" class="form-control" name="fileHinhTT1" id="fileHinhTT02"  />
                                <input type="hidden" name="pic_type" value="1">
                                <small style="color: red" class="text-mute"><?php echo $error_pic_1; ?></small>
                            </div>
                            <div class="form-group">
                                <label>Hình ảnh 03</label>
                                <input type="file" class="form-control" name="fileHinhTT2" id="fileHinhTT03"  />
                                <input type="hidden" name="pic_type" value="2">
                                <small style="color: red" class="text-mute"><?php echo $error_pic_2; ?></small>
                            </div>
                             <div class="form-group">
                                <label>Hình ảnh 04</label>
                                <input type="file" class="form-control" name="fileHinhTT3" id="fileHinhTT04"  />
                                <input type="hidden" name="pic_type" value="3">
                                <small style="color: red" class="text-mute"><?php echo $error_pic_3; ?></small>
                            </div>
                            <div class="form-group">
                                <label>Sản phẩm</label>
                                 <select id="pro_id" name="pro_id" class="form-control">
                                    <option value="">Vui lòng chọn loại sản phẩm</option>
                                    <?php foreach($dataArr_proid_in_pro as $value_proid): ?>
                                        <!-- neu chon pro_id roi thi hien thi no len dau -->
                                        <?php if($pro_id==$value_proid['pro_id']){ ?>
                                        <option value="<?php echo $value_proid['pro_id'] ?>" selected><?php echo $value_proid['pro_name'] ?></option>
                                    <?php } else{ ?>
                                        <!-- cac thang khac k duoc chon thi k dc len dau -->
                                        <option value="<?php echo $value_proid['pro_id'] ?>"><?php echo $value_proid['pro_name'] ?></option>
                                    <?php } ?>
                                    <?php endforeach ?>
                                </select>
                                <!-- ket thuc selet cua chon pro_id roi -->
                                <small style="color: red" class="text-mute"><?php echo $error_proid; ?></small>
                            </div>
                            <button type="submit" name="btnThemMoitt" class="btn btn-default">Thêm mới</button>
                            <button type="reset" class="btn btn-default">Hủy</button>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->