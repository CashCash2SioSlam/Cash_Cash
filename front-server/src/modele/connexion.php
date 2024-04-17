<?php
session_start();

include_once('../../../back-server/connexion_bdd.php');

// Initialize the email field variable
$mail_value = isset($_POST['mail']) ? $_POST['mail'] : '';

// Requete preparer pour formulaire connexion
if (!empty($_POST['mail']) && !empty($_POST['mdp'])) {
    $mail = $_POST['mail'];
    $mdp = $_POST['mdp'];

    $q = $connPDO->prepare('SELECT * FROM employe WHERE mail = :mail');
    $q->bindValue('mail', $mail);
    $q->execute();
    $res = $q->fetch(PDO::FETCH_ASSOC);

    if ($res) { 
        $passwordHash = $res['mdp'];
        if (password_verify($mdp, $passwordHash)) {
            // Vérifier si l'employé est un technicien
            $q_technicien = $connPDO->prepare('SELECT * FROM Technicien WHERE Matricule = :matricule');
            $q_technicien->bindValue(':matricule', $res['Matricule']);
            $q_technicien->execute();
            $is_technicien = $q_technicien->fetch();
            // Vérifier si l'employé est un assistant
            $q_assistant = $connPDO->prepare('SELECT * FROM Assistant WHERE Matricule = :matricule');
            $q_assistant->bindValue(':matricule', $res['Matricule']);
            $q_assistant->execute();
            $is_assistant = $q_assistant->fetch();

            // Redirection en fonction du rôle
            if ($is_technicien) {
                $_SESSION['role'] = '0';
            } else if ($is_assistant) {
                $_SESSION['role'] = '1';
            }

            header('Location: ../../index.php?page=assistantStatistique');
            $_SESSION['Matricule'] = $res['Matricule'];
            $_SESSION['mail'] = $mail;
            $_SESSION['nom'] = $res['NomEmploye'];
            $_SESSION['prenom'] = $res['PrenomEmploye'];
        } else {
            $erreur_mdp = "Identifiant ou Mot de passe incorrect.";
        }
    } else {
        $erreur_mail = "Identifiant ou Mot de passe incorrect.";
    }
}
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - CashCash</title>
    <link rel="stylesheet" href="">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="apple-touch-icon" sizes="180x180" href="resources/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="resources/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="resources/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="resources/img/favicon/site.webmanifest">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>

    <!-- BLOCK FORM CONNEXION -->
    <div class="bg-gray-100 max-w-lg mx-auto rounded-xl mt-20">
        <div>
            <img src="../assets/logo.png" alt="logo cashcash" class="mx-auto w-1/3 mb-10 pt-10">
        </div>
        <div>
            <form id="text-connect" class="mx-auto" method="POST" action="">
                <div class="text-center mx-10">
                    <input type="email" name="mail" autocomplete="off" placeholder="Email" class="rounded-lg w-full p-2" value="<?php echo $mail_value; ?>"><br>
                    <label>
                        <input type="password" name="mdp" autocomplete="off" placeholder="Mot de passe" class="rounded-lg mx-auto w-full mt-5 p-2"><br>
                        <div class="password-icon">
                            <i data-feather="eye"></i>
                            <i data-feather="eye-off"></i>
                        </div>
                    </label>
            </div>



                <!-- ICON SCRIPT -->
                <script src="https://unpkg.com/feather-icons"></script>
                <script>
                    feather.replace();
                </script>

                <script>
                    const eye = document.querySelector(".feather-eye");
                    const eyeoff = document.querySelector(".feather-eye-off");
                    const passwordField = document.querySelector("input[type=password]");

                    eye.addEventListener("click", () => {
                        eye.style.display = "none";
                        eyeoff.style.display = "block";
                        passwordField.type = "text";
                    });

                    eyeoff.addEventListener("click", () => {
                        eyeoff.style.display = "none";
                        eye.style.display = "block";
                        passwordField.type = "password";
                    });
                </script>

                <div style="color: red;">
                    <?php if (isset($erreur_mdp)) echo $erreur_mdp;
                    if (isset($erreur_mail)) echo $erreur_mail; ?>
                </div>
                
                <div class="mx-auto text-center">
                    <input type="submit" class="p-2 rounded-lg bg-white" name="envoi" value="Se connecter" id="btn-send-form">
                </div>
            
                
            
                

            </form>
        </div>
    </div>

</body>
</html>