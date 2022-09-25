<?php
require_once './validation.php';

if (!$resault = mysqli_query($link, "SELECT * FROM users")) {
    echo 'error :  ' . mysqli_error($link);
    die;
}


?>

<html>

<head>
    <title>
        اطلاعات کاربران
    </title>
    <link rel="stylesheet" href="./styles/table.css">
</head>

<body>
    <table>
        <tr>
            <th>نام کاربری</th>
            <th>ایمیل</th>
            <th>شماره همراه</th>
            <th>رمز عبور</th>
            <th colspan="2">اقدامات</th>
        </tr>
        <?php
        while ($users = mysqli_fetch_assoc($resault)) {
            ?><tr>
                <td><?= $users['username'] ?></td>
                <td><?= $users['email'] ?></td>
                <td>
                    <?php
                    if ($users['tel'] == 0) {
                        echo 'وارد نکرده';
                    }else{
                        echo $users['tel'];
                    }
                    ?>
                </td>
                <td><?= $users['password'] ?></td>
                <td><a href="./edit.php?id=<?= $users['id'] ?>">ویرایش</a></td>
                <td><a href="./delete.php?id=<?= $users['id'] ?>">حذف</a></td>
            </tr>
            <?php
        }
        ?>
    </table>
</body>

</html>