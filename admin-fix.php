<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <title>Sửa Bảng Thi Đua</title>
</head>
<body>
<?php require_once "class.database.php"; ?>
<?php
    session_start(); 
    if ($_SESSION['role'] != 1) header('location:login.php');
?>
<?php
	if(isset($_POST["xoa"])){
		$reset = mysqli_query($conn,"DELETE FROM thiduatuan");
    }
?>
<?php

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
}

?>
<div class="container">
    <h2>Sửa lỗi</h2>
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
