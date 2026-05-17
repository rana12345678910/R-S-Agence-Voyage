<?php
include("../includes/db_connect.php"); // connexion à ta base
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../assets/css/style3.css">
    <title>Liste des Utilisateurs</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
            margin-top: 10px;
        }
        thead tr {
            background: rgba(212, 175, 55, 0.12);
            border-bottom: 1px solid rgba(212, 175, 55, 0.3);
        }
        th {
            padding: 13px 16px;
            text-align: left;
            color: #d4af37;
            font-size: 13px;
            font-weight: 600;
        }
        td {
            padding: 13px 16px;
            border-bottom: 1px solid rgba(255,255,255,0.06);
            color: rgba(255,255,255,0.85);
            font-size: 14px;
        }
        tbody tr:hover { background: rgba(255,255,255,0.04); }

        .btn-add {
            display: inline-block;
            margin-bottom: 18px;
            padding: 9px 18px;
            background: #d4af37;
            color: #061327;
            border-radius: 8px;
            text-decoration: none;
            font-size: 13px;
            font-weight: 700;
        }
        .btn-edit {
            padding: 6px 12px;
            background: rgba(21, 101, 192, 0.25);
            color: #64b5f6;
            border: 1px solid rgba(21, 101, 192, 0.4);
            border-radius: 6px;
            text-decoration: none;
            font-size: 12px;
            margin-right: 6px;
        }
        .btn-delete {
            padding: 6px 12px;
            background: rgba(198, 40, 40, 0.25);
            color: #ef9a9a;
            border: 1px solid rgba(198, 40, 40, 0.4);
            border-radius: 6px;
            text-decoration: none;
            font-size: 12px;
        }
    </style>
</head>
<body>

<!-- SIDEBAR -->
<aside class="sidebar">
    <div class="sidebar-logo">✈ S&R VOYAGES<span>ADMIN PANEL</span></div>
    <nav>
        <a href="dashboard_admin.php">🏠 Dashboard</a>
        <a href="users.php" class="active">👥 Utilisateurs</a>
        <a href="hotel.php">🏨 Hôtels</a>
        <a href="reservations.php">📅 Réservations</a>
    </nav>
    <div class="sidebar-bottom">
        <p>Admin</p><span>Super Admin</span>
        <a href="../login.php" class="btn-logout">🚪 Se déconnecter</a>
    </div>
</aside>

<!-- MAIN -->
<div class="main">
    <div class="topbar">
        <h2>Gestion des Utilisateurs</h2>
        <p>Liste complète des clients</p>
    </div>

    <div class="content">
        <h3>📋 Liste des Utilisateurs</h3>
        <a href="add_user.php" class="btn-add">➕ Ajouter un utilisateur</a>

        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Date d'inscription</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $result = $conn->query("SELECT * FROM users");
            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $nom   = isset($row['nom']) ? htmlspecialchars($row['nom']) : '-';
                    $email = isset($row['email']) ? htmlspecialchars($row['email']) : '-';
                    $date  = isset($row['date_inscription']) ? htmlspecialchars($row['date_inscription']) : '-';

                    echo "<tr>";
                    echo "<td>$nom</td>";
                    echo "<td>$email</td>";
                    echo "<td>$date</td>";
                    echo "<td>
                            <a href='edit_user.php?id=" . (int)$row['id'] . "' class='btn-edit'>✏️ Modifier</a>
                            <a href='supprimer_user.php?id=" . (int)$row['id'] . "' class='btn-delete'
                               onclick=\"return confirm('Confirmer la suppression ?')\">🗑️ Supprimer</a>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>Aucun utilisateur enregistré pour l'instant.</td></tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
