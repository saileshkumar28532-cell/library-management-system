<?php
include("db.php");

$id = $_GET['id'];

$query = "SELECT * FROM books WHERE id='$id'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

if(isset($_POST['update']))
{
    $book_name = $_POST['book_name'];
    $author = $_POST['author'];
    $category = $_POST['category'];
    $quantity = $_POST['quantity'];
    $available = $_POST['available'];

    $update = "UPDATE books SET
    book_name='$book_name',
    author='$author',
    category='$category',
    quantity='$quantity',
    available='$available'
    WHERE id='$id'";

    if(mysqli_query($conn, $update))
    {
        echo "<script>alert('Book Updated Successfully');</script>";
        echo "<script>window.location='view_books.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Book</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="login-box">

<h2>Edit Book</h2>

<form method="POST">

<input type="text" name="book_name" value="<?php echo $row['book_name']; ?>" required>

<input type="text" name="author" value="<?php echo $row['author']; ?>" required>

<input type="text" name="category" value="<?php echo $row['category']; ?>" required>

<input type="number" name="quantity" value="<?php echo $row['quantity']; ?>" required>

<input type="number" name="available" value="<?php echo $row['available']; ?>" required>

<button type="submit" name="update">Update Book</button>

</form>

</div>

</body>
</html>