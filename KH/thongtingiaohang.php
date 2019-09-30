<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Form thông tin giao hàng</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <style type="text/css">

    #box {    
      box-shadow: -2px -2px 5px 5px #E6E6E6;
      background: rgba(200, 200, 200, 0.1);   
      border-radius: 4px; top:50px;
    }

    h2 {    
      text-align:center;  
      font-weight: bold;
      color: #01DF01;
    }

  </style>
  <script>
   $(document).ready(function() {
    $("#chuyenkhoan").click(function(){
     $("#anhien").fadeIn();
   });
  });
</script>
</head>
<body>
  <?php 
    if(!isset($_SESSION['acc']['acc_id'])) {
    echo '<script>alert("Vui lòng đăng nhập đề tiếp tục mua hàng!");location.href="main.php?khoatrang=login";</script>';
  }
   ?>
  <div class="container-fluid"> 
   <div class="row-fluid"> 
    <?php 
    include_once 'connection.php';
    $acc_id = $_SESSION['acc']['acc_id'];

    
    $sp_info=array();
    $bill_pro_amount=0;
    $bill_pro_price=0;

    
    
    foreach($_SESSION['cart'] as $key => $value) {
      $sp_info[$key]['pro_amount']= $value['cart_qty'];
      $sp_info[$key]['pro_name']= $value['cart_name'];
      $sp_info[$key]['pic_name']= $value['cart_pic'];
      $sp_info[$key]['pro_price']= $value['cart_gia'];
      $sp_info[$key]['prom_percent']= $value['cart_km'];
      $bill_pro_amount+=$value['cart_qty'];
      $bill_pro_price+=$value['cart_gia'];
    }
   
    


    $sp_info_json = json_encode($sp_info);
    $sp_info_to_arr = json_decode($sp_info_json, true);
    
    echo '<pre>';
    print_r($sp_info_json);
    echo '</pre>';

    $sql_kh = "select * from accounts where acc_id=$acc_id";
    $query_kh = mysqli_query($conn, $sql_kh);
    $dataArr_kh=array();
    while($row=mysqli_fetch_assoc($query_kh)){
      $dataArr_kh[]=$row;
    }
    

  /*echo '<pre>';
  print_r( $dataArr_kh);
  echo '</pre>';*/
    $ngaynhap = date('Y-m-d', time());

    $dh_ngaygiao_ngay = substr($ngaynhap, 8, 2)+4;
    if($dh_ngaygiao_ngay==31) {
      $dh_ngaygiao_ngay==01;
    }
    else if($dh_ngaygiao_ngay==32) {
      $dh_ngaygiao_ngay==02;
    }
    else if($dh_ngaygiao_ngay==33) {
      $dh_ngaygiao_ngay==03;
    }
    else if($dh_ngaygiao_ngay==34) {
      $dh_ngaygiao_ngay==04;
    }
    $dh_ngaygiao_thang = substr($ngaynhap, 5, 2);
    $dh_ngaygiao_nam = substr($ngaynhap, 0, 4);

    $ngaygiao = $dh_ngaygiao_nam.'-'.$dh_ngaygiao_thang.'-'.$dh_ngaygiao_ngay;

    $thang = substr($ngaynhap, 5, 2); 

    $chuyenkhoan="";
    $tienmat="";
    $nguoidat="";
    $nguoinhan="";
    $sdt="";
    $diachi="";
    $err="";
    if(isset($_POST['btnThanhToan'])) {

      //$kh_ten = trim($_POST['nguoidat']);
      $nguoinhan = trim($_POST['nguoinhan']);
      $kh_sdt = trim($_POST['sdt']);
      $diachigiao = trim($_POST['diachi']);
      @$tienmat = trim($_POST['tienmat']);
      @$chuyenkhoan = trim($_POST['chuyenkhoan']);

      if($tienmat == 'tiền mặt') {
        $httt=0;
      }
      else if($chuyenkhoan=='chuyển khoản') {
        $httt=1;
      }
      

      
      if($chuyenkhoan=="" && $tienmat=="") {
        $err .= 'Vui lòng chọn hình thức toán!';
      }
      else if($nguoinhan=="") {
        $err .= 'Nhập tên người nhận vào!';
      }
      else if($kh_sdt=="") {
        $err .= 'Nhập số điện thoại vào!';
      }
      else if($diachigiao=="") {
        $err .= 'Nhập địa chỉ vào';
      }

      if($err=="") {
        //echo $sp_soluong.' '.$sp_gia;
       echo $sql_dh = "insert into bill(bill_pro_info, bill_pro_amount, bill_pro_price, bill_payment, bill_status, bill_oder_name, bill_phone, bill_address, bill_inputday, bill_outputday, bill_month) values('$sp_info_json', '$bill_pro_amount', '$bill_pro_price', '$httt', '$httt', '$nguoinhan', '$kh_sdt', '$diachigiao', '$ngaynhap', '$ngaygiao', '$thang'  )";

      /*$query_dh = mysqli_query($conn, $sql_dh);
       if($query_dh) {

          echo '<script>alert("Cám ơn quý khách đã mua sản phẩm tại cửa hàng chúng tôi!");location.href="main.php";</script>';
          unset($_SESSION['cart']);
       }*/
     }

   }

   ?>
   <div class="col-md-offset-2 col-md-8" id="box"> 
    <h2> Vui lòng nhập thông tin giao hàng</h2> 
    <hr> 
    <br/>
    <br/>
    <form class="form-horizontal" method="post" id="frmDiaChi">
      <div class="form-group">
        <label class="control-label col-sm-2" for="nguoidat"> Người nhận:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="nguoinhan" name="nguoinhan" value="<?php if($nguoinhan !=""){echo $nguoinhan;}else{echo $dataArr_kh[0]['acc_fullname'];}  ?>" placeholder="Nhập vào họ tên người đặt hàng(có dấu)."/>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="hoten"> Số điện thoại:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="sdt" name="sdt" value="<?php echo $dataArr_kh[0]['acc_phone']; ?>" placeholder="Số điện thoại gồm 10 số"/>
        </div>
      </div>

      <!-- <div class="form-group">
        <label class="control-label col-sm-2" for="nguoinhan"> Người nhận:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="nguoinhan" name="nguoinhan" value="<?php //echo $dataArr_kh[0]['acc_fullname']; ?>" placeholder="Nhập vào họ tên người nhận (có dấu)."/>
        </div>
      </div> -->
      <div class="form-group">
        <label class="control-label col-sm-2" for="hoten">Hình thức thanh toán:</label>
        <div class="col-sm-10">
          <input type="radio" id="tienmat" name="tienmat" value="tiền mặt" /><label for="tienmat">Thanh toán khi nhận hàng</label><br>
          <input type="radio" id="chuyenkhoan" value="chuyển khoản" name="tienmat"/><label for="chuyenkhoan"> Chuyển khoản</label>
          <p style="color: red"><?php echo $err; ?></p>


          <!--Mở đầu hình thức thanh toán -->
          <div class="container-fluid" id="anhien" style="display:none"> 
           <div class="row-fluid"> 
            <div class="col-md-offset-2 col-md-8" id=""> 
             <hr> 
             <!-- <form  class="form-horizontal" method="post" id="frmThanhToan"> -->
              <div class="form-group"> 
                <div class="col-md-12"> 
                  <table class="table" style="width:100%">
                    <tr>
                      <td> Đơn vị bán hàng<br/>
                        <b>Perfect choice</b></td>
                        <td> Đơn hàng<br/>
                          <b>Mã đơn hàng:</b> </td>
                          <td> <br/>
                          </td>
                        </tr>
                        <tr>
                          <td colspan="3">
                            <table class="table">
                              <tr>
                                <td>
                                Tên in trên thẻ: </td>
                                <td>
                                  <input type="text" name="txtten" id="txtten" class="form-control" placeholder="Nhập tên tiếng Việt không dấu" />
                                </td>
                                <td rowspan="4">
                                  <img src="the.jpg"/>
                                </td>
                              </td>
                            </tr>
                            <tr>
                              <td>
                              Số thẻ: </td>
                              <td>
                                <input type="text" name="txtSoThe" id="txtSoThe" class="form-control" placeholder="16 đến 19 số ở mặt trước thẻ ATM" />
                              </td>
                            </tr>
                            <tr>
                              <td>
                                Ngày phát hành:
                              </td>
                              <td>
                                <input type="date" class="form-control" name="txtNgayPhatHanh" id="txtNgayPhatHanh"/>
                              </td>
                            </tr>
                            <tr>
                              <td>
                              Số tiền:</td>
                              <td>
                                <input type="text" class="form-control" name="txtSoTien" id="txtSoTien"/>
                              </td>
                            </tr>
                          </table>
                        </td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- </form> -->
              </div>
            </div>
          </div>
          <!-- Kết thúc hình thức thanh toán -->
        </div>
        <br/>

      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for=""> Địa chỉ nhận hàng:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="diachi" name="diachi" value="<?php echo $dataArr_kh[0]['acc_address']; ?>" placeholder="VD: số nhà 29/9, hẻm 95 đường Mậu Thân, phương Xuân Khánh, Quận Ninh Kiều, thành phố Cần Thơ."/>
        </div>
      </div>
      <br/>
      <br/>
      <div class="form-group">

        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
        &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;

        <input type="reset" class="btn btn-success" id="huybo" name="huybo" value="Hủy bỏ"/>
        &nbsp; &nbsp; &nbsp; &nbsp;

        <input type="submit" class="btn btn-success" name="btnThanhToan" value="Thanh toán"/>
        <!-- <button type="submit" name="btnSuaMoitt" class="btn btn-default">Sửa</button> -->
      </div>
    </form>
  </div>
</div>
</div>
</body>
</html>
