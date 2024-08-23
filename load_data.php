<?php
$connect = mysqli_connect("localhost", "root", "", "web_mysqli");
if (!$connect) {
    die("Không kết nối :" . mysqli_connect_error());
}

if(isset($_GET['trang'])){
    $page = $_GET['trang'];
}else{
    $page = '';
}
if($page == '' || $page == '1'){
    $begin = 0;
}else{
    $begin = ($page * 6) - 6;
}

$sql_pro = "SELECT * FROM  tbl_sanpham LIMIT $begin,6";
$query_pro = mysqli_query($connect, $sql_pro);
?>
<h1 class="heading">Mua sắm ngay</h1>
<div class="box-container">
    <?php while ($row_pro = mysqli_fetch_array($query_pro)){ ?>
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

<?php
$sql_trang = mysqli_query($connect, "SELECT * FROM tbl_sanpham");
$row_count = mysqli_num_rows($sql_trang);
$trang = ceil($row_count/6);
?>

<p style="font-size: 17px;">Trang:</p>
<ul class="list_trang">
    <?php for($i=1; $i<=$trang; $i++){ ?>
        <li <?php if($i==$page){echo 'style="background:red"';}else echo ''; ?>>
            <a href="#" class="page-link" data-page="<?php echo $i ?>"><?php echo $i ?></a>
        </li>
    <?php } ?>
</ul>
