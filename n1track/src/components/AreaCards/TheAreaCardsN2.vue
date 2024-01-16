<script setup>
import { useReturnN2Store } from '@/stores/returnTicketN2'
import { initFlowbite } from 'flowbite'
import Chamado from './cardsOption/TheChamado.vue';
import ModalEdit from './ModalEdit.vue'
import { ref, onMounted } from 'vue'



onMounted(() => {
    initFlowbite();
})

const store = useReturnN2Store()

store.fetchUserData()

</script>

<template>
    <!-- <div class="fundo w-11/12 h-auto p-3 flex flex-wrap items-center justify-center gap-3 ">
        
        <div v-for="dados in store.userData" :key="dados.id" :class="{ 'ativado': dados.status == 'Fechado' }"
            class="fundoCard ">
            <div :class="{ 'ativoDentro': dados.status == 'Fechado' }">
                <div  class="flex flex-col gap-3">
                    <div class="flex flex-col gap-2">
                        <div class="flex text-sm text-cinza-400">Criador por {{ dados.criador.split(' ')[0] }}</div>
                        <div class="flex items-center gap-2">
                            <div class="flex ">{{ dados.nome.split(' ')[0] }} - {{ dados.ramal }}</div>
                            <div>
                                <div class="specChamado w-auto px-2 h-5 text-[12px] flex items-center justify-center gap-2 font-bold">
                                    <div class="bolChamado  w-2 h-2 rounded-full " :class="{ 'econdeAtivo': status == 'Fechado' }"></div> 
                                    <span class="dark:text-[#a9d1b3] text-green-900">Chamado N2</span>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="bg-cinza-800 h-[1px] "></div>
                    <div class="flex flex-col gap-2" >
                        <Chamado v-if="dados.tipo == 'chamado'"
                            :nome="dados.nome"
                            :informacao="dados.informacao"
                            :login="dados.login"
                            :ramal="dados.ramal"
                            :local="dados.local"
                            :patrimonio="dados.patrimonio"
                        />
                    </div>
                    <div class="bg-cinza-800 h-[1px] "></div>
                    <div class="text-center border rounded-md border-cinza-700 p-1 dark:bg-cinza-900 font-semibold">Chamado encaminhado ao helpdesk</div>
                </div>
            </div>

            

        </div>
    </div>

   <ModalEdit /> -->

</template>

<style scoped>

.optionButton{
    @apply dark:text-cinza-100 bg-cinza-200 hover:bg-cinza-50 rounded-md dark:shadow-[0_0_6px_0_rgba(0,0,0,0.3)] dark:bg-cinza-900 dark:hover:bg-cinza-950 transition-all font-semibold py-2 px-4 w-full;
}

.fundoOptionCards{
   @apply dark:bg-[#29292999] bg-cinza-100 rounded-md dark:shadow-[0_0_6px_0_rgba(0,0,0,0.3)] ;
}


.fundo{
    @apply bg-cinza-200 dark:bg-[#3D3D3D] rounded-lg shadow-[0_0_15px_0_rgba(0,0,0,0.06)] dark:shadow-[0_0_15px_0_rgba(0,0,0,0.2)];
}

.fundoCard {
    @apply dark:text-white p-4 max-w-xs w-full relative bg-white dark:bg-[#141414] rounded-lg dark:shadow-[0_0_6px_0_rgba(0,0,0,0.2)] border  dark:border-cinza-800;
}

.esconder{
    @apply hidden;
}

.ativado {
    @apply border border-green-500 dark:border-green-500  opacity-70 ; 
}

.ativoDentro{
    @apply opacity-80;
}

.bolChamado{
    background-color: #5ace75;
    filter: drop-shadow(0px 0px 2px #5A78CE);
}

.specChamado{
    @apply dark:text-[#B2BCD9] text-[#5A78CE];

    border-radius: 5px;
    border: 2px solid #5ace75;
    background: rgba(90, 206, 135, 0.3);
    color: #195b29;
}

</style>