<!-- danh muc theo  loại san pham -->
<div class="wrapper">
    <div class="container">
        <!-- Sidebar danh mục -->
        <?php
            include("slideLeft.php");
        ?>
    <?php
        extract($onesp);
        $img = $img_path.$image;
            echo'
                <div class="container">
                    <div class="product-item">
                        <div class="product-image">
                            <img src="'.$img.'" alt="">
                        </div>
                        <div class="product-info">
                            <h1>'.$name.'</h1>
                            <p class="price">Giá: '.number_format($price, 0, ',', '.').'đ</p>
                            <p class="description-title">Product description: '.$description.'</p>
                        <form action="index.php?quanly=addtocart" method="post"> 
                                <!-- Các input hidden để gửi dữ liệu sản phẩm -->
                                <input type="hidden" name="id" value="'.$id.'">
                                <input type="hidden" name="image" value="'.$image.'">
                                <input type="hidden" name="name" value="'.$name.'">
                                <input type="hidden" name="price" value="'.$price.'">
                                <div class="add-to-cart">
                                    <input type="submit" name="addtocart" value="Add to cart">
                                </div>
                        </form>
                    </div>
                </div>
            </div>'
    ?>
</div>
