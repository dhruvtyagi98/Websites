<?php

if(isset($_POST['signin-btn'])){

  require 'dbh-inc.php';

  $email = $_POST['email'];
  $pwd = $_POST['password'];

  if(empty($email) || empty($pwd)){
    header("Location: ../Index.php?error=EmptyField&email=".$email);
    exit();
  }

  else{
    $sql = "SELECT * FROM userdata WHERE Email=?";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
      header("Location: ../Index.php?error=sqlerr");
      exit();
    }

    else{
      mysqli_stmt_bind_param($stmt, "s", $email);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);

      if($row = mysqli_fetch_assoc($result)){
        $pwdcheck = password_verify($pwd, $row['PwdUsers']);
        if($pwdcheck == false){
          header("Location: ../Index.php?error=WrongPwd");
          exit();
        }
        elseif($pwdcheck == true){
          session_start();
          $_SESSION['userid'] = $row['UserID'];
          $_SESSION['username'] = $row['UserName'];
          header("Location: ../home.php?Login=Success&username=".$_SESSION['username']);
          exit();
        }
        else{
          header("Location: ../Index.php?error=WrongPwd");
          exit();
        }
      }

      else{
        header("Location: ../Index.php?error=NoUser");
        exit();
      }
    }
  }
}

else {
  header("Location: ../Index.php");
  exit();
}
