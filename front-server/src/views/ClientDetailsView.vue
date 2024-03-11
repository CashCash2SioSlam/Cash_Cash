<template>
    <div class="client-details">

      <div class="bg-[#EDEDED] py-[10px] rounded-lg x-2 list-none no-underline pl-2">
         <!--  {{ client.NuméroClient }} - {{ client.NomClient }} - {{ client.Email }} - {{ client.TelClient }} --> 
            <button class="bg-green-500 p-1 rounded-lg text-white" @click="voirPlus(client)">Voir plus</button>
      </div>
    
     
    </div>
  </template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      client: null,
    };
  },
  created() {
    this.fetchClientDetails();
  },
  methods: {
    async fetchClientDetails() {
      try {
        const numeroClient = this.$route.params.numeroClient;
        const response = await axios.get(`http://localhost:3000/client/${numeroClient}`);
        this.client = response.data;
      } catch (error) {
        console.error('Error fetching client details: ', error);
      }
    },
  },
};
</script>
  