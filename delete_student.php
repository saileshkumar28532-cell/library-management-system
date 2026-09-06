<?php
include("db.php");

$id = $_GET['id'];

$query = "DELETE FROM students WHERE id='$id'";

if(mysqli_query($conn, $query))
{
    echo "<script>alert('Student Deleted Successfully');</script>";
    echo "<script>window.location='view_students.php';</script>";
}
else
{
    echo "<script>alert('Error Deleting Student');</script>";
}
?>