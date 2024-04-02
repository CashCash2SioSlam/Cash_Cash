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
    <title>CashCash</title>
</head>
<body>
    <div class="testtt">
        <header class="header"></header>

        <section class="sidebar">
            <div class="flex items-center justify-center">
                <img src="src/assets/logo.png" class="w-28" alt="logo cashcash">
            </div>

            <ul class="flex flex-col text-xl justify-start mx-3">
                <li class="mt-1 py-1.5 hover:text-white hover:bg-blue-800 w-full rounded-lg">
                    <a href="index.php?page=statistique">
                        <p class="pl-8"><i class="fa-solid fa-chart-simple"></i> Dashboard</p>
                    </a>
                </li>
                <li class="mt-1 py-1.5 hover:text-white hover:bg-blue-800  w-full rounded-lg">
                    <a href="index.php?page=client">
                        <p class="pl-8"><i class="fa-solid fa-user-group"></i> Client</p>
                    </a>
                </li>
                <li class="mt-1 py-1.5 hover:text-white hover:bg-blue-800 w-full rounded-lg">
                    <a href="index.php?page=intervention">
                        <p class="pl-8"><i class="fa-solid fa-truck"></i> Intervention</p>
                    </a>
                </li>
                <li class="mt-1 py-1.5 hover:text-white hover:bg-blue-800 w-full rounded-lg">
                    <a href="index.php?page=technicien">
                        <p class="pl-8"><i class="fa-solid fa-headset"></i> Technicien</p>
                    </a>
                </li>

                <!-- TEST pour le côté technicien -->
                <li class="mt-1 py-1.5 hover:text-white hover:bg-blue-800 w-full rounded-lg">
                    <a href="index.php?page=interventiontech">
                        <p class="pl-8"><i class="fa-solid fa-truck"></i> Intervention Tech</p>
                    </a>
                </li>
            </ul>
        </section>
        <main class="content rounded-tl-2xl rounded-tr-2xl mr-12"> 
                <?php
                    if (isset($_GET['page'])) {
                        $page = $_GET['page'];
                        switch ($page) {
                            case 'client':
                                include 'src/views/Assistant/ClientView.php';
                                break;
                                case 'ClientDetailView':
                                    include 'src/views/Assistant/ClientDetailView.php';
                                    break;
                            case 'statistique':
                                include 'src/views/Assistant/StatistiqueView.php';
                                break;
                            case 'intervention':
                                include 'src/views/Assistant/InterventionView.php';
                                break;
                                case 'InterventionDetailView':
                                    include 'src/views/Assistant/InterventionDetailView.php';
                                    break;
                            case 'technicien':
                                include 'src/views/Assistant/TechnicienView.php';
                                break;
                                case 'TechnicienDetailView':
                                    include 'src/views/Assistant/TechnicienDetailView.php';
                                    break;

                            // TEST Côté TECHNICIEN
                            case 'interventiontech':
                                include 'src/views/Technicien/InterventionView.php';
                                break;
                                case 'InterventionAffectView':
                                    include 'src/views/Technicien/InterventionDetailView.php';
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
