<script src="bower_components/DataTables/media/js/jquery.dataTables.min.js"></script>
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

<?php 
    
    /*echo '<pre>';
    print_r($dataArr);
    echo '</pre>';
    die();*/
 ?>
<div id="page-wrapper">
            <div class="container-fluid">
                <?php

                include 'connection.php';

                //thuc hien lay thong tin picutre có pci_type=0
                //để đổ lên danh sach hinh ảnh
                $sql = "select * from pictures where pic_type=0";
                $query = mysqli_query($conn, $sql);

                $dataArr = array();
                while ($dataArrTamp = mysqli_fetch_assoc($query)) {
                    $dataArr[] = $dataArrTamp; 
                }
                

                //thuc hien lay hinh cua tung san phẩm
                /*echo '<pre>';
                print_r($dataArr);
                echo '</pre>';*/
                 ?>
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <small></small>
                        </h1>
                    </div>
                    <div class="col-lg-12">
                        <h1 class="page-header">Tin tức
                            <small>Danh sách</small>
                        </h1>
                        <?php 
                        if(isset($_GET['ma'])) {
                            $pro_id=$_GET['ma'];

                            $sql1 = "delete from pictures where pro_id='$pro_id'";
                            mysqli_query($conn, $sql1);
                                echo "<script language='javascript'>window.location='index.php?page=danhsachhinhanhsanpham'</script>";
                            
                      }  
                         ?>
                    </div>
                    
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>STT</th>
                                <th style="width:150px;">Tên sản phẩm</th>
                                <th>Hình ảnh</th>
                                <th style="width:40px;">Xóa</th>
                                <th style="width:40px;">Sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($dataArr as $key => $value): ?>
                            <tr class="odd gradeX" align="center">
                                <td><?php echo $key+1; ?></td>
                                 <td><?php
                                 //thuc hien lay ten san pham
                                 $pro_id=$value['pro_id'];
                                 $sql_pro="select pro_name from products where pro_id=$pro_id";
                                 $query_pro=mysqli_query($conn, $sql_pro);
                                 $dataArr_proname=mysqli_fetch_assoc($query_pro); 
                                        
                                 echo $dataArr_proname['pro_name'];
                                 ?></td>
                                <td><img data-toggle="modal" data-target="#chitiethoadon<?php echo $key; ?>" src="image/produts/<?php echo $value['pic_name']; ?>" style="height:100px;width:100px;" /></td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return deleteConfirm()" href="index.php?page=danhsachhinhanhsanpham&ma=<?php echo $value['pro_id']; ?>"> Xóa</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="index.php?page=suahinhanhsanpham&ma=<?php echo $value['pro_id']; ?>">Sửa</a></td>
                            </tr>
                           <!--  box model -->
                            <div class="modal fade" id="chitiethoadon<?php echo $key; ?>" role="dialog">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Hình sản phẩm<?php echo $key; ?></h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="container">
                                                    <!-- thuc hien lay 4 hinh cua 1 san pham ra dua vao pro_id -->
                                        <?php 
                                            $pro_id=$value['pro_id'];
                                            $sql_pic="select pic_name from pictures where pro_id=$pro_id";
                                            $query_pic=mysqli_query($conn, $sql_pic);
                                            $dataArr_pic=array();
                                            while($row=mysqli_fetch_assoc($query_pic)){
                                                $dataArr_pic[]=$row;
                                            }
                                            /*echo '<pre>';
                                            print_r($dataArr_pic);
                                            echo '</pre>';*/
                                        ?>
                                                <?php foreach($dataArr_pic as $key_pic => $value_pic): ?>
                                                <div class="col-md-6">
                                                    <img width="200px" height="200px" src="image/produts/<?php echo $value_pic['pic_name']; ?>" alt="">
                                                    <div>Hình 0<?php echo $key_pic+1; ?></div>
                                                </div>
                                            <?php endforeach ?>
                                                </div>
                                            
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                            
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>


           
