<script setup>
let props = defineProps({
    tipo: String,
    status: String
})

</script>


<template>
     <div v-if="tipo == 'chamado'" class="specChamado w-auto px-2 h-5 text-[12px] flex items-center justify-center gap-2 font-bold" :class="{ 'econdeAtivo': status == 'Fechado' }">
        <div class="bolChamado efeitoPulse w-2 h-2 rounded-full " :class="{ 'econdeAtivo': status == 'Fechado' }"></div> 
        <span>Chamado</span>
    </div>

     <div v-if="tipo == 'reiteracao'" class="specReiteracao w-auto px-2 h-5 text-[12px] flex items-center justify-center gap-2 font-bold" :class="{ 'econdeAtivo': status == 'Fechado' }">
        <div class="bolReiteracao efeitoPulse w-2 h-2 rounded-full " :class="{ 'econdeAtivo': status == 'Fechado' }"></div> 
        <span>Reiteração</span>
    </div>

     <div v-if="tipo == 'queda'" class="specQueda w-auto px-2 h-5 text-[12px] flex items-center justify-center gap-2 font-bold" :class="{ 'econdeAtivo': status == 'Fechado' }">
        <div class="bolQueda efeitoPulse w-2 h-2 rounded-full " :class="{ 'econdeAtivo': status == 'Fechado' }"></div> 
        <span>Queda</span>
    </div>

     <div v-if="tipo == 'transferencia'" class="specTransferencia  w-auto px-2 h-5 text-[12px] flex items-center justify-center gap-2 font-bold" :class="{ 'econdeAtivo': status == 'Fechado' }">
        <div class="bolTransferencia efeitoPulse w-2 h-2 rounded-full " :class="{ 'econdeAtivo': status == 'Fechado' }"></div> 
        <span>Transferencia</span>
    </div>
                            
</template>

<style scoped>
.efeitoPulse{
    @apply animate-pulse;
}

.bolQueda{
    background-color: #CE7C5A;
    filter: drop-shadow(0px 0px 2px #CE7C5A);
}

.specQueda{
    @apply dark:text-[#dbbbba] text-[#9a3232];

    border-radius: 5px;
    border: 1px solid #CE755A;
    background: rgba(206, 90, 90, 0.3);
}

.bolTransferencia{
    background-color: #5ACEB9;
    filter: drop-shadow(0px 0px 2px #5ACEB9);
}

.specTransferencia{
    @apply dark:text-[#BFD7D2] text-[#2d9582];

    border-radius: 5px;
    border: 1px solid #5ACEB9;
    background: rgba(90, 206, 185, 0.30);

}

.bolReiteracao{
    background-color: #9B5ACE;
    filter: drop-shadow(0px 0px 2px #9B5ACE);
}

.specReiteracao{
    @apply dark:text-[#BDA2D1] text-[#9B5ACE];

    border-radius: 5px;
    border: 1px solid #9B5ACE;
    background: rgba(155, 90, 206, 0.30);

}

.bolChamado{
    background-color: #5A78CE;
    filter: drop-shadow(0px 0px 2px #5A78CE);
}

.specChamado{
    @apply dark:text-[#B2BCD9] text-[#5A78CE];

    border-radius: 5px;
    border: 2px solid #5A78CE;
    background: rgba(90, 120, 206, 0.30);
    color: ;
}

.econdeAtivo{
    background: rgba(110, 110, 110, 0.3);
    border: 1px solid gray;
    color: #888888;
    animation: none;
}

</style>