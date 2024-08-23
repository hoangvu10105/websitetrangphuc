<?php

$connect = mysqli_connect("localhost", "root", "", "web_mysqli");

if (!$connect) {
    die("Không kết nối :" . mysqli_connect_error());
  
}

?>
<?php 
    $sql_pro ="SELECT * FROM tbl_danhmuc , tbl_sanpham WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc
     AND tbl_sanpham.id_danhmuc='$_GET[id]' ORDER BY tbl_sanpham.id_sanpham DESC";
    $query_pro = mysqli_query($connect,$sql_pro);
    $query_pro1 = mysqli_query($connect,$sql_pro);
 
?>
<h1 class="heading"><?php     $row_title = mysqli_fetch_array($query_pro1); echo $row_title['ten_danhmuc'] ?></h1>
<div class="box-container">
    <?php while ($row_pro = mysqli_fetch_array($query_pro)){ ?>
    <!-- 1 -->
    <div class="box">

        <div class="image">
        <a href="page/main/page1.php?quanly=package&id=<?php echo $row_pro['id_sanpham'] ?>"><img src="admincp/modules/quanlysanpham/uploads/<?php echo $row_pro['hinhanh']  ?>" alt=""></a>  
        </div>

        <div class="content">
            <h3><?php echo $row_pro['ten_sanpham'] ?></h3>
            <div class="price">Giá: <?php echo number_format($row_pro['gia_sanpham']).' VNĐ' ?> </div>
            <a href="#" class="btn">Tìm hiểu</a>
        </div>
    </div>
    <?php } ?>
</div>