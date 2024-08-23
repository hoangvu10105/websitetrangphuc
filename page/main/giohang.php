<?php
session_start();
?>

<p>Giỏ hàng22 </p>

<?php 
   if (isset($_SESSION["cart"])){
    print_r($_SESSION["cart"]);
   }else{
    echo 'aaaaaaaa' ;
   }
?>