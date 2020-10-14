<template>
    <div>
        <div v-if="loading">Loading...</div>
        <div v-else>
            <div class="flex justify-between">
            <div class="text-teal-400">
                Back
            </div>
            <div class="relative">
                <router-link :to="'/wish/'+ wish.id + '/edit'"
                    class="px-4 py-2 rounded text-green-500 border border-green-500 text-sm font-bold mr-2">Edit
                </router-link>
                <a href="#" class="px-4 py-2 border rounded border-red-500 text-sm font-bold text-red-500" @click="modal= !modal "> Delete</a>
                <div v-if="modal" class="absolute bg-teal-900 text-white rounded-lg z-20 p-8 w-64 right-0 mr-5 mt-6">
                    <p>Are you sure you want to delete? </p>
                    <div class="flex items-center mt-6 justify-end">
                        <button @click="modal= !modal" class="rounded text-white pr-2 ">Cancel</button>
                        <button class="px-4 py-2 bg-red-500 rounded text-sm font-bold font-white" @click="destroy()">Delete</button>
                    </div>
                </div>

            </div>
                <div v-if="modal" class="bg-black opacity-25  absolute right-0 left-0 top-0 bottom-0 z-10" @click="modal= !modal" ></div>
        </div>
        <div class="pt-6">

            <p class="pt-6 text-gray-600 text-sm font-bold uppercase">Name of Wish</p>
            <p class="pt-2 text-teal-300">{{wish.name}}</p>

            <p class="pt-6 text-gray-600 text-sm font-bold uppercase">What you wished for</p>
            <p class="pt-2 text-teal-300">{{wish.wish}}</p>

        </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'WishesShow',

        mounted() {
            axios.get('/api/wishes/' + this.$route.params.id)
                .then(response => {
                    this.wish = response.data.data
                    this.loading = false
                })
                .catch(error => {
                    this.loading = false

                    // redirect back to wishes page if response is 404
                    if (error.response.status == 404){
                        this.$router.push('/wishes')
                    }
                })
        },

        data: function () {
            return {
                loading: true,
                modal: false,
                wish: null
            }
        },
        methods:{
            destroy: function(){
                axios.delete('/api/wishes/'+ this.$route.params.id)
                .then(response =>{
                    this.$router.push('/wishes')
                })
                .catch(error=> {
                    alert('Error, unable to delete')
                })
            }
        }
    }

</script>

<style>

</style>
