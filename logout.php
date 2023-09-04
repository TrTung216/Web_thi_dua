<?php
session_start();
unset($_SESSION['id_lop']);
header('location:login.php');
?>