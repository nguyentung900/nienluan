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
                        <h1 class="page-header">Khuyến mãi
                        <small>Sửa</small>
                        </h1>
                        <?php 
                        date_default_timezone_set('Asia/Ho_Chi_Minh');
                            include_once 'connection.php';
                            /*@$timestamp=mktime(0,0,0,4,8,2019).'<br>';
                            @$timestamp2=mktime(0, 0, 0, 4, 22, 2019);
                            echo date('d/m/Y', $timestamp2);*/
                            $prom_id = $_GET['ma'];
                            $sql_pro = "select * from promotion where prom_id='$prom_id'";
                            $query_pro=mysqli_query($conn, $sql_pro);
                            $dataArr[]=mysqli_fetch_assoc($query_pro);
                            /*echo '<pre>';
                            print_r($dataArr);
                            echo '</pre>';*/
                            $prom_discription="";
                            $prom_percent="";
                            $prom_gift="";
                            $prom_day_start="";
                            $prom_day_end="";
                            $errday="";
                            if(isset($_POST['btnUpdate'])) {
                                //echo 'click ne';
                                $prom_discription=trim($_POST['prom_discription']);
                                $prom_percent=trim($_POST['prom_percent']);
                                $prom_gift=trim($_POST['prom_gift']);
                                $prom_day_start=trim($_POST['prom_day_start']);
                                $prom_day_end=trim($_POST['prom_day_end']);

                                //so sanh ngay
                                //ngay bd km
                                $nam=substr($prom_day_start, 0, 4);
                                $thang=substr($prom_day_start, 6, 2);
                                $ngay=substr($prom_day_start, 8, 2);
                                @$timestamp=mktime(0,0,0,$thang,$ngay,$nam);
                                //echo date('d/m/Y', $timestamp);
                                
                                //ngay kt km
                                $nam2=substr($prom_day_end, 0, 4);
                                $thang2=substr($prom_day_end, 6, 2);
                                $ngay2=substr($prom_day_end, 8, 2);
                                @$timestamp2=mktime(0,0,0,$thang2,$ngay2,$nam2);
                                //thoi gian het han km
                                $dis_time = $timestamp2-$timestamp;
                                if($dis_time<0) {
                                    $errday .= 'Ngày bắt đầu phải nhỏ hơn ngày kết thức!';
                                }
                                //echo date('d/m/Y', $timestamp2);
                                //echo $prom_discription.' '.$prom_percent.' '.$prom_gift.' '.$prom_day_start;
                                $sql_update = "update promotion set prom_discription='$prom_discription', prom_percent='$prom_percent', prom_gift='$prom_gift', prom_day_start='$prom_day_start', prom_day_end='$prom_day_end' where prom_id=$prom_id";

                                if($errday =="") {
                                    if(mysqli_query($conn, $sql_update)) {
                                    echo "<script language='javascript'>window.location='index.php?page=danhsachkhuyenmai'</script>";
                                }
                                }
                            }
                            
                         ?>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="" method="POST" enctype="multipart/form-data" name="frmSuaKhuyenMai" id="frmSuaKhuyenMai">
                            <div class="form-group">
                                <label>Khuyến mãi chi tiết</label>
                                <textarea rows="5" name="prom_discription" id="prom_discription" class="form-control"><?php echo $dataArr[0]['prom_discription']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Giá trị</label>
                               	 <input type="number" class="form-control" name="prom_percent" id="prom_percent" value="<?php echo $dataArr[0]['prom_percent']; ?>"  />
                            </div>
                            <div class="form-group">
                                <label>Quà tặng</label>
                                 <input type="text" class="form-control" name="prom_gift" id="prom_gift" value="<?php echo $dataArr[0]['prom_gift']; ?>"  />
                            </div>
                            <div class="form-group">
                                <label>Ngày bắt đầu</label>
                                <input type="date" class="form-control" name="prom_day_start" id="prom_day_start" value="<?php 
                                    if($prom_day_start !="") {echo $prom_day_start;}
                                    else {echo $dataArr[0]['prom_day_start'];}
                                 ?>"  />
                            </div>
                            <div class="form-group">
                                <label>Ngày kết thúc</label>
                                <input type="date" class="form-control" name="prom_day_end" id="prom_day_end" value="<?php 
                                    if($prom_day_end !="") {echo $prom_day_end;}
                                    else {echo $dataArr[0]['prom_day_end'];}
                                 ?>" />
                                <small style="color: red"><?php echo $errday; ?></small>
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
