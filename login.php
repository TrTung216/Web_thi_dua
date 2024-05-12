<?php
    include "class.database.php";
    global $conn;
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content=""><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Login</title>
</head>



<body>
    <div class="container">
    <div class="row">
        <div class="col-lg-6">
            <div class="p-5">
            <?php

            if($_SERVER["REQUEST_METHOD"]=="POST")
            {

                $user_name=$_POST['user_name'];
                $user_pass=$_POST['user_pass'];
                $result=mysqli_query($conn,"SELECT * from db_users where username='$user_name' and pass='$user_pass'");
                $row=mysqli_fetch_assoc($result);
                if($row){
                    if($row["role"]=="1"){
                        $_SESSION['role']=$row["role"];
                        header("Location:admin-page.php");    
                    }else{
                        $_SESSION['id_lop']=$row['id_lop'];
                        if($_SESSION['thu']==0){
                            if($_SESSION['gio']>9){
                                if($_SESSION['gio']<24){
                                    header('location:users-page.php');
                                }
                                elseif($_SESSION['gio']==15){
                                    if($_SESSION['phut']==0){
                                        header('location:users-page.php');
                                    }
                                    else{
                                        header('location:users-date.php');
                                    }
                                }
                                else{
                                    header('location:users-date.php');
                                }
                            }
                            else{
                                header('location:users-date.php');
                            }

                        }
                        else{
                            header('location:users-date.php');
                        }
                    }
                }
                else{
                    echo '<script>alert("Tên đăng nhập hoặc mật khẩu không đúng!")</script>';
                }
            }
                ?>							
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Đăng nhập</h1>
                </div>
                <form class="user" action="login.php" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user"
                            placeholder="Enter Email Address..." name="user_name">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control form-control-user"
                            id="exampleInputPassword" placeholder="Password"  name="user_pass">
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox small">
                            <input type="checkbox" class="custom-control-input" id="customCheck">
                            <label class="custom-control-label" for="customCheck">Remember
                                Me</label>
                        </div>
                    </div>
                    <button type="submit"class="btn btn-primary btn-user btn-block">
                        Login
                    </button>
                </form>
                <hr>
            </div>
        </div>
    </div>
</body>

</html>