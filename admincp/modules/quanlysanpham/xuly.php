<?php
include("../../config/config.php");

    $tensanpham = $_POST["tensanpham"];
    $masanpham =&$_POST["masanpham"];
    $giasanpham =&$_POST["giasanpham"];
    $soluong =&$_POST["soluong"];
    $tomtat =&$_POST["tomtat"];
    $noidung =&$_POST["noidung"];
    $tinhtrang =&$_POST["tinhtrang"];
    $danhmuc=$_POST['danhmuc'];
     
    $hinhanh =$_FILES['hinhanh']['name'];
    $hinhanh_tmp =$_FILES['hinhanh']['tmp_name'];
    $hinhanh =time().'_'.$hinhanh;


    if(isset($_POST["themsanpham"])){
        echo $hinhanh ;
        $sql_them=" INSERT INTO tbl_sanpham(ten_sanpham,ma_sanpham,gia_sanpham,soluong,hinhanh,tomtat,noidung,tinhtrang,id_danhmuc)
         VALUE('".$tensanpham." ',' ".$masanpham." ',' ".$giasanpham." ',' ".$soluong." ','".$hinhanh."',' ".$tomtat." ',' ".$noidung." ',' ".$tinhtrang."',' ".$danhmuc."')";
        mysqli_query($connect,$sql_them);
        move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
         header('Location:../../index.php?action=quanlysanpham&query=them');
    }

    elseif(isset($_POST["suasanpham"])){
        if($hinhanh !=''){

        move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
       
        $sql_update=" UPDATE tbl_sanpham SET ten_sanpham='".$tensanpham."',ma_sanpham='".$masanpham."',gia_sanpham='".$giasanpham."'
        ,soluong='".$soluong."',hinhanh='".$hinhanh."',tomtat='".$tomtat."',noidung='".$noidung."',tinhtrang='".$tinhtrang."',id_danhmuc='".$danhmuc."'
         WHERE id_sanpham='$_GET[idsanpham]'";
         //xoahinhcu
         $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham = '$_GET[idsanpham]' LIMIT 1";
         $query=mysqli_query($connect,$sql);
         while($row=mysqli_fetch_array($query)){
             unlink('uploads/'.$row['hinhanh']);
         }
 }
    else{
        $sql_update=" UPDATE tbl_sanpham SET ten_sanpham='".$tensanpham."',ma_sanpham='".$masanpham."',gia_sanpham='".$giasanpham."'
        ,soluong='".$soluong."',tomtat='".$tomtat."',noidung='".$noidung."',tinhtrang='".$tinhtrang."',id_danhmuc='".$danhmuc."'
        WHERE id_sanpham='$_GET[idsanpham]'";
    }
    mysqli_query($connect,$sql_update);
        header('Location:../../index.php?action=quanlysanpham&query=them');
    }

    else{
        $id=$_GET['idsanpham'];
        $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham = '$id' LIMIT 1";
        $query=mysqli_query($connect,$sql);
        while($row=mysqli_fetch_array($query)){
            unlink('uploads/'.$row['hinhanh']);
        }
        $sql_xoa ="DELETE FROM tbl_sanpham WHERE id_sanpham ='" .$id. "'";
        mysqli_query($connect,$sql_xoa);
        header('Location:../../index.php?action=quanlysanpham&query=them');
    }
?>