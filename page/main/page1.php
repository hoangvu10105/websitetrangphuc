<?php

$connect = mysqli_connect("localhost", "root", "", "web_mysqli");

if (!$connect) {
    die("Không kết nối :" . mysqli_connect_error());
}
echo " kết nối thành công"
?>
<?php 
 $sql_chitiet ="SELECT * FROM tbl_danhmuc , tbl_sanpham WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc
 AND tbl_sanpham.id_sanpham='$_GET[id]' LIMIT 1 ";
$query_chitiet = mysqli_query($connect,$sql_chitiet);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive</title>
    <!-- Link to css -->
    <link rel="stylesheet" href="stylepage.css">
    <!--Box icons-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"/>
    
</head>
<body>
    <!--Main Content Container-->
    <div class="main">
        <!--Header-->
        <header>
            <!--Navbar-->
            <div class="nav container">
                <!--Logo-->
                <p href="#" class="logo" style="font-size: 2rem;"><i class="fas fa-shirt"></i> MR.BEARRY </p>
                <!--Menu Icon-->
                <i class='bx bx-menu' id="menu-icon"></i>
                <!--Nav list-->
                <ul class="navbar">
                    <li><a href="index2.html">Trang chủ</a></li>
                    <li><a href="#specs">Mô tả</a></li>
                    <li><a href="#shop">Sản phẩm</a></li>
                    <li><a href="#buds">Danh mục</a></li>
                    <a href="../../index.php?quanly=giohang">Giỏ hàng</a>
                </ul>
            </div>
        </header>
        <!--Home-->
        <section class="home" id="home">
            <!--Home Content-->
            <div class="home-content container">
                <?php while($row_chitiet = mysqli_fetch_array($query_chitiet)) {
                     ?>
                <div class="home-img">
                    <img src="../../admincp/modules/quanlysanpham/uploads/<?php echo $row_chitiet['hinhanh']  ?>" alt="">
                </div>
                
                <!--Home Text-->
                <form method="POST" action="themgiohang.php?idsanpham=<?php echo $row_chitiet['id_sanpham'] ?>">
                <div class="home-text">
                   <h1><?php echo $row_chitiet['ten_sanpham'] ?> </h1> 
                   <p>Thiết kế sang trọng, thu hút và bắt mắt. Đôi cánh tiên làm điểm nhấn. Bộ trang phục thích hợp đi dự event hoặc cosplay</p>
                   <p>Váy dạ hội được làm từ các loại vải cao cấp như sa tanh, voan và ren, và được trang trí bằng đá quý, hoa văn, các chi tiết thêu tay.  </p>
                   <p>Với nhiều màu sắc và kiểu dáng khác nhau, bạn có thể dễ dàng lựa chọn một chiếc váy dạ hội phù hợp với sở thích và phong cách của mình
                     để trở nên nổi bật và quyến rũ trong những buổi tiệc tùng, sự kiện đặc biệt hay lễ kỷ niệm. </p>
                    <p style="font-size: 20px;"> <strong> Giá: <?php echo number_format($row_chitiet['gia_sanpham']) .' VNĐ ' ?></strong></p>
                    <p></p>
                     <p><input style="font-size: 25px;" type="submit" name="themgiohang" value="Thêm giỏ hàng"></p>
                </div>
                </form>
                
                
            </div>
        </section>
        <!--Specs-->
        <section class="specs" id="specs">
            <h1 class="heading">Mô tả</h1>
            <!--Specs Content-->
            <div class="specs-container container">
                <div class="specs-details">
                    <div class="box">
                        <i class='bx bx-happy-heart-eyes'></i>
                        <h3>Thiết kế sang trọng</h3>
                        <p> Được thiết kế theo kiểu dáng suông dài gồm nhiều lớp váy tạo nên độ bồng bềnh tiên cảnh đính kèm đôi cánh tiên làm điểm nhấn chính cho bộ trang phục</p>

                    </div>
                    <div class="box">
                        <i class='bx bxl-sketch'></i>
                        <h3>Bắt mắt và thu hút</h3>
                        <p>Hoa và đá swarovski được các thợ lành nghề đính 1 cách tỉ mỉ và cẩn thận. Tạo sự hài hòa cho bộ trang phục và giúp nó thêm phần bắt mắt, thu hút ánh nhìn.</p>
                    </div>
                    <div class="box">
                        <i class='bx bxl-shopify'></i>
                        <h3>Thanh toán dễ dàng</h3>
                        <p>Nếu bạn không muốn mua một chiếc váy dạ hội mới, bạn có thể thuê một chiếc váy dạ hội từ cửa hàng cho thuê trang phục của chúng tôi. Hỗ trợ tư vấn nhanh gọn và thuận tiện nhất.</p>
                    </div>
                </div>
                <div class="specs-img">
                    <img src="./img/anh/a1 (111).jpg" alt="">
                </div>
            </div>

        </section>
        <!--Shop-->
        <section class="shop" id="shop">
            <!--Heading-->
            <h2 class="heading">Sản phẩm liên quan</h2>
            <!--Shop Content-->
            <div class="shop-container container">
                <!--Box 1-->
                <div class="box">
                    <img src="../../admincp/modules/quanlysanpham/uploads/1697801857_anh11.jpg" alt="">
                    <h3>Mẫu 1</h3>
                    <span>50.000&#8363;</span>
                    <i class='bx bx-shopping-bag' ></i>         
                </div>
                <!--Box 2-->
                <div class="box">
                    <img src="../../admincp/modules/quanlysanpham/uploads/1697819463_anh13.jpg" alt="">
                    <h3>Mẫu 2</h3>
                    <span>40.000&#8363;</span>
                    <i class='bx bx-shopping-bag' ></i>         
                </div>
                <!--Box 3-->
                <div class="box">
                    <img src="../../admincp/modules/quanlysanpham/uploads/1697801888_anh3.jpg" alt="">
                    <h3>Mẫu 3</h3>
                    <span>60.000&#8363;</span>
                    <i class='bx bx-shopping-bag' ></i>         
                </div>
                <!--Box 4-->
                <div class="box">
                    <img src="../../admincp/modules/quanlysanpham/uploads/1698721913_quan-jean-ong-rong-nu-mau-den-jean-streetwear.jpg" alt="">
                    <h3>Mẫu 4</h3>
                    <span>50.000&#8363;</span>
                    <i class='bx bx-shopping-bag' ></i>         
                </div>
                <!--Box 5-->
                <div class="box">
                    <img src="../../admincp/modules/quanlysanpham/uploads/1697729951_q.jpg" alt="">
                    <h3>Mẫu 5</h3>
                    <span>70.000&#8363;</span>
                    <i class='bx bx-shopping-bag' ></i>         
                </div>
                <!--Box 6-->
                <div class="box">
                    <img src="./img/anh/a1 (118).jpg" alt="">
                    <h3>Mẫu 6</h3>
                    <span>90.000&#8363;</span>
                    <i class='bx bx-shopping-bag' ></i>         
                </div>
                <!--Box 7-->
                <div class="box">
                    <img src="./img/anh/a1 (119).jpg" alt="">
                    <h3>Mẫu 7</h3>
                    <span>50.000&#8363;</span>
                    <i class='bx bx-shopping-bag' ></i>         
                </div>
                <!--Box 8-->
                <div class="box">
                    <img src="./img/anh/a1 (120).jpg" alt="">
                    <h3>Mẫu 8</h3>
                    <span>40.000&#8363;</span>
                    <i class='bx bx-shopping-bag' ></i>         
                </div>
                <!--Box 9-->
                <div class="box">
                    <img src="./img/anh/a1 (121).jpg" alt="">
                    <h3>Mẫu 9</h3>
                    <span>30.000&#8363;</span>
                    <i class='bx bx-shopping-bag' ></i>         
                </div>
                <!--Box 10-->
                <div class="box">
                    <img src="./img/anh/a1 (122).jpg" alt="">
                    <h3>Mẫu 10</h3>
                    <span>40.000&#8363;</span>
                    <i class='bx bx-shopping-bag' ></i>         
                </div>
                <!--Box 11-->
                <div class="box">
                    <img src="./img/anh/a1 (123).jpg" alt="">
                    <h3>Mẫu 11</h3>
                    <span>50.000&#8363;</span>
                    <i class='bx bx-shopping-bag' ></i>         
                </div>
                <!--Box 12-->
                <div class="box">
                    <img src="./img/anh/a1 (124).jpg" alt="">
                    <h3>Mẫu 12</h3>
                    <span>80.000&#8363;</span>
                    <i class='bx bx-shopping-bag' ></i>         
                </div>
                <!--Box 13-->
                <div class="box">
                    <img src="./img/anh/a1 (128).jpg" alt="">
                    <h3>Mẫu 13</h3>
                    <span>60.000&#8363;</span>
                    <i class='bx bx-shopping-bag' ></i>         
                </div>
                <!--Box 14-->
                <div class="box">
                    <img src="./img/anh/a1 (125).jpg" alt="">
                    <h3>Mẫu 14</h3>
                    <span>70.000&#8363;</span>
                    <i class='bx bx-shopping-bag' ></i>         
                </div>

                <div class="box">
                    <img src="./img/anh/a1 .jpg" alt="">
                    <h3>Mẫu 15</h3>
                    <span>90.000&#8363;</span>
                    <i class='bx bx-shopping-bag' ></i>         
                </div>
            </div>
        </section>
        <!--Buds-->
        <section class="buds" id="buds">
            <div class="buds-container container">
            
                <div class="buds-text">
        
                <h2>Bạn đang xem sản phẩm :  <?php echo $row_chitiet['ten_sanpham']  ?> </h2>

                    <span><?php echo number_format($row_chitiet['gia_sanpham'])  ?>&#8363;</span>
                    <p>Khám phá thêm về chủ đề này nào!</p>
                    <a href="#" class="btn">
                        <i class='bx bx-shopping-bag'></i>
                        <p><input type="submit" name="themgiohang" value="Quay lại thêm giỏ hàng"></p>
                    </a>
                </div>
        
                <!-- Buds Image-->
                <div class="buds-img">
                    <img src="../../admincp/modules/quanlysanpham/uploads/<?php echo $row_chitiet['hinhanh']  ?>" alt="">
                </div>
            </div>
        </section>
        <!--Footer-->
        <section class="footer container">
            <a href="#" class="logo">
                <img src="./img/anh/logo.png" alt="">
                <div class="footer-box">
                    <h2>Các sản phẩm</h2>
                    <a href="#">Váy dạ hội</a>
                    <a href="#">Hán phục</a>
                    <a href="#">Việt phục</a>
                    <a href="#">Cosplay</a>
                </div>
                <div class="footer-box">
                    <h2>Thanh toán</h2>
                    <a href="#">Thẻ tín dụng</a>
                    <a href="#">Thẻ ghi nợ</a>
                    <a href="#">Tiền mặt</a>
                    <a href="#">Hỗ trợ thêm</a>
                </div>
                <div class="footer-box">
                    <h2>Cộng đồng</h2>
                    <div class="social">
                        <a href="#"><i class='bx bxl-facebook' ></i></a>
                        <a href="#"><i class='bx bxl-twitter' ></i></a>
                        <a href="#"><i class='bx bxl-instagram' ></i></a>
                    </div>
                </div>
        </section>
        <!--Copyright-->
        <div class="copyright">
            <p>&#169; Website tạo bởi <span>Nguyễn Đặng Hoàng Vũ và Đặng Thị Anh Thư</span> vui lòng không sao chép dưới mọi hình thức</p>
        </div>
    </div>
    <?php } ?>
    <!--Scroll Reveal Animation-->
    <script src="https://unpkg.com/scrollreveal"></script>

    <!--Link To JS-->
    <script src="js/main.js"></script>
</body>
</html>
