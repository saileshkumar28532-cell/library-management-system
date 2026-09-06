<?php
include("db.php");

if(isset($_GET['search']) && $_GET['search'] != "")
{
    $search = $_GET['search'];

    $query = "SELECT * FROM books
              WHERE book_name LIKE '%$search%'
              OR author LIKE '%$search%'
              OR category LIKE '%$search%'";
}
else
{
    $query = "SELECT * FROM books";
}

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Library Books</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="books-page">

<div class="books-container">

    <!-- Header -->
    <div class="books-header">
        <div class="library-icon">📚</div>

        <div>
            <h1>Library Books</h1>
            <p>Explore our collection of books</p>
        </div>
    </div>


    <!-- Search Section -->
    <div class="book-search">

        <form method="GET">

            <div class="search-box">

                <span>🔎</span>

                <input
                    type="text"
                    name="search"
                    value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>"
                    placeholder="Search by book name, author or category"
                >

                <button type="submit">
                    Search
                </button>

            </div>

        </form>

    </div>


    <!-- Books Section -->
    <div class="collection-title">

        <h2>📖 Book Collection</h2>

        <span>
            <?php echo mysqli_num_rows($result); ?> Books Found
        </span>

    </div>


    <div class="books-table-wrapper">

        <table class="books-table">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Book</th>
                    <th>Author</th>
                    <th>Category</th>
                    <th>Total</th>
                    <th>Available</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>

            <?php

            if(mysqli_num_rows($result) > 0)
            {

                while($row = mysqli_fetch_assoc($result))
                {

            ?>

                <tr>

                    <td>
                        <span class="book-id">
                            <?php echo $row['id']; ?>
                        </span>
                    </td>


                    <td>

                        <div class="book-name">

                            <div class="book-cover">
                                📕
                            </div>

                            <strong>
                                <?php echo htmlspecialchars($row['book_name']); ?>
                            </strong>

                        </div>

                    </td>


                    <td>
                        <?php echo htmlspecialchars($row['author']); ?>
                    </td>


                    <td>

                        <span class="category-badge">
                            <?php echo htmlspecialchars($row['category']); ?>
                        </span>

                    </td>


                    <td>
                        <strong>
                            <?php echo $row['quantity']; ?>
                        </strong>
                    </td>


                    <td>

                        <?php if($row['available'] > 0) { ?>

                            <span class="available">
                                ● <?php echo $row['available']; ?> Available
                            </span>

                        <?php } else { ?>

                            <span class="not-available">
                                ● Not Available
                            </span>

                        <?php } ?>

                    </td>


                    <td>

                        <div class="book-actions">

                            <a
                                class="edit-btn"
                                href="edit_book.php?id=<?php echo $row['id']; ?>"
                            >
                                ✏️ Edit
                            </a>


                            <a
                                class="delete-btn"
                                href="delete_book.php?id=<?php echo $row['id']; ?>"
                                onclick="return confirm('Are you sure you want to delete this book?')"
                            >
                                🗑️ Delete
                            </a>

                        </div>

                    </td>

                </tr>

            <?php

                }

            }
            else
            {

            ?>

                <tr>

                    <td colspan="7">

                        <div class="no-books">

                            <div>📚</div>

                            <h3>No Books Found</h3>

                            <p>
                                Try searching with a different book name,
                                author or category.
                            </p>

                        </div>

                    </td>

                </tr>

            <?php

            }

            ?>

            </tbody>

        </table>

    </div>

</div>

</body>
</html>