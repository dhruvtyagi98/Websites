<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Reservation Time Table</title>
    <link rel="stylesheet" type="text/css" href="login-Style.css">
    <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&display=swap" rel="stylesheet">
  </head>
  <body>
    <div class="cont">
      <div class="form sign-in">
        <h2>Sign In</h2>
        <?php
        if (isset($_GET['error'])) {
          if ($_GET['error'] == "EmptyField") {
            echo '<p class="signuperr" style="color:red;position: relative;text-align:center;padding-top:15px;">Empty Fields</p>';
          }
          elseif ($_GET['error'] == "WrongPwd") {
            echo '<p class="signuperr" style="color:red;position: relative;text-align:center;padding-top:15px;">Wrong Password</p>';
          }
          elseif ($_GET['error'] == "NoUser") {
            echo '<p class="signuperr" style="color:red;position: relative;text-align:center;padding-top:15px;">Email ID does not exists</p>';
          }
        }
         ?>
        <form action="includes/login-inc.php" method="post">
        <label>
          <span>Email Address</span>
          <input type="email" name="email">
        </label>
        <label>
          <span>Password</span>
          <input type="password" name="password">
        </label>
        <button class="submit"type="submit" name="signin-btn">Sign In</button>
      </form>
        <p class="forget-password">Forget Password ?</p>

        <div class="social">
          <ul>
            <li><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAaVBMVEU6VZ////81Up0yT5xgc61+jbsvTZyXo8hFXaOirM0nSJmlrs7O1OUkRpkfQ5c1UZ1oerKHlcDp6/M9WKHHzeHV2ulxgravt9Td4Ozl6PGDkb7ByN5YbatQZ6j29/q3v9h2hrhMY6aQnMSsAnKHAAAC70lEQVR4nO3caXLiMBRFYdoihhhsQ5jDlPT+F9mdqv7bRrYQ7z7XOQug9BUWHiQzmRARERERERERERERERERqVe0IZQPCtaDHFwo62Yz/VrP3jtbrH0Sy7rYH46/YtpV1oPtX6jCbBel+2npThjq/Taa51AYmrdTH583YdHsP/r5nAnLTa/j05+w+ezv8yRsq/MQoB9hmPeegb6E5eU2DOhFWK4G+rwIw3CgD2G4Dge6ELaboXPQi7CJu4nwK6zvKUAHwvCVBHQgrFMmoQdh4jGqL2wviUB5YRP/uMKnsJ2mAtWF9XLkwjblcs2FsDqMXZh6LpQXhn06UFtYpZ7t5YX1wEczboTF/AlAaWFYP0OovPZU9pmGt9194W79sIq/Jt2uqqrytwbcxJ4NT9e6tR7soEIk8N749E2K7zjgubEe6dAi75yOboGxwrnTQ/RvRZTwIHy6e1SccF5Yj3N4UcJjbT3MhKKEh9J6mAlFCZWvyR4WJXxDqBxChPohRKgfQoT6IUSoH0KE+iFEqB9ChPqNQ1h0vKJcxWwt/aofvelsDFzNOlpECO9dH/DT+8ZUWMYgErNdfXuB8Ga7RPwCofHy2wuE59EfpQvbH9MXCNejF65st2q8QPhtu5Mhv/BmfE2TX/hhvGMqv3BpvBslv/BuvGUqv3A2+nloff+YX3gx3rmYX2j9CCC78Ga9NzO78GS9dTG7cDv679B8c2Z24e/R/9LsRy+8Wm/kzy60nobZhdb3TvmF9u8e5hYaP0p8gfB99PPQ/l2F3MKp+StDuYXWvuxC60eJ+YXm907ZhQJ/NlA+4d9ZOrrbH6WTzbyjmL+D/Oz6BNsl/H8V/y9E7TYpOz7BGveoceyn6QohQv0QItQPIUL9ECLUDyFC/RAi1A8hQv0QItQPIUL9ECLUDyFC/RAi1A8hQv0QItQPIUL9ECLUDyFC/RAi1A8hQv0QItQPIUL9ECLUDyFC/RAi1A8hQv0QItQPIUL9ECLs0R8aFUYEFLSeAgAAAABJRU5ErkJggg=="></li>
            <li><img src="data:image/png;base64,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"></li>
          </ul>
        </div>
      </div>
      <div class="sub-cont">
        <div class="img">
          <div class="img-txt m--up">
            <h2>New here?</h2>
            <p>Don't have an account yet? Sign Up</p>
          </div>
          <div class="img-txt m--in">
            <h2>Have an account?</h2>
            <p>If you already have an account, Sign In</p>
          </div>
          <div class="img-btn">
            <span class="m--up">Sign Up</span>
            <span class="m--in">Sign In</span>
          </div>
        </div>
        <div class="form sign-up">
          <h2>Sign Up</h2>
          <?php
            if (isset($_GET['error'])) {
              if ($_GET['error'] == "EmptyField") {
                echo '<p class="signuperr" style="color:red;position: relative;text-align:center;padding-top:15px;">Fill all the fields</p>';
              }
              elseif ($_GET['error'] == "InvalidEmail") {
                echo '<p class="signuperr" style="color:red;position: relative;text-align:center;padding-top:15px;">Invalid Email</p>';
              }
              elseif ($_GET['error'] == "Invalidname") {
                echo '<p class="signuperr" style="color:red;position: relative;text-align:center;padding-top:15px;">Invalid Name</p>';
              }
              elseif ($_GET['error'] == "PasswordCheck") {
                echo '<p class="signuperr" style="color:red;position: relative;text-align:center;padding-top:15px;">Password does not match</p>';
              }
            }
           ?>
          <form action="includes/signup-inc.php" method="post">
          <label>
            <span>Name</span>
            <input type="text" name="username">
          </label>
          <label>
            <span>Email</span>
            <input type="email" name="useremail">
          </label>
          <label>
            <span>Password</span>
            <input type="password" name="pwd">
          </label>
          <label>
            <span>Confirm Password</span>
            <input type="password" name="pwdconfirm">
          </label>
          <button type="submit" class="submit" name="signup-btn">Sign Up</button>
        </form>
        </div>
      </div>
    </div>
    <script type="text/javascript">
    document.querySelector('.img-btn').addEventListener('click',function()
    {
      document.querySelector('.cont').classList.toggle('s-signup');
    }
    );
    </script>
  </body>
</html>
