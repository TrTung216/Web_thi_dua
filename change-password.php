<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đổi mật khẩu</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
</head>
<body>
    <?php require_once "class.database.php"?>
    <?php
        session_start();
        if(empty($_SESSION['id_lop'])){
            header('location:login.php');
        }
    ?>
    <h2>Chi Đoàn <?php echo $_SESSION['id_lop'];?></h2>
    <?php
    if(isset($_POST['add'])){
        $taikhoan=$_POST['taikhoan'];
        $old_pass = $_POST['old_pass'];
        $new_pass = $_POST['new_pass'];
        $sql="SELECT * from db_users where username='".$taikhoan."' and pass='".$old_pass."'";
        $row=mysqli_query($conn,$sql);
        $count=mysqli_num_rows($row);
		if($count>0){
            $sql_change_pass =mysqli_query($conn,"UPDATE db_users SET pass = '".$new_pass."' WHERE username='".$taikhoan."'");
            echo '<p style="color:green">Đổi mật khẩu thành công!</p>';
            $conn->close();
            }
        else{
            echo '<p style="color:red">Tài khoản hoặc mật khẩu cũ không chính xác!</p>';
        } 
        }
    ?>
    <div class="container">
        <form method="POST" action="">
            <div class="form-group">
                <label for="taikhoan">Tài khoản</label>
                <input type="text" name="taikhoan" class="form-control" placeholder="Nhập tài khoản">
            </div>
            <div class="form-group">
                <label for="old_pass">Mật khẩu cũ</label>
                <input type="password" name="old_pass" class="form-control" placeholder="Nhập mật khẩu cũ">
            </div>
            <div class="form-group">
                <label for="new_pass">Mật khẩu mới</label>
                <input type="password" name="new_pass" class="form-control" placeholder="Nhập mật khẩu mới">
            </div>
            <button type="submit"class="btn btn-primary btn-user btn-block" name="add">Lưu</button>
            <div>
                <a href="logout.php" class="btn btn-info" role="button">Logout</a>
            </div>
        </form>
    </div>
</body>
</html>