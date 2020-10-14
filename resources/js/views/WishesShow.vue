<template>
  <div>
      <div class="flex justify-between">
            <div class="text-teal-400">
                 Back 
            </div> 
                <div>
                    <router-link :to="'/wish/'+ wish.id + '/edit'" class="px-4 py-2 rounded text-green-500 border border-green-500 text-sm font-bold mr-2">Edit</router-link>
                    <a href="#" class="px-4 py-2 border rounded border-red-500 text-sm font-bold text-red-500"> Delete</a>
            </div>
        </div>
        <div class="pt-6">

            <p  class="pt-6 text-gray-600 text-sm font-bold uppercase">Name of Wish</p>
            <p class="pt-2 text-teal-300">{{wish.name}}</p>
            
             <p class="pt-6 text-gray-600 text-sm font-bold uppercase">What you wished for</p>
            <p class="pt-2 text-teal-300">{{wish.wish}}</p>

        </div>
  </div>
</template>

<script>
export default {
    name:'WishesShow',

    mounted(){
        axios.get('/api/wishes/'+this.$route.params.id)
        .then(response =>{
            this.wish = response.data.data
        })
        .catch(error=> {
            
        })
    },
    
    data: function() {
        return {
            wish: null 
        }
    }
}
</script>

<style>

</style>