<!-- danh muc theo  loại san pham -->
<div class="wrapper">
    <div class="container">
            <!-- Sidebar danh mục -->
            <?php
                include("view/slideLeft.php");
            ?>
    <div class="products">
        <div class ="dangky">
            <form action="index.php?quanly=Signin" method="post">
                <p>User</p>
                <input type="text" name="user"/>
                <p>Password</p>
                <input type="password" name="pass"/>
                <p></p>
                <input type="submit" name="Signin" value="Sign In"/>
                <a href="index.php?quanly=ForgotPassword">Forgot Password</a>
            </form>
        </div>
    </div>
</div>
