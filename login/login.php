<?php
    session_start();
    include_once 'config.php';
    $connect = new mysqli('localhost','root','','login');
    $error='';
echo '<pre>';
print_r($_SESSION);
echo '</pre>';
    $username = isset($_POST['username'])? $_POST['username']:'';
    $password = isset($_POST['password'])? $_POST['password']:'';
    $sql = "SELECT username,password FROM user";
    $result = $connect->query($sql);
    $t = 0;
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if ($row["username"] == $username && $row["password"]== $password) {
                $t=2;
                break;
            } else if ($row["username"] == $username && $row["password"]!= $password)
                $t=1;
        }
    } else
        echo 'Không thành công. Lỗi' . $connect->error;
    if (isset($_POST['sub'])) {
        if ($t>=1) {
            $_SESSION['username'] = $username;
            if ($t==2) {
            $_SESSION['password'] = $password;
            $_SESSION['success'] = 'Đăng nhập thành công';
            header('location: index.php');
            exit();
            } else
                $error = 'Sai password!';
        } else {
            $_SESSION['success'] = 'Chưa đăng ký username và password';
            header('location: register.php');
            exit();
        }
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        span{
            color: red;
        }
        a {
            text-decoration: none;
            color: red;
        }
    </style>
    <title>Sign up</title>
</head>
<body>
<h3 style="color: red;"><?php echo $error ; ?></h3>
<form action="" method="post" enctype="multipart/form-data">
    <h3>SIGN UP</h3>
    <table>
        <tr>
            <td><label for="">Username<span>*</span>: </label></td>
            <td><input type="text" name="username" value="<?php if ($t>=1) echo $_SESSION['username']; else echo ''?>"></td>
        </tr>
        <tr>
            <td><label for="">Password<span>*</span>: </label></td>
            <td><input type="password" name="password" value="<?php echo isset($_SESSION['password'])? $_SESSION['password']:''; ?>"></td>
        </tr>
        <tr><td colspan="2"><input type="checkbox" value="1"> Remember me?</td></tr>
        <tr align="center"><td colspan="2"><input type="submit" name="sub" value="Sign up"></td></tr>
    </table>
</form>
<a href="register.php"><h3>I don't account</h3></a>
</body>
</html>
