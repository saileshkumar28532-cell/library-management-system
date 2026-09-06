<?php
include("db.php");

$id = $_GET['id'];

$query = "DELETE FROM books WHERE id='$id'";

if(mysqli_query($conn, $query))
{
    echo "<script>alert('Book Deleted Successfully');</script>";
    echo "<script>window.location='view_books.php';</script>";
}
else
{
    echo "<script>alert('Error Deleting Book');</script>";
}
?>