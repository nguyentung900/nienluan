<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
               		<div class="col-lg-12">
                        <h1 class="page-header">
                            <small></small>
                        </h1>
                    </div>
                    <div class="col-lg-12">
                        <h1 class="page-header">Góp ý về sản phẩm của khách hàng
                            <small>Danh sách</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>STT</th>
                                <th>Khách hàng</th>
                                <th>Chủ đề</th>
                                <th>Nội dung</th>
                                <th>Ngày góp ý</th>
                                <th>Tên sản phẩm</th>
                                <th style="width:30px">Xóa</th>
								<th style="width:100px;">Trạng thái</th>
                            </tr>
                        </thead>
                        <tbody>
                        	<form name="frmSub" id="frmSub" action="" method="get">
                            <tr class="odd gradeX" align="center">
                                <td>1</td>
                                <td>Tina</td>
                                <td>Bán đồng hồ gì mà đẹp dữ</td>
                                <td>Tôi tên Võ Thị Hồng Thắm xin đề nghị cửa hàng bớt bán đồng hồ đẹp và chất lượng lại nha! Bán như vậy ai bán lại</td>
                                <td>01/01/2019</td>
                                <td>Casio</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Xóa</a></td>
                                <td><a href="#"><button type="button" data-toggle="modal" data-target="#phanhoigopy" class="btn btn-danger">Chưa trả lời</button></a></td>
                            </tr>
                            <tr class="odd gradeX" align="center">
                                <td>1</td>
                                <td>Tina</td>
                                <td>Bán đồng hồ gì mà rẻ dữ</td>
                                <td>Tôi tên Võ Thị Hồng Thắm xin đề nghị cửa hàng bán đồng mắt lên một xíu nha</td>
                                <td>01/01/2019</td>
                                <td>DW</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Xóa</a></td>
                                <td><a href="#"><button type="button" data-toggle="modal" data-target="#phanhoigopy" class="btn btn-success">Đã trả lời</button></a></td>
                            </tr>
                            </form>
                        </tbody>
                    </table>
                      <div class="modal fade" id="phanhoigopy" role="dialog">
    					<div class="modal-dialog modal-lg">
      						<div class="modal-content">
        						<div class="modal-header">
                                <form name="frm" action="" method="post">
          							<button type="button" class="close" data-dismiss="modal">&times;</button>
          							<h4 class="modal-title">Trả lời góp ý về dịch vụ</h4>
        						</div>
       			 				<div class="modal-body">
          							<div class="form-group">
                                    	<label>Chủ đề góp ý:</label>
                                        <input type="text" name="txtChuDe" class="form-control" id="txtChuDe" value="Nhân viên giao hàng quá đẹp trai" />
                                    </div>
                                    <div class="form-group">
                                    	<label>Nội dung góp ý:</label>
                                        <textarea name="txtNoiDung" rows="5" class="form-control"  id="txtNoiDung">Tôi tên Võ Thị Hồng Thắm xin đề nghị cửa hàng cử nhân viên bớt đẹp trai lại chứ như vậy là không được rồi</textarea>
                                    </div>
                                    <div class="form-group">
                                    	<label>Nội dung phản hồi:</label>
                                        <textarea name="txtNoiDung" rows="5" class="form-control"  id="txtNoiDung">Ok thank you! tại của hàng chúng tôi toàn nhưng những người đẹp trai thôi bạn ạ! Mong bạn thông cảm</textarea>
                                    </div>
       					 		</div>
        					<div class="modal-footer">
          				<button type="button" class="btn btn-success" data-dismiss="modal">Gửi phản hồi</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                        </div></form>
        				</div>
      				</div>
    			</div>
  				</div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
