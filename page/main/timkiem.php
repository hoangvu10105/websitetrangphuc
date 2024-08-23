<?php

$connect = mysqli_connect("localhost", "root", "", "web_mysqli");

if (!$connect) {
    die("Không kết nối :" . mysqli_connect_error());
  
}

?>
<?php 
if(isset($_POST['timkiem'])) {
    $tukhoa = $_POST['tukhoa'];
}else{
    $tukhoa = '';
}
    $sql_pro ="SELECT * FROM  tbl_sanpham WHERE ten_sanpham LIKE '%".$tukhoa."%' " ;
    $query_pro = mysqli_query($connect,$sql_pro);
 
?>
<h1>Từ khóa tìm kiếm : <?php echo $_POST['tukhoa'] ?></h1>
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