<?php
include("db.php");

$id = $_GET['id'];

$query = "SELECT * FROM students WHERE id='$id'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

if(isset($_POST['update']))
{
    $name = $_POST['name'];
    $roll_no = $_POST['roll_no'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    $update = "UPDATE students SET
    name='$name',
    roll_no='$roll_no',
    email='$email',
    phone='$phone',
    password='$password'
    WHERE id='$id'";

    if(mysqli_query($conn, $update))
    {
        echo "<script>alert('Student Updated Successfully');</script>";
        echo "<script>window.location='view_students.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="login-box">

<h2>Edit Student</h2>

<form method="POST">

<input type="text" name="name" value="<?php echo $row['name']; ?>" required>

<input type="text" name="roll_no" value="<?php echo $row['roll_no']; ?>" required>

<input type="email" name="email" value="<?php echo $row['email']; ?>" required>

<input type="text" name="phone" value="<?php echo $row['phone']; ?>" required>

<input type="password" name="password" value="<?php echo $row['password']; ?>" required>

<button type="submit" name="update">Update Student</button>

</form>

</div>

</body>
</html>