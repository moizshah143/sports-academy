<?php

session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit;
}

require_once "../includes/db.php";

if (isset($_GET['id']) && is_numeric($_GET['id'])) {

    $id = (int) $_GET['id'];

    $query = "DELETE FROM programs WHERE id = $id";

    if (!mysqli_query($conn, $query)) {
        die("Delete Error: " . mysqli_error($conn));
    }
}

header("Location: programs.php");
exit;

?>
