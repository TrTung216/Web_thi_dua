<?php
    session_start();
    #date_default_timezone_set('Asia/Bangkok');
    #$list= timezone_identifiers_list();
    #print_r(getdate());
    $_SESSION['thu']=date('w');
    #print(date('w'));
    $_SESSION['gio']=date('G');
    $_SESSION['phut']=date('i')
    #print_r($list);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <title>404-NOT FOUND</title>
</head>
<body>
    <h2>Chưa đến thời gian đăng nhập, vui lòng chờ.</h2>
    <hr>
    <div>
        <a href="users-misstake.php" class="btn btn-info" role="button">Báo nhập sai</a>
    </div>
    <hr>
    <div>
        <a href="change-password.php" class="btn btn-info" role="button">Đổi mật khẩu</a>
    </div>
    <hr>
    <div>
        <a href="logout.php" class="btn btn-info" role="button">Logout</a>
    </div>
</body>
</html>
