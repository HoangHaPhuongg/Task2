<?php
    require 'config.php';
    if(!empty($_SESSION["id"])){
        header("Location: index.php");
    }
    if(isset($_POST["submit"])){
        $usernameemail = $_POST["usernameemail"];
        $password = $_POST["password"];
        $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$usernameemail' OR email = '$usernameemail'");
        $row = mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result) > 0){
        if($password == $row['password']){
        $_SESSION["login"] = true;
        $_SESSION["id"] = $row["id"];
        header("Location: index.php");
        }
        else{
        echo
        "<script> alert('Wrong Password'); </script>";
        }
    }
    else{
        echo
        "<script> alert('User Not Registered'); </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="index.css" />
  </head>
  <body>
    <div class="main">
    <h2>Login</h2>
    <form class="" action="" method="post" autocomplete="off">
      <div class = "content">
      <label for="usernameemail">Username or Email : </label>
      <input type="text" name="usernameemail" id = "usernameemail" required value=""> <br>
      </div>
      <div class="content">
        <label for="password">Password : </label>
        <input type="password" name="password" id = "password" required value=""> <br>
      </div>
      <div class="content">
        <button type="submit" name="submit">Login</button>
        <a href="registration.php">Registration</a>
      </div>
    </form>
    <br>
    </div>
  </body>
</html>