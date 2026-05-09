<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../assets/css/style3.css">
<title>modifier un Hôtel</title>

<style>



</style>
</head>

<body>

<!-- SIDEBAR -->

 <aside class="sidebar">
    <div class="sidebar-logo">✈ S&R VOYAGES<span>ADMIN PANEL</span></div>
    <nav>
      <a href="dashboard_admin.php">🏠 Dashboard</a>
        <a href="#users"  class="active">👥 Utilisateurs</a>
        <a href="#hotels">      🏨 Hôtels</a>
        <a href="#reservations">📅 Réservations</a>
    </nav>
    <div class="sidebar-bottom">
        <p>Admin</p><span>Super Admin</span>
        <a href="../login.php" class="btn-logout">🚪 Se déconnecter</a>
    </div>
</aside>

<!-- MAIN -->

<div class="main">

    <!-- TOPBAR -->

    <div class="topbar">

        <div>
            <h2>Modifier un Hôtel</h2>
            <p>Créer un nouvel établissement</p>
        </div>

    </div>

    <!-- CONTENT -->

    <div class="content">

        <div class="panel">

            <div class="panel-head">
                ➕ Modifier Hôtel
            </div>

            <div class="form-body">

                <form>

                    <!-- NOM -->

                    <div class="form-group">
                        <label>Nom de l'hôtel</label>

                        <input type="text" placeholder="Ex : Riad Al Andalus">
                    </div>

                    <!-- DESTINATION + PRIX -->

                    <div class="row">

                        <div class="form-group">
                            <label>Destination</label>

                            <input type="text" placeholder="Ex : Marrakech">
                        </div>

                        <div class="form-group">
                            <label>Prix / nuit (€)</label>

                            <input type="number" placeholder="180">
                        </div>

                    </div>

                    <!-- ETOILES + TYPE -->

                    <div class="row">

                        <div class="form-group">
                            <label>Étoiles</label>

                            <select>
                                <option>⭐ 1 étoile</option>
                                <option>⭐⭐ 2 étoiles</option>
                                <option>⭐⭐⭐ 3 étoiles</option>
                                <option>⭐⭐⭐⭐ 4 étoiles</option>
                                <option selected>⭐⭐⭐⭐⭐ 5 étoiles</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Type</label>

                            <select>
                                <option>Hôtel</option>
                                <option>Riad</option>
                                <option>Villa</option>
                                <option>Resort</option>
                            </select>
                        </div>

                    </div>

                    <!-- IMAGE -->

                    <div class="form-group">
                        <label>Image URL</label>

                        <input type="text" placeholder="https://image.com/hotel.jpg">
                    </div>

                    <!-- DESCRIPTION -->

                    <div class="form-group">
                        <label>Description</label>

                        <textarea placeholder="Description de l'hôtel..."></textarea>
                    </div>

                    <!-- BOUTON -->

                    <button type="submit" class="btn-submit">
                        ➕ Modifier
                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

</body>
</html>
