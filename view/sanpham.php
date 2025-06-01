<!-- danh muc theo  loại san pham -->
<div class="wrapper">
    <div class="container">
            <!-- Sidebar danh mục -->
            <?php
                include("slideLeft.php");
            ?>
    <div class="products">
        <?php
            foreach ($dssp as  $sp) {
                extract($sp);
                $linksp = "index.php?quanly=sanphamct&idsp=".$id;
                $hinh = $img_path.$image;
                echo'<div class="product-card">
                <a href="'.$linksp.'">
                    <img src="'.$hinh.'" alt=""/>
                    <h4>'.$name.'</h4>
                </a>
                <p class="price">'.number_format($price, 0, ',', '.').'đ</p>
                <p>'.$description.'</p>
                </div>';
            }
        ?>
    </div>
</div>
