<?php
$sql_lietke_sp = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc ORDER BY id_sanpham DESC" ;
$query_lietke_sp = mysqli_query($connect,$sql_lietke_sp);
?>
<table style="width:100%" border="1" style="border-collapse:collapse;">
  <tr>
    <th>ID</th>
    <th>Tên sản phẩm</th>
    <th>Hình ảnh</th>
    <th>Giá</th>
    <th>Số lượng</th>
    <th>Danh mục</th>
    <th>Mã sản phẩm</th>
    <th>Tóm tắt</th>
    <th>Trạng thái</th>
    <th>Quản lí</th>
  </tr>
<?php
$i=0;
while($row =mysqli_fetch_array($query_lietke_sp)){
$i++;
?>

  <tr>
    <td><?php echo $i ?></td>
    <td><?php echo $row['ten_sanpham'] ?></td>
    <td><img src="./modules/quanlysanpham/uploads/<?php echo  $row['hinhanh']  ?>" width="150px"></td>
    <td><?php echo $row['gia_sanpham'] ?></td>
    <td><?php echo $row['soluong'] ?></td>
    <td><?php echo $row['ten_danhmuc'] ?></td>
    <td><?php echo $row['ma_sanpham'] ?></td>
    <td><?php echo $row['tomtat'] ?></td>
    <td><?php if( $row['tinhtrang']==1){
      echo 'Hiện sản phẩm';
    }else{
      echo 'Ẩn sản phẩm';
    } 
    ?>
    </td>
 
    <td><a href="modules/quanlysanpham/xuly.php?idsanpham=<?php echo $row['id_sanpham'] ?> ">Xóa</a> 
    | <a href="?action=quanlysanpham&query=sua&idsanpham=<?php echo $row['id_sanpham'] ?>"> Sửa</a></td>
  </tr>

<?php
}
?>
</table>