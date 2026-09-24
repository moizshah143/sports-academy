
<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit;
}

require_once "../includes/db.php";

$students = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT COUNT(*) AS total FROM students")
)['total'];

$coaches = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT COUNT(*) AS total FROM coaches")
)['total'];

$programs = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT COUNT(*) AS total FROM programs")
)['total'];

$contacts = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT COUNT(*) AS total FROM contacts")
)['total'];
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Dashboard - Elite Sports Academy</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
          rel="stylesheet">

</head>

<body class="bg-light">

<!-- Navbar -->
<nav class="navbar navbar-dark bg-dark sticky-top">

    <div class="container">

        <a class="navbar-brand fw-bold" href="dashboard.php">
            <i class="bi bi-trophy-fill text-warning me-1"></i>
            Elite Sports Admin
        </a>

        <div class="d-flex align-items-center">

            <span class="text-white me-3 d-none d-md-inline">
                <i class="bi bi-person-circle text-warning"></i>
                <?php echo htmlspecialchars($_SESSION['admin_username']); ?>
            </span>

            <a href="logout.php"
               class="btn btn-warning btn-sm fw-bold">

                <i class="bi bi-box-arrow-right"></i>
                Logout

            </a>

        </div>

    </div>

</nav>


<!-- Dashboard -->
<section class="py-5">

    <div class="container">

        <!-- Welcome -->
        <div class="mb-5">

            <span class="badge bg-dark mb-2">
                ADMIN PANEL
            </span>

            <h1 class="fw-bold">
                Welcome, Admin 👋
            </h1>

            <p class="text-muted mb-0">
                Manage your Elite Sports Academy website from one place.
            </p>

        </div>


        <!-- Statistics -->
        <div class="row g-4">

            <!-- Students -->
            <div class="col-6 col-lg-3">

                <div class="card border-0 shadow-sm h-100 p-4 text-center">

                    <i class="bi bi-people-fill text-warning display-5"></i>

                    <h2 class="fw-bold mt-3 mb-1">
                        <?php echo $students; ?>
                    </h2>

                    <p class="text-muted mb-0">
                        Total Students
                    </p>

                </div>

            </div>


            <!-- Coaches -->
            <div class="col-6 col-lg-3">

                <div class="card border-0 shadow-sm h-100 p-4 text-center">

                    <i class="bi bi-person-workspace text-warning display-5"></i>

                    <h2 class="fw-bold mt-3 mb-1">
                        <?php echo $coaches; ?>
                    </h2>

                    <p class="text-muted mb-0">
                        Total Coaches
                    </p>

                </div>

            </div>


            <!-- Programs -->
            <div class="col-6 col-lg-3">

                <div class="card border-0 shadow-sm h-100 p-4 text-center">

                    <i class="bi bi-calendar-check-fill text-warning display-5"></i>

                    <h2 class="fw-bold mt-3 mb-1">
                        <?php echo $programs; ?>
                    </h2>

                    <p class="text-muted mb-0">
                        Total Programs
                    </p>

                </div>

            </div>


            <!-- Messages -->
            <div class="col-6 col-lg-3">

                <div class="card border-0 shadow-sm h-100 p-4 text-center">

                    <i class="bi bi-envelope-fill text-warning display-5"></i>

                    <h2 class="fw-bold mt-3 mb-1">
                        <?php echo $contacts; ?>
                    </h2>

                    <p class="text-muted mb-0">
                        Messages
                    </p>

                </div>

            </div>

        </div>


        <!-- Management -->
        <div class="mt-5">

            <h3 class="fw-bold mb-4">
                Management
            </h3>

            <div class="row g-4">


                <!-- Students -->
                <div class="col-md-6">

                    <div class="card border-0 shadow-sm h-100 p-4">

                        <div class="d-flex align-items-center mb-3">

                            <div class="bg-warning rounded-circle p-3">
                                <i class="bi bi-people-fill fs-4"></i>
                            </div>

                            <h4 class="fw-bold mb-0 ms-3">
                                Student Management
                            </h4>

                        </div>

                        <p class="text-muted">
                            View, search, edit and delete registered students.
                        </p>

                        <a href="students.php"
                           class="btn btn-dark mt-auto">

                            <i class="bi bi-arrow-right-circle me-1"></i>
                            Manage Students

                        </a>

                    </div>

                </div>


                <!-- Coaches -->
                <div class="col-md-6">

                    <div class="card border-0 shadow-sm h-100 p-4">

                        <div class="d-flex align-items-center mb-3">

                            <div class="bg-warning rounded-circle p-3">
                                <i class="bi bi-person-workspace fs-4"></i>
                            </div>

                            <h4 class="fw-bold mb-0 ms-3">
                                Coach Management
                            </h4>

                        </div>

                        <p class="text-muted">
                            Add, edit and manage academy coaches.
                        </p>

                        <a href="coaches.php"
                           class="btn btn-dark mt-auto">

                            <i class="bi bi-arrow-right-circle me-1"></i>
                            Manage Coaches

                        </a>

                    </div>

                </div>


                <!-- Programs -->
                <div class="col-md-6">

                    <div class="card border-0 shadow-sm h-100 p-4">

                        <div class="d-flex align-items-center mb-3">

                            <div class="bg-warning rounded-circle p-3">
                                <i class="bi bi-calendar-check-fill fs-4"></i>
                            </div>

                            <h4 class="fw-bold mb-0 ms-3">
                                Program Management
                            </h4>

                        </div>

                        <p class="text-muted">
                            Add, edit, delete and manage training programs.
                        </p>

                        <a href="programs.php"
                           class="btn btn-dark mt-auto">

                            <i class="bi bi-arrow-right-circle me-1"></i>
                            Manage Programs

                        </a>

                    </div>

                </div>


                <!-- Messages -->
                <div class="col-md-6">

                    <div class="card border-0 shadow-sm h-100 p-4">

                        <div class="d-flex align-items-center mb-3">

                            <div class="bg-warning rounded-circle p-3">
                                <i class="bi bi-envelope-fill fs-4"></i>
                            </div>

                            <h4 class="fw-bold mb-0 ms-3">
                                Contact Messages
                            </h4>

                        </div>

                        <p class="text-muted">
                            View and delete messages submitted by visitors.
                        </p>

                        <a href="contacts.php"
                           class="btn btn-dark mt-auto">

                            <i class="bi bi-arrow-right-circle me-1"></i>
                            View Messages

                        </a>

                    </div>

                </div>

            </div>

        </div>


        <!-- Bottom CTA -->
        <div class="card bg-dark text-white border-0 shadow-sm mt-5">

            <div class="card-body p-4 text-center">

                <i class="bi bi-speedometer2 text-warning fs-1"></i>

                <h4 class="fw-bold mt-2">
                    Academy Management System
                </h4>

                <p class="text-secondary mb-0">
                    Manage students, coaches, programs and contact messages easily.
                </p>

            </div>

        </div>

    </div>

</section>


<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
