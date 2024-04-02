<?php
include_once '..\back-server\connexion_bdd.php';

// Fonction pour récupérer tous les techniciens depuis la base de données
function getAllTechniciens($conn) {
    $sql = "SELECT * FROM technicien";
    $result = $conn->query($sql);
    $techniciens = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $techniciens[] = $row;
        }
    }
    return $techniciens;
}

// Fonction pour rechercher des techniciens par nom
function searchTechniciens($conn, $technicien_nom) {
    $sql = "SELECT * FROM technicien WHERE Nom LIKE '%$technicien_nom%'";
    $result = $conn->query($sql);
    $techniciens = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $techniciens[] = $row;
        }
    }
    return $techniciens;
}

// Fonction pour supprimer un technicien
function deleteTechnicien($conn, $technicien_id) {
    $sql = "DELETE FROM technicien WHERE Matricule = '$technicien_id'";
    return $conn->query($sql);
}

// Fonction pour récupérer les informations d'un technicien par son ID
function getTechnicienById($conn, $technicien_id) {
    $sql = "SELECT * FROM technicien WHERE Matricule = '$technicien_id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return null;
    }
}

// Fonction pour mettre à jour les informations d'un technicien
function updateTechnicien($conn, $technicien_id, $new_data) {
    // Construction de la requête SQL pour mettre à jour les informations du technicien
    $sql = "UPDATE technicien SET ";
    foreach ($new_data as $key => $value) {
        $sql .= "$key = '$value', ";
    }
    // Supprimer la virgule et l'espace en trop à la fin de la requête SQL
    $sql = rtrim($sql, ', ');
    $sql .= " WHERE Matricule = '$technicien_id'";
    
    // Exécution de la requête SQL
    return $conn->query($sql);
}

// Appel de la fonction pour récupérer tous les techniciens
$techniciens = getAllTechniciens($conn);

// Traitement de la recherche si le formulaire de recherche est soumis
if (isset($_POST['search'])) {
    $technicien_nom = $_POST['search'];
    $techniciens = searchTechniciens($conn, $technicien_nom);
}

// Traitement de la suppression si le formulaire est soumis
if (isset($_POST['delete_technicien'])) {
    $technicien_id = $_POST['technicien_id'];
    if (deleteTechnicien($conn, $technicien_id)) {
        // Actualiser la liste des techniciens après la suppression
        $techniciens = getAllTechniciens($conn);
    } else {
        echo "Erreur lors de la suppression du technicien : " . $conn->error;
    }
}

// Vérifier si l'ID du technicien est spécifié dans l'URL
if(isset($_GET['technicien_id'])) {
    // Récupérer l'ID du technicien depuis l'URL
    $technicien_id = $_GET['technicien_id'];
    // Récupérer les informations du technicien
    $technicien = getTechnicienById($conn, $technicien_id);
    if($technicien) {
        include_once 'C:\wamp64\www\cashcash_web\cashcash\front-server\src\views\Assistant\TechnicienDetailView.php';
    } else {
        echo "Technicien introuvable.";
    }
    // Vérifier si le formulaire de mise à jour a été soumis
    if (isset($_POST['submit'])) {
        // Récupérer l'ID du technicien depuis le formulaire
        $technicien_id = $_POST['technicien_id'];
        // Récupérer les données mises à jour depuis le formulaire
        $new_data = array();
        // Récupérer les valeurs des champs de formulaire et les ajouter ici
        if (!empty($_POST['Nom'])) {
            $new_data['Nom'] = $_POST['Nom'];
        }
        if (!empty($_POST['Prénom'])) {
            $new_data['Prénom'] = $_POST['Prénom'];
        }
        if (!empty($_POST['TelMobile'])) {
            $new_data['TelMobile'] = $_POST['TelMobile'];
        }
        if (!empty($_POST['Qualification'])) {
            $new_data['Qualification'] = $_POST['Qualification'];
        }
        
        if (!empty($_POST['DateObtention'])) {
            $new_data['DateObtention'] = $_POST['DateObtention'];
        }
        if (!empty($_POST['NumeroAgence'])) {
            $new_data['NumeroAgence'] = $_POST['NumeroAgence'];
        }

        // Vérifier si des données ont été mises à jour
        if (!empty($new_data)) {
            // Mettre à jour les informations du technicien dans la base de données
            if (updateTechnicien($conn, $technicien_id, $new_data)) {
                // Actualiser la vue des détails du technicien
                $technicien = getTechnicienById($conn, $technicien_id);
                if ($technicien) {
                    echo '<div style="text-align: center; color: green;">Les modifications ont été enregistrées avec succès.</div>';
                    include_once 'C:\wamp64\www\cashcash_web\cashcash\front-server\src\views\Assistant\TechnicienDetailView.php';
                } else {
                    echo '<div style="text-align: center; color: red;">Erreur : Le technicien n\'existe pas.</div>';
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
