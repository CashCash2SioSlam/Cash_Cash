<?php
include_once 'C:\wamp64\www\cashcash_web\cashcash\back-server\src\db.statistique.php';
?>

<!-- Images alignées tout en haut -->
<div class="grid grid-cols-3 gap-4">
    <div class="col-span-2">
        <div class="flex justify-center mb-3 mt-3 ml-10 ">
            <div class="border-2 border-black rounded p-3 mr-10">
                <img src="../front-server/src/assets/technicien.png" alt="technicien" style="width: 50px; height: 50px;">
                <div>Techniciens : <?php echo getTotalTechnicians($conn); ?></div>
            </div>
            <div class="border-2 border-black rounded p-3 mr-10">
                <img src="../front-server/src/assets/contrat.png" alt="contrat" style="width: 50px; height: 50px;">
                <div>Contrats : <?php echo getTotalContracts($conn); ?></div>
            </div>
            <div class="border-2 border-black rounded p-3 mr-10">
                <img src="../front-server/src/assets/intervention.png" alt="intervention" style="width: 50px; height: 50px;">
                <div>Interventions : <?php echo getTotalInterventions($conn); ?></div>
            </div>
            <div class="border-2 border-black rounded p-3 mr-10">
                <img src="../front-server/src/assets/materiel.png" alt="materiel" style="width: 50px; height: 50px;">
                <div>Matériel : <?php echo getTotalEquipment($conn); ?></div>
            </div>
        </div>
        <!-- Statistiques -->
        <div class="statistiques bg-gray-100 p-6 rounded-3xl ml-10">
        
            <!-- Formulaire pour sélectionner le mois et l'année -->
            <form method="post" class="mb-4">
                <label for="month" class="mr-2">Mois :</label>
                <select name="month" id="month" class="mr-4">
                    <option value="0">Tous les mois</option>
                    <?php for ($i = 1; $i <= 12; $i++): ?>
                        <option value="<?= $i ?>"><?= date("F", mktime(0, 0, 0, $i, 1)) ?></option>
                    <?php endfor; ?>
                </select>

                <label for="year" class="mr-2">Année :</label>
                <select name="year" id="year" class="mr-4">
                    <option value="0">Toutes les années</option>
                    <?php for ($i = date("Y"); $i >= 1900; $i--): ?>
                        <option value="<?= $i ?>"><?= $i ?></option>
                    <?php endfor; ?>
                </select>
                <!-- <button type="submit" name="statistic_tech" class="bg-blue-500 text-white px-4 py-2 rounded">Afficher</button> -->
                <button type="submit"  name="statistic_tech"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>

            <!-- Affichage des statistiques -->
            <?php if (isset($statistics) && !empty($statistics)): ?>
                <table class="w-full mb-4">
                    <thead>
                        <tr>
                            <th class="border px-4 py-2">Matricule</th>
                            <th class="border px-4 py-2">Prénom</th>
                            <th class="border px-4 py-2">Nom</th>
                            <th class="border px-4 py-2">Nombres d'interventions</th>
                            <th class="border px-4 py-2">Temps de contrôle</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($statistics as $statistic): ?>
                            <tr>
                                <td class="border px-4 py-2"><?= $statistic['Matricule'] ?></td>
                                <td class="border px-4 py-2"><?= $statistic['Prénom'] ?></td>
                                <td class="border px-4 py-2"><?= $statistic['Nom'] ?></td>
                                <td class="border px-4 py-2"><?= $statistic['NombreInterventions'] ?></td>
                                <td class="border px-4 py-2"><?= $statistic['TotalTempsControle'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php elseif (isset($_POST['statistic_tech'])): ?>
                <p class="mb-4">Aucune statistique disponible pour ce mois.</p>
            <?php endif; ?>
        </div>
    </div>
    <!-- Bandeau sur la droite pour afficher les commentaires --> 
    <div class="col-span-1">
        <div class="commentaires mt-3 bg-blue-800 p-6 rounded-3xl mr-10"> 
            <!-- Affichage des commentaires -->
            <?php if (!empty($comments)): ?>
                <?php foreach ($comments as $comment): ?>
                    <div class="bg-white rounded-3xl p-3 mb-2">
                        <p class="font-bold">Intervention <?= $comment['NuméroIntervention'] ?></p>
                        <p><?= $comment['Commentaire'] ?></p>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Aucun commentaire disponible.</p>
            <?php endif; ?>
        </div>
    </div>
</div>