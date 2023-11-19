<script setup>
import { ref } from "vue";
import { useLoginStore } from "@/stores/login";
import { useSwitchStore } from '@/stores/switchLogin'
const Switch = useSwitchStore()
const loginStore = useLoginStore();
</script>

<template>
  <div class="bg-cinza-950 h-screen flex  items-center justify-center">
    <div class="flex flex-col gap-24">
      <div class="">
        <h1 class="text-7xl leading-[0.8] text-cinza-50 mb-4">Entre em <br> sua conta</h1>
        <p class="text-cinza-200">Ainda não tem cadastro?<span @click="Switch.toggle"  class="text-azul-600 font-bold ml-2 cursor-pointer">Cadastre-se</span></p>
      </div>
      <div>
        <form @submit.prevent="loginStore.logaUsuario" class="flex flex-col gap-8">
          <div>
            <input  v-model="loginStore.email" type="text" placeholder="Email" class="input" :class="{ 'notification': loginStore.notification == true }">
          </div>
          <div>
            <input v-model="loginStore.senha" type="password" placeholder="Senha" class="input" :class="{ 'notification': loginStore.notification == true }">
            <p v-if="loginStore.notification" class="mt-4 text-sm text-center text-cinza-300">E-mail ou senha inválidos! Não tem cadastro? <span @click="Switch.toggle"  class="text-azul-600 underline ml-1 cursor-pointer">Cadastre-se</span></p>
          </div>
          <div>
            <button type="submit" class="h-14 w-40 bg-gradient-to-t from-[#0449A4] to-[#006EFF] rounded-full text-lg text-cinza-100 font-bold">
              Acesse
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<style scoped>

.input{
  @apply h-14 w-96 rounded-full bg-cinza-900 border-transparent text-lg text-cinza-200;
}

.notification{
  @apply border border-red-500 ;
}

</style>