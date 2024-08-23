<?php 
session_start();
 ?>
<?php

$connect = mysqli_connect("localhost", "root", "", "web_mysqli");

if (!$connect) {
    die("Không kết nối :" . mysqli_connect_error());
}
echo "";
?>

<?php
if(isset($_POST['dangnhap'])){
    $taikhoan = $_POST['username'];
    $matkhau = md5($_POST['password']);
    $sql ="SELECT *FROM tbl_admin WHERE user_name='".$taikhoan."' AND password='".$matkhau."' LIMIT 1 ";
    $row =mysqli_query($connect,$sql);
    $coutn = mysqli_num_rows($row);
    if($coutn>0){
       $_SESSION['dangnhap'] =$taikhoan;
       header('Location:index.php');
    }
    else{
        echo '<script> alert(" Tài khoản hoặc mật khẩu không đúng ") </script>';
        header('Location:login.php');
    }
} 
 ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- link css -->
    <link rel="stylesheet" href="./style/style1.css">
    <!-- box icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
</head>

<body>
    <!-- thanh dieu huong -->
    <header>
      <h2 class="logo">MR.BEARRY</h2>
      <nav class="navigation">
        <a href="#">Trang chủ</a>
        <a href="#">Tùy chọn</a>
        <a href="#">Trợ giúp</a>
        <a href="#">Liên hệ</a>
        <button class="btnLogin-popup">Đăng Nhập</button>
      </nav>
   </header>

   <div class="wrapper">
    <span class="icon-close">
      <ion-icon name="close-outline"></ion-icon>
    </span>
    <div class="form-box login">
      <h2>Đăng nhập</h2>
      <form action="" autocomplete="off" method="POST">
        <div class="input-box">
          <span class="icon"><ion-icon name="mail"></ion-icon></span>
          <input type="text" name="username">
          <label >Tài khoản</label>
        </div>
        <div class="input-box">
          <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
          <input type="text" name="password">
          <label >Mật khẩu</label>
        </div>
        <div class="remember-forgot">
          <label ><input type="checkbox">
          Nhớ mật khẩu</label>
          <a href="#" >Quên mật khẩu ?</a>
        </div>
        <input type="submit" name="dangnhap" value="Đăng nhập">
        <div class="login-register">
          <p> Bạn chưa có tài khoản ? <a href="#" class="register-link"> Đăng kí</a></p>
        </div>
      </form>
    </div>

    
    <div class="form-box register">
      <h2>Đăng kí</h2>
      <form action="#">
        <div class="input-box">
          <span class="icon"><ion-icon name="person-circle-outline"></ion-icon></ion-icon></span>
          <input type="text" required>
          <label >Tên tài khoản</label>
        </div>
        <div class="input-box">
          <span class="icon"><ion-icon name="mail"></ion-icon></span>
          <input type="email" required>
          <label >Email</label>
        </div>
        <div class="input-box">
          <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
          <input type="password" required>
          <label >Mật khẩu</label>
        </div>
        <div class="remember-forgot">
          <label ><input type="checkbox">
          Đồng ý với điều khoản và dịch vụ</label>

        </div>
        <button type="submit" class="btn">Register</button>
        <div class="login-register">
          <p> Bạn đã có tài khoản ? <a href="#" class="login-link"> Đăng Nhập</a></p>
        </div>
      </form>
    </div>

   </div>
   <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="js/script.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</body>

</html>