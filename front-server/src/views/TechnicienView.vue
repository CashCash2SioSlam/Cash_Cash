<template>
  <div class="technicien">
    
<div class=" bg-white rounded-3xl h-full mr-12">


<div class="my-10 text-center">
  <form>
    <input class="bg-[#EDEDED] rounded-xl px-3 py-2 mt-10" type="text" id="" placeholder="Recherche">   <!-- *v-model="searchQuery -->
    <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
  </form>
</div>


      <div class="mx-[60px] bg-[#3241B3] p-3 rounded-2xl overflow-auto max-h-96">
          <li v-for="technicien in techniciens" :key="technicien.Numérotechnicien" class="list-none mt-3">
            <div class="bg-[#EDEDED] py-[10px] rounded-lg x-2 list-none no-underline pl-2">
              {{ technicien.Prénom }} {{ technicien.Nom }} - {{ technicien.TelMobile }} - {{ technicien.Qualification }}
            </div>
          </li>
      </div>

</div>
</div>

</template>


<script>
import axios from 'axios';

export default {
  data() {
    return {
      techniciens: [],
    };
  },
  mounted() {
    this.fetchtechniciens();
  },
  methods: {
    async fetchtechniciens() {
      try {
        const response = await axios.get('http://localhost:3000/technicien');
        this.techniciens = response.data;
      } catch (error) {
        console.error('Error fetching technicien: ', error);
      }
    },
  },
};
</script>

<style>

.technicien{
height: 100%;
}

</style>