<?php
    $sql_sua_danhmucsp = "SELECT * FROM tbl_danhmuc  where id_danhmuc='$_GET[iddanhmuc]' Limit 1" ;
    $query_sua_danhmucsp = mysqli_query($connect,$sql_sua_danhmucsp);
?>
<p>Sửa danh mục sản phẩm <p>
<table border="1" width="40%" style="border-collapse:collapse;">
<form method="POST" action="modules/quanlydanhmucsanpham/xuly.php?iddanhmuc=<?php echo $_GET['iddanhmuc'] ?>">
    <?php
    while($dong=mysqli_fetch_array( $query_sua_danhmucsp)){

    
    ?>
    <tr>
        <th>Tên danh mục</th>
    </tr>
    <tr>
        <td>Tên danh mục</td>
        <td><input type="text" value="<?php echo $dong['ten_danhmuc'] ?>" name="tendanhmuc"></td>
    </tr>
    <tr>
    <td>Thứ tự</td>
        <td><input type="text"  value="<?php echo $dong['thutu'] ?>" name="thutu"></td>
    </tr>
    <tr>
        <td colspan="2"><input type="submit" name="suadanhmuc" value="sửa danh mục sản phẩm"></td>
    </tr>
    <?php
    }
    ?>
</form>
</table>