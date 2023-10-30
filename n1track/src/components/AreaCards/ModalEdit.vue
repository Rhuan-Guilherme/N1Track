<script setup>
import { useUpdateStore } from '@/stores/updateTicket'

const updateTicket = useUpdateStore()
</script>

<template>
    <div v-if="updateTicket.isEditing" class="fixed top-0 left-0 right-0 z-50 flex bg-fundo bg-opacity-70 items-center justify-center w-full p-4 overflow-x-hidden overflow-y-auto inset-0 max-h-full">
    <div class="relative w-full max-w-md max-h-screen">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-cinza-800">
            <button @click="updateTicket.cancelEdit" type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="authentication-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
            </button>
            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">{{ updateTicket.editedData.nome }} - {{ updateTicket.editedData.ramal }}</h3>
                <form @submit.prevent="updateTicket.saveEdit" class="space-y-6">
                    <div v-if="updateTicket.editedData.tipo == 'chamado' || updateTicket.editedData.tipo == 'reiteracao' || updateTicket.editedData.tipo == 'transferencia' ">
                        <label for="nome" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nome</label>
                        <input v-model="updateTicket.editedData.nome" type="text" name="nome" id="nome" class="input">
                    </div>

                    <div v-if="updateTicket.editedData.tipo == 'chamado' || updateTicket.editedData.tipo == 'reiteracao'">
                        <label for="nome" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Login</label>
                        <input v-model="updateTicket.editedData.login" type="text" name="nome" id="nome" class="input">
                    </div>

                    <div v-if="updateTicket.editedData.tipo == 'chamado'">
                        <label for="nome" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Informação</label>
                        <input v-model="updateTicket.editedData.informacao" type="text" name="nome" id="nome" class="input">
                    </div>

                    <div>
                        <label for="nome" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ramal</label>
                        <input v-model="updateTicket.editedData.ramal" type="text" name="nome" id="nome" class="input">
                    </div>

                    <div v-if="updateTicket.editedData.tipo == 'chamado'">
                        <label for="nome" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Local</label>
                        <input v-model="updateTicket.editedData.local" type="text" name="nome" id="nome" class="input">
                    </div>

                    <div v-if="updateTicket.editedData.tipo == 'chamado'">
                        <label for="nome" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Patrimônio</label>
                        <input v-model="updateTicket.editedData.patrimonio" type="text" name="nome" id="nome" class="input">
                    </div>

                    <div v-if="updateTicket.editedData.tipo == 'reiteracao'">
                        <label for="nome" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Chamado</label>
                        <input v-model="updateTicket.editedData.chamado" type="text" name="nome" id="nome" class="input">
                    </div>

                    <div v-if="updateTicket.editedData.tipo == 'transferencia'">
                        <label for="nome" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Destinatario</label>
                        <input v-model="updateTicket.editedData.destinatario" type="text" name="nome" id="nome" class="input">
                    </div>
                    
                    <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Atualizar</button>
                </form>
            </div>
        </div>
    </div>
</div> 

</template>

<style scoped>
.input{
    @apply bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-cinza-900 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white;
}
</style>