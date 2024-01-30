<template>
  <div class="client">
    
<div class=" bg-white rounded-3xl h-full mr-12">


<div class="my-10 text-center">
<form>
  <input class="bg-[#EDEDED] rounded-xl px-3 py-2 mt-10" type="text" id="" placeholder="Recherche">   <!-- *v-model="searchQuery -->
  <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
</form>
</div>



    <div class="mx-[60px] bg-[#3241B3] p-3 rounded-2xl">
      <li v-for="intervention in interventions" :key="intervention.NuméroIntervention" class="list-none mt-3">
          <div class="bg-[#EDEDED] py-[10px] rounded-lg x-2 list-none no-underline pl-2">
            {{ intervention.DateVisite }} {{ intervention.HeureVisite }}
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
      interventions: [],
    };
  },
  mounted() {
    this.fetchInterventions();
  },
  methods: {
    async fetchInterventions() {
      try {
        const response = await axios.get('http://localhost:3000/intervention');
        this.interventions = response.data;
      } catch (error) {
        console.error('Error fetching interventions: ', error);
      }
    },
  },
};
</script>


<style>

.client{
height: 100%;
}

</style>