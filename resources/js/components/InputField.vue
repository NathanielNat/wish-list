<template>
        <div class="relative pt-8">
              <label :for="name" class="text-teal-500 text-uppercase font-bold text-small absolute ">{{label}}</label>
              <input :id="name" type="text" class="pt-8 w-full border-b pb-2 focus:outline-none focus:border-teal-400 text-gray-900" :class="erorClassObject()" :placeholder="placeholder" v-model="value" @input="updateField()">
              <p class="text-red-600 text-sm" v-text="errorMessage()">Hi</p>
          </div>
   
</template> 

<script>
    export default {
        name: 'InputField',

        props: [
            'name', 'label', 'placeholder', 'errors'
        ],

        data: function() {
            return {
                value:''
            }
        },
        methods: {
            updateField: function(){
                this.clearErrors(this.name)

               this.$emit('update:field',this.value)  
            },
            errorMessage: function () {
                if(this.errors && this.errors[this.name] && this.errors[this.name].length >0){
                    return  this.errors[this.name][0]
                }
            },
            clearErrors: function(){
                 if(this.errors && this.errors[this.name] && this.errors[this.name].length >0){
                    this.errors[this.name] = null
                }
            },
            erorClassObject: function(){
             return {
                  'error-field': this.errors && this.errors[this.name] && this.errors[this.name].length >0
             }
            }
        }
    }

</script>

<style scoped>
.error-field {
        @apply .border-red-500 .border-b-2
    }
</style>
