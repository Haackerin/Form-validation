<?php
require_once './validation.php';
if (!isset($_GET['id']) || $_GET['id'] == '') {
    header("Location: /users.php");
}

$id = (int) $_GET['id'];
$stmt = mysqli_prepare($link, "SELECT * FROM users WHERE id = ?");
mysqli_stmt_bind_param($stmt, 'i', $id);
if (!mysqli_stmt_execute($stmt)) {
    echo 'error :  ' . mysqli_stmt_error($stmt);
    die;
}
$result = mysqli_stmt_get_result($stmt);

if ($result->num_rows != 1) {
    header('Location: /users.php');
} else {
    $user = mysqli_fetch_assoc($result);
?>

    <html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="styles/style.css">
        <title>ویرایش کاربر</title>
    </head>

    <body>
        <div class="container sign-up-mode">
            <div class="signin-signup">
                <form action="/edit.php?id=<?= $user['id'] ?>" method="POST" class="sign-up-form">
                    <h2 class="title">ویرایش</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="username" placeholder="نام کاربری *" value="<?= $user['username'] ?>">
                    </div>
                    <?php
                    if (has_error('username')) {
                    ?>
                        <div class="error"><?= error('username') ?></div>
                    <?php
                    }
                    ?>

                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" name="email" placeholder="ایمیل *" value="<?= $user['email'] ?>">
                    </div>
                    <?php
                    if (has_error('email')) {
                    ?>
                        <div class="error"><?= error('email') ?></div>
                    <?php
                    }
                    ?>

                    <div class="input-field">
                        <i class="fas fa-phone"></i>
                        <input type="tel" name="tel" placeholder="شماره همراه (اختیاری)" maxlength="11" value="<?php
                                                                                                                if ($user['tel'] != 0) {
                                                                                                                    echo $user['tel'];
                                                                                                                }
                                                                                                                ?>">
                    </div>

                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" placeholder="رمز عبور *" value="<?= $user['password'] ?>">
                    </div>
                    <?php
                    if (has_error('password')) {
                    ?>
                        <div class="error"><?= error('password') ?></div>
                    <?php
                    }
                    ?>

                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="confirm_password" placeholder="تایید رمز عبور *">
                    </div>
                    <?php
                    if (has_error('confirm_password')) {
                    ?>
                        <div class="error"><?= error('confirm_password') ?></div>
                    <?php
                    }
                    ?>
                    <br>
                    <?php
                    if ($success) {
                    ?>
                        <div class="success"> اطلاعات با موفقیت ویرایش شد </div>
                    <?php
                    }
                    ?>
                    <br>
                    <?php
                    if (has_error('agr')) {
                    ?>
                        <div class="error"><?= error('agr') ?></div>
                    <?php
                    }
                    ?>
                    <input type="submit" class="btn" value="ویرایش">

                </form>
            </div>
        </div>
        <script src="main.js"></script>
    </body>

    </html>

<?php
}
