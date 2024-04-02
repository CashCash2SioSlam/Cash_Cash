<?php
include_once '..\back-server\connexion_bdd.php';
function getAllInterventions($conn) {
    $sql = "SELECT * FROM intervention";
    $result = $conn->query($sql);
    $interventions = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $interventions[] = $row;
        }
    }
    return $interventions;
}

function searchInterventions($conn, $date = null, $agent = null) {
    $sql = "SELECT * FROM intervention WHERE 1=1";
    if ($date) {
        $sql .= " AND DateVisite = '$date'";
    }
    if ($agent) {
        $sql .= " AND Matricule = '$agent'";
    }
    // Exécutez la requête SQL
    $result = $conn->query($sql);
    $interventions = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $interventions[] = $row;
        }
    }
    return $interventions;
}

function deleteIntervention($conn, $intervention_id) {
    $sql = "DELETE FROM intervention WHERE NuméroIntervention = '$intervention_id'";
    return $conn->query($sql);
}

function getInterventionById($conn, $intervention_id) {
    $sql = "SELECT intervention.*, controler.TempsPassé, controler.Commentaire FROM intervention inner join controler on intervention.NuméroIntervention=controler.NuméroIntervention WHERE intervention.NuméroIntervention = '$intervention_id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return null;
    }
}

function getClientAgency($conn, $client_id) {
    $sql = "SELECT NumeroAgence FROM client WHERE NuméroClient = '$client_id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['NumeroAgence'];    
    } else {
        return null;
    }
}

function getTechniciansInAgency($conn, $agency) {
    $sql = "SELECT Matricule, Nom, Prénom FROM technicien WHERE NumeroAgence = '$agency'";
    $result = $conn->query($sql);
    $technicians = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $technicians[] = $row;
        }
    }
    return $technicians;
}



function updateIntervention($conn, $intervention_id, $new_data) {
    // Construction de la requête SQL pour mettre à jour l'intervention
    $sql = "UPDATE intervention SET ";
    foreach ($new_data as $key => $value) {
        // Exclure les champs 'TempsPassé' et 'Commentaire' de la mise à jour de l'intervention
        if ($key !== 'TempsPassé' && $key !== 'Commentaire') {
            $sql .= "$key = '$value', ";
        }
    }
    // Supprimer la virgule et l'espace en trop à la fin de la requête SQL
    $sql = rtrim($sql, ', ');
    $sql .= " WHERE NuméroIntervention = '$intervention_id'";
    
    // Exécution de la requête SQL pour mettre à jour l'intervention
    $updateInterventionResult = $conn->query($sql);
    
    // Si la mise à jour de l'intervention est réussie, mettre à jour les champs 'TempsPassé' et 'Commentaire' dans la table 'controler'
    if ($updateInterventionResult) {
        // Récupérer les nouvelles valeurs de 'TempsPassé' et 'Commentaire' depuis les données mises à jour
        $tempsPasse = $new_data['TempsPassé'] ?? null;
        $commentaire = $new_data['Commentaire'] ?? null;
        
        // Construction de la requête SQL pour mettre à jour 'TempsPassé' et 'Commentaire' dans la table 'controler'
        $updateControlerSql = "UPDATE controler SET TempsPassé = '$tempsPasse', Commentaire = '$commentaire' WHERE NuméroIntervention = '$intervention_id'";

        // Exécution de la requête SQL pour mettre à jour 'TempsPassé' et 'Commentaire' dans la table 'controler'
        $updateControlerResult = $conn->query($updateControlerSql);

        // Vérifier si la mise à jour de 'TempsPassé' et 'Commentaire' dans la table 'controler' est réussie
        if (!$updateControlerResult) {
            // En cas d'échec, afficher un message d'erreur
            echo "Erreur lors de la mise à jour de TempsPassé et Commentaire dans la table controler : " . $conn->error;
        }
    } else {
        // En cas d'échec de la mise à jour de l'intervention, afficher un message d'erreur
        echo "Erreur lors de la mise à jour de l'intervention : " . $conn->error;
    }
    
    // Retourner le résultat de la mise à jour de l'intervention
    return $updateInterventionResult;
}


$interventions = getAllInterventions($conn);

if (isset($_POST['date']) && isset($_POST['agent']) ) {
    $date = $_POST['date'];
    $agent = $_POST['agent'];
    $interventions = searchInterventions($conn,$date,$agent);
}

if (isset($_POST['delete_intervention'])) {
    $intervention_id = $_POST['intervention_id'];
    if (deleteIntervention($conn, $intervention_id)) {
        $interventions = getAllInterventions($conn);
    } else {
        echo "Erreur lors de la suppression de l'intervention : " . $conn->error;
    }
}

if(isset($_GET['intervention_id'])) {
    $intervention_id = $_GET['intervention_id'];
    $intervention = getInterventionById($conn, $intervention_id);
    
    // Récupération de l'agence du client associé à cette intervention
    $client_agency = getClientAgency($conn, $intervention['NuméroClient']);
    
    // Récupération des techniciens dans l'agence du client
    $technicians = getTechniciansInAgency($conn, $client_agency);
    
    if($intervention) {
        include_once 'C:\wamp64\www\cashcash_web\cashcash\front-server\src\views\Assistant\InterventionDetailView.php';
    } else {
        echo "Intervention introuvable.";
    }
    if (isset($_POST['submit'])) {
        $intervention_id = $_POST['intervention_id'];
        $new_data = array();
        
        if (!empty($_POST['DateVisite'])) {
            $new_data['DateVisite'] = $_POST['DateVisite'];
        }
        if (!empty($_POST['HeureVisite'])) {
            $new_data['HeureVisite'] = $_POST['HeureVisite'];
        }
        if (!empty($_POST['Matricule'])) {
            $new_data['Matricule'] = $_POST['Matricule'];
        }
        if (!empty($_POST['NuméroClient'])) {
            $new_data['NuméroClient'] = $_POST['NuméroClient'];
        }
        if (!empty($_POST['TempsPassé'])) {
            $new_data['TempsPassé'] = $_POST['TempsPassé'];
        }
        if (!empty($_POST['Commentaire'])) {
            $new_data['Commentaire'] = $_POST['Commentaire'];
        }
    
        if (!empty($new_data)) {
            if (updateIntervention($conn, $intervention_id, $new_data)) {
                $intervention = getInterventionById($conn, $intervention_id);
                if ($intervention) {
                    echo '<div style="text-align: center; color: green;">Les modifications ont été enregistrées avec succès.</div>';
                    include_once 'C:\wamp64\www\cashcash_web\cashcash\front-server\src\views\Assistant\InterventionDetailView.php';
                } else {
                    echo '<div style="text-align: center; color: red;">Erreur : L\'intervention n\'existe pas.</div>';
                }
            } else {
                echo '<div style="text-align: center; color: red;">Erreur lors de l\'enregistrement des modifications.</div>';
            }
        } else {
            echo '<div style="text-align: center;">Aucune modification n\'a été apportée.</div>';
        }
    }
}
$conn->close();
?>
