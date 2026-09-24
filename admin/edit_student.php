<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit;
}

require_once "../includes/db.php";

if (!isset($_GET['id'])) {
    header("Location: students.php");
    exit;
}

$id = (int) $_GET['id'];

$query = "SELECT * FROM students WHERE id = $id";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) == 0) {
    header("Location: students.php");
    exit;
}

$student = mysqli_fetch_assoc($result);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $age = (int) $_POST['age'];
    $sport = mysqli_real_escape_string($conn, $_POST['sport']);

    $update = "UPDATE students SET
               name = '$name',
               email = '$email',
               phone = '$phone',
               age = $age,
               sport = '$sport'
               WHERE id = $id";

    if (mysqli_query($conn, $update)) {
        header("Location: students.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Student - Admin Panel</title>

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

        <a href="students.php"
           class="btn btn-outline-light btn-sm">

            <i class="bi bi-arrow-left"></i>
            Back

        </a>

    </div>

</nav>


<section class="py-5">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-lg-7">

                <div class="card border-0 shadow-sm">

                    <div class="card-body p-4 p-md-5">

                        <h2 class="fw-bold mb-4">
                            <i class="bi bi-pencil-square text-warning"></i>
                            Edit Student
                        </h2>

                        <form method="POST">

                            <div class="mb-3">

                                <label class="form-label fw-bold">
                                    Full Name
                                </label>

                                <input type="text"
                                       name="name"
                                       class="form-control"
                                       value="<?php echo htmlspecialchars($student['name']); ?>"
                                       required>

                            </div>


                            <div class="mb-3">

                                <label class="form-label fw-bold">
                                    Email
                                </label>

                                <input type="email"
                                       name="email"
                                       class="form-control"
                                       value="<?php echo htmlspecialchars($student['email']); ?>"
                                       required>

                            </div>


                            <div class="mb-3">

                                <label class="form-label fw-bold">
                                    Phone
                                </label>

                                <input type="text"
                                       name="phone"
                                       class="form-control"
                                       value="<?php echo htmlspecialchars($student['phone']); ?>"
                                       required>

                            </div>


                            <div class="mb-3">

                                <label class="form-label fw-bold">
                                    Age
                                </label>

                                <input type="number"
                                       name="age"
                                       class="form-control"
                                       value="<?php echo $student['age']; ?>"
                                       min="5"
                                       max="60"
                                       required>

                            </div>


                            <div class="mb-4">

                                <label class="form-label fw-bold">
                                    Sport
                                </label>

                                <select name="sport"
                                        class="form-select"
                                        required>

                                    <option value="Football"
                                        <?php if ($student['sport'] == 'Football') echo 'selected'; ?>>
                                        Football
                                    </option>

                                    <option value="Cricket"
                                        <?php if ($student['sport'] == 'Cricket') echo 'selected'; ?>>
                                        Cricket
                                    </option>

                                    <option value="Basketball"
                                        <?php if ($student['sport'] == 'Basketball') echo 'selected'; ?>>
                                        Basketball
                                    </option>

                                    <option value="Tennis"
                                        <?php if ($student['sport'] == 'Tennis') echo 'selected'; ?>>
                                        Tennis
                                    </option>

                                </select>

                            </div>


                            <button type="submit"
                                    class="btn btn-warning fw-bold">

                                <i class="bi bi-check-circle"></i>
                                Update Student

                            </button>

                            <a href="students.php"
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