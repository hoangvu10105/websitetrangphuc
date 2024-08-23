<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>website</title>
    <!-- font -->
     
  

    <!-- file css -->
    
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.1.0/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"/>
</head>
<body>
<!--  -->


<?php
session_start();
?>
<!-- search -->

<div class="search-form">

<div id="close-search" class="fas fa-times"></div>
    <p>
        <form action="index.php?quanly=timkiem" method="POST">
            <input type="text" name="tukhoa" placeholder="tim ngay.." id="search-box">
            <input type="submit" name="timkiem" value="Tìm kiếm">
        </form>
    </p>   
   
</div>


<?php
// Kiểm tra nếu quanly là giohang thì bao gồm giohang.php
if(isset($_GET['quanly']) && $_GET['quanly'] == 'giohang'){
    include("giohang.php");
} else {

    include("page/main/menu.php");
    include("page/main/home.php");
    include("admincp/config/config.php");
    include("page/main/category.php");
    include("page/main/deal.php");
    include("page/main/hot.php");
}
?>








<section class="packages" id="packages">

<?php
if(isset($_GET['quanly'])){
    $tam=$_GET['quanly'];
}else{
    $tam='';
}
if($tam=='danhmucsanpham'){
include("page/main/package.php");
}elseif($tam=='dangky'){
    include("page/main/dangky.php");
}elseif($tam=='thanhtoan'){
    include("page/main/thanhtoan.php");
} elseif($tam=='dangnhap'){
        include("page/main/dangnhap.php");
}
elseif($tam=='timkiem'){
    include("page/main/timkiem.php");}
    elseif($tam=='camon'){
        include("page/main/camon.php");}
// }else{
//     include("page/main/index.php");


?>
<?php
//include("page/main/index.php"); ?>
<div style="clear:both;"></div>
<style type="text/css">
    ul.list_trang{
        padding: 0;
        margin: 0;
        list-style: none;
    }
    ul.list_trang li{
        float: left;
        padding: 5px 13px;
        margin: 5px;
        background: burlywood;
    }
    ul.list_trang li a {
        color: #000;
        text-align: center;
        text-decoration: none;
        font-size: 15px;
    }
</style>
<div id="pagination-container">
    <?php include('load_data.php'); ?>
</div>
<section class="footer">
    <div class="container">

    

        <div class="box">
            <h3>Thành Viên 1</h3>
            <div class="link">
                <a href="#">Hoàng Vũ</a>
                <a href="#">vundh.22ce@gmail.com</a>
                <a href="#">Lớp : 22CE</a>
                <a href="#">Lớp sinh hoạt : 22CE</a>
            </div>
        </div>

        <div class="box">
            <h3>Thành Viên 2</h3>
            <div class="link">
                <a href="#"></a>
                <a href="#">it@.com</a>
                <a href="#"> : </a>
                <a href="#"></a>
            </div>
        </div>

        <div class="box">
            <h3>Liên hệ</h3>
            <div class="link">
                <a href="#">+84 123456789</a>
                <a href="https://www.facebook.com/">fb:https://www.facebook.com/</a>
                <a href="#">Insragram : MR.bearry</a>
                <a href="https://github.com/">Github : https://github.com/</a>
            </div>
        </div>
<h1 class="credit">web tạo bởi <span>Nguyễn Đặng Hoàng Vũ</span> vui lòng không sao chép dưới mọi hình thức</h1>

    </div>
</section>
<?php


// Kiểm tra xem người dùng đã nhấp vào liên kết "Đăng xuất" hay chưa
if (isset($_GET['dangxuat']) && $_GET['dangxuat'] == 1) {
    // Hủy toàn bộ session
    session_unset();
    session_destroy();
    
    // Chuyển hướng người dùng về trang chính hoặc trang đăng ký (tùy theo yêu cầu)
    header("Location: index.php");
    exit();
}
?>



<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function(){
        // Xử lý sự kiện khi nhấp vào một trang
        $('#pagination-container').on('click', '.page-link', function(e){
            e.preventDefault();
            var page = $(this).data('page');

            // Gửi yêu cầu Ajax để lấy dữ liệu của trang mới
            $.ajax({
                url: 'load_data.php',
                type: 'GET',
                data: { trang: page },
                success: function(data){
                    // Cập nhật nội dung trang với dữ liệu mới
                    $('#pagination-container').html(data);
                },
                error: function(){
                    alert('Có lỗi xảy ra khi thực hiện yêu cầu Ajax');
                }
            });
        });
    });
</script>


<script src="script2.js"></script>
</body>
</html> 