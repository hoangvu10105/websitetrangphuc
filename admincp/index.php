
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/styleadmin.css">
    1 <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
</head>
<?php session_start();
if (!isset($_SESSION['dangnhap'])){
    header('Location:login.php');
}
?>
<body>
 <h2 class="title_admin">admin</h2>
 <div class="wrapper">
 <?php
    include("config/config.php");
    include("modules/header.php");
    include("modules/menu.php");
    include("modules/main.php");
    include("modules/footer.php");
 ?>
 </div>
 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<script>
    new Morris.Line({
        element: 'chart',
        data: [
            { year: '2008', order:10 ,sales:6 , quantity: 20 },
            { year: '2012', order:130 ,sales:8, quantity: 30 },
            { year: '2023', order:100 ,sales:7 , quantity: 40 },
        ],
        xkey: 'year',
        ykeys: ['order','sales','quantity'],
        labels: ['Đơn hàng','Doanh thu','Số lượng bán ra']
    });
</script>

</body>

</html>