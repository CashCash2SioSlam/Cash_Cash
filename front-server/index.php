<?php 
session_start();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/assets/style.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/acad72453a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap">
    <title>CashCash</title>
</head>
<body>
    <div class="testtt">
        <header class="header">


            <div class="text-right mr-12 text-sm mt-2">
                <div>
                  <p><?php echo $_SESSION['prenom'] .' '. $_SESSION['nom']; ?></p>  
                </div>
                <div>
                 <p>
                    <?php 
                        if($_SESSION['role'] === '1'){
                            echo "Assistant";
                        }
                        else{
                            echo "Technicien";
                        }
                    ?></p>
                </div>
            </div>
            

        </header>

        <section class="sidebar">
            <div class="flex items-center justify-center">
                <img src="src/assets/logo.png" class="w-28" alt="logo cashcash">
            </div>

            <ul class="flex flex-col text-xl justify-start mx-3 mt-10">

                <?php 

                if($_SESSION['role'] === '1'){ ?> 
                    <li class="mt-1 py-1.5 hover:text-white hover:bg-blue-800 w-full rounded-lg <?php echo ($_GET['page'] === 'statistique') ? 'bg-blue-800 text-white ' : ''; ?>">
                        <a href="index.php?page=assistantStatistique">
                            <p class="pl-8"><i class="fa-solid fa-chart-simple"></i> Dashboard</p>
                        </a>
                    </li>
                    <li class="mt-1 py-1.5 hover:text-white hover:bg-blue-800  w-full rounded-lg <?php echo ($_GET['page'] === 'client') ? 'bg-blue-800 text-white ' : ''; ?>">
                        <a href="index.php?page=assistantClient">
                            <p class="pl-8"><i class="fa-solid fa-user-group"></i> Client</p>
                        </a>
                    </li>
                    <li class="mt-1 py-1.5 hover:text-white hover:bg-blue-800 w-full rounded-lg <?php echo ($_GET['page'] === 'intervention') ? 'bg-blue-800 text-white ' : ''; ?>">
                        <a href="index.php?page=assistantIntervention">
                            <p class="pl-8"><i class="fa-solid fa-truck"></i> Intervention</p>
                        </a>
                    </li>
                    <li class="mt-1 py-1.5 hover:text-white hover:bg-blue-800 w-full rounded-lg <?php echo ($_GET['page'] === 'technicien') ? 'bg-blue-800 text-white ' : ''; ?>">
                        <a href="index.php?page=assistantTechnicien">
                            <p class="pl-8"><i class="fa-solid fa-headset"></i> Technicien</p>
                        </a>
                    </li>
                <?php

                }
                else{?>
                    <li class="mt-1 py-1.5 hover:text-white hover:bg-blue-800 w-full rounded-lg <?php echo ($_GET['page'] === 'technicien') ? 'bg-blue-800 text-white ' : ''; ?>">
                        <a href="index.php?role=assistant&page=technicienIntervention">
                            <p class="pl-8"><i class="fa-solid fa-truck"></i> Intervention</p>
                        </a>
                    </li>
                <?php
                }

                ?>



               







            </ul>
            <div class="absolute bottom-0 mb-10 ml-16 hover:bg-gray-400 py-2 px-3 rounded-lg">
                <a class="mb-0" href="src/modele/validation-deconnexion.php"><i class="fa-solid fa-right-from-bracket"></i> Déconnexion</a>
            </div>
        </section>
        <main class="content rounded-tl-2xl rounded-tr-2xl mr-12"> 
                <?php
                    if (isset($_GET['page'])) {
                        $page = $_GET['page'];

                        switch ($page) {
                            case 'assistantClient':
                                include 'src/views/Assistant/ClientView.php';
                                break;
                                case 'ClientDetailView':
                                    include 'src/views/Assistant/ClientDetailView.php';
                                    break;
                            case 'assistantStatistique':
                                include 'src/views/Assistant/StatistiqueView.php';
                                break;
                            case 'assistantIntervention':
                                include 'src/views/Assistant/InterventionView.php';
                                break;
                                case 'InterventionDetailView':
                                    include 'src/views/Assistant/InterventionDetailView.php';
                                    break;
                            case 'assistantTechnicien':
                                include 'src/views/Assistant/TechnicienView.php';
                                break;
                                case 'TechnicienDetailView':
                                    include 'src/views/Assistant/TechnicienDetailView.php';
                                    break;
                            case 'technicienIntervention':
                                include 'src/views/Technicien/InterventionView.php';
                                break;
                                case 'InterventionDetailView':
                                    include 'src/views/Technicien/TechnicienDetailView.php';
                                    break;  
                            default:
                                echo '<div class="text-blue-400 rounded-2xl">Page introuvable</div>';
                                break;
                        }
                    } else {
                        include 'src/views/Assistant/StatistiqueView.php';
                    }                  
                ?>
            </main>
    </div> 
</body>
</html>
