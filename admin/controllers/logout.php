<?php
session_start();

// Xóa tất cả các biến session
session_unset();

// Hủy phiên làm việc
session_destroy();

// Chuyển hướng người dùng về trang đăng nhập hoặc trang chủ
header("Location: /base_du_an_1/");
exit;
?>