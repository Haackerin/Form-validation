<?php

require_once './validation.php';
if (!isset($_GET['id']) || $_GET['id'] == '') {
    header("Location: /users.php");
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