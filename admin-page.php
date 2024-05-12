<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <style>
        body {
            padding: 20px;
            background-color: #f8f9fa;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
        }
        .btn-group {
            margin-bottom: 20px;
        }
        .card {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .card-title {
            font-size: 24px;
            margin-bottom: 20px;
        }
        .btn-action {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <?php
        session_start();
        // Kiểm tra xem người dùng đã đăng nhập và có vai trò là admin hay không
        if(!isset($_SESSION['role']) || $_SESSION['role'] != 1){
            // Nếu không phải admin, chuyển hướng về trang đăng nhập
            header('location:login.php');
            exit;
        }
    ?>

    <div class="container">
        <div class="card">
            <h2 class="card-title">Dashboard Admin</h2>
            <!-- Nút nhấn để xem bảng thi đua -->
            <form method="POST" action="admin-table.php">
                <button type="submit" class="btn btn-primary btn-action" name="add">Xem bảng thi đua</button>
            </form>

            <!-- Các liên kết đến các trang khác -->
            <div class="btn-group">
                <a href="admin-fix.php" class="btn btn-info btn-action" role="button">Đến trang sửa lỗi</a>
            </div>
            <div class="btn-group">
                <a href="admin-save.php" class="btn btn-info btn-action" role="button">Xuất file Excel</a>
            </div>
            <div class="btn-group">
                <a href="change-password.php" class="btn btn-info btn-action" role="button">Đổi mật khẩu</a>
            </div>

            <!-- Nút đăng xuất -->
            <div class="btn-group">
                <a href="logout.php" class="btn btn-danger btn-action" role="button">Đăng xuất</a>
            </div>
        </div>
    </div>
</body>
</html>
