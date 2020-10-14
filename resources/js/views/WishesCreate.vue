<template>
    <div>   
      <form @submit.prevent="submitForm">
          <InputField name="name" label="Name of your wish" placeholder="Life" :errors="errors" @update:field="form.name=$event"/>

          <InputField name="wish" label="What do you wish for?" placeholder="" :errors="errors" @update:field="form.wish=$event"/>
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

    data: function(){
        return {
            form:{
                'name':'', 
                'wish':''
                },
            errors:null
        }
    },
    methods: {
        submitForm: function(){
            axios.post('/api/wishes',this.form).then(response =>{

            }).catch(errors=>{
                this.errors = errors.response.data.errors
            })
        }
    }   
}
</script>

<style>

</style>