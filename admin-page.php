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
        if($_SESSION['role']!=1){
            header('location:login.php');
        }
        if(isset($_POST['add'])){
            include "admin-table.php";
        }
    ?>
    <hr>
    <form method="POST" action="">
		<button type="submit" class="btn btn-primary" name="add">Xem bảng thi đua</button>
	</form>
    <div>
        <a href="admin-fix.php" class="btn btn-info" role="button">Đến trang sửa lỗi</a>
    </div>
    <hr>
    <div>
        <a href="admin-save.php" class="btn btn-info" role="button">Xuất file Excell</a>
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