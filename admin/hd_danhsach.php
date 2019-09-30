
<?php 
    include 'connection.php';
    include_once 'funtion.php';

    $sql = "select * 
            from donhang dh join sanphamdonhang sp_dh on dh.dh_id = sp_dh.dh_id
            join sanpham sp on sp.sp_id = sp_dh.sp_id
            join khachhang kh on kh.kh_id = dh.kh_id     
            ";

    $query = mysqli_query($conn, $sql);

    $dataArr = array();
    while($dataArrTamp=mysqli_fetch_assoc($query)){
        $dataArr[] = $dataArrTamp; 
    }
    //
    // 
 ?>
<script language="javascript">
    function deleteConfirm(){
      if(confirm("Bạn có chắc chắn muốn xóa!")){
        return true;
      }
       else{
          return false;
           }
}
</script>

<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <small></small>
                        </h1>
                    </div>
                    <div class="col-lg-12">
                        <h1 class="page-header">Hóa đơn
                            <small>Danh sách</small>
                        </h1>
                    </div>
                    <?php

                    if(isset($_GET['ma'])) {
                        $bill_id = $_GET['ma'];
                        //echo $bill_id;
                        $sql_de="delete from bill where bill_id=$bill_id";
                        if(mysqli_query($conn, $sql_de)) {
                            echo "<script language='javascript'>window.location='index.php?page=danhsachdonhang'</script>";
                        }
                    } 
                    $sql_dh = "select * from bill order by bill_id desc";
                    $query_dh = mysqli_query($conn, $sql_dh);
                    $dataArr_dh=array();
                    while($row=mysqli_fetch_assoc($query_dh)){
                        $dataArr_dh[]=$row;
    }
                        
                        /*echo '<pre>';
                        print_r($dataArr_dh);
                        echo '</pre>';*/
                     ?>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>Mã hóa đơn</th>
                                <th>Tên khách hàng</th>
                                <th>Ngày lập</th>
                                <th>Ngày giao</th>
                                <th>Nơi giao</th>
                                <th>Tên sản phẩm</th>
                                <th>Tổng tiền</th>
                                <th>Trạng thái thanh toán</th>
                                <th>Xem chi tiết</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; foreach($dataArr_dh as $key => $value): 
                                  
                                ?>
                            <tr class="odd gradeX" align="center">
                                <td><?php echo $value['bill_id']; ?></td>
                                <td><?php echo $value['bill_oder_name']; ?></td>
                                <td><?php
                                 $ngaynhap =  $value['bill_inputday']; 
                                 $dh_ngaygiao_ngay = substr($ngaynhap, 8, 2);
                                 $dh_ngaygiao_thang = substr($ngaynhap, 5, 2);
                                 $dh_ngaygiao_nam = substr($ngaynhap, 0, 4);

                                 echo $ngaygiao = $dh_ngaygiao_ngay.'/'.$dh_ngaygiao_thang.'/'.$dh_ngaygiao_nam;
                                 ?></td>
                                <td><?php
                                    $ngaygiao =  $value['bill_outputday'];
                                    $ngayhientai = date('Y-m-d');
                                    $dh_ngaygiao_ngay = substr($ngaygiao, 8, 2);
                                    $dh_ngaygiao_thang = substr($ngaygiao, 5, 2);
                                    $dh_ngaygiao_nam = substr($ngaygiao, 0, 4);

                                 echo $ngaygiao = $dh_ngaygiao_ngay.'/'.$dh_ngaygiao_thang.'/'.$dh_ngaygiao_nam;
                                 ?></td>
                                <td style="text-align: left;"><?php echo $value['bill_address'] ?></td>
                                <td><?php
                                    $sanpham = json_decode($value['bill_pro_info'], true);
                                        /*echo '<pre>';
                                        print_r($sanpham);
                                        echo '</pre>';
*/                                    foreach($sanpham as $key => $value_sp){
                                        if(count($sanpham)>1) {
                                            echo $value_sp['pro_name'].',... ';
                                            break;
                                        }
                                        else if(count($sanpham)==1) {
                                            echo $value_sp['pro_name'];
                                        }
                                        
                                    } 
                                ?></td>
                                <td><?php
                                $total=0;
                                    foreach($sanpham as $key => $value_sp){
                                        $total += $value_sp['pro_price']*$value_sp['pro_amount'];
                                        
                                    }
                                    echo format_gia($total);
            
                                ?> </td>
                                <td>
                                    <?php 
                                        if($value['bill_payment']==0) {
                                            echo '<span  style="color: red;">Chưa thanh toán</span>';
                                        }
                                        else {
                                            echo 'Đã thanh toán';
                                        } 
                                        
                                     ?>
                                </td>
                                
                                <td><a href="#"><button type="button" data-toggle="modal" data-target="#chitiethoadon_0<?php echo $value['bill_id']; ?>" class="btn btn-primary">Xem chi tiết</button></a></td>
                                <?php if($value['bill_payment']==0){ ?>
                                <td style="opacity: 0.4" class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return deleteConfirm()" href=""> Xóa</a></td>
                                <?php }else{ ?>
                                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return deleteConfirm()" href="index.php?page=danhsachdonhang&ma=<?php echo $value['bill_id']; ?>"> Xóa</a></td>
                                <?php } ?>
                            </tr>



                            
                        <?php $i++; endforeach ?>
                        </tbody>
                    </table>
                    <!-- phan xem chi tiet hoa don -->
                    <?php foreach($dataArr_dh as $key => $value_modal): ?>
                        <div class="modal fade" id="chitiethoadon_0<?php echo $value_modal['bill_id']; ?>" role="dialog">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                <form name="frm" action="" method="post">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Chi tiết hóa đơn</h4>
                                </div>
                                <!-- body 01-->
                                <div class="modal-body">
                                            <h4>Cửa hàng cây cảnh<strong>BeGreen</strong></h4>
                                            <p>Địa chỉ: <?php echo $value_modal['bill_address']; ?> </p>
                                            <small><strong>Mã hóa đơn:</strong> <?php echo $value_modal['bill_id']; ?></small>
                                            <p>
                                               <strong> Ngày lập hóa đơn</strong>:<small> <?php echo $value_modal['bill_inputday']; ?></small>
                                            </p>
                                </div>
                                <!-- end body o1 -->
                               <!--  body 02 -->
                                <div class="modal-body">
                                            <label>Tên khách hàng:</label>  <?php echo $value_modal['bill_oder_name']; ?><br />
                                            <label>Số điện thoại:</label>  <?php echo $value_modal['bill_phone']; ?><br />
                                            <label>Địa chỉ nhận hàng: </label><?php echo $value_modal['bill_address']; ?><br />
                                            <label>Trạng thái thanh toán:  </label> 
                                            <?php 
                                                if($value_modal['bill_payment'] == 1) {
                                                    echo 'Đã thanh toán';
                                                }
                                                else {
                                                    echo '<span style="color:red">Chưa thanh toán</span>';
                                                }
                                            ?>
                                            <br />
                                            <label>Danh sách sản phẩm:</label><br />
                                            <table class="table table-hover">
                                                <thead>
                                                    <th>STT</th>
                                                    <th style="text-align: center;">Tên sản phẩm</th>
                                                    <th style="text-align: center;">Số lượng sản phẩm</th>
                                                    <th>Hình sản phẩm</th>
                                                    <th>Giá</th>
                                                </thead>
                                                <tbody>

                                                    <?php $total_price=0; $i=1; foreach(json_decode($value_modal['bill_pro_info'], true) as $key => $value_spinfo): ?>
                                                    <tr>
                                                        <td><?php echo $i; ?></td>
                                                        <td style="text-align: center;"><?php echo $value_spinfo['pro_name']; ?></td>
                                                        <td style="text-align: center;"><?php echo $value_spinfo['pro_amount']; ?></td>
                                                        <td><img src="image/<?php echo $value_spinfo['pic_name']; ?>" style="height:100px;width:100px;" /></td>
                                                        <td><?php
                                                            $gia=$value_spinfo['pro_price']*$value_spinfo['pro_amount'];
                                    
                                    $total_price+=$gia;

                                    $gia1 = substr($gia, 0, 3);
                                    $gia1_7 = substr($gia, 0, 1);
                                    $gia1_8 = substr($gia, 0, 2);
                                    $gia2 = substr($gia, 3, 3);
                                    $gia2_7 = substr($gia, 1, 3);
                                    $gia2_8 = substr($gia, 2, 3);
                            //$gia3 = substr($gia, 6, 3);
                                    $gia3_7 = substr($gia, 4, 3);
                                    $gia3_8 = substr($gia, 5, 3);
                                    if(strlen($gia)<7){
                                        $gia2 = $gia1.'.'.$gia2.'đ';
                                    }
                                    else if(strlen($gia)==7) {
                                        $gia2 = $gia1_7.'.'.$gia2_7.'.'.$gia3_7.'đ';
                                    }
                                    else if(strlen($gia)==8) {
                                        $gia2 = $gia1_8.'.'.$gia2_8.'.'.$gia3_8.'đ';
                                    } 

                                    echo format_gia($gia);
                                    //echo $gia2;

                                                         ?></td>
                                                    </tr>
                                                <?php $i++; endforeach ?>
                                                <tr>
                                                        <td colspan="4" style="text-align:left;"><strong>Tổng tiền:</strong></td>
                                                        <td style="color:red;">
                                                    <?php 
                                                        echo format_gia($total_price);
                                                     ?>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            
                                            
                                </div>

                               <!--  end body 02 -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success" data-dismiss="modal">In hóa đơn</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                            </div>
                            <!-- end footer -->
                        </form>
                       <!--  end form -->
                        </div>
                        <!-- end header -->
                    </div>
                    <!-- end content -->
                </div>
               <!--  end modal-dialog -->
                </div>
               <!--  end modal -->
                    <?php endforeach ?>    
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>

</html>