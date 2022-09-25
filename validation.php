<?php
require_once './functions.php';

if (!database_link('netroozn_panel', 'netroozn_amir', 'A.h.s0518')) {
    echo 'database error!';
    die;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = request('username');
    $email = request('email');
    $tel = (int) request('tel');
    $password = request('password');
    $confirm_password = request('confirm_password');
    $agr = request('agr');


    if (is_null($username)) {
        $error['username'] = 'این فیلد نمی تواند خالی بماند';
    } elseif (is_repeaty($username, 'username')) {
        $error['username'] = 'نام کاربری وارد شده قبلا استفاده شده';
    }

    if (is_null($email)) {
        $error['email'] = 'این فیلد نمی تواند خالی بماند';
    } elseif (is_repeaty($email, 'email')) {
        $error['email'] = 'ایمیل وارد شده قبلا استفاده شده';
    }

    if (is_null($password)) {
        $error['password'] = 'این فیلد نمی تواند خالی بماند';
    } elseif (strlen($password) < 6) {
        $error['password'] = 'این فیلد نمیتواند کمتر از 6 کاراکتر باشد';
    }

    if ($password != $confirm_password) {
        $error['confirm_password'] = 'رمز عبور مطابقت ندارد';
    }

    if ($_SERVER['SCRIPT_NAME'] == "/index.php" && $agr != 'on') {
        $error['agr'] = 'باید ابتدا با قوانین سایت موافقت کنید';
    }

    if (
        !is_null($username)
        && !is_null($email)
        && !is_null($password)
        && $password == $confirm_password
        && !is_repeaty($username, 'username')
        && !is_repeaty($email, 'email')
    ) {

        if ($_SERVER['SCRIPT_NAME'] == "/index.php") {
            if ($agr == 'on') {
                $stmt = mysqli_prepare($link, "INSERT INTO users (username,email,tel,password) VALUES (?,?,?,?)");
                mysqli_stmt_bind_param($stmt, 'ssis', $username, $email, $tel, $password);
                if (!mysqli_stmt_execute($stmt)) {
                    echo "error :  " . mysqli_error($link);
                    die;
                }

                if (is_null($error)) {
                    $success = true;
                } else {
                    $success = false;
                }
            } else {
                $success = false;
            }
        } elseif ($_SERVER['SCRIPT_NAME'] == "/edit.php") {
            $stmt2 = mysqli_prepare($link, "UPDATE users SET username = ?, email = ?, tel = ?, password = ? WHERE id = ?");
            $id = (int) $_GET['id'];
            mysqli_stmt_bind_param($stmt2, 'ssisi', $username, $email, $tel, $password, $id);
            if (!mysqli_stmt_execute($stmt2)) {
                echo "error :  " . mysqli_error($link);
                die;
            }

            if (is_null($error)) {
                $success = true;
            } else {
                $success = false;
            }
        }
    }
}
