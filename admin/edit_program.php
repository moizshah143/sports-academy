<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit;
}

require_once "../includes/db.php";

if (!isset($_GET['id'])) {
    header("Location: programs.php");
    exit;
}

$id = (int) $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM programs WHERE id = $id");
$program = mysqli_fetch_assoc($result);

if (!$program) {
    header("Location: programs.php");
    exit;
}

if (isset($_POST['update_program'])) {

    $name = $_POST['name'];
    $duration = $_POST['duration'];
    $level = $_POST['level'];
    $fee = $_POST['fee'];

    $query = "UPDATE programs SET
              name = '$name',
              duration = '$duration',
              level = '$level',
              fee = '$fee'
              WHERE id = $id";

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

    <title>Edit Program</title>

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
                        Edit Program
                    </h3>

                    <form method="POST">

                        <div class="mb-3">
                            <label class="form-label">Program Name</label>

                            <input type="text"
                                   name="name"
                                   class="form-control"
                                   value="<?php echo htmlspecialchars($program['name']); ?>"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Duration</label>

                            <input type="text"
                                   name="duration"
                                   class="form-control"
                                   value="<?php echo htmlspecialchars($program['duration']); ?>"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Level</label>

                            <select name="level" class="form-select" required>

                                <option value="Beginner"
                                    <?php if ($program['level'] == 'Beginner') echo 'selected'; ?>>
                                    Beginner
                                </option>

                                <option value="Intermediate"
                                    <?php if ($program['level'] == 'Intermediate') echo 'selected'; ?>>
                                    Intermediate
                                </option>

                                <option value="Advanced"
                                    <?php if ($program['level'] == 'Advanced') echo 'selected'; ?>>
                                    Advanced
                                </option>

                                <option value="Professional"
                                    <?php if ($program['level'] == 'Professional') echo 'selected'; ?>>
                                    Professional
                                </option>

                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Fee</label>

                            <input type="number"
                                   name="fee"
                                   class="form-control"
                                   value="<?php echo htmlspecialchars($program['fee']); ?>"
                                   required>
                        </div>

                        <button type="submit"
                                name="update_program"
                                class="btn btn-warning w-100">
                            Update Program
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>