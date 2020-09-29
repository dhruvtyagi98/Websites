<?php
if(isset($_POST['signup-btn'])) {

  require 'dbh-inc.php';

  $username = $_POST['username'];
  $email = $_POST['useremail'];
  $password = $_POST['pwd'];
  $passwordconfirm = $_POST['pwdconfirm'];

  if(empty($username) || empty($email) || empty($password) || empty($passwordconfirm)) {
    header("Location: ../Index.php?error=EmptyField&name=".$username."&mail=".$email);
    exit();
  }

  elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z]*$/", $username)) {
    header("Location: ../Index.php?error=InvalidEmail&name");
    exit();
  }

  elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: ../Index.php?error=InvalidEmail&name=".$username);
    exit();
  }

  elseif (!preg_match("/^[a-zA-Z]*$/", $username)) {
    header("Location: ../Index.php?error=Invalidname&mail=".$email);
    exit();
  }

  elseif ($password !== $passwordconfirm) {
    header("Location: ../Index.php?error=PasswordCheck&name=".$username."&mail=".$email);
    exit();
  }

  else{

    $sql = "SELECT Email FROM userdata WHERE Email=?";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../Index.php?error=sqlerr");
      exit();
    }

    else {
      mysqli_stmt_bind_param($stmt, "s", $email);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);
      $resultcheck = mysqli_stmt_num_rows($stmt);

      if ($resultcheck > 0) {
        header("Location: ../Index.php?error=EmailTaken&mail=".$username);
        exit();
      }

      else{
        $sql = "INSERT INTO userdata (UserName, Email, PwdUsers) VALUES (?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
          header("Location: ../Index.php?error=sqlerr");
          exit();
        }

        else{
          $hashedpwd = password_hash($password, PASSWORD_DEFAULT);
          mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedpwd);
          mysqli_stmt_execute($stmt);
          header("Location: ../Index.php?Signup=Success");
          exit();
        }
      }
    }
  }
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
}

else {
  header("Location: ../Index.php");
  exit();
}
