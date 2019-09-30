document.addEventListener("DOMContentLoaded", function(){
	var trangthai = 'duoi300';
	var menu = document.querySelector('.header-bottom-w3ls');
	//var menu2 = document.getElementsByClassName('menu');
	//
	//
	var phantuload = document.querySelectorAll('.pic_blog');
	var phantuload2 = document.querySelectorAll('.tung');
	var menutitle = document.querySelectorAll('.nav li.n');
	console.log(menutitle);
	/*for(var i=0; i<phantuload.length; i++) {
		var vts3 = phantuload[i].offsetTop;
		//console.log(vts3);
	}*/
	//console.log(phantuload2);
	var trangthais3 = "duoi";
	//var vts3 = phantuload2[0].offsetTop;
	//console.log(vts3);
	var arrVt = [];
	var a = -350;
	for(var i=0; i<phantuload2.length; i++) {

		arrVt.push(phantuload2[i].offsetTop+a);
		a -=100;
	}
	//console.log(arrVt[3]);
	/*console.log(arrVt);
	var vts3 = phantuload[0].offsetTop+50;
	var vts3_02 = phantuload[1].offsetTop+250;
	var vts3_03 = phantuload[2].offsetTop+400;
	var vts3_04 = phantuload[3].offsetTop+650;*/
	//var vts3_02 = phantuload[0].offsetTop+150;
	//console.log(vts3);
	//console.log(arrVt[2]);

	//console.log(menu);
	window.addEventListener ('scroll', function(){
		//tính vitri khi cuộn chuộc
		var vitri = window.pageYOffset;
		console.log(vitri);
		if(vitri>300) {
			if(trangthai=='duoi300') {
				//console.log('tren 300');
				trangthai='tren300';
				menu.classList.add('header-bottom-w3ls2');
			}	
		}
		else if(vitri<=300) {
			if(trangthai=='tren300') {
				menu.classList.remove('header-bottom-w3ls2');
				trangthai='duoi300';
			}
			
		}


		//xu ly phantuload
		//
		
		for(var i=0; i<phantuload.length; i++) {
			if(window.pageYOffset > arrVt[i]) {
				phantuload[i].classList.add('dilen');
			}
		}

		//test
		// if(window.pageYOffset > vts3) {
		// 	if(trangthais3 == "duoi") {
		// 		trangthais3 = "tren";
		// 		/*for(var j=0; j<phantuload.length;j++) {
		// 			phantuload[j].classList.add('dilen');
		// 		}*/
		// 		phantuload[0].classList.add('dilen');
		// 		/*for(var i=0; i<phantuload.length; i++) {
		// 			phantuload[i].classList.add('dilen');
		// 		}*/
		// 	}
		// }
		// if(window.pageYOffset > vts3_02) {
		// 	if(trangthais3 == "tren") {
		// 		trangthais3 = "duoi";
		// 		phantuload[1].classList.add('dilen');
		// 	}
		// }
		// if(window.pageYOffset > vts3_03) {
		// 	if(trangthais3 == "duoi") {
		// 		trangthais3 = "tren";
		// 		phantuload[2].classList.add('dilen');
		// 	}
		// }
		// if(window.pageYOffset > vts3_04) {
		// 	if(trangthais3 == "tren") {
		// 		trangthais3 = "duoi";
		// 		phantuload[3].classList.add('dilen');
		// 	}
		// }
	})


	//them class active tren menu
	for(var i=0; i<menutitle.length; i++) {
		menutitle[i].onclick = function() {
		console.log('tungtung');
	}
	
	}



}, false);