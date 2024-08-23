<p>Xem đơn hàng</p>
<?php

$sql_lietke_dh = "SELECT * FROM tbl_cart_detail,tbl_sanpham WHERE tbl_cart_detail.id_sanpham=tbl_sanpham.id_sanpham 
AND tbl_cart_detail.code_cart='$_GET[code]' ORDER BY tbl_cart_detail.id_cartdetail DESC" ;
$query_lietke_dh = mysqli_query($connect,$sql_lietke_dh);
?>
<p>Liệt kê danh mục sản phẩm <p>
<table style="width:100%" border="1" style="border-collapse:collapse;">
  <tr>
    <th>ID</th>
    <th>Mã đơn hàng</th>
    <th>Tên sản phẩm</th>
    <th>Số lượng</th>
    <th>Đơn giá</th>
    <th>Thành tiền</th>

  </tr>
<?php
$i=0;
$tongtien =0;
while($row =mysqli_fetch_array($query_lietke_dh)){
$i++;
$thanhtien=$row['gia_sanpham']*$row['soluongmua'];
$tongtien += $thanhtien;
?>
  <tr>
    <td><?php echo $i ?></td>
    <td><?php echo $row['code_cart'] ?></td>
    <td><?php echo $row['ten_sanpham'] ?></td>
    <td><?php echo $row['soluongmua'] ?></td>
    <td><?php echo number_format($row['gia_sanpham'],0,',','.').'VND' ?></td>
    <td><?php echo number_format($thanhtien,0,',','.').'VND' ?></td>
 

  </tr>

<?php
}
?>
<tr><td colspan="6">
    <p>Tổng tiền :<?php echo number_format($tongtien,0,',','.').'VND' ?></p>
    <p><a href="">Đã xử lý </a></p>
</td></tr>
</table>