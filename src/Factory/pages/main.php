<div id="main">
            <?php
                include("sidebar/sidebar.php");
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
                if ($tam=='') {
                }
                elseif ($tam=='thongbao') {
                    include("modules/thongbao.php");
                }
                elseif ($tam=='nhaphang') {
                    include("modules/nhaphang.php");
                    include("modules/khocoso.php");
                }elseif ($tam=='xuathang') {
                    include("modules/xuathang.php");
                    include("modules/khocoso.php");
                } elseif ($tam == 'thongke') {
                    include("modules/thongke.php");
                } elseif ($tam == 'thongkeloi') {
                    include("modules/thongkeloi.php");
                }
                ?>
            </div>
            </div>
        </div>