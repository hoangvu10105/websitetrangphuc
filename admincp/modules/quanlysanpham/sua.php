<?php
    $sql_sua_sp = "SELECT * FROM tbl_sanpham  where id_sanpham='$_GET[idsanpham]' Limit 1" ;
    $query_sua_sp = mysqli_query($connect,$sql_sua_sp);
?>
<p>Sửa sản phẩm <p>
<table border="1" width="100%" style="border-collapse:collapse;">
<?php
while ($row = mysqli_fetch_array($query_sua_sp)){
?>
<form method="POST" action="modules/quanlysanpham/xuly.php?idsanpham=<?php echo $row['id_sanpham'] ?>" enctype="multipart/form-data">
    <tr>
        <td>Tên sản phẩm</td>
        <td><input type="text" value=" <?php echo $row['ten_sanpham'] ?>" name="tensanpham"></td>
    </tr>
    <tr>
        <td>Mã sản phẩm</td>
        <td><input type="text" value=" <?php echo $row['ma_sanpham'] ?>" name="masanpham"></td>
    </tr>
    <tr>
        <td>Giá sản phẩm</td>
        <td><input type="text" value=" <?php echo $row['gia_sanpham'] ?>" name="giasanpham"></td>
    </tr>
    <tr>
        <td>Số lượng</td>
        <td><input type="text" value=" <?php echo $row['soluong'] ?>" name="soluong"></td>
    </tr>
    <tr>
        <td>Nội dung</td>
        <td><textarea rows="10"  width="100%"   name="noidung" style="resize:none"> <?php echo $row['noidung'] ?></textarea></td>
    </tr>
    <tr>
        <td>Hình ảnh</td>
        <td>
            <input type="file" name="hinhanh">
            <img src="./modules/quanlysanpham/uploads/<?php echo  $row['hinhanh']  ?>" width="150px">
        </td>
    </tr>
    <tr>
        <td>Tóm tắt</td>
        <td><textarea rows="10" style="resize:none" name="tomtat"  >  <?php echo $row['tomtat'] ?></textarea></td>
    </tr>
    <tr>
    <td>Danh mục sản phẩm</td>
        <td>
            <select name="danhmuc" >
                
            <?php 
            $sql_danhmuc ="SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
            $query_danhmuc = mysqli_query($connect,$sql_danhmuc);
            while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
                if($row_danhmuc['id_danhmuc'] == $row["id_danhmuc"]){
            ?>
                <option selected value="<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['ten_danhmuc'] ?></option>
            <?php  }else{ 
            ?>
            <option  value="<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['ten_danhmuc'] ?></option>
                <?php
                 } 
                }
                ?>

            </select>
        </td>
    </tr>
    <tr>
    <td>Tình trạng</td>
        <td>
            <select name="tinhtrang" >
                  <?php
                if($row['tinhtrang'] ==1){ ?>
                <option value="1" selected>Hiện sản phẩm</option>
                <option value="0">Ẩn sản phẩm</option>
                    <?php } else{ ?>
                <option value="1">Hiện sản phẩm</option>
                <option value="0" selected>Ẩn sản phẩm</option>
                <?php } ?>
            </select>
        </td>
    </tr>
    <tr>
        <td colspan="2"><input type="submit" name="suasanpham" value="Sửa sản phẩm"></td>
    </tr>
</form>
<?php
}
?>
</table>