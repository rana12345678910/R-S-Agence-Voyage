<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>S&R VOYAGES - Réservation</title>
  <link rel="stylesheet" href="styles1.css">
  <link rel="icon" href="logo4.png" sizes="32x32">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  
</head>
<body>
<a id="top"></a>
  <!-- Navbar -->
  <nav>
    <div class="brand">
      <img src="logo2.png" alt="Logo" class="logo">
      <h1 class="site-name">S&R VOYAGES</h1>
    </div>
    <ul>
      <li><a href="index.html">Accueil</a></li>
      <li><a href="reservation.html">Réservation</a></li>
      <li>
        <a href="#">Séjours en Tunisie</a>
        <ul>
          <li><a href="sousse.html">Sousse</a></li>
          <li><a href="mahdia.html">Mahdia</a></li>
        </ul>
      </li>
      <li>
        <a href="#">Voyage à l'étranger</a>
        <ul>
          <li><a href="europe.html">Europe</a></li>
          <li><a href="asie.html">Asie</a></li>
        </ul>
      </li>
      <li><a href="promos.html">Promos</a></li>
      
      <li><a href="#contact">Contact</a></li>
    </ul>
  </nav>

<section class="reservation-section">
  <h2>Réservez votre voyage</h2>
  <form>
    <!-- Destination -->
    <label for="destination"><i class="fa-solid fa-location-dot"></i> Destination :</label>
    <select id="destination" name="destination" required>
      <option value="">Sélectionnez une destination</option>
      <option value="sousse">Sousse</option>
      <option value="mahdia">Mahdia</option>
      <option value="europe">Europe</option>
      <option value="asie">Asie</option>
    </select>

    <!-- Date -->
    <label for="date"><i class="fa-solid fa-calendar-days"></i> Date de départ :</label>
    <input type="date" id="date" name="date" required>

    <!-- Nuits -->
    <label for="nights"><i class="fa-solid fa-moon"></i> Nombre de nuits :</label>
    <input type="number" id="nights" name="nights" min="1" placeholder="Sélectionnez le nombre de nuits" required>

    <!-- Adultes / Enfants -->
    <div style="display:flex; gap:20px;">
      <div style="flex:1;">
        <label for="adults"><i class="fa-solid fa-user"></i> Adultes :</label>
        <input type="number" id="adults" name="adults" min="1" placeholder="Nombre d'adultes" required>
      </div>
      <div style="flex:1;">
        <label for="children"><i class="fa-solid fa-child"></i> Enfants :</label>
        <input type="number" id="children" name="children" min="0" placeholder="Nombre d'enfants" required>
      </div>
    </div>

    <!-- Type de chambre -->
    <label for="room"><i class="fa-solid fa-bed"></i> Type de chambre :</label>
    <select id="room" name="room" required>
      <option value="">Sélectionnez un type de chambre</option>
      <option value="single">Simple</option>
      <option value="double">Double</option>
      <option value="family">Familiale</option>
      <option value="suite">Suite</option>
    </select>

    <!-- Hôtel -->
    <label for="hotel"><i class="fa-solid fa-hotel"></i> Choix de l'hôtel :</label>
    <select id="hotel" name="hotel" required>
      <option value="">Sélectionnez un hôtel</option>
      <optgroup label="Sousse">
        <option>Concorde Green Park Palace</option>
        <option>Marabout</option>
        <option>Marhaba</option>
      </optgroup>
      <optgroup label="Mahdia">
        <option>Mahdia Palace</option>
        <option>Thapsus</option>
      </optgroup>
      <optgroup label="Europe">
        <option>Rome Centrale</option>
        <option>Madrid Sol</option>
      </optgroup>
      <optgroup label="Asie">
        <option>Tokyo Bay Hotel</option>
        <option>Bali Paradise</option>
      </optgroup>
    </select>

    <!-- Notes -->
    <label for="notes"><i class="fa-solid fa-pen"></i> Notes / demandes spéciales :</label>
    <textarea id="notes" name="notes" placeholder="Ex: Chambre vue mer, régime alimentaire..."></textarea>

    <!-- Bouton -->
    <button type="submit"><i class="fa-solid fa-paper-plane"></i> Réserver maintenant</button>
  </form>
</section>

  <!-- Footer -->
  <footer id="contact">
    <div class="footer-container">
      <div class="footer-block">
        <h3>À propos</h3>
        <p>Votre agence de voyage pour des séjours inoubliables en Tunisie et à l’étranger.</p>
      </div>
      <div class="footer-block">
        <h3>Contact</h3>
        <p>Email : <a href="mailto:contact@S&RVOYAGES.com">contact@S&RVOYAGES.com</a></p>
        <p>Tél : +216 12 345 678</p>
        <p>Adresse : 12 Avenue Habib Bourguiba, Tunis</p>
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

  <a href="#top" class="back-to-top" title="Retour en haut">↑</a>
</body>
</html>