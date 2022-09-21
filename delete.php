<?php

require_once './validation.php';
if (!isset($_GET['id']) || $_GET['id'] == '') {
    header("Location: /users.php");
}

if (!$link = mysqli_connect('localhost:3306', 'root', '')) {
    echo 'error :  ' . mysqli_connect_error();
    die;
}

if (!mysqli_select_db($link, 'panel')) {
    echo 'error :  ' . mysqli_error($link);
    die;
}
$id = (int) $_GET['id'];
$stmt = mysqli_prepare($link, "DELETE FROM users WHERE id = ?");
mysqli_stmt_bind_param($stmt, 'i', $id);
if (!mysqli_stmt_execute($stmt)) {
    echo 'error :  ' . mysqli_stmt_error($stmt);
    die;
} else{
    header("Location: /users.php");
}