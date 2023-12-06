<script setup>
import { ref } from 'vue'
import Navbar from '@/components/layout/TheHeader.vue'
import SelectForm from '@/components/Tickets/SelectForm.vue';
import Formulario from '@/components/Tickets/TheForm.vue'
import Queda from '@/components/Tickets/TheFormQueda.vue'
import Reiteracao from '@/components/Tickets/TheFormReiteracao.vue'
import Transferencia from '@/components/Tickets/TheFormTransferencia.vue'
import AreaCards from '../components/AreaCards/TheAreaCards.vue';
import { useLoginStore } from '@/stores/login'
import { useSelectStore } from '@/stores/selectForm'
import { useTicketStore } from '@/stores/ticket'
const store = useTicketStore()
const storeSelect = useSelectStore()

const loginStore = useLoginStore()
const dados = loginStore.dadosUsuario

const vizualizacao = ref(false)

function toogleView(){
   vizualizacao.value = !vizualizacao.value
}
</script>

<template>
   <Navbar />
   <main class="max-w-screen-xl flex flex-col items-center justify-between mx-auto p-4 mt-3 ">
      <div class="w-3/7">
         <SelectForm />
      </div>
      <div class="w-full flex justify-center gap-3">
         <div class="fundoForm flex-initial relative">
            <button @click="toogleView()" v-if="vizualizacao == false" class="dark:bg-cinza-700 bg-cinza-200 p-2 hover:bg-azul-50 rounded-t-lg font-semibold text-cinza-900 dark:text-cinza-300 absolute -top-8 right-0"><span class="material-symbols-outlined">visibility</span></button>
            <Formulario v-if="storeSelect.estado === 'chamado'" />
            <Reiteracao v-if="storeSelect.estado === 'reiteracao'" />
            <Transferencia v-if="storeSelect.estado === 'transferencia'" />
            <Queda v-if="storeSelect.estado === 'queda'" />
            
         </div>

         <div class="fundoForm2 flex flex-col justify-center items-center " v-if="storeSelect.estado === 'chamado' && vizualizacao == true">
            <div class="w-11/12 h-auto p-3 flex flex-wrap items-center justify-center gap-3">
               <p class="fundoCard w-11/12 text-center">Pré Vizualização</p>
            </div>
            <div class="w-11/12 h-auto p-3 flex flex-wrap items-center justify-center gap-3">
               <div class="fundoCard">

                  <div class="flex flex-col gap-2 ">
                     <p class="text-cinza-600 dark:text-cinza-300">Prezados, Sr(a). <span class="text-cinza-900 dark:text-cinza-100 font-semibold">{{ store.nome }}</span> entrou em contato <span class="text-cinza-900 dark:text-cinza-100 font-semibold">{{ store.informacao }}</span></p>
                     <p class="text-cinza-600 dark:text-cinza-300">Nome: <span class="text-cinza-900 dark:text-cinza-100 font-semibold">{{ store.nome }}</span></p>
                     <p class="text-cinza-600 dark:text-cinza-300">Login: <span class="text-cinza-900 dark:text-cinza-100 font-semibold">{{ store.login }}</span></p>
                     <p class="text-cinza-600 dark:text-cinza-300">Ramal: <span class="text-cinza-900 dark:text-cinza-100 font-semibold">{{ store.ramal }}</span></p>
                     <p class="text-cinza-600 dark:text-cinza-300">Local: <span class="text-cinza-900 dark:text-cinza-100 font-semibold">{{ store.local }}</span></p>
                     <p class="text-cinza-600 dark:text-cinza-300">Patrimônio: <span class="text-cinza-900 dark:text-cinza-100 font-semibold">{{ store.patrimonio }}</span></p>
                  </div>
               </div>
            </div>

            <button @click="toogleView()" class="dark:text-white text-center p-4 px-20 max-w-xs relative bg-white dark:bg-[#141414] rounded-lg dark:shadow-[0_0_6px_0_rgba(0,0,0,0.2)] border  dark:border-cinza-800">sair</button>
         </div>
      </div>

   </main>
   
   <section class="flex justify-center mt-7 mb-7">
      <AreaCards />
   </section>
</template>

<style scoped>
.fundoCard {
    @apply dark:text-white p-4 max-w-xs w-full relative bg-white dark:bg-[#141414] rounded-lg dark:shadow-[0_0_6px_0_rgba(0,0,0,0.2)] border  dark:border-cinza-800;
}
.fundoForm{
   @apply rounded-lg dark:bg-[#525252] bg-cinza-200 border dark:border-none border-cinza-300 w-5/6 mt-10 p-5 dark:shadow-[0_0_15px_0_rgba(20,20,20,0.25)];
}
.fundoForm2{
   @apply rounded-lg dark:bg-[#525252] bg-cinza-200 border dark:border-none border-cinza-300 w-5/6 lg:w-2/6 mt-10 p-2 dark:shadow-[0_0_15px_0_rgba(20,20,20,0.25)];
}
</style>
