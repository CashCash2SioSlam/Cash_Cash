<?php
include_once '..\back-server\connexion_bdd.php';

// Fonction pour récupérer les statistiques par technicien pour un mois donné
function getStatisticsByTechnician($conn, $month, $year) {
    $sql = "SELECT 
                technicien.Matricule, 
                COUNT(intervention.NumeroIntervention) AS NombreInterventions, 
                SEC_TO_TIME(SUM(TIME_TO_SEC(controler.TempsPasse))) AS TotalTempsControle 
            FROM 
                technicien 
            LEFT JOIN 
                intervention ON technicien.Matricule = intervention.Matricule 
            LEFT JOIN 
                controler ON intervention.NumeroIntervention = controler.NumeroIntervention ";

    // Ajoute les conditions WHERE en fonction des sélections de mois et d'année
    if ($month !== 0 && $year !== 0) {
        $sql .= " WHERE YEAR(intervention.DateVisite) = $year AND MONTH(intervention.DateVisite) = $month ";
    } elseif ($month !== 0) {
        $sql .= " WHERE MONTH(intervention.DateVisite) = $month ";
    } elseif ($year !== 0) {
        $sql .= " WHERE YEAR(intervention.DateVisite) = $year ";
    }

    $sql .= " GROUP BY technicien.Matricule";
    $result = $conn->query($sql);
    $statistics = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $statistics[] = $row;
        }
    }
    return $statistics;
}

// Fonction pour récupérer le nombre total de techniciens
function getTotalTechnicians($conn) {
    $sql = "SELECT COUNT(*) AS TotalTechnicians FROM technicien";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    return $row['TotalTechnicians'];
}

// Fonction pour récupérer le nombre total de contrats
function getTotalContracts($conn) {
    $sql = "SELECT COUNT(NumeroContrat) AS TotalContracts FROM contrat_de_maintenance";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    return $row['TotalContracts'];
}

// Fonction pour récupérer le nombre total d'interventions
function getTotalInterventions($conn) {
    $sql = "SELECT COUNT(NumeroIntervention) AS TotalInterventions FROM intervention";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    return $row['TotalInterventions'];
}

// Fonction pour récupérer le nombre total de matériel
function getTotalEquipment($conn) {
    $sql = "SELECT COUNT(NumeroSerie) AS TotalEquipment FROM materiel";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    return $row['TotalEquipment'];
}

// Vérifie si le formulaire de statistiques a été soumis
if (isset($_POST['statistic_tech'])) {
    // Vérifie si le mois et l'année sont spécifiés
    if (isset($_POST['month']) && isset($_POST['year'])) {
        // Récupère le mois et l'année depuis le formulaire POST
        $month = intval($_POST['month']);
        $year = intval($_POST['year']);
        $statistics = getStatisticsByTechnician($conn, $month, $year);
    }
}

// Fonction pour récupérer les commentaires de chaque intervention
function getCommentsForInterventions($conn) {
    $sql = "SELECT intervention.NumeroIntervention,
                   controler.Commentaire 
            FROM intervention 
            inner join controler 
            on intervention.NumeroIntervention = controler.NumeroIntervention 
            WHERE controler.Commentaire IS NOT NULL; ";
    $result = $conn->query($sql);
    $comments = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $comments[] = $row;
        }
    }
    return $comments;
}

// Appel de la fonction pour récupérer les commentaires
$comments = getCommentsForInterventions($conn);
?>
