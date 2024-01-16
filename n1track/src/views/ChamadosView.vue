<script setup>
import Navbar from '@/components/layout/TheHeader.vue'
import Formulario from '@/components/Tickets/TheForm.vue'
import AreaCardsN2 from '../components/AreaCards/TheAreaCardsN2.vue';
import PreView from '../components/AreaCards/PreView.vue';
import { ref, onMounted } from 'vue'
import { useLoginStore } from '@/stores/login';
import { useSelectStore } from '@/stores/selectForm'
const storeSelect = useSelectStore()
const loginSotre = useLoginStore()

const dadosUsu = ref(loginSotre.dadosUsuario)
</script>

<template>
   <Navbar />
   <!-- <main class="max-w-screen-xl flex flex-col items-center justify-between mx-auto p-4 mt-3 ">
      <div class="w-3/7">
         <SelectForm />
      </div>

      
      <div v-if="dadosUsu.cargo === 'n2'" class="w-full flex justify-center gap-3">
         <div  class="fundoForm flex-initial relative">
            <Formulario />
         </div>

         <div  class="fundoForm2 flex items-center justify-center" >
            <PreView />
         </div>
      </div>

   </main>

   <section class="flex justify-center mt-7 mb-7">
      <AreaCardsN2 />
   </section> -->


   <div class="flex justify-center items-center w-full md:h-96 ">
      <div class="md:w-11/12 dark:md:bg-fundo  p-5 rounded-lg">
         <p class="dark:text-gray-100 text-[24px] leading-[40px]">Infelizmente, devido às políticas de segurança do Supremo, o e-mail que costumávamos utilizar para o encaminhamento de chamados foi bloqueado. Estamos trabalhando para criar uma nova forma de abertura de chamados de segundo nível, onde os tickets serão registrados e encaminhados à fila da equipe de primeiro nível. Pedimos desculpas por qualquer inconveniente e agradecemos pela compreensão enquanto implementamos essas mudanças para garantir a eficiência e segurança do processo.</p>
      </div>
   </div>
    
</template>

<style scoped>
.fundoForm{
   @apply rounded-lg dark:bg-[#525252] bg-cinza-200 border dark:border-none border-cinza-300 w-5/6 mt-10 p-5 dark:shadow-[0_0_15px_0_rgba(20,20,20,0.25)];
}

.fundoForm2{
   @apply rounded-lg dark:bg-[#525252] bg-cinza-200 border dark:border-none border-cinza-300 w-5/6 lg:w-2/6 mt-10 p-2 dark:shadow-[0_0_15px_0_rgba(20,20,20,0.25)];
}
</style>