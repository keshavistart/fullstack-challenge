<template>
    <div v-for="user in savedCities" :key="user.id">
      <UserCard :user="user" @click="goToCityView(user)" />
    </div>
    <button @click="getCities" v-if="isHidden" class="
        px-6
        py-2
        font-semibold
        text-white
        bg-weather-secondary
        rounded-md
        hover:opacity-95
        focus:outline-none">Load More</button>
    <p v-if="savedCities.length === 0">
      No locations added. To start tracking a location, search in
      the field above.
    </p>
  </template>
  
  <script setup>
  import axios from "axios";
  import { ref } from "vue";
  import { useRouter } from "vue-router";
  import UserCard from "./UserCard.vue";
  import InfiniteLoading from "v3-infinite-loading";
  
  
  const savedCities = ref([]);
  let page = 1;
  let isHidden= true;
  const getCities = async () => {
        const url = 'http://127.0.0.1:8000?page='+ page
       
       // const response = await (await fetch(url)).json()
        const response = await fetch(url);
        const json = await response.json();
        console.log("json",json);
        
        if (json.data.length < 5 ) isHidden=false;
  
        console.log("isHidden",isHidden);
        savedCities.value.push(...json.data)
        page++;
  
  };
  await getCities();
  
  const router = useRouter();
  const goToCityView = (user) => {
    router.push({
      name: "userView",
      params: { name: user.name, email: user.email },
      query: {
        id: user.id,
        lat: user.latitude,
        lng: user.longitude,
      },
    });
  };
  </script>
  