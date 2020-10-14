<template>
    <div> 
         <div class="flex justify-between">
            <a href="#" class="text-blue-400" @click="$router.back()">
                 Back
            </a>
        </div>  
      <form @submit.prevent="submitForm">
          <InputField name="name" label="Name of your wish" placeholder="Life" :errors="errors" @update:field="form.name= $event" :data="form.name" /> 

          <InputField name="wish" label="What do you wish for?" placeholder="" :errors="errors" @update:field="form.wish= $event" :data="form.wish" /> 
             <div class="flex justify-end ">
                <button class="py-2 px-4 rounded text-red-700 border mr-5 hover:border-red-700 mt-4">Cancel</button>
                <button class="bg-teal-500 py-2 px-4 text-white rounded hover:bg-teal-400 mt-4">Make Wish</button>
            </div>
      </form>
    </div>
</template>

<script>

import InputField from '../components/InputField';

export default {
      
    name: 'WishesCreate',

    components:{
        InputField
    },

    mounted(){
        axios.get('/api/wishes/'+ this.$route.params.id)
        .then(response => {
            // console.log(response.data.data)
            this.form = response.data.data;

            this.loading = false;
        })
        .catch(error =>{
            this.loading = false
            
            if(error.response.status == 404){
                this.$router.push('/wishes')
            }
        })
    },
    data: function(){
        return {
            form: {
                'name':'', 
                'wish':''
                },
            errors:null,
            loading:true
        }
    },
    methods: {
        submitForm: function(){
            axios.patch('/api/wishes/'+ this.$route.params.id,this.form)
            .then(response =>{
                // redirect back after updating
                this.$router.back()
               
            }).catch(errors=>{
                this.errors = errors.response.data.data.errors
            })
        }
    }   
}
</script>

<style>

</style>
