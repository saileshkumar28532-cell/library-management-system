<?php
include("db.php");

if(isset($_POST['issue_book']))
{
    $student_id = $_POST['student_id'];
    $student_name = $_POST['student_name'];
    $book_id = $_POST['book_id'];
    $book_name = $_POST['book_name'];
    $issue_date = $_POST['issue_date'];


$due_date = date("Y-m-d", strtotime("+15 days"));

$query = "INSERT INTO issue_book
(book_id, student_id, student_name,book_name, issue_date, due_date, status)
VALUES
('$book_id', '$student_id', '$student_name','$book_name', '$issue_date', '$due_date', 'Issued')";
    if(mysqli_query($conn, $query))
    {
        echo "<script>alert('Book Issued Successfully');</script>";
    }
    else
    {
        echo "<script>alert('Error');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Issue Book</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="login-box">

<h2>Issue Book</h2>

<form method="POST">

<input type="number" name="student_id" placeholder="Student ID" required>

<input type="text" name="student_name" placeholder="Student Name" required>

<input type="number" name="book_id" placeholder="Book ID" required>

<input type="text" name="book_name" placeholder="Book Name" required>

<label>Issue Date</label>
<input type="date" name="issue_date" required>



<button type="submit" name="issue_book">Issue Book</button>

</form>

</div>

</body>
</html>