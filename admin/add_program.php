<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit;
}

require_once "../includes/db.php";

if (isset($_POST['add_program'])) {

    $name = $_POST['name'];
    $duration = $_POST['duration'];
    $level = $_POST['level'];
    $fee = $_POST['fee'];

    $query = "INSERT INTO programs (name, duration, level, fee)
              VALUES ('$name', '$duration', '$level', '$fee')";

    mysqli_query($conn, $query);

    header("Location: programs.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Add Program</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <a href="dashboard.php" class="navbar-brand fw-bold">
            Admin Panel
        </a>

        <a href="programs.php" class="btn btn-warning">
            Back
        </a>
    </div>
</nav>

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-7">

            <div class="card shadow">

                <div class="card-body p-4">

                    <h3 class="fw-bold mb-4">
                        Add New Program
                    </h3>

                    <form method="POST">

                        <div class="mb-3">
                            <label class="form-label">Program Name</label>
                            <input type="text"
                                   name="name"
                                   class="form-control"
                                   placeholder="Enter program name"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Duration</label>
                            <input type="text"
                                   name="duration"
                                   class="form-control"
                                   placeholder="Example: 3 Months"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Level</label>

                            <select name="level" class="form-select" required>
                                <option value="">Select Level</option>
                                <option value="Beginner">Beginner</option>
                                <option value="Intermediate">Intermediate</option>
                                <option value="Advanced">Advanced</option>
                                <option value="Professional">Professional</option>
                            </select>

                        </div>

                        <div class="mb-3">
                            <label class="form-label">Fee</label>
                            <input type="number"
                                   name="fee"
                                   class="form-control"
                                   placeholder="Enter fee"
                                   required>
                        </div>

                        <button type="submit"
                                name="add_program"
                                class="btn btn-success w-100">
                            Add Program
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>