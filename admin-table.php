<?php
include "class.database.php";
global $conn;
$result=mysqli_query($conn,"SELECT * FROM thiduatuan");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bảng thi đua</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
    <style>
        body {
            padding-top: 20px;
        }
        .table-responsive {
            margin-top: 20px;
        }
        .card {
            margin: 0 auto;
            max-width: 1200px;
        }
        .card-header {
            background-color: #007bff;
            color: #fff;
        }
        .card-body {
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>

<div class="card">
    <div class="card-header">
        <h2 class="text-center">Bảng thi đua</h2>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="col">Lớp</th>
                        <th class="col">100% số giờ đạt loại tốt</th>
                        <th class="col">Số giờ trung bình</th>
                        <th class="col">Số giờ yếu</th>
                        <th class="col">Số giờ kém</th>
                        <th class="col">Số điểm giỏi</th>
                        <th class="col">Số điểm kém</th>
                        <th class="col">Số lỗi trừ 2 điểm</th>
                        <th class="col">Số lỗi trừ 5 điểm</th>
                        <th class="col">Số lỗi trừ 10 điểm</th>
                        <th class="col">Số lỗi trừ 20 điểm</th>
                        <th class="col">Điểm tổng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td class="col"><?= $row['ten_lop'] ?></td>
                            <td class="col"><?= $row['gio_tot'] ?></td>
                            <td class="col"><?= $row['gio_tb'] ?></td>
                            <td class="col"><?= $row['gio_yeu'] ?></td>
                            <td class="col"><?= $row['gio_kem'] ?></td>
                            <td class="col"><?= $row['so_diem_gioi'] ?></td>
                            <td class="col"><?= $row['so_diem_yeu_kem'] ?></td>
                            <td class="col"><?= $row['loi_2diem'] ?></td>
                            <td class="col"><?= $row['loi_5diem'] ?></td>
                            <td class="col"><?= $row['loi_10diem'] ?></td>
                            <td class="col"><?= $row['loi_20diem'] ?></td>
                            <td class="col"><?= $row['diem_tong'] ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>
