<script setup>
import { ref } from "vue";
import { useCadastroStore } from "@/stores/cadastro";
import { useSwitchStore } from '@/stores/switchLogin'
const cadastroStore = useCadastroStore();
const Switch = useSwitchStore()

</script>

<template>
  <div class="bg-cinza-950 h-screen flex  items-center justify-center">
    <div class="flex flex-col gap-24">
      <div class="">
        <h1 class="text-7xl leading-[0.8] text-cinza-50 mb-4">Crie <br> sua conta</h1>
        <p class="text-cinza-200">Já é um membro?<span @click="Switch.toggle"  class="text-azul-600 font-bold ml-2 cursor-pointer">Log in</span></p>
      </div>
      <div>
        <form @submit.prevent="cadastroStore.cadastrarUsuario" class="flex flex-col gap-8">
          <div>
            <input v-model="cadastroStore.nome" type="text" placeholder="Nome" class="input">
          </div>
          <div>
            <input v-model="cadastroStore.email" type="email" placeholder="Email" class="input">
          </div>
          <div>
            <input v-model="cadastroStore.senha" type="password" placeholder="Senha" class="input">
          </div>
          <div>
            <ul class="grid w-full gap-3 md:grid-cols-2">
                <li>
                    <input v-model="cadastroStore.cargo" type="radio" id="hosting-small" name="hosting" value="n1" class="hidden peer" required>
                    <label for="hosting-small" class="inline-flex items-center justify-center w-full p-4 border rounded-full cursor-pointer hover:text-gray-300 border-cinza-900 peer-checked:text-blue-500 peer-checked:border-blue-600  text-gray-400 bg-cinza-900 hover:bg-gray-700">                           
                        <div class="block">
                            <div>Analista N1</div>
                        </div>
                    </label>
                </li>
                <li>
                    <input v-model="cadastroStore.cargo" type="radio" id="hosting-big" name="hosting" value="n2" class="hidden peer">
                    <label for="hosting-big" class="inline-flex items-center justify-center w-full p-4 border rounded-full cursor-pointer hover:text-gray-300 border-cinza-900 peer-checked:text-blue-500 peer-checked:border-blue-600  text-gray-400 bg-cinza-900 hover:bg-gray-700">
                        <div class="block">
                          <div>Analista N2</div>
                        </div>
                    </label>
                </li>
            </ul>
          </div>
          <div>
            <button type="submit" class="h-14 w-40 bg-gradient-to-t from-[#0449A4] to-[#006EFF] rounded-full text-lg text-cinza-100 font-bold">
              Cadastre-se
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<style scoped>

.input{
  @apply h-14 w-96 rounded-full bg-cinza-900 border-none text-lg text-cinza-200;
}

</style>