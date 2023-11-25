<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="StyleSheet" type="text/css" href="css/style.css"/>
</head>
<body>
    <div class="header">
        <div><h3 class="logo">BIGCORP HEADQUARTER</h3></div>
        <div class="dropdown">
            <!-- <button class="dropbtn">Menu</button> -->
            <div class="container">
                <div class="bar1"></div>
                <div class="bar1"></div>
                <div class="bar1"></div>
            </div>
            <div class="dropdown-content">
                <a href="index.php" class="active">Homepage </a>
                <a href="index.php?action=quanly&id=0&query=them"> Quản lý danh mục sản phẩm </a>
                <a href="index.php?action=quanlysanpham&id=1&query=them"> Quản lý sản phẩm </a>
                <a href="index.php?action=cososanxuat&id=2&query=them"> Theo cơ sở sản xuất </a>
                <a href="index.php?action=dailyphanphoi&id=3&query=them"> Theo đại lý phân phối </a>
                <a href="index.php?action=trungtambaohanh&id=4&query=them"> Theo trung tâm bảo hành </a>
            </div>
        </div>
    </div>
    <?php  
     include("config/config.php");
     include("pages/main.php");
     ?>
<script src="homepage.js"></script>
</body>
</html>