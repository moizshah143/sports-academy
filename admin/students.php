<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit;
}

require_once "../includes/db.php";

$search = "";

if (isset($_GET['search'])) {
    $search = mysqli_real_escape_string($conn, $_GET['search']);
}

$query = "SELECT * FROM students
          WHERE name LIKE '%$search%'
          OR email LIKE '%$search%'
          OR phone LIKE '%$search%'
          OR sport LIKE '%$search%'
          ORDER BY id DESC";

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Students - Admin Panel</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
          rel="stylesheet">

</head>

<body class="bg-light">

<!-- Navbar -->

<nav class="navbar navbar-dark bg-dark">

    <div class="container">

        <a class="navbar-brand fw-bold"
           href="dashboard.php">

            <i class="bi bi-speedometer2 text-warning"></i>

            Admin Panel

        </a>

        <div>

            <a href="dashboard.php"
               class="btn btn-outline-light btn-sm me-2">

                <i class="bi bi-house"></i>
                Dashboard

            </a>

            <a href="logout.php"
               class="btn btn-warning btn-sm fw-bold">

                <i class="bi bi-box-arrow-right"></i>
                Logout

            </a>

        </div>

    </div>

</nav>


<!-- Students Section -->

<section class="py-5">

    <div class="container">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>

                <h1 class="fw-bold">
                    Students
                </h1>

                <p class="text-muted mb-0">
                    Manage registered students.
                </p>

            </div>

        </div>


        <!-- Search -->

        <div class="card border-0 shadow-sm mb-4">

            <div class="card-body">

                <form method="GET">

                    <div class="row g-2">

                        <div class="col-md-10">

                            <input type="text"
                                   name="search"
                                   class="form-control"
                                   placeholder="Search by name, email, phone or sport..."
                                   value="<?php echo htmlspecialchars($search); ?>">

                        </div>

                        <div class="col-md-2">

                            <button type="submit"
                                    class="btn btn-dark w-100">

                                <i class="bi bi-search"></i>
                                Search

                            </button>

                        </div>

                    </div>

                </form>

            </div>

        </div>


        <!-- Students Table -->

        <div class="card border-0 shadow-sm">

            <div class="card-body">

                <div class="table-responsive">

                    <table class="table table-hover align-middle">

                        <thead class="table-dark">

                            <tr>

                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Age</th>
                                <th>Sport</th>
                                <th>Registered</th>
                                <th>Action</th>

                            </tr>

                        </thead>

                        <tbody>

                        <?php if (mysqli_num_rows($result) > 0): ?>

                            <?php while ($student = mysqli_fetch_assoc($result)): ?>

                                <tr>

                                    <td>
                                        <?php echo $student['id']; ?>
                                    </td>

                                    <td class="fw-bold">
                                        <?php echo htmlspecialchars($student['name']); ?>
                                    </td>

                                    <td>
                                        <?php echo htmlspecialchars($student['email']); ?>
                                    </td>

                                    <td>
                                        <?php echo htmlspecialchars($student['phone']); ?>
                                    </td>

                                    <td>
                                        <?php echo $student['age']; ?>
                                    </td>

                                    <td>

                                        <span class="badge bg-warning text-dark">

                                            <?php echo htmlspecialchars($student['sport']); ?>

                                        </span>

                                    </td>

                                    <td>
                                        <?php echo $student['created_at']; ?>
                                    </td>

                                    <td>

                                        <a href="edit_student.php?id=<?php echo $student['id']; ?>"
                                           class="btn btn-sm btn-primary">

                                            <i class="bi bi-pencil"></i>

                                        </a>

                                        <a href="delete_student.php?id=<?php echo $student['id']; ?>"
                                           class="btn btn-sm btn-danger"
                                           onclick="return confirm('Are you sure you want to delete this student?');">

                                            <i class="bi bi-trash"></i>

                                        </a>

                                    </td>

                                </tr>

                            <?php endwhile; ?>

                        <?php else: ?>

                            <tr>

                                <td colspan="8"
                                    class="text-center text-muted py-4">

                                    No students found.

                                </td>

                            </tr>

                        <?php endif; ?>

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</section>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>