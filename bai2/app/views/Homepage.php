<?php

session_start();

// Kiểm tra người dùng đã đăng nhập hay chưa
if (!isset($_SESSION['user_id'])) {
    // Chuyển hướng đến trang đăng nhập
    header('Location: /login.php');
    exit;
}

if ($_POST){
    //Đang xuất
    var_dump(123);
    include_once "../app/controller/UserController.php";
    $userController = new UserController();
    $userController->logout();
}

// Hiển thị nội dung trang chủ
echo "<h1>Trang chủ</h1>";
echo "<h3>Xin chào " . $_SESSION['email']."<h3/>";

?>
<form action="/Homepage.php" method="post">
    <button name="submit">Đăng xuất</button>
</form>