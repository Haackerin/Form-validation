<?php
require_once './validation.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" >
  <meta name="viewport" content="width=device-width, initial-scale=1.0" >
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="styles/style.css" >
  <title>ورود / ثبت نام</title>
</head>

<body>
  <div class="container sign-up-mode">
    <div class="forms-container">
      <div class="signin-signup">

        <form action="/" method="POST" class="sign-up-form">
          <h2 class="title">ثبت نام</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" name="username" placeholder="نام کاربری *" >
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
            <input type="email" name="email" placeholder="ایمیل *">
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
            <input type="tel" name="tel" placeholder="شماره همراه (اختیاری)" maxlength="11">
          </div>

          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" name="password" placeholder="رمز عبور *" >
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
            <input type="password" name="confirm_password" placeholder="تایید رمز عبور *" >
          </div>
          <?php
          if (has_error('confirm_password')) {
          ?>
            <div class="error"><?= error('confirm_password') ?></div>
          <?php
          }
          ?>
          <br>
          <div class="input-check">
            <input type="checkbox" name="agr" id="agreement"> <label for="agreement"> تمامی قوانین و مقررات را می پذیرم</label>
          </div>
          <br>
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

          <input type="submit" class="btn" value="ثبت نام" >

        </form>
      </div>
    </div>

    <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">
          <h3>حساب کاربری ندارید؟</h3>
          <p>
            شما میتوانید از بخش ثبت نام برای خود یک حساب کاربری بسازید
          </p>
          <button class="btn transparent" id="sign-up-btn">
            ساختن حساب کاربری
          </button>
        </div>
        <img src="img/register.svg" class="image" alt="Register" >
      </div>
      <div class="panel right-panel">
        <div class="content">
          <h3> لیست کاربران </h3>
          <p>
            شما میتوانید از بخش لیست کاربران کسانی که در سایت ثبت نام کرده اند را مشاهده کنید
          </p>
          <a href="./users.php">  
            <button class="btn transparent" id="sign-in-btn">
              لیست کاربران
            </button>
          </a>
        </div>
        <img src="img/login.svg" class="image" alt="Login" >
      </div>
    </div>
  </div>
  <!-- <script src="scripts/main.js"></script> -->
</body>

</html>