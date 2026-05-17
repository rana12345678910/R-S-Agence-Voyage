<?php
include("../includes/db_connect.php"); // connexion à ta base

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = (int)$_GET['id'];

    // Vérifier si l'utilisateur a des réservations
    $stmtCheck = $conn->prepare("SELECT COUNT(*) as total FROM reservations WHERE user_id = ?");
    $stmtCheck->bind_param("i", $id);
    $stmtCheck->execute();
    $result = $stmtCheck->get_result()->fetch_assoc();

    if ($result['total'] > 0) {
        // Afficher une notification stylée
        ?>
        <!DOCTYPE html>
        <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <link rel="stylesheet" href="../assets/css/style3.css">
            <title>Suppression impossible</title>
            <style>
                .alert {
                    max-width: 600px;
                    margin: 40px auto;
                    padding: 20px;
                    border-radius: 10px;
                    font-size: 15px;
                    text-align: center;
                }
                .alert-error {
                    background: rgba(198, 40, 40, 0.15);
                    border: 1px solid rgba(198, 40, 40, 0.4);
                    color: #ef9a9a;
                }
                .btn-back {
                    display: inline-block;
                    margin-top: 18px;
                    padding: 9px 18px;
                    background: #d4af37;
                    color: #061327;
                    border-radius: 8px;
                    text-decoration: none;
                    font-size: 13px;
                    font-weight: 700;
                }
                .btn-back:hover { opacity: 0.85; }
            </style>
        </head>
        <body>
            <div class="alert alert-error">
                ❌ Impossible de supprimer ce compte.<br><br>
                Cet utilisateur possède encore des <strong>réservations actives</strong>.<br>
                Vous devez <strong>annuler ses réservations</strong> avant de supprimer son compte.
                <br>
                <a href="users.php" class="btn-back">⬅ Retour à la liste des utilisateurs</a>
            </div>
        </body>
        </html>
        <?php
        exit;
    } else {
        // Supprimer l'utilisateur si aucune réservation liée
        $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();

        header("Location: users.php?success=1");
        exit;
    }
} else {
    header("Location: users.php?error=1");
    exit;
}
?>
