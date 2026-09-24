<?php
require_once "includes/db.php";

$sports_result = mysqli_query($conn, "SELECT * FROM sports ORDER BY id DESC");
$programs_result = mysqli_query($conn, "SELECT * FROM programs ORDER BY id DESC LIMIT 4");
$coaches_result = mysqli_query($conn, "SELECT * FROM coaches ORDER BY id DESC LIMIT 4");
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Elite Sports Academy</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
          rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>


<!-- ================= NAVBAR ================= -->

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
                    <a class="nav-link active" href="index.php">
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
                    <a class="nav-link" href="programs.php">
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



<!-- ================= HERO ================= -->

<section class="hero-section">

    <div class="container">

        <div class="row align-items-center min-vh-75">


            <div class="col-lg-7">

                <span class="badge bg-warning text-dark mb-3 px-3 py-2">

                    <i class="bi bi-trophy-fill"></i>

                    Train • Compete • Win

                </span>


                <h1 class="display-3 fw-bold text-white">

                    Train Hard.

                    <span class="text-warning">
                        Play Strong.
                    </span>

                    Win Big.

                </h1>


                <p class="lead text-light mt-3">

                    Welcome to Elite Sports Academy, where passion meets
                    performance. Develop your skills, build confidence and
                    become the best version of yourself through professional
                    training and dedicated coaching.

                </p>


                <div class="mt-4">

                    <a href="register.php"
                       class="btn btn-warning btn-lg fw-bold me-2">

                        <i class="bi bi-person-plus-fill"></i>

                        Join Academy

                    </a>


                    <a href="#sports"
                       class="btn btn-outline-light btn-lg">

                        <i class="bi bi-trophy"></i>

                        Explore Sports

                    </a>

                </div>

            </div>


            <div class="col-lg-5 text-center mt-5 mt-lg-0">

                <div class="hero-icon">

                    <i class="bi bi-trophy-fill"></i>

                </div>


                <h3 class="text-white fw-bold mt-3">

                    Your Journey Starts Here

                </h3>

            </div>

        </div>

    </div>

</section>



<!-- ================= SPORTS ================= -->

<section id="sports" class="py-5 bg-light">

    <div class="container">


        <div class="text-center mb-5">

            <span class="text-warning fw-bold">
                OUR SPORTS
            </span>

            <h2 class="fw-bold mt-2">
                Choose Your Game
            </h2>

            <p class="text-muted">

                Explore our sports and develop your skills with
                professional training.

            </p>

        </div>


        <div class="row g-4">


            <?php while ($sport = mysqli_fetch_assoc($sports_result)) { ?>

                <div class="col-md-6 col-lg-3">

                    <div class="sport-card text-center p-4 h-100">


                        <i class="bi bi-trophy-fill sport-icon"></i>


                        <h4 class="fw-bold mt-3">

                            <?php echo htmlspecialchars($sport['name']); ?>

                        </h4>


                        <p class="text-muted">

                            <?php echo htmlspecialchars($sport['description']); ?>

                        </p>


                        <a href="sports.php"
                           class="btn btn-dark">

                            Learn More

                        </a>

                    </div>

                </div>

            <?php } ?>


        </div>

    </div>

</section>



<!-- ================= PROGRAMS ================= -->

<section class="py-5">

    <div class="container">


        <div class="text-center mb-5">

            <span class="text-warning fw-bold">
                TRAINING PROGRAMS
            </span>

            <h2 class="fw-bold mt-2">
                Choose Your Program
            </h2>

            <p class="text-muted">

                Training programs designed for different skill levels.

            </p>

        </div>


        <div class="row g-4">


            <?php while ($program = mysqli_fetch_assoc($programs_result)) { ?>

                <div class="col-md-6 col-lg-3">

                    <div class="card border-0 shadow-sm h-100 text-center p-4">


                        <i class="bi bi-calendar-check-fill text-warning display-5"></i>


                        <h4 class="fw-bold mt-3">

                            <?php echo htmlspecialchars($program['name']); ?>

                        </h4>


                        <p class="text-muted mb-2">

                            <i class="bi bi-clock"></i>

                            <?php echo htmlspecialchars($program['duration']); ?>

                        </p>


                        <span class="badge bg-dark mb-3">

                            <?php echo htmlspecialchars($program['level']); ?>

                        </span>


                        <h5 class="fw-bold">

                            Rs. <?php echo number_format($program['fee'], 2); ?>

                        </h5>


                        <a href="register.php"
                           class="btn btn-warning fw-bold mt-2">

                            Join Program

                        </a>

                    </div>

                </div>

            <?php } ?>


        </div>


        <div class="text-center mt-4">

            <a href="programs.php"
               class="btn btn-dark">

                View All Programs

            </a>

        </div>

    </div>

</section>



<!-- ================= COACHES ================= -->

<section class="py-5 bg-light">

    <div class="container">


        <div class="text-center mb-5">

            <span class="text-warning fw-bold">
                OUR COACHES
            </span>

            <h2 class="fw-bold mt-2">
                Learn From Experts
            </h2>

            <p class="text-muted">

                Experienced coaches helping athletes improve
                their performance.

            </p>

        </div>


        <div class="row g-4">


            <?php while ($coach = mysqli_fetch_assoc($coaches_result)) { ?>

                <div class="col-md-6 col-lg-3">

                    <div class="card border-0 shadow-sm h-100 text-center p-4">


                        <i class="bi bi-person-workspace text-warning display-4"></i>


                        <h4 class="fw-bold mt-3">

                            <?php echo htmlspecialchars($coach['name']); ?>

                        </h4>


                        <p class="mb-1">

                            <strong>Sport:</strong>

                            <?php echo htmlspecialchars($coach['sport']); ?>

                        </p>


                        <p class="text-muted">

                            <strong>Experience:</strong>

                            <?php echo htmlspecialchars($coach['experience']); ?>

                        </p>

                    </div>

                </div>

            <?php } ?>


        </div>


        <div class="text-center mt-4">

            <a href="coaches.php"
               class="btn btn-dark">

                View All Coaches

            </a>

        </div>

    </div>

</section>



<!-- ================= WHY CHOOSE US ================= -->

<section class="py-5 bg-dark text-white">

    <div class="container">


        <div class="text-center mb-5">

            <span class="text-warning fw-bold">
                WHY US
            </span>

            <h2 class="fw-bold mt-2">
                More Than Just Sports
            </h2>

            <p class="text-secondary">

                We focus on skills, discipline, confidence and
                continuous improvement.

            </p>

        </div>


        <div class="row g-4">


            <div class="col-md-4">

                <div class="feature-box text-center p-4">

                    <i class="bi bi-person-check-fill"></i>

                    <h4 class="mt-3">
                        Expert Coaches
                    </h4>

                    <p class="text-secondary">

                        Learn from experienced coaches who help you
                        improve your skills and performance.

                    </p>

                </div>

            </div>


            <div class="col-md-4">

                <div class="feature-box text-center p-4">

                    <i class="bi bi-lightning-charge-fill"></i>

                    <h4 class="mt-3">
                        Professional Training
                    </h4>

                    <p class="text-secondary">

                        Follow structured training programs designed
                        for different skill levels.

                    </p>

                </div>

            </div>


            <div class="col-md-4">

                <div class="feature-box text-center p-4">

                    <i class="bi bi-award-fill"></i>

                    <h4 class="mt-3">
                        Build Champions
                    </h4>

                    <p class="text-secondary">

                        Develop discipline, confidence and a strong
                        mindset through sports.

                    </p>

                </div>

            </div>


        </div>

    </div>

</section>



<!-- ================= CALL TO ACTION ================= -->

<section class="py-5">

    <div class="container">

        <div class="bg-dark text-white rounded-4 p-5 text-center">


            <i class="bi bi-trophy-fill text-warning display-4"></i>


            <h2 class="fw-bold mt-3">

                Ready to Start Your Journey?

            </h2>


            <p class="text-secondary">

                Join Elite Sports Academy and start developing
                your skills today.

            </p>


            <a href="register.php"
               class="btn btn-warning btn-lg fw-bold">

                <i class="bi bi-person-plus-fill"></i>

                Register Now

            </a>

        </div>

    </div>

</section>



<!-- ================= FOOTER ================= -->

<footer class="bg-black text-white py-4">

    <div class="container text-center">


        <h5 class="fw-bold">

            <i class="bi bi-trophy-fill text-warning"></i>

            Elite Sports Academy

        </h5>


        <p class="text-secondary mb-1">

            Train • Compete • Win

        </p>


        <div class="mb-2">

            <a href="index.php"
               class="text-secondary text-decoration-none me-3">
                Home
            </a>

            <a href="about.php"
               class="text-secondary text-decoration-none me-3">
                About
            </a>

            <a href="sports.php"
               class="text-secondary text-decoration-none me-3">
                Sports
            </a>

            <a href="programs.php"
               class="text-secondary text-decoration-none me-3">
                Programs
            </a>

            <a href="coaches.php"
               class="text-secondary text-decoration-none me-3">
                Coaches
            </a>

            <a href="contact.php"
               class="text-secondary text-decoration-none">
                Contact
            </a>

        </div>


        <small class="text-secondary">

            © 2026 Elite Sports Academy. All Rights Reserved.

        </small>

    </div>

</footer>



<!-- Bootstrap JS -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script src="assets/js/script.js"></script>

</body>

</html>