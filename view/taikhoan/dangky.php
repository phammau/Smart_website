<!-- danh muc theo  loại san pham -->
<div class="wrapper">
    <div class="container">
            <!-- Sidebar danh mục -->
            <?php
                include("view/slideLeft.php");
            ?>
    <div class="products">
        <div class ="dangky">
            <form action="index.php?quanly=Signup" method="post">
                <p>Email</p>
                <input type="email" name="email" Email/>
                <p>User</p>
                <input type="text" name="user"/>
                <p>Password</p>
                <input type="password" name="pass"/>
                <p></p>
                <input type="submit" name="Signup" value="Sign Up"/>
                <input type="reset" name="Nhập lại"/>
            </form>
        </div>
    </div>
</div>
