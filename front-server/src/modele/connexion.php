<?php
session_start();

include_once('log.php'); // Connexion BDD identifiant

$bdd = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

// Initialize the email field variable
$mail_value = isset($_POST['mail']) ? $_POST['mail'] : '';

// Requete preparer pour formulaire connexion
if (!empty($_POST['mail']) && !empty($_POST['mdp'])) {
    $mail = $_POST['mail'];
    $mdp = $_POST['mdp'];

    $q = $bdd->prepare('SELECT * FROM connect_helfy WHERE mail = :mail');
    $q->bindValue('mail', $mail);
    $q->execute();
    $res = $q->fetch(PDO::FETCH_ASSOC);

    if ($res) {
        $passwordHash = $res['mdp'];
        if (password_verify($mdp, $passwordHash)) {
            header('Location: mes-formations.php');
            $_SESSION['mail'] = $mail;
            $_SESSION['nom'] = $res['nom'];
            $_SESSION['prenom'] = $res['prenom'];
            $_SESSION['admin'] = $res['admin'];
        } else {
            $erreur_mdp = "Identifiant ou Mot de passe incorrect.";
        }

        date_default_timezone_set('Europe/Paris');
        $date = date("d/m/Y à H:i:s");
        $nom = $_SESSION['nom'];
        $prenom = $_SESSION['prenom'];
        $mail = $_SESSION['mail'];
        // Créer une chaîne avec les informations de connexion
        $logEntry = "connecté le " . $date . ' | ' . $_SESSION['nom'] . ' ' . $_SESSION['prenom'] . " | " . $_SESSION['mail'] . PHP_EOL;
        // Ajouter cette entrée au fichier de journal
        file_put_contents('log.txt', $logEntry, FILE_APPEND);
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
    <title>Connexion - Helfy</title>
    <link rel="stylesheet" href="css/connexion_utilisateur.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="apple-touch-icon" sizes="180x180" href="resources/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="resources/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="resources/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="resources/img/favicon/site.webmanifest">
    <?php include 'componant/analytics.php'; ?>
</head>

<body>

    <!-- BLOCK FORM CONNEXION -->
    <div id="block-connect">
        <div>
            <img src="resources/img/logo/logo.jpg" alt="logo  entreprise Helfy" class="img-logo-entreprise">
        </div>
        <div id="block-form">
            <form id="text-connect" method="POST" action="">
                <input type="email" name="mail" autocomplete="off" placeholder="Email" class="text-form" value="<?php echo $mail_value; ?>"><br>
                <label>
                    <input type="password" name="mdp" autocomplete="off" placeholder="Mot de passe" class="text-form"><br>

                    <div class="password-icon">
                        <i data-feather="eye"></i>
                        <i data-feather="eye-off"></i>
                    </div>

                </label>

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

                <input type="submit" name="envoi" value="Se connecter" id="btn-send-form">

                <p>Pas encore de compte ? <a href="inscription.php">Créer un compte</a></p><br>

            </form>
        </div>
    </div>

</body>

</html>