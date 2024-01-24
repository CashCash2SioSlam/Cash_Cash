<template>
  <div class="testtt">
    <header class=" col-span-1 row-span-1">
    
    </header>

    <section class=" col-span-1 row-span-2 p-4">
      <div class="flex items-center justify-center">
        <img src="@/assets/logo.png" class="w-28" alt="logo cashcash">
      </div>

      
      <ul class="flex flex-col text-xl justify-start">
          <router-link to="/client">
            <li :class="{ 'text-white bg-[#3241B3]': $route.path === '/client' }" class="mt-1 py-[6px] hover:text-white hover:bg-[#3241B3] w-full rounded-lg">
              <p class="pl-8"><i class="fa-solid fa-user-group"></i> Clients</p>
            </li>
          </router-link>

          <router-link to="/statistique">
            <li :class="{ 'text-white bg-[#3241B3]': $route.path === '/statistique' }" class="mt-1 py-[6px] hover:text-white hover:bg-[#3241B3] w-full rounded-lg">
              <p class="pl-8"><i class="fa-solid fa-chart-simple"></i> Statistiques</p>
            </li>
          </router-link>
        
          <router-link to="/intervention">
            <li :class="{ 'text-white bg-[#3241B3]': $route.path === '/intervention' }" class="mt-1 py-[6px] hover:text-white hover:bg-[#3241B3] w-full rounded-lg">
              <p class="pl-8"><i class="fa-solid fa-truck"></i> Interventions</p>
            </li>
          </router-link>

          <router-link to="/technicien">
            <li :class="{ 'text-white bg-[#3241B3]': $route.path === '/technicien' }" class=" mt-1 py-[6px] hover:text-white hover:bg-[#3241B3] w-full rounded-lg">
              <p class="pl-8"><i class="fa-solid fa-headset"></i> Techniciens</p>
            </li>
          </router-link>
    </ul>







    </section>

    <main class="col-span-1 row-span-1">
      <router-view />
    </main>
  </div>



</template>

<style scoped>

.testtt{
height: 100vh;
display: grid;

grid-template-columns: 300px 1fr;
grid-template-rows: 60px 1fr;

}


header{
grid-column: 2 / 3;
grid-row: 1 / 2;
}






</style>