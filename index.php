<?php
    require 'config.php';
    if(!empty($_SESSION["id"])){
        $id = $_SESSION["id"];
        $result = mysqli_query($conn, "SELECT * FROM tb_user ");
    }
    else{
        header("Location: Login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
    <style>
        body{
            width: 100vw;
            height: 100vh;
            overflow-x: hidden;
            overflow-y: hidden;
            color: white;
            background-color: gray;
            font-family: 'Courier New', Courier, monospace;
        }
        .info{
            margin: 30vh auto;
            width: 500px;
            height: 300px;
            text-align: center;
        }
        a{
            margin-left: 100px;
            background-color: black;
            color: white;
            font-family: 'Courier New', Courier, monospace;
            padding: 4px;
        }
    
        table, th, td {  
            border: 1px solid pink;  
            border-collapse: collapse;  
            margin-bottom: 20px;
        }  
        th, td {  
            padding: 10px;  
        }
        .container{
            width: 500px;
            height: 200px;
            padding-top: 10vh;
            margin: 10vh auto;
        }
        .logout{
            width: 400px;
            height: 50px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <table class="table table-hover text-center">
            <h1 style="text-align: center">Welcome</h1>
            <thead class="table-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Userame</th>
                    <th scope="col">Password</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone Number</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['username'] ?></td>
                        <td><?php echo $row['password'] ?></td>
                        <td><?php echo $row['email'] ?></td>
                        <td><?php echo $row['phonenumber'] ?></td>
                        
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <div class="logout">
            <a href="logout.php">Logout</a>
        </div>
    </div>
    
</body>
</html>