<?php
include("../includes/db_connect.php"); // connexion à ta base

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = (int)$_GET['id'];

    // Préparer la requête de suppression
    $stmt = $conn->prepare("DELETE FROM reservations WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
}

// Redirection vers la liste des réservations avec message de succès
header("Location: reservations.php?success=1");
exit;
?>
