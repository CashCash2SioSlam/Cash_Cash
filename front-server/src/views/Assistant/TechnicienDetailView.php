<?php
include_once '../back-server/src/db.technicien.php';

?>

<div class="technicien-details bg-gray-100 p-6 ml-10 mt-10 mr-10 rounded-lg">
    <form method="post">
        <div class="grid grid-cols-2 gap-4">
            <h2 class="text-xl font-bold">Détails du technicien : <?php echo $technicien['Matricule']; ?></h2>
            <div class="flex justify-end">
                <input type="hidden" name="technicien_id" value="<?php echo $technicien_id; ?>">
                <button type="submit" name="submit" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md bg-green-500 hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-2 focus:ring-green-500">
                    <img src="../front-server/src/assets/sauvegarder.png" alt="Sauvegarder" style="width: 30px; height: 30px;">
                </button>
            </div>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div class="mb-1">
                <label for="Nom" class="block text-sm font-medium text-gray-700">Nom :</label>
                <input type="text" id="Nom" name="Nom" value="<?php echo $technicien['Nom']; ?>" placeholder="Exemple: Dupont" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full px-1 py-1 mt-2 shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
            <div class="mb-1">
                <label for="Prénom" class="block text-sm font-medium text-gray-700">Prénom :</label>
                <input type="text" id="Prénom" name="Prénom" value="<?php echo $technicien['Prénom']; ?>" placeholder="Exemple: Jean " class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full px-1 py-1 mt-2 shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div class="mb-1">
                <label for="TelMobile" class="block text-sm font-medium text-gray-700">Téléphone du technicien :</label>
                <input type="tel" id="TelMobile" name="TelMobile" value="<?php echo $technicien['TelMobile']; ?>" placeholder="Exemple: 0102030405" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full px-1 py-1 mt-2 shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
            <div class="mb-1">
                <label for="Qualification" class="block text-sm font-medium text-gray-700">Qualification :</label>
                <input type="Qualification" id="Qualification" name="Qualification" value="<?php echo $technicien['Qualification']; ?>" placeholder="Exemple: BTS " class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full px-1 py-1 mt-2 shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div class="mb-1">
                <label for="DateObtention" class="block text-sm font-medium text-gray-700">Date d'Obtention :</label>
                <input type="Date" id="DateObtention" name="DateObtention" value="<?php echo $technicien['DateObtention']; ?>" placeholder="Exemple: 13/01/2024" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full px-1 py-1 mt-2 shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
            <div class="mb-1">
                <label for="NumeroAgence" class="block text-sm font-medium text-gray-700">Numero d'agence :</label>
                <input type="tel" id="NumeroAgence" name="NumeroAgence" value="<?php echo $technicien['NumeroAgence']; ?>" placeholder="Exemple: 1" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full px-1 py-1 mt-2 shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
        </div>
    </form>
</div>
