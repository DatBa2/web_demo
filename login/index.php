<?php
    session_start();
    echo '<pre>';
    print_r($_SESSION);
    echo '</pre>';

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        a {
            text-decoration: none;
            color: red;
        }
    </style>
    <title>index</title>
</head>
<body>
    <a href="logout.php"><h3>Logout</h3></a>
</body>
</html>
