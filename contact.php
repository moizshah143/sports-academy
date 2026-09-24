```php
<?php
require_once "includes/db.php";

$message = "";
$message_type = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $subject = mysqli_real_escape_string($conn, $_POST['subject']);
    $user_message = mysqli_real_escape_string($conn, $_POST['message']);

    $query = "INSERT INTO contacts (name, email, subject, message)
              VALUES ('$name', '$email', '$subject', '$user_message')";

    if (mysqli_query($conn, $query)) {
        $message = "Your message has been sent successfully!";
        $message_type = "success";
    } else {
        $message = "Message could not be sent. Please try again.";
        $message_type = "danger";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Contact - Elite Sports Academy</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Custom CSS -->
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
                    <a class="nav-link" href="about.php">About</a>
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
                    <a class="nav-link active" href="contact.php">
                        Contact
                    </a>
                </li>

            </ul>

            <a href="register.php"
               class="btn btn-warning ms-lg-3 fw-bold">
                Join Now
            </a>

        </div>

    </div>

</nav>


<!-- Page Header -->
<section class="bg-dark text-white py-5">

    <div class="container text-center">

        <i class="bi bi-envelope-fill text-warning display-4"></i>

        <h1 class="display-5 fw-bold mt-3">
            Contact Us
        </h1>

        <p class="lead text-secondary">
            Have a question? We would love to hear from you.
        </p>

    </div>

</section>


<!-- Contact Section -->
<section class="py-5 bg-light">

    <div class="container">

        <div class="row g-4 justify-content-center">

            <!-- Contact Information -->
            <div class="col-lg-4">

                <div class="card border-0 shadow-sm h-100 p-4">

                    <h3 class="fw-bold mb-4">
                        Get In Touch
                    </h3>

                    <p class="text-muted mb-4">
                        Contact Elite Sports Academy for information
                        about training, programs, registration and coaching.
                    </p>


                    <div class="d-flex mb-4">

                        <i class="bi bi-geo-alt-fill text-warning fs-3 me-3"></i>

                        <div>
                            <h6 class="fw-bold mb-1">Location</h6>

                            <p class="text-muted mb-0">
                                Sports Academy Campus
                            </p>
                        </div>

                    </div>


                    <div class="d-flex mb-4">

                        <i class="bi bi-telephone-fill text-warning fs-3 me-3"></i>

                        <div>
                            <h6 class="fw-bold mb-1">Phone</h6>

                            <p class="text-muted mb-0">
                                +92 300 1234567
                            </p>
                        </div>

                    </div>


                    <div class="d-flex">

                        <i class="bi bi-envelope-fill text-warning fs-3 me-3"></i>

                        <div>
                            <h6 class="fw-bold mb-1">Email</h6>

                            <p class="text-muted mb-0">
                                info@elitesports.com
                            </p>
                        </div>

                    </div>

                </div>

            </div>


            <!-- Contact Form -->
            <div class="col-lg-7">

                <div class="card border-0 shadow-sm p-4 p-md-5">

                    <h3 class="fw-bold mb-4">
                        Send a Message
                    </h3>


                    <?php if ($message != ""): ?>

                        <div class="alert alert-<?php echo $message_type; ?> alert-dismissible fade show">

                            <?php echo $message; ?>

                            <button type="button"
                                    class="btn-close"
                                    data-bs-dismiss="alert">
                            </button>

                        </div>

                    <?php endif; ?>


                    <form method="POST">

                        <div class="row">

                            <!-- Name -->
                            <div class="col-md-6 mb-3">

                                <label class="form-label fw-bold">
                                    Name
                                </label>

                                <input type="text"
                                       name="name"
                                       class="form-control"
                                       placeholder="Your name"
                                       required>

                            </div>


                            <!-- Email -->
                            <div class="col-md-6 mb-3">

                                <label class="form-label fw-bold">
                                    Email
                                </label>

                                <input type="email"
                                       name="email"
                                       class="form-control"
                                       placeholder="Your email"
                                       required>

                            </div>

                        </div>


                        <!-- Subject -->
                        <div class="mb-3">

                            <label class="form-label fw-bold">
                                Subject
                            </label>

                            <input type="text"
                                   name="subject"
                                   class="form-control"
                                   placeholder="Message subject"
                                   required>

                        </div>


                        <!-- Message -->
                        <div class="mb-4">

                            <label class="form-label fw-bold">
                                Message
                            </label>

                            <textarea name="message"
                                      class="form-control"
                                      rows="6"
                                      placeholder="Write your message..."
                                      required></textarea>

                        </div>


                        <!-- Submit -->
                        <button type="submit"
                                class="btn btn-warning fw-bold px-4">

                            <i class="bi bi-send-fill me-1"></i>
                            Send Message

                        </button>

                    </form>

                </div>
```
