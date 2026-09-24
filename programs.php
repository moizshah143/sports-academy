
<?php
require_once "includes/db.php";

$query = "SELECT * FROM programs ORDER BY id DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Programs - Elite Sports Academy</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>


<!-- Navbar -->

<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">

    <div class="container">

        <a class="navbar-brand fw-bold" href="index.php">

            <i class="bi bi-trophy-fill text-warning"></i>

            Elite Sports

        </a>


        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav">

            <span class="navbar-toggler-icon"></span>

        </button>


        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a class="nav-link" href="index.php">
                        Home
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="about.php">
                        About
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="sports.php">
                        Sports
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" href="programs.php">
                        Programs
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="coaches.php">
                        Coaches
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="contact.php">
                        Contact
                    </a>
                </li>

            </ul>


            <a href="register.php"
               class="btn btn-warning ms-lg-3 fw-bold">

                <i class="bi bi-person-plus-fill"></i>

                Join Now

            </a>

        </div>

    </div>

</nav>


<!-- Page Header -->

<section class="bg-dark text-white py-5">

    <div class="container text-center">

        <i class="bi bi-calendar-check-fill text-warning display-4"></i>

        <h1 class="display-5 fw-bold mt-3">
            Training Programs
        </h1>

        <p class="lead text-secondary mb-0">
            Choose a training program that matches your goals.
        </p>

    </div>

</section>


<!-- Programs Section -->

<section class="py-5 bg-light">

    <div class="container">

        <div class="text-center mb-5">

            <span class="text-warning fw-bold">
                OUR PROGRAMS
            </span>

            <h2 class="fw-bold mt-2">
                Find Your Training Plan
            </h2>

            <p class="text-muted">
                Select a program based on your experience and training goals.
            </p>

        </div>


        <div class="row g-4">

            <?php if (mysqli_num_rows($result) > 0): ?>

                <?php while ($program = mysqli_fetch_assoc($result)): ?>

                    <div class="col-sm-6 col-lg-3">

                        <div class="card border-0 shadow-sm h-100 text-center p-4">

                            <i class="bi bi-trophy-fill text-warning display-5"></i>


                            <h4 class="fw-bold mt-3">

                                <?php echo htmlspecialchars($program['name']); ?>

                            </h4>


                            <div class="mt-3">

                                <p class="mb-2">

                                    <i class="bi bi-calendar3 text-warning"></i>

                                    <strong>Duration:</strong>

                                    <?php echo htmlspecialchars($program['duration']); ?>

                                </p>


                                <p class="mb-2">

                                    <i class="bi bi-bar-chart-fill text-warning"></i>

                                    <strong>Level:</strong>

                                    <?php echo htmlspecialchars($program['level']); ?>

                                </p>

                            </div>


                            <div class="my-3">

                                <h3 class="text-warning fw-bold">

                                    Rs. <?php echo number_format($program['fee']); ?>

                                </h3>

                            </div>


                            <a href="register.php"
                               class="btn btn-dark mt-auto fw-bold">

                                <i class="bi bi-person-plus-fill"></i>

                                Join Program

                            </a>

                        </div>

                    </div>

                <?php endwhile; ?>

            <?php else: ?>

                <div class="col-12">

                    <div class="alert alert-warning text-center">

                        <i class="bi bi-exclamation-circle"></i>

                        No programs available right now.

                    </div>

                </div>

            <?php endif; ?>

        </div>

    </div>

</section>


<!-- Program Benefits -->

<section class="py-5">

    <div class="container">

        <div class="text-center mb-5">

            <span class="text-warning fw-bold">
                TRAINING BENEFITS
            </span>

            <h2 class="fw-bold mt-2">
                What You Get
            </h2>

        </div>


        <div class="row g-4">

            <div class="col-md-4">

                <div class="feature-box text-center p-4">

                    <i class="bi bi-calendar-check-fill"></i>

                    <h4 class="fw-bold mt-3">
                        Structured Training
                    </h4>

                    <p class="text-muted mb-0">
                        Follow an organized training plan designed
                        for your selected level.
                    </p>

                </div>

            </div>


            <div class="col-md-4">

                <div class="feature-box text-center p-4">

                    <i class="bi bi-person-workspace"></i>

                    <h4 class="fw-bold mt-3">
                        Expert Coaching
                    </h4>

                    <p class="text-muted mb-0">
                        Learn techniques and improve your skills
                        with experienced coaches.
                    </p>

                </div>

            </div>


            <div class="col-md-4">

                <div class="feature-box text-center p-4">

                    <i class="bi bi-graph-up-arrow"></i>

                    <h4 class="fw-bold mt-3">
                        Continuous Progress
                    </h4>

                    <p class="text-muted mb-0">
                        Build your skills step by step through
                        regular practice and dedication.
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- CTA -->

<section class="py-5 bg-dark text-white">

    <div class="container text-center">

        <i class="bi bi-person-plus-fill text-warning display-4"></i>

        <h2 class="fw-bold mt-3">
            Ready to Start Training?
        </h2>

        <p class="text-secondary">
            Select your program and begin your sports journey today.
        </p>

        <a href="register.php"
           class="btn btn-warning btn-lg fw-bold">

            <i class="bi bi-person-plus-fill"></i>

            Register Now

        </a>

    </div>

</section>


<!-- Footer -->

<footer class="bg-black text-white py-4">

    <div class="container text-center">

        <h5 class="fw-bold">

            <i class="bi bi-trophy-fill text-warning"></i>

            Elite Sports Academy

        </h5>

        <p class="text-secondary mb-1">
            Train • Compete • Win
        </p>

        <small class="text-secondary">
            © 2026 Elite Sports Academy. All Rights Reserved.
        </small>

    </div>

</footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script src="assets/js/script.js"></script>

</body>

</html>

