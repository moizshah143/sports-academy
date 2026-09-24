<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit;
}

require_once "../includes/db.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $sport = mysqli_real_escape_string($conn, $_POST['sport']);
    $experience = mysqli_real_escape_string($conn, $_POST['experience']);

    $query = "INSERT INTO coaches (name, sport, experience)
              VALUES ('$name', '$sport', '$experience')";

    if (mysqli_query($conn, $query)) {

        header("Location: coaches.php");
        exit;

    } else {

        $message = "Coach could not be added.";

    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Coach - Admin Panel</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
          rel="stylesheet">

</head>

<body class="bg-light">

<nav class="navbar navbar-dark bg-dark">

    <div class="container">

        <a class="navbar-brand fw-bold" href="dashboard.php">

            <i class="bi bi-speedometer2 text-warning"></i>
            Admin Panel

        </a>

        <a href="coaches.php"
           class="btn btn-outline-light btn-sm">

            <i class="bi bi-arrow-left"></i>
            Back

        </a>

    </div>

</nav>


<section class="py-5">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-lg-6">

                <div class="card border-0 shadow-sm">

                    <div class="card-body p-4 p-md-5">

                        <h2 class="fw-bold mb-4">

                            <i class="bi bi-person-plus-fill text-warning"></i>

                            Add Coach

                        </h2>


                        <?php if ($message != ""): ?>

                            <div class="alert alert-danger">

                                <?php echo $message; ?>

                            </div>

                        <?php endif; ?>


                        <form method="POST">

                            <div class="mb-3">

                                <label class="form-label fw-bold">
                                    Coach Name
                                </label>

                                <input type="text"
                                       name="name"
                                       class="form-control"
                                       placeholder="Enter coach name"
                                       required>

                            </div>


                            <div class="mb-3">

                                <label class="form-label fw-bold">
                                    Sport
                                </label>

                                <select name="sport"
                                        class="form-select"
                                        required>

                                    <option value="">
                                        Select Sport
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


                            <div class="mb-4">

                                <label class="form-label fw-bold">
                                    Experience
                                </label>

                                <input type="text"
                                       name="experience"
                                       class="form-control"
                                       placeholder="Example: 5 Years"
                                       required>

                            </div>


                            <button type="submit"
                                    class="btn btn-warning fw-bold">

                                <i class="bi bi-plus-circle"></i>
                                Add Coach

                            </button>

                            <a href="coaches.php"
                               class="btn btn-secondary">

                                Cancel

                            </a>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

</body>
</html>