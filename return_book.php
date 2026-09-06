<?php
include("db.php");

$id = $_GET['id'];

$return_date=date("Y-m-d");

$query = "UPDATE issue_book SET status='Returned',return_date='$return_date' WHERE id='$id'";

if(mysqli_query($conn, $query))
{
    echo "<script>alert('Book Returned Successfully');</script>";
    echo "<script>window.location='view_issued_books.php';</script>";
}
else
{
    echo "<script>alert('Error Returning Book');</script>";
}
?>