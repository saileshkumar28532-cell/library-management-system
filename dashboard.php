<?php
session_start();

if(!isset($_SESSION['admin']))
{
    header("Location:login.php");
    exit();
}

include("db.php");

$books = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM books"));
$students = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM students"));
$issued = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM issue_book WHERE status='Issued'"));
$returned = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM issue_book WHERE status='Returned'"));
?>

<!DOCTYPE html>
<html>

<head>
    <title>Library Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="dashboard-page">

<div class="dashboard-layout">

    <!-- SIDEBAR -->

    <aside class="dashboard-sidebar">

        <div class="sidebar-logo">
            <div class="sidebar-book">📚</div>

            <div>
                <h2>Library</h2>
                <span>Management System</span>
            </div>
        </div>


        <div class="sidebar-menu">

            <p class="menu-title">MAIN MENU</p>

            <a href="dashboard.php" class="active">
                🏠 <span>Dashboard</span>
            </a>

            <a href="add_book.php">
                ➕ <span>Add Book</span>
            </a>

            <a href="view_books.php">
                📚 <span>View Books</span>
            </a>

            <p class="menu-title">STUDENTS</p>

            <a href="add_student.php">
                👨‍🎓 <span>Add Student</span>
            </a>

            <a href="view_students.php">
                👥 <span>View Students</span>
            </a>

            <p class="menu-title">LIBRARY</p>

            <a href="issue_book.php">
                📖 <span>Issue Book</span>
            </a>

            <a href="view_issued_books.php">
                📋 <span>Issued Books</span>
            </a>

        </div>


        <div class="sidebar-bottom">

            <a href="logout.php" class="logout-link">
                🚪 <span>Logout</span>
            </a>

        </div>

    </aside>


    <!-- MAIN CONTENT -->

    <main class="dashboard-main">

        <!-- TOP HEADER -->

        <div class="dashboard-top">

            <div>
                <p class="small-heading">LIBRARY DASHBOARD</p>

                <h1>Welcome back, <?php echo htmlspecialchars($_SESSION['admin']); ?> 👋</h1>

                <p class="dashboard-subtitle">
                    Here's what's happening in your library today.
                </p>
            </div>


            <div class="admin-badge">
                👤 Admin
            </div>

        </div>


        <!-- STATISTICS -->

        <div class="dashboard-section-title">
            <h2>Library Overview</h2>
            <span>Live Statistics</span>
        </div>


        <div class="dashboard-cards">


            <!-- BOOKS -->

            <div class="dashboard-card books-card">

                <div class="card-icon">
                    📚
                </div>

                <div class="card-info">
                    <p>Total Books</p>
                    <h2><?php echo $books; ?></h2>
                    <span>Books in library</span>
                </div>

            </div>


            <!-- STUDENTS -->

            <div class="dashboard-card students-card">

                <div class="card-icon">
                    👨‍🎓
                </div>

                <div class="card-info">
                    <p>Total Students</p>
                    <h2><?php echo $students; ?></h2>
                    <span>Registered students</span>
                </div>

            </div>


            <!-- ISSUED -->

            <div class="dashboard-card issued-card">

                <div class="card-icon">
                    📖
                </div>

                <div class="card-info">
                    <p>Issued Books</p>
                    <h2><?php echo $issued; ?></h2>
                    <span>Currently issued</span>
                </div>

            </div>


            <!-- RETURNED -->

            <div class="dashboard-card returned-card">

                <div class="card-icon">
                    ↩️
                </div>

                <div class="card-info">
                    <p>Returned Books</p>
                    <h2><?php echo $returned; ?></h2>
                    <span>Successfully returned</span>
                </div>

            </div>

        </div>


        <!-- QUICK ACTIONS -->

        <div class="dashboard-section-title quick-title">
            <h2>Quick Actions</h2>
            <span>Manage Library</span>
        </div>


        <div class="quick-actions">


            <a href="add_book.php" class="quick-card">

                <div class="quick-icon">
                    ➕
                </div>

                <div>
                    <h3>Add New Book</h3>
                    <p>Add a new book to the library</p>
                </div>

                <strong>→</strong>

            </a>


            <a href="add_student.php" class="quick-card">

                <div class="quick-icon">
                    👨‍🎓
                </div>

                <div>
                    <h3>Add Student</h3>
                    <p>Register a new student</p>
                </div>

                <strong>→</strong>

            </a>


            <a href="issue_book.php" class="quick-card">

                <div class="quick-icon">
                    📖
                </div>

                <div>
                    <h3>Issue a Book</h3>
                    <p>Issue a book to a student</p>
                </div>

                <strong>→</strong>

            </a>


            <a href="view_books.php" class="quick-card">

                <div class="quick-icon">
                    🔎
                </div>

                <div>
                    <h3>Browse Books</h3>
                    <p>View the complete collection</p>
                </div>

                <strong>→</strong>

            </a>

        </div>

    </main>

</div>

</body>
</html>