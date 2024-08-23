<?php

$connect = mysqli_connect("localhost", "root", "", "web_mysqli");

if (!$connect) { 
    die("Không kết nối :" . mysqli_connect_error());
}

?>
<?php
    if(isset($_GET['code'])){
        $code_cart = $_GET['code'];
        $sql_update = " UPDATE tbl_cart SET trangthai=0 WHERE code_cart='".$code_cart."'";
        $query = mysqli_query($connect, $sql_update);
        header('Location:../../index.php?action=quanlydonhang&query=lietke');

    }
 ?>