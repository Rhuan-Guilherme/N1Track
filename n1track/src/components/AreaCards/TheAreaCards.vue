<script setup>
import { useReturnStore } from '@/stores/returnTickets'
import { useUpdateStore } from '@/stores/updateTicket'
import { useLoginStore } from '@/stores/login';
import { useOptionStore } from '@/stores/optionsTicket'
import { ref, onMounted } from 'vue'
import { initFlowbite } from 'flowbite'
import Chamado from './cardsOption/TheChamado.vue';
import Reiteracao from './cardsOption/TheReiteracao.vue';
import Transferencia from './cardsOption/TheTransferencia.vue';
import Queda from './cardsOption/TheQueda.vue'
import Tag from '../bedges/TagTickets.vue';
import CopyNotify from '../bedges/CopyNotify.vue';
import ModalEdit from './ModalEdit.vue'


onMounted(() => {
    initFlowbite();
})


const OptionStore = useOptionStore()
const loginSotre = useLoginStore()
const updateTicket = useUpdateStore()
const store = useReturnStore()

store.fetchUserData(loginSotre.dadosUsuario.id)



</script>

<template>
    <div v-if="OptionStore.notification">
      <CopyNotify />
    </div>

    
    <div class="fundo w-11/12 h-auto p-3 flex flex-wrap items-center justify-center gap-3 ">
        
        <div v-for="dados in store.userData" :key="dados.id" :class="{ 'ativado': dados.status == 'Fechado' }"
            class="fundoCard ">
            
            <button @click="OptionStore.ReturnConcluiTicket(dados.id)" v-if="dados.status == 'Fechado'" class="absolute inline-flex items-center justify-center w-6 h-6 font-bold hover:scale-125 text-white hover:bg-red-500  bg-green-500 rounded-md -top-2 -right-2 ">
                <span class="material-symbols-outlined">done</span>
            </button>

            <button @click="OptionStore.deleteTicket(dados.id)" v-if="dados.status == 'Aberto'" class="absolute inline-flex items-center justify-center w-auto px-1  font-bold text-whiterounded-md top-2 right-2 dark:bg-[#303030] bg-cinza-200 border dark:border-cinza-700 border-cinza-300 rounded-md hover:scale-105 hover:bg-red-600 hover:text-white dark:text-cinza-100 text-cinza-700 dark:hover:bg-red-600 dark:hover:text-white">
                <span class="material-symbols-outlined text-base">close</span>
            </button>

            

            <div :class="{ 'ativoDentro': dados.status == 'Fechado' }">
                <div  class="flex flex-col gap-3">
                    <div class="flex flex-col gap-2">
                        <div class="text-xs dark:text-cinza-200 font-semibold">
                            {{ dados.created_at }}
                        </div>
                        <div class="flex items-center gap-2">
                            <div class="flex ">{{ dados.nome }} - {{ dados.ramal }}</div>
                            <div>
                                <Tag
                                    :tipo="dados.tipo"
                                    :status="dados.status"
                                />
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

                        <Reiteracao  
                            v-if="dados.tipo == 'reiteracao'"    
                            :nome="dados.nome"
                            :chamado="dados.chamado"
                            :login="dados.login"
                            :ramal="dados.ramal"
                        />

                        <Transferencia
                            v-if="dados.tipo == 'transferencia'"
                            :nome="dados.nome"
                            :destinatario="dados.destinatario"
                            :login="dados.login"
                            :ramal="dados.ramal"
                        />

                        <Queda 
                            v-if="dados.tipo == 'queda'"
                            :ramal="dados.ramal"
                        />
                    </div>

                    <div :class="{ 'esconder': dados.status == 'Fechado' }" class="bg-cinza-800 h-[1px] "></div>
                </div>

            </div>


            <div class="flex gap-2 justify-center fundoOptionCards p-2 mt-3 " :class="{ 'esconder': dados.status == 'Fechado' }">
                <button  @click="updateTicket.openEditModal(dados)" type="button" class="optionButton ">Editar</button>
                <button @click="OptionStore.copyCardText(dados, dados.tipo)"   type="button" class="optionButton ">Copiar</button>
                <button  @click="OptionStore.concluiTicket(dados.id)" type="button" class="optionButton">Concluir</button>
            </div>

        </div>
    </div>

   <ModalEdit />

</template>

<style scoped>

.optionButton{
    @apply dark:text-cinza-100 bg-cinza-200 hover:bg-cinza-50 rounded-md dark:shadow-[0_0_6px_0_rgba(0,0,0,0.3)] dark:bg-cinza-900 dark:hover:bg-cinza-950 transition-all font-semibold py-2 px-4;
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


</style>