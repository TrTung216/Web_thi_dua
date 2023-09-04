
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <title>Bảng Thi Đua</title>
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
        if(isset($_POST["add"])){
            $ten_lop= $_SESSION['id_lop'];
            $gio_tot=$_POST['gio_tot'];
            $gio_tb=$_POST['gio_tb'];
            $gio_yeu=$_POST['gio_yeu'];
            $gio_kem=$_POST['gio_kem'];
            $so_diem_gioi=$_POST['so_diem_gioi'];
            $so_diem_yeu_kem=$_POST['so_diem_yeu_kem'];
            $loi_2diem=$_POST['loi_2diem'];
            $loi_5diem=$_POST['loi_5diem'];
            $loi_10diem=$_POST['loi_10diem'];
            $loi_20diem=$_POST['loi_20diem'];

            if($conn -> query("INSERT INTO thiduatuan (ten_lop,gio_tot,gio_tb,gio_yeu,gio_kem,so_diem_gioi,so_diem_yeu_kem,loi_2diem,loi_5diem,loi_10diem,loi_20diem) VALUE (N'$ten_lop',N'$gio_tot',N'$gio_tb',N'$gio_yeu',N'$gio_kem',N'$so_diem_gioi',N'$so_diem_yeu_kem',N'$loi_2diem',N'$loi_5diem',N'$loi_10diem',N'$loi_20diem')")){
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
                <label for="gio_tot">Giờ tốt</label>
                <input name="gio_tot" class="form-control" placeholder="Nếu 100% giờ tốt nhập 1, không 100% nhập 0.">
            </div>
            <div class="form-group">
                <label for="gio_tb">Số giờ trung bình</label>
                <input name="gio_tb" class="form-control" placeholder="Nếu không có nhập:0">
            </div>
            <div class="form-group">
                <label for="gio_yeu">Số giờ yếu</label>
                <input name="gio_yeu" class="form-control" placeholder="Nếu không có nhập:0">
            </div>
            <div class="form-group">
                <label for="gio_kem">Số giờ kém</label>
                <input name="gio_kem" class="form-control" placeholder="Nếu không có nhập:0">
            </div>
            <div class="form-group">
                <label for="so_diem_gioi">Số điểm giỏi</label>
                <input name="so_diem_gioi" class="form-control" placeholder="Nếu không có nhập:0">
            </div>
            <div class="form-group">
                <label for="so_diem_yeu_kem">Số điểm yếu kém</label>
                <input name="so_diem_yeu_kem" class="form-control" placeholder="Nếu không có nhập:0">
            </div>
            <div class="form-group">
                <label for="loi_2diem">Lỗi trừ 2 điểm/lỗi</label>
                <input name="loi_2diem" class="form-control" placeholder="Lỗi trang phục, lỗi trong giờ học(mất trật tự, không học bài...), đi học muộn/nghỉ học có phép,...">
            </div>
            <div class="form-group">
                <label for="loi_5diem">Lỗi trừ 5 điểm/lỗi</label>
                <input name="loi_5diem" class="form-control" placeholder="HS nói tục chửi bậy, trèo tường vượt rào, bỏ giờ, trốn tiết, nghỉ học không phép, dùng ĐT trong giờ,...">
            </div>
            <div class="form-group">
                <label for="loi_10diem">Lỗi trừ 10 điểm/lỗi</label>
                <input name="loi_10diem" class="form-control" placeholder="Lỗi tập thể: MTT, VS bẩn, không trực ban/trực ban muộn, không tham gia văn nghệ,....">
            </div>
            <div class="form-group">
                <label for="loi_20diem">Lỗi trừ 20 điểm/lỗi</label>
                <input name="loi_20diem" class="form-control" placeholder="Gian lận, đánh nhau, hút thuốc, trộm cắp, phá hoại tài sản chung, vi phạm ATGT, gửi xe ngoài,...">
            </div>
            <button type="submit" class="btn btn-primary" name="add">Lưu</button>
            <div>
                <a href="logout.php" class="btn btn-info" role="button">Đăng xuất</a>
            </div>
            <div>
                <a href="users-misstake.php" class="btn btn-info" role="button">Báo nhập sai!</a>
            </div>
        </form>
    </div>
</body>
</html>