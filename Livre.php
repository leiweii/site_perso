<?php
// Connexion à la base de données
$servername = "localhost";
$username = "SHI";
$password = "SLL";
$dbname = "romans";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Requête pour récupérer les informations sur les livres depuis la base de données
$sql = "SELECT * FROM romans";
$result = $conn->query($sql);

// Affichage des informations sur les livres dans un tableau
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["nom"]. "</td>";
        echo "<td>" . $row["description"]. "</td>";
        echo "<td><a href='" . $row["lien"]. "' target='_blank'><img src='" . $row["image"]. "' alt='" . $row["nom"]. "'></a></td>";
        echo "</tr>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>
