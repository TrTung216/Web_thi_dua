<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loged</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
    <style>
        body {
            padding: 20px;
            background-color: #f8f9fa;
        }
        .container {
            border: 1px solid #dee2e6;
            border-radius: 5px;
            background-color: #fff;
            padding: 20px;
            margin-bottom: 20px;
        }
        h2 {
            margin-bottom: 20px;
        }
        .btn {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <?php
        session_start();
        if(empty($_SESSION['id_lop'])){
            header('location:login.php');
        }
    ?>
    <div class="container">
        <h2>Chi Đoàn <?php echo $_SESSION['id_lop'];?></h2>
        <div>
            <a href="users-inp.php" class="btn btn-info" role="button">Đến trang nhập điểm thi đua</a>
        </div>
    </div>
    <div class="container">
        <a href="change-password.php" class="btn btn-info" role="button">Đổi mật khẩu</a>
    </div>
    <div class="container">
        <a href="logout.php" class="btn btn-info" role="button">Logout</a>
    </div>
</body>
</html>
