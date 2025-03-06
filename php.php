<?php
$host = "localhost"; // Adresse de ton serveur MySQL
$user = "root"; // Ton utilisateur MySQL
$password = "2006"; // Ton mot de passe MySQL
$dbname = "vote_db"; // Le nom de ta base de données

// Connexion à la base de données
$conn = new mysqli($host, $user, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Échec de la connexion: " . $conn->connect_error);
}

// Vérification si un vote a été sélectionné
if (isset($_POST['vote'])) {
    $vote_option = $_POST['vote'];

    // Préparation de la requête SQL pour insérer le vote dans la base de données
    $stmt = $conn->prepare("INSERT INTO votes (vote_option) VALUES (?)");
    $stmt->bind_param("s", $vote_option); // "s" indique que la valeur est une chaîne

    // Exécution de la requête
    if ($stmt->execute()) {
        echo "Merci pour votre vote !";
    } else {
        echo "Erreur: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Veuillez sélectionner une option.";
}

$conn->close();
?>
