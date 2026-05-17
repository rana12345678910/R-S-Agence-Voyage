<?php
include("../includes/db_connect.php"); 

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id   = (int)$_GET['id'];

    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
}

header("Location: users.php?success=1");
exit;
?>
