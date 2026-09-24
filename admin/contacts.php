<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit;
}

require_once "../includes/db.php";

$result = mysqli_query($conn, "SELECT * FROM contacts ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Contact Messages</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body class="bg-light">

<nav class="navbar navbar-dark bg-dark">
    <div class="container">

        <a href="dashboard.php" class="navbar-brand fw-bold">
            <i class="bi bi-speedometer2"></i> Admin Panel
        </a>

        <a href="dashboard.php" class="btn btn-warning">
            <i class="bi bi-arrow-left"></i> Dashboard
        </a>

    </div>
</nav>

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2 class="fw-bold">
            <i class="bi bi-envelope"></i> Contact Messages
        </h2>

        <span class="badge bg-primary fs-6">
            <?php echo mysqli_num_rows($result); ?> Messages
        </span>

    </div>

    <div class="card shadow-sm">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle">

                    <thead class="table-dark">

                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>

                    </thead>

                    <tbody>

                    <?php while ($contact = mysqli_fetch_assoc($result)) { ?>

                        <tr>

                            <td><?php echo $contact['id']; ?></td>

                            <td>
                                <?php echo htmlspecialchars($contact['name']); ?>
                            </td>

                            <td>
                                <?php echo htmlspecialchars($contact['email']); ?>
                            </td>

                            <td>
                                <?php echo htmlspecialchars($contact['subject']); ?>
                            </td>

                            <td>
                                <?php echo htmlspecialchars($contact['message']); ?>
                            </td>

                            <td>
                                <?php echo $contact['created_at']; ?>
                            </td>

                            <td>
                                <a href="delete_contact.php?id=<?php echo $contact['id']; ?>"
                                   class="btn btn-sm btn-danger"
                                   onclick="return confirm('Delete this message?');">
                                    <i class="bi bi-trash"></i>
                                </a>
                            </td>

                        </tr>

                    <?php } ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

</body>
</html>