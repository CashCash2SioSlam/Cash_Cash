<?php
include_once '..\back-server\connexion_bdd.php';

//Fonction qui permet la connexion
function connexion($conn,$email,$mdp){
    $sql = "SELECT * from employe where Email = '$email' AND MotDePasse = '$mdp'";
    $result = $conn->query($sql);
    $clients = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $clients[] = $row;
        }
    }
    return $clients;
}
