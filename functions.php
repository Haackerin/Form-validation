<?php
declare(strict_types=1);
error_reporting(0);
function request(string $field): string | NULL
{
    return isset($_REQUEST[$field]) && $_REQUEST[$field] != '' ? trim($_REQUEST[$field]) : NULL;
}

function has_error(string $field): bool
{
    global $error;
    return isset($error[$field]) ? true : false;
}

function error(string $field): string | NULL
{
    global $error;
    return has_error($field) ? $error[$field] : NULL;
}

function is_repeaty(string $userintered, string $data_title): bool
{

    if (!$link = mysqli_connect('localhost:3306', 'root', '')) {
        echo 'error :  ' . mysqli_connect_error();
        die;
    }
    if (!mysqli_select_db($link, 'panel')) {
        echo 'error :  ' . mysqli_error($link);
        die;
    }

    if (!$result = mysqli_query($link, "SELECT * FROM users")) {
        echo 'error :  ' . mysqli_error($link);
        die;
    }
// mysqli_fetch_assoc () به دیتابیس میرود و هر بار یک سطر از نتیجه را در قالب آرایه
    while ($user = mysqli_fetch_assoc($result)) {
        if (is_null($user)) {
            return false;
        } elseif ($_SERVER['SCRIPT_NAME'] == "/edit.php") {
            if (($userintered == $user[$data_title])) {
                if ($user['id'] == $_GET['id']) {
                    return false;
                } else {
                    return true;
                }
            } else {
                continue;
            }
        } else {
            if ($userintered == $user[$data_title]) {
                return true;
            } else {
                continue;
            }
        }
    }
    return false;
}