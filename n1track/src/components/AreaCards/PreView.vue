<script setup>
import { useTicketStore } from '@/stores/ticket'
import { useSelectStore } from '@/stores/selectForm'
import { useLoginStore } from '@/stores/login';
import { ref, onMounted } from 'vue'
const loginSotre = useLoginStore()
const dadosUsu = ref(loginSotre.dadosUsuario)
const store = useTicketStore()
const storeSelect = useSelectStore()
</script>


<template>
         <div class="flex flex-col justify-center items-center " >
            <div class="w-11/12 h-auto p-3 flex flex-wrap items-center justify-center gap-3">
               <p class="fundoPre w-11/12 text-center">Pré Visualização</p>
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

            <button v-if="dadosUsu.cargo === 'n1'" @click="storeSelect.toogleView()" class="dark:text-white text-center p-4 px-20 max-w-xs relative bg-white dark:bg-[#141414] rounded-lg dark:shadow-[0_0_6px_0_rgba(0,0,0,0.2)] border  dark:border-cinza-800">SAIR</button>
         </div>
</template>

<style scoped>
.fundoPre {
    @apply dark:text-white p-2 font-semibold bg-white dark:bg-[#141414] rounded-lg dark:shadow-[0_0_6px_0_rgba(0,0,0,0.2)] border  dark:border-cinza-800;
}
.fundoCard {
    @apply dark:text-white p-4 max-w-xs w-full relative bg-white dark:bg-[#141414] rounded-lg dark:shadow-[0_0_6px_0_rgba(0,0,0,0.2)] border  dark:border-cinza-800;
}
.fundoForm2{
   @apply rounded-lg dark:bg-[#525252] bg-cinza-200 border dark:border-none border-cinza-300 w-5/6 lg:w-2/6 mt-10 p-2 dark:shadow-[0_0_15px_0_rgba(20,20,20,0.25)];
}
</style>