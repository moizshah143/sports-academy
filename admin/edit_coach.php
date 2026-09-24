<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit;
}

require_once "../includes/db.php";

if (!isset($_GET['id'])) {
    header("Location: coaches.php");
    exit;
}

$id = (int) $_GET['id'];

$query = "SELECT * FROM coaches WHERE id = $id";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) == 0) {
    header("Location: coaches.php");
    exit;
}

$coach = mysqli_fetch_assoc($result);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $sport = mysqli_real_escape_string($conn, $_POST['sport']);
    $experience = mysqli_real_escape_string($conn, $_POST['experience']);

    $update = "UPDATE coaches SET
               name = '$name',
               sport = '$sport',
               experience = '$experience'
               WHERE id = $id";

    if (mysqli_query($conn, $update)) {
        header("Location: coaches.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Coach - Admin Panel</title>

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

                            <i class="bi bi-pencil-square text-warning"></i>
                            Edit Coach

                        </h2>


                        <form method="POST">

                            <div class="mb-3">

                                <label class="form-label fw-bold">
                                    Coach Name
                                </label>

                                <input type="text"
                                       name="name"
                                       class="form-control"
                                       value="<?php echo htmlspecialchars($coach['name']); ?>"
                                       required>

                            </div>


                            <div class="mb-3">

                                <label class="form-label fw-bold">
                                    Sport
                                </label>

                                <select name="sport"
                                        class="form-select"
                                        required>

                                    <option value="Football"
                                        <?php if ($coach['sport'] == 'Football') echo 'selected'; ?>>
                                        Football
                                    </option>

                                    <option value="Cricket"
                                        <?php if ($coach['sport'] == 'Cricket') echo 'selected'; ?>>
                                        Cricket
                                    </option>

                                    <option value="Basketball"
                                        <?php if ($coach['sport'] == 'Basketball') echo 'selected'; ?>>
                                        Basketball
                                    </option>

                                    <option value="Tennis"
                                        <?php if ($coach['sport'] == 'Tennis') echo 'selected'; ?>>
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
                                       value="<?php echo htmlspecialchars($coach['experience']); ?>"
                                       required>

                            </div>


                            <button type="submit"
                                    class="btn btn-warning fw-bold">

                                <i class="bi bi-check-circle"></i>
                                Update Coach

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