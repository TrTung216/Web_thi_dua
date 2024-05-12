<?php
include "class.database.php";
session_start();

if ($_SESSION['role'] != 1) {
    header('location:login.php');
    exit(); // Thoát khỏi kịch bản
}

if (isset($_POST["xoa"])) {
    $reset = mysqli_query($conn, "DELETE FROM thiduatuan");
}

if (isset($_POST["sua"])) {
    $ten_lop = $_POST['ten_lop'];
    $columns = array(
        'gio_tot',
        'gio_tb',
        'gio_yeu',
        'gio_kem',
        'so_diem_gioi',
        'so_diem_yeu_kem',
        'loi_2diem',
        'loi_5diem',
        'loi_10diem',
        'loi_20diem'
    );

    // Lặp qua các cột và cập nhật giá trị trong cơ sở dữ liệu
    foreach ($columns as $column) {
        $value = $_POST[$column];
        if ($value !== '') {
            $stmt = $conn->prepare("UPDATE thiduatuan SET $column = ? WHERE ten_lop = ?");
            $stmt->bind_param("ss", $value, $ten_lop);
            if ($stmt->execute()) {
                echo "<script>alert('Sửa thành công!');</script>";
            }
        }
    }

    // Tính toán và cập nhật giá trị mới cho cột diem_tong
    $sql_update_diem_tong = "UPDATE thiduatuan 
                             SET diem_tong = 100 + gio_tot * 20 - gio_tb * 2 - gio_yeu * 5 - gio_kem * 10 
                                            + so_diem_gioi * 2 - so_diem_yeu_kem * 2 - loi_2diem * 2 
                                            - loi_5diem * 5 - loi_10diem * 10 - loi_20diem * 20
                             WHERE ten_lop = ?";
    $stmt_update_diem_tong = $conn->prepare($sql_update_diem_tong);
    $stmt_update_diem_tong->bind_param("s", $ten_lop);
    if ($stmt_update_diem_tong->execute()) {
        echo "<script>alert('Cập nhật điểm tổng thành công!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Bảng Thi Đua</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <style>
        body {
            padding-top: 20px;
            background-color: #f8f9fa;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .btn-group {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2 class="text-center">Sửa lỗi</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label for="ten_lop">Lớp</label>
                <input name="ten_lop" class="form-control" placeholder="Tên lớp cần sửa (Nhập in hoa, ví dụ: 10A1)">
            </div>
            <?php
            $labels = array(
                'Giờ tốt',
                'Số giờ trung bình',
                'Số giờ yếu',
                'Số giờ kém',
                'Số điểm giỏi',
                'Số điểm yếu kém',
                'Lỗi trừ 2 điểm/lỗi',
                'Lỗi trừ 5 điểm/lỗi',
                'Lỗi trừ 10 điểm/lỗi',
                'Lỗi trừ 20 điểm/lỗi'
            );
            $input_names = array(
                'gio_tot',
                'gio_tb',
                'gio_yeu',
                'gio_kem',
                'so_diem_gioi',
                'so_diem_yeu_kem',
                'loi_2diem',
                'loi_5diem',
                'loi_10diem',
                'loi_20diem'
            );
            foreach ($labels as $index => $label) { ?>
                <div class="form-group">
                    <label for="<?= $input_names[$index] ?>"><?= $label ?></label>
                    <input name="<?= $input_names[$index] ?>" class="form-control" placeholder="Nếu không sai không nhập.">
                </div>
            <?php } ?>
            <div class="btn-group">
                <button type="submit" class="btn btn-primary" name="sua">Lưu</button>
            </div>
            <div class="btn-group">
                <a href="logout.php" class="btn btn-info" role="button">Đăng xuất</a>
            </div>
            <div class="btn-group">
                <a href="admin-page.php" class="btn btn-info" role="button">Quay lại trang admin</a>
            </div>
            <div class="btn-group">
                <button type="submit" class="btn btn-danger" name="xoa">Reset bảng thi đua</button>
            </div>
        </form>
    </div>
</body>

</html>
