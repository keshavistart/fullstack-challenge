<script>
export default {
  data: () => ({
    apiResponse: null
  }),

  created() {
    this.fetchData()
  },

  methods: {
    async fetchData() {
      const url = 'http://localhost/fullstack-challenge/api/public/'
      this.apiResponse = await (await fetch(url)).json()
    }
  }
}
</script>

<template>
  <div v-if="!apiResponse">
    Pinging the api...
  </div>

  <div v-if="apiResponse">
    <div  v-for="user in apiResponse.users" >
      <li class=" text-gray-900 ">{{`${user.name}`}}</li>
    </div>       
  </div>
</template>