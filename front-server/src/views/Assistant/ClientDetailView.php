<?php
include_once 'C:\wamp64\www\cashcash_web\cashcash\back-server\src\db.client.php';

?>
<div class="client-details bg-gray-100 p-6 ml-10 mr-10 mt-10 rounded-lg">
    
    <form method="post">
        <div class="grid grid-cols-2 gap-4">
            <h2 class="text-xl font-bold">Détails du client : <?php echo $client['NuméroClient']; ?></h2>
            <div class="flex justify-end">
                <input type="hidden" name="client_id" value="<?php echo $client_id; ?>">
                <button type="submit" name="submit" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md bg-green-500 hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-2 focus:ring-green-500">
                    <img src="../front-server/src/assets/sauvegarder.png" alt="sauvegarder" style="width: 30px; height: 30px;">
                </button>
            </div>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div class="mb-1">
                <label for="NomClient" class="block text-sm font-medium text-gray-700">Nom du client:</label>
                <input type="text" id="NomClient" name="NomClient" value="<?php echo $client['NomClient']; ?>"  placeholder="Exemple: Leroy Merlin" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full px-1 py-1 mt-2 shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
            <div class="mb-1">
                <label for="RaisonSocial" class="block text-sm font-medium text-gray-700">Raison sociale:</label>
                <input type="text" id="RaisonSocial" name="RaisonSocial" value="<?php echo $client['RaisonSocial']; ?>" placeholder="Exemple: SARL" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full px-1 py-1 mt-2 shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div class="mb-1">
                <label for="Siren" class="block text-sm font-medium text-gray-700">SIREN:</label>
                <input type="text" id="Siren" name="Siren" value="<?php echo $client['Siren']; ?>" placeholder="Exemple: 362 521 879 00034" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full px-1 py-1 mt-2 shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
            <div class="mb-1">
                <label for="CodeAPE" class="block text-sm font-medium text-gray-700">Code APE:</label>
                <input type="text" id="CodeAPE" name="CodeAPE" value="<?php echo $client['CodeAPE']; ?>"  placeholder="Exemple: 0111Z" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full px-1 py-1 mt-2 shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
        </div>
        <div class="mb-1">
            <label for="Adresse" class="block text-sm font-medium text-gray-700">Adresse:</label>
            <input type="text" id="Adresse" name="Adresse" value="<?php echo $client['Adresse']; ?>" placeholder="Exemple: 49rue du peuplier 59560 Comines Frances"  class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full px-1 py-1 mt-2 shadow-sm sm:text-sm border-gray-300 rounded-md">
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div class="mb-1">
                <label for="TelClient" class="block text-sm font-medium text-gray-700">Téléphone:</label>
                <input type="tel" id="TelClient" name="TelClient" value="<?php echo $client['TelClient']; ?>" placeholder="Exemple: 0102030405" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full px-1 py-1 mt-2 shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
            <div class="mb-1">
                <label for="Email" class="block text-sm font-medium text-gray-700">Email:</label>
                <input type="email" id="Email" name="Email" value="<?php echo $client['Email']; ?>" placeholder="Exemple: cashcash@gmail.com" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full px-1 py-1 mt-2 shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div class="mb-1">
                <label for="DuréeDeplacement" class="block text-sm font-medium text-gray-700">Durée de déplacement:</label>
                <input type="text" id="DuréeDeplacement" name="DuréeDeplacement" value="<?php echo $client['DuréeDeplacement']; ?>" placeholder="Temps en heure : 1" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full px-1 py-1 mt-2 shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
            <div class="mb-1">
                <label for="DistanceKM" class="block text-sm font-medium text-gray-700">Distance de l'agence:</label>
                <input type="text" id="DistanceKM" name="DistanceKM" value="<?php echo $client['DistanceKM']; ?>" placeholder="Distance en Kilomètre : 1" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full px-1 py-1 mt-2 shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
        </div>
    </form>
</div>
