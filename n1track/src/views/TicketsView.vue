<script setup>
import Navbar from '@/components/layout/TheHeader.vue'
import SelectForm from '@/components/Tickets/SelectForm.vue';
import Formulario from '@/components/Tickets/TheForm.vue'
import Queda from '@/components/Tickets/TheFormQueda.vue'
import Reiteracao from '@/components/Tickets/TheFormReiteracao.vue'
import Transferencia from '@/components/Tickets/TheFormTransferencia.vue'
import AreaCards from '../components/AreaCards/TheAreaCards.vue';
import { useLoginStore } from '@/stores/login'
import { useSelectStore } from '@/stores/selectForm'
const storeSelect = useSelectStore()

const loginStore = useLoginStore()
const dados = loginStore.dadosUsuario


</script>

<template>
   <Navbar />
   <main class="max-w-screen-xl flex flex-col items-center justify-between mx-auto p-4 mt-3 ">
      <div class="w-3/7">
         <SelectForm />
      </div>
      <div class="fundoForm ">
         <Formulario v-if="storeSelect.estado === 'chamado'" />
         <Reiteracao v-if="storeSelect.estado === 'reiteracao'" />
         <Transferencia v-if="storeSelect.estado === 'transferencia'" />
         <Queda v-if="storeSelect.estado === 'queda'" />
      </div>

   </main>
   
   <section class="flex justify-center mt-7 mb-7">
      <AreaCards />
   </section>
</template>

<style scoped>
.fundoForm{
   @apply rounded-lg dark:bg-[#525252] bg-cinza-200 border dark:border-none border-cinza-300 w-5/6 mt-7 p-5 dark:shadow-[0_0_15px_0_rgba(20,20,20,0.25)];
}
</style>
