
<?php
require_once "includes/db.php";

$message = "";
$message_type = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $age = (int) $_POST['age'];
    $sport = mysqli_real_escape_string($conn, $_POST['sport']);

    $query = "INSERT INTO students (name, email, phone, age, sport)
              VALUES ('$name', '$email', '$phone', '$age', '$sport')";

    if (mysqli_query($conn, $query)) {

        $message = "Registration successful! Welcome to Elite Sports Academy.";
        $message_type = "success";

    } else {

        $message = "Registration failed. Please try again.";
        $message_type = "danger";

    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Register - Elite Sports Academy</title>

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


<!-- Registration Header -->

<section class="bg-dark text-white py-5">

    <div class="container text-center">

        <i class="bi bi-person-plus-fill text-warning display-4"></i>

        <h1 class="display-5 fw-bold mt-3">
            Join Elite Sports Academy
        </h1>

        <p class="lead text-secondary mb-0">
            Register today and start your sports training journey.
        </p>

    </div>

</section>


<!-- Registration Form -->

<section class="py-5 bg-light">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-lg-7">

                <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5">


                    <div class="text-center mb-4">

                        <span class="text-warning fw-bold">
                            STUDENT REGISTRATION
                        </span>

                        <h2 class="fw-bold mt-2">
                            Create Your Registration
                        </h2>

                        <p class="text-muted mb-0">
                            Fill in your details below to join our academy.
                        </p>

                    </div>


                    <?php if ($message != ""): ?>

                        <div class="alert alert-<?php echo $message_type; ?> text-center">

                            <i class="bi bi-check-circle-fill"></i>

                            <?php echo $message; ?>

                        </div>

                    <?php endif; ?>


                    <form method="POST">


                        <!-- Name -->

                        <div class="mb-3">

                            <label class="form-label fw-bold">

                                <i class="bi bi-person-fill text-warning"></i>

                                Full Name

                            </label>

                            <input type="text"
                                   name="name"
                                   class="form-control"
                                   placeholder="Enter your full name"
                                   required>

                        </div>


                        <!-- Email -->

                        <div class="mb-3">

                            <label class="form-label fw-bold">

                                <i class="bi bi-envelope-fill text-warning"></i>

                                Email

                            </label>

                            <input type="email"
                                   name="email"
                                   class="form-control"
                                   placeholder="Enter your email"
                                   required>

                        </div>


                        <!-- Phone -->

                        <div class="mb-3">

                            <label class="form-label fw-bold">

                                <i class="bi bi-telephone-fill text-warning"></i>

                                Phone

                            </label>

                            <input type="text"
                                   name="phone"
                                   class="form-control"
                                   placeholder="Enter your phone number"
                                   required>

                        </div>


                        <!-- Age -->

                        <div class="mb-3">

                            <label class="form-label fw-bold">

                                <i class="bi bi-calendar-fill text-warning"></i>

                                Age

                            </label>

                            <input type="number"
                                   name="age"
                                   class="form-control"
                                   min="5"
                                   max="60"
                                   placeholder="Enter your age"
                                   required>

                        </div>


                        <!-- Sport -->

                        <div class="mb-4">

                            <label class="form-label fw-bold">

                                <i class="bi bi-trophy-fill text-warning"></i>

                                Select Sport

                            </label>

                            <select name="sport"
                                    class="form-select"
                                    required>

                                <option value="">
                                    Choose Sport
                                </option>

                                <option value="Football">
                                    Football
                                </option>

                                <option value="Cricket">
                                    Cricket
                                </option>

                                <option value="Basketball">
                                    Basketball
                                </option>

                                <option value="Tennis">
                                    Tennis
                                </option>

                            </select>

                        </div>


                        <!-- Submit -->

                        <button type="submit"
                                class="btn btn-warning w-100 fw-bold py-2">

                            <i class="bi bi-person-plus-fill"></i>

                            Register Now

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- Benefits -->

<section class="py-5">

    <div class="container">

        <div class="text-center mb-5">

            <span class="text-warning fw-bold">
                WHY JOIN US
            </span>

            <h2 class="fw-bold mt-2">
                Start Your Sports Journey
            </h2>

        </div>


        <div class="row g-4">

            <div class="col-md-4">

                <div class="feature-box text-center p-4">

                    <i class="bi bi-person-workspace"></i>

                    <h4 class="fw-bold mt-3">
                        Expert Coaching
                    </h4>

                    <p class="text-muted mb-0">
                        Learn and improve with experienced coaches
                        and structured training.
                    </p>

                </div>

            </div>


            <div class="col-md-4">

                <div class="feature-box text-center p-4">

                    <i class="bi bi-people-fill"></i>

                    <h4 class="fw-bold mt-3">
                        Team Environment
                    </h4>

                    <p class="text-muted mb-0">
                        Train with other athletes and develop
                        teamwork and discipline.
                    </p>

                </div>

            </div>


            <div class="col-md-4">

                <div class="feature-box text-center p-4">

                    <i class="bi bi-trophy-fill"></i>

                    <h4 class="fw-bold mt-3">
                        Improve Your Skills
                    </h4>

                    <p class="text-muted mb-0">
                        Practice regularly and continue improving
                        your sporting abilities.
                    </p>

                </div>

            </div>

        </div>

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
