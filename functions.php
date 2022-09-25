<?php

declare(strict_types=1);
error_reporting(0);
function request(string $field): ?string
{
    return isset($_REQUEST[$field]) && $_REQUEST[$field] != '' ? trim($_REQUEST[$field]) : NULL;
}

function has_error(string $field): bool
{
    global $error;
    return isset($error[$field]) ? true : false;
}

function error(string $field): ?string
{
    global $error;
    return has_error($field) ? $error[$field] : NULL;
}

function database_link(string $database_name, string $username, string $password): bool
{
    global $link;
    $link = mysqli_connect('localhost:3306', $username, $password);
    if (!$link) {
        return false;
        die;
    }

    if (!mysqli_select_db($link, $database_name)) {
        return false;
        die;
    }
    if (!mysqli_query($link, "CREATE TABLE IF NOT EXISTS users (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL, tel BIGINT, password VARCHAR(100) NOT NULL, PRIMARY KEY(id))")) {
        return false;
        die;
    }

    return true;
}

function is_repeaty(string $userintered, string $data_title): bool
{
    global $link;
    database_link('netroozn_panel', 'netroozn_amir', 'A.h.s0518');

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
