<?php require_once "class.database.php"; ?>
<?php
    session_start(); 
    // Kiểm tra xem người dùng đã đăng nhập và có vai trò là admin không
    if (!isset($_SESSION['role']) || $_SESSION['role'] != 1) {
        header('location:login.php'); // Nếu không phải admin, chuyển hướng về trang đăng nhập
        exit(); // Thoát khỏi trang hiện tại
    }
?>
<body>
<?php
// Tạo một đối tượng Spreadsheet
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Thực hiện truy vấn để lấy dữ liệu từ bảng thiduatuan
$sql = "SELECT * FROM thiduatuan";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Dùng vòng lặp để thêm dữ liệu từ cơ sở dữ liệu vào file Excel
    $row = 2;
    while ($row_data = $result->fetch_assoc()) {
        $col = 1;
        foreach ($row_data as $value) {
            $sheet->setCellValue([$col, $row], $value);
            $col++;
        }
        $row++;
    }
} else {
    echo "Không có dữ liệu để xuất.";
}


// Xuất file Excel
$writer = new Xlsx($spreadsheet);
$writer->save('thiduatuan.xlsx');//File được lưu về thư mục hiện tại chứa web ,$writer->save('path/to/your/folder/thiduatuan.xlsx'); để đặt địa chỉ lưu file

echo "<script>
    alert('Tạo file thành công!');
    window.location.href = 'admin-page.php';
</script>";
exit;


$conn->close();
?>
</body>
</html>
