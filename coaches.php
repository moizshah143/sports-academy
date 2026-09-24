
<?php
require_once "includes/db.php";

$query = "SELECT * FROM coaches ORDER BY id DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Coaches - Elite Sports Academy</title>

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
                    <a class="nav-link" href="programs.php">
                        Programs
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" href="coaches.php">
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

        <i class="bi bi-person-workspace text-warning display-4"></i>

        <h1 class="display-5 fw-bold mt-3">
            Our Coaches
        </h1>

        <p class="lead text-secondary mb-0">
            Learn from experienced and dedicated sports coaches.
        </p>

    </div>

</section>


<!-- Coaches Section -->

<section class="py-5 bg-light">

    <div class="container">

        <div class="text-center mb-5">

            <span class="text-warning fw-bold">
                MEET OUR TEAM
            </span>

            <h2 class="fw-bold mt-2">
                Experienced Coaches
            </h2>

            <p class="text-muted">
                Get professional guidance and improve your sporting skills.
            </p>

        </div>


        <div class="row g-4">

            <?php if (mysqli_num_rows($result) > 0): ?>

                <?php while ($coach = mysqli_fetch_assoc($result)): ?>

                    <div class="col-sm-6 col-lg-3">

                        <div class="card border-0 shadow-sm h-100 text-center p-4">

                            <div class="mb-3">

                                <i class="bi bi-person-circle text-warning display-1"></i>

                            </div>


                            <h4 class="fw-bold">

                                <?php echo htmlspecialchars($coach['name']); ?>

                            </h4>


                            <div class="mb-2">

                                <span class="badge bg-dark">

                                    <i class="bi bi-trophy-fill"></i>

                                    <?php echo htmlspecialchars($coach['sport']); ?>

                                </span>

                            </div>


                            <p class="text-muted mb-4">

                                <i class="bi bi-clock-fill text-warning"></i>

                                <strong>Experience:</strong>

                                <?php echo htmlspecialchars($coach['experience']); ?>

                            </p>


                            <a href="register.php"
                               class="btn btn-dark mt-auto fw-bold">

                                <i class="bi bi-person-plus-fill"></i>

                                Train With Us

                            </a>

                        </div>

                    </div>

                <?php endwhile; ?>

            <?php else: ?>

                <div class="col-12">

                    <div class="alert alert-warning text-center">

                        <i class="bi bi-exclamation-circle"></i>

                        No coaches available right now.

                    </div>

                </div>

            <?php endif; ?>

        </div>

    </div>

</section>


<!-- Coach Benefits -->

<section class="py-5">

    <div class="container">

        <div class="text-center mb-5">

            <span class="text-warning fw-bold">
                COACHING BENEFITS
            </span>

            <h2 class="fw-bold mt-2">
                Why Train With Our Coaches?
            </h2>

        </div>


        <div class="row g-4">

            <div class="col-md-4">

                <div class="feature-box text-center p-4">

                    <i class="bi bi-person-check-fill"></i>

                    <h4 class="fw-bold mt-3">
                        Personal Guidance
                    </h4>

                    <p class="text-muted mb-0">
                        Get guidance based on your skills,
                        goals and training level.
                    </p>

                </div>

            </div>


            <div class="col-md-4">

                <div class="feature-box text-center p-4">

                    <i class="bi bi-graph-up-arrow"></i>

                    <h4 class="fw-bold mt-3">
                        Improve Performance
                    </h4>

                    <p class="text-muted mb-0">
                        Learn proper techniques and improve
                        your overall sporting performance.
                    </p>

                </div>

            </div>


            <div class="col-md-4">

                <div class="feature-box text-center p-4">

                    <i class="bi bi-award-fill"></i>

                    <h4 class="fw-bold mt-3">
                        Build Discipline
                    </h4>

                    <p class="text-muted mb-0">
                        Develop consistency, teamwork and
                        discipline through regular training.
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
            Join Elite Sports Academy and train with our coaches.
        </p>

        <a href="register.php"
           class="btn btn-warning btn-lg fw-bold">

            <i class="bi bi-person-plus-fill"></i>

            Join Academy

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

