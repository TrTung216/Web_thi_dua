<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loged</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
</head>
<body>
    <?php
        session_start();
        if(empty($_SESSION['id_lop'])){
            header('location:login.php');
        }
    ?>
    <h2>Chi Đoàn <?php echo $_SESSION['id_lop'];?></h2>
    <div>
        <a href="users-inp.php" class="btn btn-info" role="button">Đến trang nhập điểm thi đua</a>
    </div>
    <hr>
    <div>
        <a href="user-misstake.php" class="btn btn-info" role="button">Báo nhập sai</a>
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