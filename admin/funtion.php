<?php 
    function format_gia($gia) {
        $gia1 = substr($gia, 0, 3);
        $gia1_7 = substr($gia, 0, 1);
        $gia1_8 = substr($gia, 0, 2);
        $gia2 = substr($gia, 3, 3);
        $gia2_7 = substr($gia, 1, 3);
        $gia2_8 = substr($gia, 2, 3);
        //$gia3 = substr($gia, 6, 3);
        $gia3_7 = substr($gia, 4, 3);
        $gia3_8 = substr($gia, 5, 3);

        //hang chuc5 nghin
        $gia1_5 = substr($gia, 0, 2);
        $gia2_5 = substr($gia, 2);

        //hàng nghìn

        if(strlen($gia)==6){
            $gia = $gia1.' '.$gia2.'đ';
        }
        else if(strlen($gia)==7) {
            $gia = $gia1_7.' '.$gia2_7.' '.$gia3_7.'đ';
        }
        else if(strlen($gia)==8) {
            $gia = $gia1_8.' '.$gia2_8.' '.$gia3_8.'đ';
        }
        else if(strlen($gia)==5) {
            $gia = $gia1_5.' '.$gia2_5.'đ';
        }
        else if(strlen($gia)==4) {
            $gia = $gia.'đ';
        }
        return $gia;
    }


    //echo format_gia(1000000);
 ?>
