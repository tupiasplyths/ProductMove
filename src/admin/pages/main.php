<div id="main">
    <?php
        include("sidebar/sidebar.php");
        include_once('control.php');
    ?>

    <div class="content">
        <?php
        if(isset($_GET['action']) && isset($_GET['query'])) {
            $tam = $_GET['action'];
            $query = $_GET['query'];
        }else {
            $tam = '';
            $query = '';
        }
        if (!isset($_SESSION['valid']) || !$_SESSION['valid']) {
            // include("login.html");
            header('login.html');
        } elseif ($tam == '' && $_SESSION['valid'] == true) {
            include('homepage.php');
        }
        elseif ($tam=='quanly' && $query=='them') {
            include("modules/them.php");
            include("modules/lietke.php");
        }
        elseif ($tam=='quanly' && $query=='sua') {
            include("modules/sua.php");
        }elseif ($tam=='quanlysanpham' && $query=='them') {
            include("modules/themsp.php");
            include("modules/lietkesp.php");
        } elseif ($tam == 'quanlysanpham' && $query == 'sua') {
            include("modules/suasp.php");
        } elseif ($tam=='cososanxuat') {
            include("modules/cssx.php");
            include("modules/lietkecssx.php");
        } elseif ($tam=='dailyphanphoi') {
            include("modules/dlpp.php");
            include("modules/lietkedlpp.php");
        }elseif ($tam=='trungtambaohanh') {
            include("modules/ttbh.php");
            include("modules/lietkettbh.php");
        }
        ?>
    </div>
    

</div>
