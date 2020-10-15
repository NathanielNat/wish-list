<template>
  <div>
      <div v-if="loading">Loading...</div>
      <div v-else>
          <div v-if="wishes.length === 0">
              <p>You have no Wishes <router-link to="/wishes/create"> Make a wish</router-link></p>
          </div>
          <div v-for="wish in wishes" class="flex justify-between">
              <div class="py-4">
                  <p class="pt-4  text-gray-600 text-sm py-1">Name of Wish</p>
                   {{wish.name}} 
            <p class="pt-4  text-gray-600 text-sm py-1">Wish Made</p>
                   {{wish.wish}}
              </div>
              <div>
                 <!-- {{this.user.name}} -->
                  <router-link :to="'/wishes/'+ wish.id"
                    class="px-4 py-2 rounded text-teal-500 border border-teal-500 text-sm font-bold mr-2">View
                    <!-- {{this.user.name}} -->
                </router-link>
              </div>
             
          </div>
      </div>
  </div>
</template>

<script>
export default {
    name: 'WishesIndex',
    props: [
        'user'
    ],

    mounted(){
        axios.get('/api/wishes')
        .then(response => {
            this.wishes = response.data.data
            
            this.loading = false
        })
        .catch(error =>{
            this.loading = false
            alert('Unable to fetch Wish')
        })
    },

    data: function(){
        return {
            loading: true,
            wishes:null
        }
    }
}
</script>

<style>

</style>