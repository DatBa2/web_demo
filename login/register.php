<?php
    session_start();
    include_once 'config.php';
    unset($_SESSION['username']);
    unset($_SESSION['password']);
    $error = '';
echo '<pre>';
print_r($_SESSION);
echo '</pre>';
    if (isset($_POST['sub']) && $_SERVER['REQUEST_METHOD']==='POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $repassword = $_POST['repassword'];
        if ($username=='')
            $error = 'Username không được để trống!';
        elseif (!filter_var($username, FILTER_VALIDATE_EMAIL))
            $error = 'Username phải là email!';
        elseif ($password=='')
            $error = 'Không được để Password trống!';
        elseif ($password!=$repassword)
            $error = 'Repassword phải giống Password';
        if ($error=='') {
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            $_SESSION['success'] = 'Đăng ký thành công';
        $query = "INSERT INTO user(username,password) VALUES ('$username','$password')";
        if (mysqli_query($connect,$query)) {
            header('location: login.php');
            exit();
        }
        else echo "that bai: ". mysqli_error($conn);
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
        a{
            text-decoration: none;
            color: red;
        }
    </style>
    <title>Register</title>
</head>
<body>
    <h3 style="color: red;"><?php echo $error ; ?></h3>
    <form action="" method="post" enctype="multipart/form-data">
        <h3>REGISTER</h3>
        <table>
            <tr>
                <td><label for="">Username<span>*</span>: </label></td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td><label for="">Password<span>*</span>: </label></td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td><label for="">Repassword<span>*</span>: </label></td>
                <td><input type="password" name="repassword"></td>
            </tr>
            <tr align="center"><td colspan="2"><input type="submit" name="sub" value="Register"></td></tr>
        </table>
    </form>
    <a href="login.php"><h3>Login</h3></a>
</body>
</html>
