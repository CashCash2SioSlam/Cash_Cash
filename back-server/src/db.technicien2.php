<?php
include_once '../back-server/connexion_bdd.php';

// Récuperer liste d'intervention en lien avec un technicien (son id)
function getInterventionTechnicien($conn){
    $sql = "SELECT * FROM intervention WHERE Matricule = '3'";
    $result = $conn->query($sql);
    $interventionsTechnicien = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $interventionsTechnicien[] = $row;
        }
    } 
    return $interventionsTechnicien;
}

// Assurez-vous de définir $conn correctement dans votre fichier connexion_bdd.php

$interventionsTechnicien = getInterventionTechnicien($conn);



