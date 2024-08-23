
<?php
$connect = mysqli_connect("localhost", "root", "", "web_mysqli");

if (!$connect) {
    die("Không kết nối :" . mysqli_connect_error());
}

?>
<?php 
            $sql_danhmuc ="SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
            $query_danhmuc = mysqli_query($connect,$sql_danhmuc);
 ?>
<header class="header">
    <a href="#" class="logo"><i class="fas fa-shirt"></i> MR.BEARRY </a>

    <nav class="navbar">
        <div id="nav-close" class="fas fa-times"></div>
        <a href="index.php">Trang chủ</a>
        <!-- <?php while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
        ?>
        <a href="index.php?quanly=danhmucsanpham&id=<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['ten_danhmuc'] ?></a>
        <?php } ?> -->

        <a href="index.php?quanly=giohang">Giỏ hàng</a>
        <a href="index.php?quanly=tintuc">Tin tức</a>
            <?php if(isset($_SESSION['dangky'])) {
                 ?>
                <a href="index.php?dangxuat=1">Đăng xuất</a>
                
            <?php }else{ ?>
        <a href="index.php?quanly=dangky">Đăng ký</a>
        <?php } ?>
        

        <a href="index.php?quanly=dangnhap"  style="color:red">  <?php if(!isset($_SESSION['dangky'])){
            echo ' Đăng nhập ngay ' ;
        }else{
            echo 'Tài khoản :'. $_SESSION['email'];
        } ?></a>
    </nav>

    <div class="icons">
        <div id="menu-btn" class="fas fa-bars"></div>
        <a href="#" class="fas fa-shopping-cart"></a>
        <div id="search-btn" class="fas fa-search"></div>
    </div>

</header>