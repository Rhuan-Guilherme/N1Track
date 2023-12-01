<script setup>
import Navbar from '@/components/layout/TheHeader.vue'
import Formulario from '@/components/Tickets/TheForm.vue'
import AreaCardsN2 from '../components/AreaCards/TheAreaCardsN2.vue';
import { ref, onMounted } from 'vue'
import { useLoginStore } from '@/stores/login';
const loginSotre = useLoginStore()

const dadosUsu = ref(loginSotre.dadosUsuario)
</script>

<template>
   <Navbar />
   <main class="max-w-screen-xl flex flex-col items-center justify-between mx-auto p-4 mt-3 ">
      <div class="w-3/7">
         <SelectForm />
      </div>
      <div v-if="dadosUsu.cargo === 'n2'" class="fundoForm ">
         <Formulario />
         
      </div>

   </main>

   <section class="flex justify-center mt-7 mb-7">
      <AreaCardsN2 />
   </section>
    
</template>

<style scoped>
.fundoForm{
   @apply rounded-lg dark:bg-[#525252] bg-cinza-200 border dark:border-none border-cinza-300 w-5/6 mt-7 p-5 dark:shadow-[0_0_15px_0_rgba(20,20,20,0.25)];
}
</style>