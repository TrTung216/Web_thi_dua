<?php
include "class.database.php";
global $conn;
$result=mysqli_query($conn,"SELECT * FROM baoloi");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang báo nhập sai</title>
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
    <?php
        if(isset($_POST["add"])){
            $ten_lop= $_POST['id_lop'];
            $bao_loi=$_POST['bao_loi'];
            $tuan=$_POST['tuan'];

            if($conn -> query("INSERT INTO baoloi (ten_lop,bao_loi,tuan) VALUE (N'$ten_lop',N'$bao_loi',N'$tuan')")){
                echo "<script>alert('Lưu thành công!');</script>";
            }else{
                echo "<script>alert('Lưu thất bại!');</script>";
            }

        }

        $conn->close();
    ?>
    <div class="container">
        <form method="POST" action="">

            <div class="form-group">
                <label for="id_lop">Tên lớp</label>
                <input name="id_lop" class="form-control" placeholder="Nhập tên lớp">
            </div>
            <div class="form-group">
                <label for="bao_loi">Báo lỗi sai</label>
                <input name="bao_loi" class="form-control" placeholder="Ghi rõ sai ở đâu và sửa thành gì.">
            </div>
            <div class="form-group">
                <label for="tuan">Tuần số :</label>
                <input name="tuan" class="form-control" placeholder="">
            </div>
            <button type="submit" class="btn btn-primary" name="add">Lưu</button>
            <div>
                <a href="logout.php" class="btn btn-info" role="button">Logout</a>
            </div>
        </form>
    </div>
</body>
</html>