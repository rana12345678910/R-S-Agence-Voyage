<?php
include "connexion/db.php";

$message = "";

// ENVOI AVIS
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_review'])) {

    $nom = $_POST['nom'];
    $commentaire = $_POST['commentaire'];

    $stmt = $conn->prepare("INSERT INTO avis (nom, commentaire) VALUES (?, ?)");
    $stmt->bind_param("ss", $nom, $commentaire);

    if ($stmt->execute()) {
        $message = " Avis envoyé avec succès";
    } else {
        $message = " Erreur lors de l'envoi";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S&R VOYAGES-Acceuil</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="icon" href="logo4.png" sizes="32x32">
</head>
<body>

<a id="top"></a>

<!-- Navbar -->
<nav>
   <div class="brand">
    <img src="assets/images/logo2.png" alt="Logo" class="logo">
    <h1 class="site-name">S&R VOYAGES</h1>
    </div>

    <ul>
        <li><a href="index.php">Accueil</a></li>
        <li><a href="reservation.php">Réservation</a></li>

        <li>
            <a href="#">Séjours en Tunisie</a>
            <ul>
                <li><a href="sousse.php">Sousse</a></li>
                
            </ul>
        </li>

        <li>
            <a href="#">Voyage à l'étranger</a>
            <ul>
                <li><a href="europe.php">Europe</a></li>
                <li><a href="asie.php">Asie</a></li>
            </ul>
        </li>

        <li><a href="promos.php">Promos</a></li>
        <li><a href="#contact">Contact</a></li>
        <li><a href="view.php">profil</a></li>

    </ul>
</nav>

<!-- Hero -->
<div class="hero">
    <img src="assets/images/cover3.png" alt="Voyage Turquie">
    <img src="assets/images/dubai-5.jpg" alt="Voyage Turquie">
    <img src="assets/images/prag.jpg" alt="Voyage Turquie">
</div>

<div class="reserver-section">
    <a href="reservation.php" class="reserver-button">
        Réserver Maintenant
    </a>
</div>

<!-- Hôtels Tunisie -->
<section>
    <h2>Meilleurs Hôtels en Tunisie</h2>

    <div class="slider-container">

        <div class="card">
            <img src="assets/images/lamedina.jpeg" alt="Hôtel La Medina">

            <div class="info">
                <h3>Hôtel La Medina</h3>
                <p>⭐⭐⭐⭐</p>
                <p>Prix: 120 DT/nuit</p>
            </div>
        </div>

        <div class="card">
            <img src="assets/images/soussepalace.jpeg" alt="Hôtel Sousse Palace">

            <div class="info">
                <h3>Hôtel Sousse Palace</h3>
                <p>⭐⭐⭐</p>
                <p>Prix: 90 DT/nuit</p>
            </div>
        </div>

        <div class="card">
            <img src="assets/images/djerbabeach.jpeg" alt="Hôtel Djerba Beach">

            <div class="info">
                <h3>Hôtel Djerba Beach</h3>
                <p>⭐⭐⭐⭐</p>
                <p>Prix: 150 DT/nuit</p>
            </div>
        </div>

    </div>
</section>

<!-- AVIS CLIENTS -->
<section class="reviews-section">

    <h2>Avis de nos clients</h2>

    <div class="reviews-layout">

        <!-- AVIS -->
        <div class="reviews-left">

            <?php
            $result = $conn->query("SELECT * FROM avis ORDER BY date_avis DESC");

            while ($row = $result->fetch_assoc()) {
            ?>

            <div class="review-card">

                <p class="review-text">
                    "<?php echo htmlspecialchars($row['commentaire']); ?>"
                </p>

                <h4>
                    - <?php echo htmlspecialchars($row['nom']); ?>
                </h4>

            </div>

            <?php } ?>

        </div>

        <!-- FORMULAIRE -->
        <div class="reviews-right">

            <h3>Donnez votre avis</h3>

            <?php if ($message != ""): ?>
                <p style="color:green; text-align:center;">
                    <?php echo $message; ?>
                </p>
            <?php endif; ?>

            <form class="review-form" method="POST">

                <input 
                    type="text" 
                    name="nom"
                    placeholder="Votre nom" 
                    required
                >

                <textarea 
                    name="commentaire"
                    placeholder="Votre avis..." 
                    required></textarea>

                <button 
                    type="submit" 
                    name="submit_review">
                    Envoyer
                </button>

            </form>

        </div>

    </div>

</section>

<!-- Footer -->
<footer id="contact">

<div class="footer-container">

    <div class="footer-block">
        <h3>À propos</h3>

        <p>
            Votre agence de voyage pour des séjours inoubliables 
            en Tunisie et à l’étranger.
        </p>
    </div>

    <div class="footer-block">

        <h3>Contact</h3>

        <p>
            Email :
            <a href="mailto:contact@S&RVOYAGES.com">
                contact@S&RVOYAGES.com
            </a>
        </p>

        <p>Tél : +216 12 345 678</p>

        <p>
            Adresse : 12 Avenue Habib Bourguiba, Tunis
        </p>
    </div>

    <div class="footer-block">

        <h3>Horaires</h3>

        <p>Lundi - Vendredi : 09h00 - 18h00</p>
        <p>Samedi : 09h00 - 14h00</p>
        <p>Dimanche : Fermé</p>

    </div>

</div>

<div class="footer-bottom">
    &copy; 2025 Travel Agency. Tous droits réservés.
</div>

</footer>

<a href="#top" class="back-to-top" title="Retour en haut">
  ↑
</a>

</body>
</html>
