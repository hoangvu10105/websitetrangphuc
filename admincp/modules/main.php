<div class="clear"></div>
<div class="main">
<?php
            if(isset($_GET['action']) && isset($_GET['query'])){
                $tam=$_GET['action'];
                $query=$_GET['query'];
            }else{
                $tam='';
                $query='';
            }
            if($tam=='quanlydanhmucsanpham' && $query=='them'){
                include("modules/quanlydanhmucsanpham/them.php");
                include("modules/quanlydanhmucsanpham/lietke.php");
            }elseif($tam=='quanlydanhmucsanpham' && $query=='sua'){
                include("modules/quanlydanhmucsanpham/sua.php");
            }elseif($tam=='quanlysanpham' && $query=='them'){
                include("modules/quanlysanpham/them.php");
                include("modules/quanlysanpham/lietke.php");
            }elseif($tam=='quanlysanpham' && $query=='sua'){
                include("modules/quanlysanpham/sua.php");
            }
            elseif($tam=='quanlydonhang' && $query=='lietke'){
                include("modules/quanlydonhang/lietke.php");
            }elseif($tam=='donhang' && $query=='xemdonhang'){
                include("modules/quanlydonhang/xemdonhang.php");
            }
            elseif($tam=='quanlydanhmucbaiviet' && $query=='them'){
                include("modules/quanlydanhmucbaiviet/them.php");
            }
            elseif($tam=='quanlydanhmucbaiviet' && $query=='sua'){
                include("modules/quanlydanhmucbaiviet/sua.php");
            }
            elseif($tam=='quanlydanhmucbaiviet' && $query=='lietke'){
                include("modules/quanlydanhmucbaiviet/lietke.php");
            }
            else{
                include("modules/dashboard.php");
            }

?>
</div>