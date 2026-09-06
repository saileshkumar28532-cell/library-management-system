<?php
include("db.php");

$query = "SELECT * FROM issue_book";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Issued Books</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="issued-page">

<div class="issued-container">

    <!-- Header -->
    <div class="issued-header">

        <div class="issued-icon">
            📚
        </div>

        <div>
            <h1>Issued Books</h1>
            <p>Track books currently issued to students</p>
        </div>

    </div>


    <!-- Section Heading -->
    <div class="issued-title">

        <h2>📖 Issue Records</h2>

        <span>
            <?php echo mysqli_num_rows($result); ?> Records
        </span>

    </div>


    <!-- Issued Books Table -->
    <div class="issued-table-wrapper">

        <table class="issued-table">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Student</th>
                    <th>Book</th>
                    <th>Issue Date</th>
                    <th>Due Date</th>
                    <th>Return Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>

            <?php

            $today = date("Y-m-d");

            if(mysqli_num_rows($result) > 0)
            {

                while($row = mysqli_fetch_assoc($result))
                {

                    $is_overdue =
                        ($row['status'] == "Issued" &&
                         $row['due_date'] < $today);

                    $return_date =
                        ($row['return_date'] &&
                         $row['return_date'] != '0000-00-00')
                        ? $row['return_date']
                        : 'N/A';

            ?>

                <tr class="<?php echo $is_overdue ? 'overdue-row' : ''; ?>">

                    <!-- ID -->
                    <td>
                        <span class="issue-id">
                            <?php echo htmlspecialchars($row['id']); ?>
                        </span>
                    </td>


                    <!-- Student -->
                    <td>

                        <div class="issued-student">

                            <div class="issued-avatar">
                                👤
                            </div>

                            <strong>
                                <?php echo htmlspecialchars($row['student_name']); ?>
                            </strong>

                        </div>

                    </td>


                    <!-- Book -->
                    <td>

                        <div class="issued-book">

                            <div class="issued-book-icon">
                                📕
                            </div>

                            <strong>
                                <?php echo htmlspecialchars($row['book_name']); ?>
                            </strong>

                        </div>

                    </td>


                    <!-- Issue Date -->
                    <td>
                        <span class="date-text">
                            📅 <?php echo htmlspecialchars($row['issue_date']); ?>
                        </span>
                    </td>


                    <!-- Due Date -->
                    <td>

                        <?php if($is_overdue) { ?>

                            <span class="overdue-date">
                                ⚠️ <?php echo htmlspecialchars($row['due_date']); ?>
                            </span>

                        <?php } else { ?>

                            <span class="due-date">
                                📅 <?php echo htmlspecialchars($row['due_date']); ?>
                            </span>

                        <?php } ?>

                    </td>


                    <!-- Return Date -->
                    <td>

                        <?php if($return_date == 'N/A') { ?>

                            <span class="not-returned">
                                — Not Returned
                            </span>

                        <?php } else { ?>

                            <span class="returned-date">
                                ✓ <?php echo htmlspecialchars($return_date); ?>
                            </span>

                        <?php } ?>

                    </td>


                    <!-- Status -->
                    <td>

                        <?php if($row['status'] == "Issued") { ?>

                            <?php if($is_overdue) { ?>

                                <span class="status-overdue">
                                    ● Overdue
                                </span>

                            <?php } else { ?>

                                <span class="status-issued">
                                    ● Issued
                                </span>

                            <?php } ?>

                        <?php } else { ?>

                            <span class="status-returned">
                                ● Returned
                            </span>

                        <?php } ?>

                    </td>


                    <!-- Action -->
                    <td>

                        <?php if($row['status'] == "Issued") { ?>

                            <a
                                class="return-btn"
                                href="return_book.php?id=<?php echo $row['id']; ?>"
                            >
                                🔄 Return
                            </a>

                        <?php } else { ?>

                            <span class="done-btn">
                                ✓ Done
                            </span>

                        <?php } ?>

                    </td>

                </tr>

            <?php

                }

            }
            else
            {

            ?>

                <tr>

                    <td colspan="8">

                        <div class="no-issued">

                            <div>📚</div>

                            <h3>No Issued Books</h3>

                            <p>
                                There are currently no book issue records.
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