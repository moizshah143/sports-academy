
<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit;
}

require_once "../includes/db.php";

$result = mysqli_query($conn, "SELECT * FROM programs ORDER BY id DESC");

if (!$result) {
    die("Database Error: " . mysqli_error($conn));
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Manage Programs - Admin Panel</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
          rel="stylesheet">

</head>

<body class="bg-light">


<!-- Navbar -->
<nav class="navbar navbar-dark bg-dark">

    <div class="container">

        <a class="navbar-brand fw-bold" href="dashboard.php">

            <i class="bi bi-speedometer2 text-warning me-1"></i>
            Admin Panel

        </a>


        <div>

            <a href="dashboard.php"
               class="btn btn-outline-light btn-sm me-2">

                <i class="bi bi-house"></i>
                Dashboard

            </a>


            <a href="logout.php"
               class="btn btn-warning btn-sm fw-bold">

                <i class="bi bi-box-arrow-right"></i>
                Logout

            </a>

        </div>

    </div>

</nav>


<!-- Main Section -->
<section class="py-5">

    <div class="container">


        <!-- Heading -->
        <div class="d-flex flex-column flex-md-row
                    justify-content-between
                    align-items-md-center
                    gap-3 mb-4">

            <div>

                <h1 class="fw-bold mb-1">

                    <i class="bi bi-calendar-check-fill text-warning"></i>
                    Manage Programs

                </h1>

                <p class="text-muted mb-0">
                    Add, edit and manage academy training programs.
                </p>

            </div>


            <a href="add_program.php"
               class="btn btn-warning fw-bold">

                <i class="bi bi-plus-circle me-1"></i>
                Add Program

            </a>

        </div>


        <!-- Programs Table -->
        <div class="card border-0 shadow-sm">

            <div class="card-body p-0">

                <div class="table-responsive">

                    <table class="table table-hover align-middle mb-0">

                        <thead class="table-dark">

                            <tr>

                                <th class="px-3">ID</th>
                                <th>Program Name</th>
                                <th>Duration</th>
                                <th>Level</th>
                                <th>Fee</th>
                                <th class="text-center">Action</th>

                            </tr>

                        </thead>


                        <tbody>

                        <?php if (mysqli_num_rows($result) > 0): ?>

                            <?php while ($program = mysqli_fetch_assoc($result)): ?>

                                <tr>

                                    <td class="px-3">
                                        <?php echo $program['id']; ?>
                                    </td>


                                    <td class="fw-bold">
                                        <?php echo htmlspecialchars($program['name']); ?>
                                    </td>


                                    <td>

                                        <span class="badge bg-secondary">

                                            <i class="bi bi-clock me-1"></i>

                                            <?php echo htmlspecialchars($program['duration']); ?>

                                        </span>

                                    </td>


                                    <td>

                                        <span class="badge bg-primary">

                                            <?php echo htmlspecialchars($program['level']); ?>

                                        </span>

                                    </td>


                                    <td class="fw-bold">

                                        Rs.
                                        <?php echo number_format($program['fee'], 2); ?>

                                    </td>


                                    <td class="text-center">

                                        <!-- Edit -->
                                        <a href="edit_program.php?id=<?php echo $program['id']; ?>"
                                           class="btn btn-sm btn-primary me-1"
                                           title="Edit Program">

                                            <i class="bi bi-pencil-fill"></i>

                                        </a>


                                        <!-- Delete -->
                                        <a href="delete_program.php?id=<?php echo $program['id']; ?>"
                                           class="btn btn-sm btn-danger"
                                           title="Delete Program"
                                           onclick="return confirm('Are you sure you want to delete this program?');">

                                            <i class="bi bi-trash-fill"></i>

                                        </a>

                                    </td>

                                </tr>

                            <?php endwhile; ?>


                        <?php else: ?>

                            <tr>

                                <td colspan="6"
                                    class="text-center text-muted py-5">

                                    <i class="bi bi-calendar-x display-5 d-block mb-2"></i>

                                    No programs found.

                                </td>

                            </tr>

                        <?php endif; ?>

                        </tbody>

                    </table>

                </div>

            </div>

        </div>


        <!-- Back Button -->
        <div class="mt-4">

            <a href="dashboard.php"
               class="btn btn-dark">

                <i class="bi bi-arrow-left me-1"></i>
                Back to Dashboard

            </a>

        </div>

    </div>

</section>


<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
