
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <title>Sửa Bảng Thi Đua</title>
</head>
<body>
    <?php require_once "class.database.php"?>
    
    <?php
        include "admin-notifications.php";
        if($_SESSION['role']!=1){
            header('location:login.php');
        }
    ?>
    <?php
        if(isset($_POST["sua"])){
            $ten_lop= $_POST['id_lop'];
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

            if($conn -> query("UPDATE thiduatuan SET 
            gio_tot =IF($gio_tot IS NOT NULL, $gio_tot, gio_tot)
            WHERE ten_lop = '".$ten_lop."'")){
                echo "<script>alert('Sửa thành công!');</script>";
            }else{echo "<script>alert('Sửa thất bại!');</script>";}
            if($conn -> query("UPDATE thiduatuan SET 
            gio_tb=IF($gio_tb IS NOT NULL, $gio_tb, gio_tb)
            WHERE ten_lop = '".$ten_lop."'")){
                echo "<script>alert('Sửa thành công!');</script>";
            }else{echo "<script>alert('Sửa thất bại!');</script>";}
            if($conn -> query("UPDATE thiduatuan SET 
            gio_yeu=IF($gio_yeu IS NOT NULL,$gio_yeu, gio_yeu)
            WHERE ten_lop = '".$ten_lop."'")){
                echo "<script>alert('Sửa thành công!');</script>";
            }else{echo "<script>alert('Sửa thất bại!');</script>";}
            if($conn -> query("UPDATE thiduatuan SET 
            gio_kem=IF($gio_kem IS NOT NULL,$gio_kem, gio_kem)
            WHERE ten_lop = '".$ten_lop."'")){
                echo "<script>alert('Sửa thành công!');</script>";
            }else{echo "<script>alert('Sửa thất bại!');</script>";}
            if($conn -> query("UPDATE thiduatuan SET 
            so_diem_gioi=IF($so_diem_gioi, so_diem_gioi)
            WHERE ten_lop = '".$ten_lop."'")){
                echo "<script>alert('Sửa thành công!');</script>";
            }else{echo "<script>alert('Sửa thất bại!');</script>";}
            if($conn -> query("UPDATE thiduatuan SET 
            so_diem_yeu_kem=IF($so_diem_yeu_kem, so_diem_yeu_kem)
            WHERE ten_lop = '".$ten_lop."'")){
                echo "<script>alert('Sửa thành công!');</script>";
            }else{echo "<script>alert('Sửa thất bại!');</script>";}
            if($conn -> query("UPDATE thiduatuan SET 
            loi_2diem=IF($loi_2diem IF NOT NULL,$loi_2diem, loi_2diem)
            WHERE ten_lop = '".$ten_lop."'")){
                echo "<script>alert('Sửa thành công!');</script>";
            }else{echo "<script>alert('Sửa thất bại!');</script>";}
            if($conn -> query("UPDATE thiduatuan SET 
            loi_5diem=IF($loi_5diem IF NOT NULL,$loi_5diem, loi_5diem)
            WHERE ten_lop = '".$ten_lop."'")){
                echo "<script>alert('Sửa thành công!');</script>";
            }else{echo "<script>alert('Sửa thất bại!');</script>";}
            if($conn -> query("UPDATE thiduatuan SET 
            loi_10diem=IF($loi_10diem IF NOT NULL,$loi_10diem, loi_10diem)
            WHERE ten_lop = '".$ten_lop."'")){
                echo "<script>alert('Sửa thành công!');</script>";
            }else{echo "<script>alert('Sửa thất bại!');</script>";}
            if($conn -> query("UPDATE thiduatuan SET 
            loi_20diem=IF($loi_20diem IF NOT NULL,$loi_20diem, loi_20diem)
            WHERE ten_lop = '".$ten_lop."'")){
                echo "<script>alert('Sửa thành công!');</script>";
            }else{echo "<script>alert('Sửa thất bại!');</script>";}
        }

    ?>
    <?php
		if(isset($_POST["xoa"])){
				$reset = mysqli_query($conn,"DELETE FROM thiduatuan");
            }
	?>
    <div class="container">
        <h2>Sửa lỗi</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label for="id_lop">Lớp</label>
                <input name="id_lop" class="form-control" placeholder="Tên lớp cần sửa (Nhập in hoa, ví dụ: 10A1)">
            </div>

            <div class="form-group">
                <label for="gio_tot">Giờ tốt</label>
                <input name="gio_tot" class="form-control" placeholder="Nếu không sai không nhập.">
            </div>
            <div class="form-group">
                <label for="gio_tb">Số giờ trung bình</label>
                <input name="gio_tb" class="form-control" placeholder="Nếu không sai không nhập.">
            </div>
            <div class="form-group">
                <label for="gio_yeu">Số giờ yếu</label>
                <input name="gio_yeu" class="form-control" placeholder="Nếu không sai không nhập.">
            </div>
            <div class="form-group">
                <label for="gio_kem">Số giờ kém</label>
                <input name="gio_kem" class="form-control" placeholder="Nếu không sai không nhập.">
            </div>
            <div class="form-group">
                <label for="so_diem_gioi">Số điểm giỏi</label>
                <input name="so_diem_gioi" class="form-control" placeholder="Nếu không sai không nhập.">
            </div>
            <div class="form-group">
                <label for="so_diem_yeu_kem">Số điểm yếu kém</label>
                <input name="so_diem_yeu_kem" class="form-control" placeholder="Nếu không sai không nhập.">
            </div>
            <div class="form-group">
                <label for="loi_2diem">Lỗi trừ 2 điểm/lỗi</label>
                <input name="loi_2diem" class="form-control" placeholder="Nếu không sai không nhập.">
            </div>
            <div class="form-group">
                <label for="loi_5diem">Lỗi trừ 5 điểm/lỗi</label>
                <input name="loi_5diem" class="form-control" placeholder="Nếu không sai không nhập.">
            </div>
            <div class="form-group">
                <label for="loi_10diem">Lỗi trừ 10 điểm/lỗi</label>
                <input name="loi_10diem" class="form-control" placeholder="Nếu không sai không nhập.">
            </div>
            <div class="form-group">
                <label for="loi_20diem">Lỗi trừ 20 điểm/lỗi</label>
                <input name="loi_20diem" class="form-control" placeholder="Nếu không sai không nhập.">
            </div>
            <button type="submit" class="btn btn-primary" name="sua">Lưu</button>
            <div>
                <a href="logout.php" class="btn btn-info" role="button">Đăng xuất</a>
            </div>
            <div>
                <a href="admin-page.php" class="btn btn-info" role="button">Quay lại trang admin</a>
            </div>
            <button type="submit" class="btn btn-primary" name="xoa">Reset bảng thi đua</button>
        </form>
    </div>
</body>
</html>