<?php
include("../includes/db_connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validation minimale
    if (empty($_POST['id']) || !is_numeric($_POST['id'])) {
        header("Location: hotel.php");
        exit;
    }

    $id           = (int)$_POST['id'];
    $nom          = trim($_POST['nom']          ?? '');
    $destination  = trim($_POST['destination']  ?? '');
    $type_chambre = trim($_POST['type_chambre'] ?? '');
    $etoiles      = isset($_POST['etoiles']) && is_numeric($_POST['etoiles']) ? (int)$_POST['etoiles'] : null;
    $prix         = isset($_POST['prix'])    && is_numeric($_POST['prix'])    ? (float)$_POST['prix']  : 0;
    $description  = trim($_POST['description'] ?? '');
    $image        = trim($_POST['image']        ?? '');

    $sql  = "UPDATE hotels SET nom=?, destination=?, type_chambre=?, etoiles=?, prix=?, description=?, image=? WHERE id=?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("sssidssi", $nom, $destination, $type_chambre, $etoiles, $prix, $description, $image, $id);
        if ($stmt->execute()) {
            header("Location: hotel.php?success=1");
            exit;
        }
    }

    // En cas d'erreur
    header("Location: form_modifier.php?id=" . $id . "&error=1");
    exit;
}

// Accès direct sans POST → retour liste
header("Location: hotel.php");
exit;
?>