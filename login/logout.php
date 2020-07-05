<?php
session_start();
// xóa hết các session ra khỏi hệ thống vào chuyển hướng sang trang login
echo '<pre>';
print_r($_SESSION);
echo '</pre>';
unset($_SESSION['username']);
unset($_SESSION['password']);
$_SESSION['success'] = 'Logout thành công';
header('location: login.php');
exit();
?>