<?php
require('../../mail/sendmail.php');

$connect = mysqli_connect("localhost", "root", "", "web_mysqli");
if (!$connect) {
    die("Không kết nối :" . mysqli_connect_error());
}
?>
<?php
    session_start();
    $id_khachhang=$_SESSION['id_khachhang'];
    $code_oder=rand(0,9999);
    $insert_cart ="INSERT INTO tbl_cart(id_khachhang,code_cart,trangthai) VALUE('".$id_khachhang."','".$code_oder."',1)";
    $cart_query = mysqli_query($connect, $insert_cart);
    if($insert_cart){
        //them gio hang
        foreach($_SESSION['card'] as $key => $value){
            $id_sanpham =$value['id'];
            $soluong = $value['soluong'];
            $insert_oder_detail = "INSERT INTO tbl_cart_detail(code_cart,id_sanpham,soluongmua) VALUE('".$code_oder."','".$id_sanpham."','".$soluong."')";
            mysqli_query($connect , $insert_oder_detail);
        }
        $tieude = "Đặt hàng thành công";
        $noidung = "<p>Cảm ơn bạn đã đặt hàng , mã đơn hàng :".$code_oder." </p>";
        $noidung.= "<h4>Đơn hàng bao gồm : </h4>";
        foreach ($_SESSION["card"] as $key => $val) {
            $noidung.= "<ul style='border:1px solid blue ; margin:5px ;'>
                    <li>" . $val['tensanpham'] . "</li>
                    <li>" . $val['masp'] . "</li>
                    <li>" . number_format($val['giasanpham'],0,',','.') . "</li>
                    <li>" . $val['soluong'] . "</li>
                    </ul>";
        }
        
        $maildathang = $_SESSION['email'];
        $mail = new Mailer();
        $mail->dathang($tieude,$noidung,$maildathang);
    }
unset($_SESSION["card"]);
header('Location:camon.php');


?>