<?php
include("db.php");

if(isset($_POST['add_student']))
{
    $name = $_POST['name'];
    $roll_no = $_POST['roll_no'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    $query = "INSERT INTO students(name, roll_no, email, phone, password)
              VALUES('$name','$roll_no','$email','$phone','$password')";

    if(mysqli_query($conn, $query))
    {
        echo "<script>alert('Student Added Successfully');</script>";
    }
    else
    {
        echo "<script>alert('Error Adding Student');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="login-box">
    <h2>Add Student</h2>

    <form method="POST">

        <input type="text" name="name" placeholder="Student Name" required>

        <input type="text" name="roll_no" placeholder="Roll Number" required>

        <input type="email" name="email" placeholder="Email" required>

        <input type="text" name="phone" placeholder="Phone Number" required>

        <input type="password" name="password" placeholder="Password" required>

        <button type="submit" name="add_student">Add Student</button>

    </form>

</div>

</body>
</html>