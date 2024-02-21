<!DOCTYPE html>
<html>
<head>
    <title>Affichage des Utilisateurs</title>
</head>
<body>

<h1>Liste des Utilisateurs</h1>

<?php
// Informations de connexion à la base de données
$serveur = "172.19.7.11";
$utilisateur = "root";
$motDePasse = "admin";
$baseDeDonnees = "Medigroup";

// Connexion à la base de données
$connexion = new mysqli($serveur, $utilisateur, $motDePasse, $baseDeDonnees);

// Vérification de la connexion
if ($connexion->connect_error) {
    die("Échec de la connexion à la base de données : " . $connexion->connect_error);
}

// Requête SQL pour récupérer les utilisateurs depuis la table Utilisateurs
$sql = "SELECT Prenom, Nom FROM Utilisateurs";

$resultat = $connexion->query($sql);

if ($resultat->num_rows > 0) {
    // Afficher les résultats
    echo "<ul>";
    while ($row = $resultat->fetch_assoc()) {
    echo "<li>Prenom: " . $row["Prenom"] . ", Nom: " . $row["Nom"] . "</li>";

    }
    echo "</ul>";
} else {
    echo "Aucun utilisateur trouvé.";
}

// Fermer la connexion à la base de données
$connexion->close();
?>


</body>
</html>
