<?php
session_start();
include('../../admincp/config/config.php');

if (isset($_POST['themgiohang'])) {
    $id = $_GET['idsanpham'];
    $soluong = 1;

    $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham = '$id' LIMIT 1";
    $query = mysqli_query($connect, $sql);
    $row = mysqli_fetch_array($query);

    if ($row) {
        $new_product = array(
            'tensanpham' => $row['ten_sanpham'],
            'id' => $id,
            'soluong' => $soluong,
            'giasanpham' => $row['gia_sanpham'],
            'hinhanh' => $row['hinhanh'],
            'masp' => $row['ma_sanpham'],
        );

        if (isset($_SESSION['card'])) {
            $found = false;
            $product = array();

            foreach ($_SESSION['card'] as $card_item) {
                if ($card_item['id'] == $id) {
                    $card_item['soluong'] += $soluong;
                    $found = true;
                }

                $product[] = $card_item;
            }

            if (!$found) {
                $product[] = $new_product;
            }

            // Lưu mảng mới vào $_SESSION['card']
            $_SESSION['card'] = $product;
        } else {
            $_SESSION['card'] = array($new_product);
        }
    }
    header('Location:../../index.php?quanly=giohang');
}
/*if (isset($_SESSION['card']) && $_GET['xoa']) {
    $id = $_GET['xoa'];
    $product = array(); // Khai báo biến product

    foreach ($_SESSION['card'] as $card_item) {
        if ($card_item['id'] != $id) {
            $product[] = $card_item;
        }
    }

    $_SESSION['card'] = $product;
    header('Location:../../index.php?quanly=giohang');
} */

//xoa
if (isset($_SESSION['card']) && isset($_GET['xoa'])) {
    $id = $_GET['xoa'];
    $product = array(); 

    foreach ($_SESSION['card'] as $card_item) {
        if ($card_item['id'] != $id) {
            $product[] = $card_item;
        }
    }

    $_SESSION['card'] = $product;
    header('Location:../../index.php?quanly=giohang');
}

// + sl
if (isset($_GET['cong'])) {
    $id = $_GET['cong'];
    $product = array();
    $outOfStock = false; // Biến để kiểm tra trạng thái hết hàng

    foreach ($_SESSION['card'] as $card_item) {
        if ($card_item['id'] == $id) {
            $id_sanpham = $card_item['id'];
            $sql = "SELECT soluong FROM tbl_sanpham WHERE id_sanpham = '$id_sanpham'";
            $query = mysqli_query($connect, $sql);
            $row = mysqli_fetch_array($query);
            
            if ($row && $card_item['soluong'] < $row['soluong']) {
                $card_item['soluong'] += 1; 
            } else {
                $outOfStock = true; 
                echo 'aa';
            }
        }

        $product[] = $card_item;
    }

    $_SESSION['card'] = $product;

    if ($outOfStock) {
        $_SESSION['outOfStockMessage'] = "Sản phẩm đã hết hàng!";
    }

    header('Location:../../index.php?quanly=giohang');
    exit(); 
}



// -sl
if (isset($_GET['tru'])) {
    $id = $_GET['tru'];
    $product = array();

    foreach ($_SESSION['card'] as $card_item) {
        if ($card_item['id'] == $id) {
            if ($card_item['soluong'] > 0) { 
                $card_item['soluong'] -= 1; 
            }
        }

        $product[] = $card_item;
    }

    $_SESSION['card'] = $product;

    header('Location:../../index.php?quanly=giohang');
    exit();
}

// session_destroy();
?>
