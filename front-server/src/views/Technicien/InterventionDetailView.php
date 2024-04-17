<?php
include_once '../back-server/src/db.intervention2.php';
?>

<div class="intervention-details bg-gray-100 p-6 ml-10 mr-10 mt-10 rounded-lg">
    <form method="post">
        <div class="grid grid-cols-2 gap-4">
            <h2 class="text-xl font-bold">Détails de l'intervention : <?php echo $interventionsTechnicien['NumeroIntervention']; ?></h2>
            <div class="flex justify-end">
                <input type="hidden" name="intervention_id" value="<?php echo $intervention_id; ?>">
                <button type="submit" name="submit" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md bg-green-500 hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-2 focus:ring-green-500">
                    <img src="../front-server/src/assets/sauvegarder.png" alt="Sauvegarder" style="width: 30px; height: 30px;">
                </button>
            </div>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div class="mb-1">
                <label for="DateVisite" class="block text-sm font-medium text-gray-700">Date de visite :</label>
                <input type="Date" id="DateVisite" name="DateVisite" value="<?php echo $interventionsTechnicien['DateVisite']; ?>" placeholder="Exemple : 13/01/2024" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full px-1 py-1 mt-2 shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
            <div class="mb-1">
                <label for="HeureVisite" class="block text-sm font-medium text-gray-700">Heure de visite :</label>
                <input type="Hour" id="HeureVisite" name="HeureVisite" value="<?php echo $interventionsTechnicien['HeureVisite']; ?>" placeholder="Exemple : 01:20" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full px-1 py-1 mt-2 shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div class="mb-1">
                <label for="Matricule" class="block text-sm font-medium text-gray-700">Matricule :</label>
                <select id="Matricule" name="Matricule" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full px-1 py-1 mt-2 shadow-sm sm:text-sm border-gray-300 rounded-md">
                    <?php foreach ($interventionsTechnicien as $interventionsTechnicien): ?>
                        <option value="<?php echo $interventionsTechnicien['Matricule']; ?>" <?php echo ($interventionsTechnicien['Matricule'] == $interventionsTechnicien['Matricule']) ? 'selected' : ''; ?>>
                            <?php echo $interventionsTechnicien['Matricule'] . ' - ' . $interventionsTechnicien['Nom'] . ' ' . $interventionsTechnicien['Prenom']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-1">
                <label for="NuméroClient" class="block text-sm font-medium text-gray-700">Numéro du client :</label>
                <input type="text" id="NumeroClient" name="NumeroClient" value="<?php echo $interventionsTechnicien['NumeroClient']; ?>" placeholder="Exemple : 1" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full px-1 py-1 mt-2 shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div class="mb-1">
                <label for="TempsPasse" class="block text-sm font-medium text-gray-700">Temps passé :</label>
                <input type="Hour" id="TempsPasse" name="TempsPasse" value="<?php echo $interventionsTechnicien['TempsPasse']; ?>" placeholder="Exemple : 1" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full px-1 py-1 mt-2 shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
            <div class="mb-1">
                <label for="Commentaire" class="block text-sm font-medium text-gray-700">Commentaire :</label>
                <input type="text" id="Commentaire" name="Commentaire" value="<?php echo $interventionsTechnicien['Commentaire']; ?>" placeholder="Exemple : 1" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full px-1 py-1 mt-2 shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
        </div>
    </form>
</div>
