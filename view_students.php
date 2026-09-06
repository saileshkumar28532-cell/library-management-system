<?php
include("db.php");

$query = "SELECT * FROM students";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Library Students</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="students-page">

<div class="students-container">

    <!-- Header -->
    <div class="students-header">

        <div class="student-icon">
            🎓
        </div>

        <div>
            <h1>Library Students</h1>
            <p>Manage registered students in the library</p>
        </div>

    </div>


    <!-- Collection Heading -->
    <div class="students-title">

        <h2>👨‍🎓 Student Records</h2>

        <span>
            <?php echo mysqli_num_rows($result); ?> Students
        </span>

    </div>


    <!-- Students Table -->
    <div class="students-table-wrapper">

        <table class="students-table">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Student</th>
                    <th>Roll No</th>
                    <th>Email</th>
                    <th>Phone</th>
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

                    <!-- ID -->
                    <td>
                        <span class="student-id">
                            <?php echo $row['id']; ?>
                        </span>
                    </td>


                    <!-- Student Name -->
                    <td>

                        <div class="student-name">

                            <div class="student-avatar">
                                👤
                            </div>

                            <strong>
                                <?php echo htmlspecialchars($row['name']); ?>
                            </strong>

                        </div>

                    </td>


                    <!-- Roll Number -->
                    <td>

                        <span class="roll-badge">
                            <?php echo htmlspecialchars($row['roll_no']); ?>
                        </span>

                    </td>


                    <!-- Email -->
                    <td>
                        <span class="student-email">
                            ✉️ <?php echo htmlspecialchars($row['email']); ?>
                        </span>
                    </td>


                    <!-- Phone -->
                    <td>
                        <span class="student-phone">
                            📞 <?php echo htmlspecialchars($row['phone']); ?>
                        </span>
                    </td>


                    <!-- Actions -->
                    <td>

                        <div class="student-actions">

                            <a
                                class="student-edit-btn"
                                href="edit_student.php?id=<?php echo $row['id']; ?>"
                            >
                                ✏️ Edit
                            </a>

                            <a
                                class="student-delete-btn"
                                href="delete_student.php?id=<?php echo $row['id']; ?>"
                                onclick="return confirm('Delete this student?')"
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

                    <td colspan="6">

                        <div class="no-students">

                            <div>👨‍🎓</div>

                            <h3>No Students Found</h3>

                            <p>
                                No students have been registered yet.
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