
<?php
require_once "includes/db.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>About Us - Elite Sports Academy</title>

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
                    <a class="nav-link" href="index.php">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" href="about.php">About</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="sports.php">Sports</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="programs.php">Programs</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="coaches.php">Coaches</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact</a>
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

        <i class="bi bi-trophy-fill text-warning display-4"></i>

        <h1 class="display-5 fw-bold mt-3">
            About Elite Sports Academy
        </h1>

        <p class="lead text-secondary mb-0">
            Building skills, confidence and champions.
        </p>

    </div>

</section>


<!-- About Section -->
<section class="py-5">

    <div class="container">

        <div class="row align-items-center g-5">

            <div class="col-lg-7">

                <span class="text-warning fw-bold">
                    WHO WE ARE
                </span>

                <h2 class="fw-bold mt-2">
                    Where Passion Meets Performance
                </h2>

                <p class="text-muted mt-3">
                    Elite Sports Academy is a modern sports training
                    academy focused on helping athletes improve their
                    skills, fitness, discipline and confidence.
                </p>

                <p class="text-muted">
                    Our academy provides a positive and professional
                    training environment where athletes can learn,
                    practice and develop their abilities. We believe
                    that consistent training, teamwork and dedication
                    are important parts of every athlete's journey.
                </p>

                <p class="text-muted">
                    From beginners who are starting their sporting
                    journey to experienced players who want to improve
                    their performance, our training programs are
                    designed to support different skill levels.
                </p>

                <a href="register.php" class="btn btn-dark mt-2 fw-bold">
                    <i class="bi bi-person-plus-fill"></i>
                    Join Our Academy
                </a>

            </div>


            <div class="col-lg-5">

                <div class="row g-3">

                    <div class="col-6">

                        <div class="p-4 bg-dark text-white rounded-4 text-center h-100">

                            <i class="bi bi-people-fill text-warning display-5"></i>

                            <h3 class="fw-bold mt-3">
                                500+
                            </h3>

                            <p class="mb-0 text-secondary">
                                Athletes
                            </p>

                        </div>

                    </div>


                    <div class="col-6">

                        <div class="p-4 bg-dark text-white rounded-4 text-center h-100">

                            <i class="bi bi-person-badge-fill text-warning display-5"></i>

                            <h3 class="fw-bold mt-3">
                                20+
                            </h3>

                            <p class="mb-0 text-secondary">
                                Coaches
                            </p>

                        </div>

                    </div>


                    <div class="col-6">

                        <div class="p-4 bg-dark text-white rounded-4 text-center h-100">

                            <i class="bi bi-trophy-fill text-warning display-5"></i>

                            <h3 class="fw-bold mt-3">
                                50+
                            </h3>

                            <p class="mb-0 text-secondary">
                                Achievements
                            </p>

                        </div>

                    </div>


                    <div class="col-6">

                        <div class="p-4 bg-dark text-white rounded-4 text-center h-100">

                            <i class="bi bi-calendar-check-fill text-warning display-5"></i>

                            <h3 class="fw-bold mt-3">
                                10+
                            </h3>

                            <p class="mb-0 text-secondary">
                                Years
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- Mission Section -->
<section class="py-5 bg-light">

    <div class="container">

        <div class="text-center mb-5">

            <span class="text-warning fw-bold">
                OUR MISSION
            </span>

            <h2 class="fw-bold mt-2">
                Helping Athletes Reach Their Potential
            </h2>

            <p class="text-muted">
                Our goal is to create a strong foundation for athletes
                through training, teamwork and continuous improvement.
            </p>

        </div>


        <div class="row g-4">

            <div class="col-md-4">

                <div class="card border-0 shadow-sm h-100 text-center p-4">

                    <i class="bi bi-lightning-charge-fill text-warning display-5"></i>

                    <h4 class="fw-bold mt-3">
                        Performance
                    </h4>

                    <p class="text-muted mb-0">
                        We focus on developing athletic skills,
                        fitness and overall performance through
                        structured training.
                    </p>

                </div>

            </div>


            <div class="col-md-4">

                <div class="card border-0 shadow-sm h-100 text-center p-4">

                    <i class="bi bi-people-fill text-warning display-5"></i>

                    <h4 class="fw-bold mt-3">
                        Teamwork
                    </h4>

                    <p class="text-muted mb-0">
                        Athletes learn communication, respect,
                        cooperation and the importance of working
                        together.
                    </p>

                </div>

            </div>


            <div class="col-md-4">

                <div class="card border-0 shadow-sm h-100 text-center p-4">

                    <i class="bi bi-award-fill text-warning display-5"></i>

                    <h4 class="fw-bold mt-3">
                        Excellence
                    </h4>

                    <p class="text-muted mb-0">
                        We encourage discipline, consistency and
                        dedication so athletes can continue improving.
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- CTA -->
<section class="py-5 bg-dark text-white">

    <div class="container text-center">

        <i class="bi bi-trophy-fill text-warning display-5"></i>

        <h2 class="fw-bold mt-3">
            Ready to Start Your Journey?
        </h2>

        <p class="text-secondary">
            Join Elite Sports Academy and take the next step
            toward improving your sporting skills.
        </p>

        <a href="register.php" class="btn btn-warning fw-bold">
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
