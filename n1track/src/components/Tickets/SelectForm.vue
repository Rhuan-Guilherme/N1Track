<script setup>
import { useSelectStore } from '@/stores/selectForm'
const storeSelect = useSelectStore()
</script>


<template>
  <section>
    <div class="fundo ">
    <button @click="storeSelect.chamado" class="fundoBotao " :class="{ 'ativado': storeSelect.estado == 'chamado' }"><span class="material-symbols-outlined">description</span><span class="span">Chamados</span></button>

    <button @click="storeSelect.reiteracao" class="fundoBotao " :class="{ 'ativado': storeSelect.estado == 'reiteracao' }"><span class="material-symbols-outlined">notification_important</span><span class="span">Reiteração</span></button>

    <button @click="storeSelect.transferencia" class="fundoBotao botao bg-[#F3F3F3] dark:bg-[#3D3D3D] dark:text-[#A3A3A3] dark:hover:bg-[#252525]" :class="{ 'ativado': storeSelect.estado == 'transferencia' }" ><span class="material-symbols-outlined">phone_callback</span><sapn class="span">Transferência</sapn></button>
    
    <button @click="storeSelect.queda" class="fundoBotao " :class="{ 'ativado': storeSelect.estado == 'queda' }"><span class="material-symbols-outlined">phone_missed</span><span class="span">Queda de ligação</span></button>
    </div>
  </section>
</template>

<style scoped>
.fundo{
  @apply bg-cinza-100 border border-cinza-200 shadow-sm  dark:border-none dark:bg-[#525252] flex justify-center gap-3 p-3 rounded-xl dark:shadow-[0_0_15px_0_rgba(20,20,20,0.2)];
}

.span{
  @apply hidden md:inline;
}

.fundoBotao{
  @apply flex justify-center border border-cinza-200 shadow-sm dark:border-none items-center gap-[5px] font-semibold h-[46px] rounded-lg bg-[#F3F3F3] dark:bg-[#3D3D3D] dark:text-[#A3A3A3] dark:hover:bg-[#252525] hover:bg-cinza-200 hover:border-cinza-300 p-3 md:text-base dark:shadow-[0_0_3px_0_rgba(0,0,0,0.25)] hover:shadow-none transition-all text-cinza-800 ;
}

.ativado{
  @apply bg-cinza-200 border-cinza-300 dark:bg-[#252525] dark:border-none text-cinza-900;
}
</style>