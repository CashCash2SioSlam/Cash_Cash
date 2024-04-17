<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "cashcash";

// Création de la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

$connPDO = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
