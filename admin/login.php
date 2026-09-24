
<?php
session_start();
require_once "../includes/db.php";

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];

    $query = "SELECT * FROM admins WHERE username = '$username' LIMIT 1";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {

        $admin = mysqli_fetch_assoc($result);

        if ($password === $admin['password']) {

            $_SESSION['admin_id'] = $admin['id'];
            $_SESSION['admin_username'] = $admin['username'];

            header("Location: dashboard.php");
            exit;

        } else {
            $error = "Invalid password!";
        }

    } else {
        $error = "Invalid username!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Login - Elite Sports Academy</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
          rel="stylesheet">

</head>

<body class="bg-dark">

<div class="container">

    <div class="row justify-content-center align-items-center min-vh-100">

        <div class="col-12 col-sm-10 col-md-6 col-lg-5">

            <div class="card border-0 shadow-lg">

                <div class="card-body p-4 p-md-5">

                    <!-- Logo -->
                    <div class="text-center mb-4">

                        <div class="mb-3">
                            <i class="bi bi-shield-lock-fill text-warning display-3"></i>
                        </div>

                        <h2 class="fw-bold">
                            Admin Login
                        </h2>

                        <p class="text-muted mb-0">
                            Elite Sports Academy
                        </p>

                    </div>


                    <!-- Error -->
                    <?php if ($error != ""): ?>

                        <div class="alert alert-danger alert-dismissible fade show">

                            <i class="bi bi-exclamation-triangle-fill me-1"></i>

                            <?php echo htmlspecialchars($error); ?>

                            <button type="button"
                                    class="btn-close"
                                    data-bs-dismiss="alert">
                            </button>

                        </div>

                    <?php endif; ?>


                    <!-- Login Form -->
                    <form method="POST">

                        <!-- Username -->
                        <div class="mb-3">

                            <label class="form-label fw-bold">
                                <i class="bi bi-person-fill"></i>
                                Username
                            </label>

                            <input type="text"
                                   name="username"
                                   class="form-control form-control-lg"
                                   placeholder="Enter username"
                                   required>

                        </div>


                        <!-- Password -->
                        <div class="mb-4">

                            <label class="form-label fw-bold">
                                <i class="bi bi-lock-fill"></i>
                                Password
                            </label>

                            <input type="password"
                                   name="password"
                                   class="form-control form-control-lg"
                                   placeholder="Enter password"
                                   required>

                        </div>


                        <!-- Button -->
                        <button type="submit"
                                class="btn btn-warning btn-lg w-100 fw-bold">

                            <i class="bi bi-box-arrow-in-right me-1"></i>
                            Login

                        </button>

                    </form>


                    <!-- Back -->
                    <div class="text-center mt-4">

                        <a href="../index.php"
                           class="text-decoration-none">

                            <i class="bi bi-arrow-left me-1"></i>
                            Back to Website

                        </a>

                    </div>

                </div>

            </div>


            <!-- Footer -->
            <p class="text-center text-secondary mt-4 mb-0">

                <small>
                    © 2026 Elite Sports Academy
                </small>

            </p>

        </div>

    </div>

</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>