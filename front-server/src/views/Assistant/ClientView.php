<?php
include_once '../back-server/src/db.client.php';
?>
<div class="client">
  <!-- Formulaire de recherche -->
  <div class="rounded-3xl mr-12 ml-12">
    <div class="my-10 text-center">
        <form method="post">
            <input class="bg-gray-100 rounded-xl px-2 py-2" type="text" name="search" placeholder="Recherche">
            <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
    </div>
    <div class="mx-[60px] text-center">
      <?php if (!empty($clients)): ?>
        <?php foreach ($clients as $client): ?>
          <div class="bg-gray-100 rounded-xl px-3 py-2 mt-2 ml-10 flex justify-between">
            <div>
              <?= $client['RaisonSociale'] ?> - <?= $client['Email'] ?> - <?= $client['TelClient'] ?>
            </div>
            <div class="flex">
              <!-- Formulaire de modification -->          
              <form method="get" action="index.php" class="mr-2">
                  <input type="hidden" name="page" value="ClientDetailView">
                  <input type="hidden" name="client_id" value="<?= $client['NumeroClient'] ?>">
                  <button type="submit" class="bg-green-500 p-1 rounded-lg">
                      <img src="../front-server/src/assets/editer.png" alt="Modifier" style="width: 20px; height: 20px;">
                  </button>
              </form>

              <!-- Formulaire de suppression -->
              <form method="post">
                <input type="hidden" name="client_id" value="<?= $client['NumeroClient'] ?>">
                <button type="submit" name="delete_client" class="bg-red-500 rounded-lg p-1">
                  <img src="../front-server/src/assets/poubelle.png" alt="Supprimer" style="width: 20px; height: 20px;">
                  
                </button>
              </form>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <div class="bg-red-500 py-[10px] rounded-lg x-2 list-none no-underline pl-2">
          Aucun client trouvé
        </div>
      <?php endif; ?>
    </div>
  </div>
</div>
