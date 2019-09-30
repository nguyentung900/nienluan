$(function () {

	// xu ly .nut se xuat hien form login
	$('.delete').click(function(event) {
		if(confirm("ban co chac muon xoa")) {
            return true;
        }
        else {
            return false;
        }
	});

	//xu lý nut khi nhan vao se xuat hien form ghi ý kiến
	/*$('.dkvc').click(function(event) {
		
		//class noi dung
		$('.col-xs-6.col-sm-6.col-md-6.col-lg-6.form_ghiykien').addClass('hienra');

		//class momo
		$('.momo').addClass('momodira');

	});*/


	//INDEX2.HTML
	
	// thu nhỏ phần list-group
	$('.list-group').slideUp();

	//
	$('.motkhoi button').click(function(event) {
		//$('.list-group').slideDown(); thả phần class list-group khi ckick vao h6
		//$(this).next().slideDown(); thả phần class list-group: cach 2 dung next() khi ckick vao h6
		//thả phan class list-group xuong và khi cclick lại vào h6 thì thư lại (slideUp)
		$(this).next().slideToggle();
	});
});