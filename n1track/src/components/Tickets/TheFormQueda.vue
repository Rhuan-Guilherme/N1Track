<script setup>
import { useTicketStore } from '@/stores/ticket'
const store = useTicketStore()

</script>


<template>
<div>
      <div>
         <form @submit.prevent="store.cadastraTicket('queda')" class="flex flex-col gap-6">
           
            <div class="flex gap-3">
               <div class="flex flex-col w-full">
                  <label class="label" for="ramal">Ramal da queda</label>
                  <input v-model="store.ramal" id="ramal" class="input h-10" type="text">
               </div>
            </div>

            <div>
               <button type="submit" class="h-10 w-36 bg-gradient-to-t from-[#0449A4] to-[#006EFF] rounded-md text-md text-cinza-100 font-bold">Registrar</button>
            </div>
         </form>
      </div>
   </div>



</template>

<style scoped>
.label{
   @apply dark:text-[#B8B8B8] mb-1 font-semibold ;
}

.input {
   @apply text-fundo dark:text-white rounded-lg bg-cinza-50 border border-cinza-300 dark:bg-[#292929] dark:border-none;
}

</style>