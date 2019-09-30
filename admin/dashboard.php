<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    <title>Document</title>
</head>
<body>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                        <h1 class="page-header">
                            <small></small>
                        </h1>
                    </div>
            <div class="col-lg_9">
                <canvas id="myChart"></canvas>
            </div>
        </div>
    </div>
</div>
<?php
include_once'connection.php';
//$sql = "select SUM(a.spdh_soluong) from sanphamdonhang as a JOIN donhang as b ON a.dh_id = b.dh_id WHERE b.dh_thang = 01";
//select SUM(a.spdh_soluong) from sanphamdonhang as a JOIN donhang as b ON a.dh_id = b.dh_id WHERE b.dh_ngaynhap BETWEEN CAST('2019-01-01' AS DATE) AND CAST('2019-01-31' AS DATE)
//Tháng 1
$query  = mysqli_query($conn,"SELECT SUM(bill_pro_amount) as soluong FROM bill WHERE bill_month = 1");
$thang1 = mysqli_fetch_array($query,MYSQLI_ASSOC);
//Tháng 2
$query  = mysqli_query($conn,"SELECT SUM(bill_pro_amount) as soluong FROM bill WHERE bill_month = 2");
$thang2 = mysqli_fetch_array($query,MYSQLI_ASSOC);
//Tháng 3
$query  = mysqli_query($conn,"SELECT SUM(bill_pro_amount) as soluong FROM bill WHERE bill_month = 3");
$thang3 = mysqli_fetch_array($query,MYSQLI_ASSOC);
//Tháng 4
$query  = mysqli_query($conn,"SELECT SUM(bill_pro_amount) as soluong FROM bill WHERE bill_month = 4");
$thang4 = mysqli_fetch_array($query,MYSQLI_ASSOC);
//Tháng 5
$query  = mysqli_query($conn,"SELECT SUM(bill_pro_amount) as soluong FROM bill WHERE bill_month = 5");
$thang5 = mysqli_fetch_array($query,MYSQLI_ASSOC);
//Tháng 6
$query  = mysqli_query($conn,"SELECT SUM(bill_pro_amount) as soluong FROM bill WHERE bill_month = 6");
$thang6 = mysqli_fetch_array($query,MYSQLI_ASSOC);
//Tháng 7
$query  = mysqli_query($conn,"SELECT SUM(bill_pro_amount) as soluong FROM bill WHERE bill_month = 7");
$thang7 = mysqli_fetch_array($query,MYSQLI_ASSOC);
//Tháng 8
$query  = mysqli_query($conn,"SELECT SUM(bill_pro_amount) as soluong FROM bill WHERE bill_month = 8");
$thang8 = mysqli_fetch_array($query,MYSQLI_ASSOC);
//Tháng 9
$query  = mysqli_query($conn,"SELECT SUM(bill_pro_amount) as soluong FROM bill WHERE bill_month = 9");
$thang9 = mysqli_fetch_array($query,MYSQLI_ASSOC);
//Tháng 10
$query  = mysqli_query($conn,"SELECT SUM(bill_pro_amount) as soluong FROM bill WHERE bill_month = 10");
$thang10 = mysqli_fetch_array($query,MYSQLI_ASSOC);
//Tháng 11
$query  = mysqli_query($conn,"SELECT SUM(bill_pro_amount) as soluong FROM bill WHERE bill_month = 11");
$thang11 = mysqli_fetch_array($query,MYSQLI_ASSOC);
//Tháng 12
$query  = mysqli_query($conn,"SELECT SUM(bill_pro_amount) as soluong FROM bill WHERE bill_month = 12");
$thang12 = mysqli_fetch_array($query,MYSQLI_ASSOC);
?>
    <script>
    var t1 = <?php echo json_encode($thang1['soluong']); ?>;
    var t2 = <?php echo json_encode($thang2['soluong']); ?>;
    var t3 = <?php echo json_encode($thang3['soluong']); ?>;
    var t4 = <?php echo json_encode($thang4['soluong']); ?>;
    var t5 = <?php echo json_encode($thang5['soluong']); ?>;
    var t6 = <?php echo json_encode($thang6['soluong']); ?>;
    var t7 = <?php echo json_encode($thang7['soluong']); ?>;
    var t8 = <?php echo json_encode($thang8['soluong']); ?>;
    var t9 = <?php echo json_encode($thang9['soluong']); ?>;
    var t10 = <?php echo json_encode($thang10['soluong']); ?>;
    var t11 = <?php echo json_encode($thang11['soluong']); ?>;
    var t12 = <?php echo json_encode($thang12['soluong']); ?>;
    //select SUM(a.spdh_soluong) from sanphamdonhang as a JOIN donhang as b ON a.dh_id = b.dh_id WHERE b.dh_thang = 03
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7","Tháng 8","Tháng 9","Tháng 10","Tháng 11","Tháng 12"],
        datasets: [{
            label: "Số lượng sản phẩm bán được",
            backgroundColor: 'rgb(98, 182, 255)',
            borderColor: 'rgb(8, 11, 104)',
            
            data: [t1, t2, t3, t4, t5, t6, t7, t8, t9, t10, t11, t12],
        }]
    },

    // Configuration options go here
    options: {}
});
    </script>
</body>
</html>