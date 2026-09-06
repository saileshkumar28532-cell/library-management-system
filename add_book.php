<?php
include("db.php");

if(isset($_POST['add_book']))
{
    $book_name = $_POST['book_name'];
    $author = $_POST['author'];
    $category = $_POST['category'];
    $quantity = $_POST['quantity'];
    $available = $_POST['quantity'];

    $query = "INSERT INTO books(book_name, author, category, quantity, available)
              VALUES('$book_name','$author','$category','$quantity','$available')";

    if(mysqli_query($conn, $query))
    {
        echo "<script>alert('Book Added Successfully');</script>";
    }
    else
    {
        echo "<script>alert('Error Adding Book');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Book</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="login-box">
    <h2>Add New Book</h2>

    <form method="POST">

        <input type="text" name="book_name" placeholder="Book Name" required>

        <input type="text" name="author" placeholder="Author Name" required>

        <input type="text" name="category" placeholder="Category" required>

        <input type="number" name="quantity" placeholder="Quantity" required>

        <button type="submit" name="add_book">Add Book</button>

    </form>

</div>

</body>
</html>