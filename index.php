<?php
require_once './validation.php';
?>

<!DOCTYPE html>

<html>

<head>
    <title>ثبت نام</title>
    <link rel="stylesheet" type="text/css" href="./styles/style.css">
    <link rel="stylesheet" href="./styles/all.min.css">


</head>

<body>




    <div class="box">
        <form class="form-box" action="/" method="POST">

            <div class="field">
                <label for="exampleEmail1" class="field-label"> :نام کاربری </label>
                <input id="exampleEmail1" type="text" placeholder="@aliprogram" class="input" name="username">
            </div>
            <?php
            if (has_error('username')) {
            ?>
                <div class="error"><?= error('username') ?></div>
            <?php
            }
            ?>

            <div class="field">
                <label for="exampleEmail1" class="field-label"> :ایمیل </label>
                <input id="exampleEmail1" type="text" placeholder="info@gmail.com " class="input" name="email">
            </div>
            <?php
            if (has_error('email')) {
            ?>
                <div class="error"><?= error('email') ?></div>
            <?php
            }
            ?>
            <div class="field">
                <label for="exampleEmail1" class="field-label"> :شماره همراه (اختیاری) </label>
                <input id="exampleEmail1" type="text" placeholder="09332333643" class="input">
            </div>
            <div class="field ">
                <label for="examplePassword1 " class="field-label ">رمز عبور</label>
                <input id="id_password " name="password" type="password" class="input examplePassword1 ">
                <i class="far fa-eye " id="togglePassword "></i>
            </div>
            <?php
            if (has_error('password')) {
            ?>
                <div class="error"><?= error('password') ?></div>
            <?php
            }
            ?>

            <div class="field">
                <label for="examplePassword1" class="field-label"> تایید رمز عبور</label>
                <input id="examplePassword1" type="password" name="confirm_password" class="input">
            </div>
            <?php
            if (has_error('confirm_password')) {
            ?>
                <div class="error"><?= error('confirm_password') ?></div>
            <?php
            }
            ?>
            <div class="field">
                <label class="checkbox">
                    <span class="checkbox-label" style="margin-right:5px ;" data-ripple-light="true">تمامی قوانین را می پذیریم </span>
                    <input type="checkbox" class="checkbox-input" name="agr">
                </label>
                <?php
                if (has_error('agr')) {
                ?>
                    <div class="error"><?= error('agr') ?></div>
                <?php
                }
                ?>

                <?php
                if ($success) {
                ?>
                    <div class="success"> اطلاعات با موفقیت ذخیره شد </div>
                <?php
                }
                ?>

            </div>

            <button class="button">ثبت نام</button>



        </form>

        <a class="circle-01" href="./users2.php">
            <i class="fad fa-users"></i>
        </a>
        <div class="circle-02"></div>

    </div>
    </div>
    <script>
        var togglePassword = document.getElementById("togglePassword ");
        var password = document.getElementById("id_password ");
        password.type = "password";
        togglePassword.addEventListener('click', function(e) {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            this.classList.toggle('fa-eye-slash');
        });
    </script>
</body>

</html>