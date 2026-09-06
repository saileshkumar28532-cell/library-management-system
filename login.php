<?php
session_start();
include("db.php");

if(isset($_POST['login']))
{
    $username=$_POST['username'];
    $password=
    $_POST['password'];
    $query="SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $result =mysqli_query($conn,$query);
      
    if(mysqli_num_rows($result)>0)
    { 
        $_SESSION['admin']=$username;
        header("Location:dashboard.php");
        exit();
    }
    else{
        echo"<script>alert('Invalid Username or Password');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Library Management System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="login-box">
    <h1>📚 Welcome</h1>
<h2>Library Management System</h2>
<p class="subtitle">Manage Books • Students • Issue & Return</p>

    <form action="" method="POST">
        <input type="text" name="username" placeholder="Enter Username" required>

        <input type="password" name="password" placeholder="Enter Password" required>

        <button type="submit" name="login">Login</button>
    </form>

</div>

</body>
</html>