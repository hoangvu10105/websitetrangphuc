
<?php

$connect = mysqli_connect("localhost", "root", "", "web_mysqli");

if (!$connect) {
    die("Không kết nối :" . mysqli_connect_error());
}
echo "";
?>

<?php
if(isset($_POST['dangnhap'])){

    $email = $_POST['email'];
    $matkhau = $_POST['password'];
    $_SESSION['dangnhap'] =  $email;
    $sql ="SELECT *FROM tbl_dangky WHERE email='".$email."' AND matkhau='".$matkhau."' LIMIT 1 ";
    $row =mysqli_query($connect,$sql);
    $coutn = mysqli_num_rows($row);
    if($coutn>0){
        $row_data = mysqli_fetch_array($row); 
      $_SESSION['email']=$row_data['email'];
       $_SESSION['dangky'] =$row_data['tenkhachhang'];
       $_SESSION['id_khachhang'] =$row_data['id_dangky'];
       echo  $_SESSION['email'];
       header('Location:index.php?quanly=giohang');
    }
    else{
        echo '<p style="color:red">Email hoặc mật khẩu sai </p>';
        
    }
} 
 ?>


<div class="wrapper">
    <span class="icon-close">
      <ion-icon name="close-outline"></ion-icon>
    </span>
    <div class="form-box login">
      <h2>Đăng nhập</h2>
      <form action="" autocomplete="off" method="POST">
        <div class="input-box">
          <span class="icon"><ion-icon name="mail"></ion-icon></span>
          <input type="text" name="email" placeholder="Email...">
          <label >Tài khoản</label>
        </div>
        <div class="input-box">
          <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
          <input type="text" name="password" placeholder="mat khau">
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