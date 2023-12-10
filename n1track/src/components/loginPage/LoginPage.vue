<script setup>
import { ref } from "vue";
import { useLoginStore } from "@/stores/login";
import { useSwitchStore } from '@/stores/switchLogin'


const Switch = useSwitchStore()
const loginStore = useLoginStore();
</script>

<template>
  <div class="bg-cinza-950 h-screen flex  items-center justify-center">
    <div v-if="!loginStore.contaAnalise" class="flex flex-col gap-24">
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
            <p v-if="loginStore.notification" class="mt-4 text-sm  text-cinza-300">E-mail ou senha inválidos! <a href="https://n1track.com/senha/recuperacao.html" class="text-azul-600 underline ml-1 cursor-pointer">Esqueceu sua senha?</a></p>
          </div>
          <div>
            <button type="submit" class="h-14 w-40 bg-gradient-to-t from-[#0449A4] to-[#006EFF] rounded-full text-lg text-cinza-100 font-bold">
              Acesse
            </button>
          </div>
        </form>
      </div>

    </div>

    <div class="w-2/3 cadastro-page" v-if="loginStore.contaAnalise" >
    <div class="text-cinza-200 flex flex-col gap-4">
      <h2 class="text-6xl font-semibold uper">Conta em análise</h2>
      <p class="text-xl leading-8">Sua conta foi encaminhada para análise. Estamos atualmente revisando sua solicitação e entraremos em contato em breve através do seu e-mail para fornecer informações detalhadas sobre o processo de análise. Agradecemos pela sua paciência e compreensão.</p>
    </div>
    <div @click="loginStore.contaAnalise = false" class="text-azul-600 font-bold text-sm cursor-pointer mt-2">Voltar para página de Login</div>
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



.cadastro-page {

animation: fade-in 0.5s ease-in-out forwards;
}
/* Animação de desvanecimento (fade-in) */
@keyframes fade-in {
  from {
    opacity: 0;
    transform: translateY(-20px)
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}
</style>