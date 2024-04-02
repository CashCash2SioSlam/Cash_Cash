<?php
include_once '..\back-server\connexion_bdd.php';

// Fonction pour récupérer tous les clients depuis la base de données
function getAllClients($conn) {
    $sql = "SELECT * FROM client";
    $result = $conn->query($sql);
    $clients = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $clients[] = $row;
        }
    }
    return $clients;
}

// Fonction pour rechercher des clients par nom
function searchClients($conn, $client_nom) {
    $sql = "SELECT * FROM client WHERE NomClient LIKE '%$client_nom%'";
    $result = $conn->query($sql);
    $clients = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $clients[] = $row;
        }
    }
    return $clients;
}

// Fonction pour supprimer un client
function deleteClient($conn, $client_id) {
    $sql = "DELETE FROM client WHERE NuméroClient = $client_id";
    return $conn->query($sql);
}

// Fonction pour récupérer les informations d'un client par son ID
function getClientById($conn, $client_id) {
    $sql = "SELECT * FROM client WHERE NuméroClient = $client_id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return null;
    }
}

// Fonction pour mettre à jour les informations d'un client
function updateClient($conn, $client_id, $new_data) {
    // Construction de la requête SQL pour mettre à jour les informations du client
    $sql = "UPDATE client SET ";
    foreach ($new_data as $key => $value) {
        $sql .= "$key = '$value', ";
    }
    // Supprimer la virgule et l'espace en trop à la fin de la requête SQL
    $sql = rtrim($sql, ', ');
    $sql .= " WHERE NuméroClient = $client_id";
    
    // Exécution de la requête SQL
    return $conn->query($sql);
}


// Appel de la fonction pour récupérer tous les clients
$clients = getAllClients($conn);

// Traitement de la recherche si le formulaire de recherche est soumis
if (isset($_POST['search'])) {
    $client_nom = $_POST['search'];
    $clients = searchClients($conn, $client_nom);
}

// Traitement de la suppression si le formulaire est soumis
if (isset($_POST['delete_client'])) {
    $client_id = $_POST['client_id'];
    if (deleteClient($conn, $client_id)) {
        // Actualiser la liste des clients après la suppression
        $clients = getAllClients($conn);
    } else {
        echo "Erreur lors de la suppression du client : " . $conn->error;
    }
}

// Vérifier si l'ID du client est spécifié dans l'URL
if(isset($_GET['client_id'])) {
    // Récupérer l'ID du client depuis l'URL
    $client_id = $_GET['client_id'];
    // Récupérer les informations du client
    $client = getClientById($conn, $client_id);
    if($client) {
          include_once 'C:\wamp64\www\cashcash_web\cashcash\front-server\src\views\Assistant\ClientDetailView.php';
        } else {
            echo "Client introuvable.";
        }
    }

    if (isset($_POST['submit'])) {
        // Récupérer l'ID du client depuis le formulaire
        $client_id = $_POST['client_id'];
        // Récupérer les données mises à jour depuis le formulaire
        $new_data = array();
        // Récupérer les valeurs des champs de formulaire et les ajouter ici
        if (!empty($_POST['NomClient'])) {
            $new_data['NomClient'] = $_POST['NomClient'];
        }
        if (!empty($_POST['RaisonSocial'])) {
            $new_data['RaisonSocial'] = $_POST['RaisonSocial'];
        }
        if (!empty($_POST['Siren'])) {
            $new_data['Siren'] = $_POST['Siren'];
        }
        if (!empty($_POST['CodeAPE'])) {
            $new_data['CodeAPE'] = $_POST['CodeAPE'];
        }
        if (!empty($_POST['Adresse'])) {
            $new_data['Adresse'] = $_POST['Adresse'];
        }
        if (!empty($_POST['TelClient'])) {
            $new_data['TelClient'] = $_POST['TelClient'];
        }
        if (!empty($_POST['Email'])) {
            $new_data['Email'] = $_POST['Email'];
        }
        if (!empty($_POST['DuréeDeplacement'])) {
            $new_data['DuréeDeplacement'] = $_POST['DuréeDeplacement'];
        }
        if (!empty($_POST['DistanceKM'])) {
            $new_data['DistanceKM'] = $_POST['DistanceKM'];
        }
    
        // Vérifier si des données ont été mises à jour
        if (!empty($new_data)) {
            // Mettre à jour les informations du client dans la base de données
            if (updateClient($conn, $client_id, $new_data)) {
                // Récupérer à nouveau les informations du client après la mise à jour
                $client = getClientById($conn, $client_id);
                // Vérifier si le client existe
                if ($client) {
                    // Afficher les informations mises à jour
                    echo '<div style="text-align: center; color: green;">Les modifications ont été enregistrées avec succès.</div>';
                    // Inclure la vue pour afficher les détails du client
                    include_once 'C:\wamp64\www\cashcash_web\cashcash\front-server\src\views\Assistant\ClientDetailView.php';
                } else {
                    echo '<div style="text-align: center; color: red;">Erreur : Le client n\'existe pas.</div>';
                }
            } else {
                echo '<div style="text-align: center; color: red;">Erreur lors de l\'enregistrement des modifications.</div>';
            }
        } else {
            echo '<div style="text-align: center;">Aucune modification n\'a été apportée.</div>';
        }
    }
    
    
$conn->close();
?>
