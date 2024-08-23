<?php

$connect = mysqli_connect("localhost", "root", "", "web_mysqli");

if (!$connect) {
    die("Không kết nối :" . mysqli_connect_error());
}

?>
<?php

if (isset($_POST['dangky'])) {
    $tenkhachhang = $_POST['hovaten'];
    $email = $_POST['email'];
    $dienthoai = $_POST['dienthoai'];
    $diachi = $_POST['diachi'];
    $matkhau = $_POST['matkhau'];
    ob_start();

    $sql_dangky = mysqli_query($connect, "INSERT INTO tbl_dangky(tenkhachhang,email,diachi,matkhau,dienthoai) VALUES('" . $tenkhachhang . "','" . $email . "','" . $diachi . "','" . $matkhau . "','" . $dienthoai . "')");

    if (isset($sql_dangky)) {
        $_SESSION['dangky'] =  $tenkhachhang;
        $_SESSION['email'] = $email;

        $_SESSION['id_khachhang'] =  mysqli_insert_id($connect);
        header('Location:index.php?quanly=giohang');
    }

    ob_end_flush();
}

?>


<p>Đăng ký</p>
<form action="" method="POST">
<table border="1">
    <tr>
        <td>Họ và tên</td>
        <td><input type="text" name="hovaten"></td>
    </tr>
    <tr>
        <td>Email</td>
        <td><input type="text" name="email"></td>
    </tr>
    <tr>
        <td>Điện thoại</td>
        <td><input type="text" name="dienthoai"></td>
    </tr> 
    <tr>
        <td>Địa chỉ</td>
        <td><input type="text" name="diachi"></td>
    </tr>
    <tr>
        <td>Mật khẩu</td>
        <td><input type="text" name="matkhau"></td>
    </tr>
    <tr>
        <td colspan="2"><input type="submit" name="dangky" value="Đăng ký"></td>
    </tr>
</table>
</form>