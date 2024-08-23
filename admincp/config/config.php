<?php

$connect = mysqli_connect("localhost", "root", "", "web_mysqli");

if (!$connect) {
    die("Không kết nối :" . mysqli_connect_error());
}

?>