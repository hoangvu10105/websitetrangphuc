<?php

$connect = mysqli_connect("localhost", "root", "", "web_mysqli");

if (!$connect) {
    die("Không kết nối :" . mysqli_connect_error());
}

?>
<style>
  td {
    font-size: 16px;
}
tr{
  font-size: 22px;
}
h1{
  text-align: center;
  margin-top: 1rem;
  margin-bottom: 4.2rem;
}
</style>
<h1 >Giỏ hàng của <?php if(isset($_SESSION['dangky'])){
  echo $_SESSION['dangky'] ;
  echo $_SESSION['email'];
  // echo $_SESSION['id_khachhang'] ;
} ?></h1>

<?php 
   if (isset($_SESSION["card"])){
     
   }
?>
<table  style="width: 100%; text-align:center; border-collapse: collapse; border: 1px solid black;">
  <tr  style=" border: 1px solid black;">
    <th style=" border: 1px solid black;">id</th>
    <th style=" border: 1px solid black;">Mã sản phẩm</th>
    <th style=" border: 1px solid black;">Tên sản phẩm</th>
    <th style=" border: 1px solid black;">Hình ảnh</th>
    <th style=" border: 1px solid black;">Số lượng</th>
    <th style=" border: 1px solid black;">Giá sản phẩm</th>
    <th style=" border: 1px solid black;">Thành tiền</th>
  </tr>

  <?php if (isset($_SESSION["card"])){
   $i=0;
   $sql = "SELECT * FROM tbl_sanpham ";
   $query = mysqli_query($connect, $sql);
   $row = mysqli_fetch_array($query);

   $tongtien = 0;
 
    foreach($_SESSION["card"] as $card_item){
      $thanhtien= $card_item['soluong']*$card_item['giasanpham'];

      $tongtien += $thanhtien;
      $i++;
  ?>
  <tr  style=" border: 1px solid black;">
   <td style=" border: 1px solid black;"><?php echo $i ?></td>
   <td style=" border: 1px solid black;"><?php echo $card_item['masp'] ?></td>
   <td style=" border: 1px solid black;"><?php echo $card_item['tensanpham'] ?></td>
   <td style=" border: 1px solid black;"><img style="width: 80px;height:70px" src="admincp/modules/quanlysanpham/uploads/<?php echo $card_item['hinhanh'] ?>" ></td>
   <td style=" border: 1px solid black;">
          <a href="page/main/themgiohang.php?tru=<?php echo $card_item['id'] ?>"><i class="fa-solid fa-minus"></i></a>
          <?php echo $card_item['soluong'] ;
         ?>
          <a href="page/main/themgiohang.php?cong=<?php echo $card_item['id'] ?>"><i class="fa-solid fa-plus"></i></a>
        </td>
          
   <td ><?php echo $card_item['giasanpham'] ?></td>
   <td ><?php echo $thanhtien; ?></td>
   <td><a href="page/main/themgiohang.php?xoa=<?php echo $card_item['id'] ?>">Xóa</a></td>
  </tr>
  <?php 
    }
?>
   <tr  style=" border: 1px solid black;">
   <td colspan="8" style="color:brown"><p>Tổng tiền: <?php echo number_format($tongtien) .'VNĐ' ?> </p>
   <div style="clear:both;"></div>
   <?php
   if(isset($_SESSION['dangky'])){
    ?>
    <p><a href="page/main/thanhtoan.php">Đặt hàng</a></p>
    <?php 
    }else{
      ?>
         <p><a href="index.php?quanly=dangky">Đăng ký đặt hàng</a></p>
      <?php
    }
       ?>
  </td>
   
  </tr>
<?php
  }else{
    ?>
   <tr>
   <td colspan="6"><p>Hiện tại giỏ hàng trống </p></td>
  </tr>

  <?php }
   ?>
   
 
</table>
