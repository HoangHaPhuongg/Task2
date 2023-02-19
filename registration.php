<?php
    require 'config.php';
    if(!empty($_SESSION["id"])){
        header("Location: index.php");
    }
    if(isset($_POST["submit"])){
        $username = $_POST["username"];
        $password = $_POST["password"];
        $email = $_POST["email"];
        $phonenumber = $_POST["phonenumber"];
        $duplicate = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username' OR email = '$email'");
        if($password == ''){
            echo "<script>alert('password is blank')</script>;";
        } else {
            if(mysqli_num_rows($duplicate) > 0){
                echo "<script>'Email or username has been taken'</script>";
            } else {
                $query = "INSERT INTO tb_user VALUES('', '$username', '$password', '$email', '$phonenumber')";
                mysqli_query($conn, $query);
                echo "<script>alert('Registration Successed');</script>";
            }
        }
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <h2>Registration</h2>
    <form action="" method="post">
        <div class="content">
        <label for="username">Username: </label>
        <input type="text" name="username" id="username"> <br>
        </div>
        <div class="content">
        <label for="password">Password: </label>
        <input type="password" name="password" id="password"> <br>
        </div>
        <div class="content">
        <label for="email">Email: </label>
        <input type="text" name="email" id="email"> <br>
        </div>
        <div class="content">
        <label for="phonenumber">Phone Number: </label>
        <input type="text" name="phonenumber" id="phonenumber"> <br>
        <div class="content">
        <button type="submit" name="submit">Register</button>
        <a href="login.php">Login</a>
        </div>
    </form>
</body>
</html>