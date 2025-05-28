<!-- Sidebar danh mục -->
<div class="sidebar">
    <h3>Categories</h3>
    <ul class="category-list">
        <?php
             foreach ($dsdm as $dm) {
                extract($dm);
                $linkdm = "index.php?quanly=sanpham&iddm=".$id;
                echo'<li><a href="'.$linkdm.'">'.$name.'</a></li>';
             }
        ?>
    </ul>
</div>