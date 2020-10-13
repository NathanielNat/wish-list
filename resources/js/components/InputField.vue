<template>
        <div class="relative pt-8">
              <label :for="name" class="text-teal-500 text-uppercase font-bold text-small absolute ">{{label}}</label>
              <input :id="name" type="text" class="pt-8 w-full border-b pb-2 focus:outline-none focus:border-teal-400 text-gray-900" :placeholder="placeholder" v-model="value" @input="updateField()">
          </div>
   
</template> 

<script>
    export default {
        name: 'InputField',

        props: [
            'name', 'label', 'placeholder', 'data'
        ],

        data: function() {
            return {
                value:''
            }
        },
        methods: {
            updateField: function(){
               this.$emit('update:field',this.value)  
            }
        }
    }

</script>

<style>

</style>
