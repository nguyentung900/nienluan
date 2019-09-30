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
                        <small>Thêm mới</small>
                        </h1>

                        <?php 
                            include_once 'connection.php';

                            $prom_discription="";
                            $prom_percent="";
                            $prom_gift="";
                            $prom_day_start="";
                            $prom_day_end="";
                            $errday="";
                            if(isset($_POST['btnInsert'])) {
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

                                //if($prom_gift==""){$prom_gift=null;}
                                //echo $prom_discription.' '.$prom_percent.' '.$prom_gift.' '.$prom_day_start;
                                $sql_insert = "insert into promotion(prom_discription, prom_percent, prom_gift, prom_day_start, prom_day_end) values('$prom_discription', '$prom_percent', '$prom_gift', '$prom_day_start', '$prom_day_end')";

                                if($errday=="") {
                                    if(mysqli_query($conn, $sql_insert)) {
                                    echo "<script language='javascript'>window.location='index.php?page=danhsachkhuyenmai'</script>";
                                }
                                }
                            }
                         ?>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="" method="POST" enctype="multipart/form-data" name="frmThemKhuyenMai" id="frmThemKhuyenMai">
                            <div class="form-group">
                                <label>Khuyến mãi chi tiết</label>
                                <textarea required="" rows="5" name="prom_discription" id="prom_discription" class="form-control"><?php echo $prom_discription; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Giá trị</label>
                                 <input required="" type="number" class="form-control" name="prom_percent" id="prom_percent" value="<?php echo $prom_percent; ?>"  />
                            </div>
                            <div class="form-group">
                                <label>Quà tặng</label>
                                 <input type="text" class="form-control" name="prom_gift" id="prom_gift" value="<?php echo $prom_gift; ?>"  />
                            </div>
                            <div class="form-group">
                                <label>Ngày bắt đầu</label>
                                <input required="" type="date" class="form-control" name="prom_day_start" id="prom_day_start" value="<?php echo $prom_day_start; ?>"  />
                            </div>
                            <div class="form-group">
                                <label>Ngày kết thúc</label>
                                <input required="" type="date" class="form-control" name="prom_day_end" id="prom_day_end" value="<?php echo $prom_day_end; ?>" />
                                <small style="color: red"><?php echo $errday; ?></small>
                            </div>
                            <button type="submit" name="btnInsert" class="btn btn-default">Thêm</button>
                            <button type="reset" class="btn btn-default">Hủy</button>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->