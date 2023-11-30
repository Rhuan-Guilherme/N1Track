<script setup>
import { useTicketStore } from '@/stores/ticket'
const store = useTicketStore()



</script>


<template>
   <div>
      <div>
         <form @submit.prevent="store.cadastraTicket('chamado')" class="flex flex-col gap-6">
            <div class="flex flex-col md:flex-row gap-3">
               <div class="flex flex-col w-full">
                  <label class="label" for="nome">Nome do Usuário</label>
                  <input v-model="store.nome" id="nome" class="input h-10" type="text">
               </div>
               <div class="flex flex-col w-full">
                  <label class="label" for="login">Login do Usuário</label>
                  <input v-model="store.login" id="login" class="input h-10" type="text">
               </div>
            </div>

            <div class="flex flex-col md:flex-row gap-3">
               <div class="flex flex-col w-full">
                  <label class="label" for="ramal">Ramal</label>
                  <input v-model="store.ramal" id="ramal" class="input h-10" type="text">
               </div>
               <div class="flex flex-col w-full">
                  <label class="label" for="patrimonio">Patrimônio</label>
                  <input v-model="store.patrimonio" id="patrimonio" class="input h-10" type="text">
               </div>
            </div>

            <div class="flex gap-3">
               <div class="flex flex-col w-full">
                  <label class="label" for="informacao">Informação</label>
                  <input v-model="store.informacao" id="informacao" class="input h-10" type="text">
               </div>
            </div>

            <div class="flex gap-3">
               <div class="flex flex-col w-full">
                  <label class="label" for="local">Local</label>
                  <input v-model="store.local" id="local" class="input h-10" type="text">
               </div>
               <div class="flex flex-col w-full">
                  <label class="label" for="local">Local pré definido</label>

                  <select v-model="store.local" :value="store.local" id="local" class="input h-10" >
                        <option>Local Pré definido</option>
                        <option value="Anexo 2A / 6° andar / Gabinete Ministra Cármen Lúcia">Gabinete Min. Cármem Lúcia</option>
                        <option value="Anexo 2A / 6° andar / Gabinete Ministro Gilmar Mendes">Gabinete Min. Gilmar Mendes
                        </option>
                        <option value="Anexo 2A / 5° andar / Gabinete Ministro André Mendonça">Gabinete Min. André Mendonça
                        </option>
                        <option value="Anexo 2A / 4° andar / Gabinete Ministro Dias Toffoli">Gabinete Min. Dias Toffoli</option>
                        <option value="Anexo 2A / 5° andar / Gabinete Ministro Nunes Marques">Gabinete Min. Nunes Marques
                        </option>
                        <option value="Anexo 2A / 4° andar / Gabinete Ministro Cristiano Zanin">Gabinete Min. Cristiano Zanin
                        </option>
                        <option value="Anexo 2A / 3° andar / Gabinete Ministro Luiz Fux">Gabinete Min. Luiz Fux</option>
                        <option value="Anexo 2A / 3° andar / Gabinete Ministro Edson Fachin">Gabinete Min. Edson Fachin</option>
                        <option value="Anexo 2A / 3° andar / Gabinete Ministro Alexandre de Moraes">Gabinete Min. Alexandre de Moraes</option>
                </select>
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