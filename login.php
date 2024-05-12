<?php
    include "class.database.php";
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $user_name = $_POST['user_name'];
        $user_pass = $_POST['user_pass'];
        $result = mysqli_query($conn, "SELECT * FROM db_users WHERE username='$user_name' AND pass='$user_pass'");
        $row = mysqli_fetch_assoc($result);
        if ($row) {
            if ($row["role"] == "1") {
                $_SESSION['role'] = $row["role"];
                header("Location: admin-page.php");
                exit();
            } else {
                $_SESSION['id_lop'] = $row['id_lop'];
                $current_day = date("N"); // Lấy ngày hiện tại (1-7: thứ 2 - thứ 7)
                $current_hour = date("G"); // Lấy giờ hiện tại (24-giờ)
                if ($current_day == 5 && $current_hour >= 10 && $current_hour <= 15) {
                    header('Location: users-page.php');
                    exit();
                } else {
                    echo "<script>
                        alert('Chưa đến thời gian đăng nhập, vui lòng quay lại sau.');
                        window.location.href = 'login.php';
                      </script>";
        exit;
                }
            }
        } else {
            echo '<script>alert("Tên đăng nhập hoặc mật khẩu không đúng!")</script>';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f8f9fc;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }
    </style>
    <title>Login</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Đăng nhập</h1>
                    </div>
                    <form class="user" action="login.php" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" placeholder="Tên đăng nhập..." name="user_name">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control form-control-user" placeholder="Mật khẩu" name="user_pass">
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox small">
                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                <label class="custom-control-label" for="customCheck">Nhớ mật khẩu</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-user btn-block">Đăng nhập</button>
                    </form>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
