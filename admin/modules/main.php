<div class ="main">
    <?php
        $tam = isset($_GET["action"]) ? $_GET["action"] : "";
        switch($tam){
            case "quanlydanhmucsanpham":
                include("modules/quanlydanhmuc/them.php");
                break;
            default:
                include("modules/dasboard.php");
                break;
        }
    ?>
    </div>
</div>