<script setup>

let props = defineProps({
    nome: String,
    informacao: String,
    login: String,
    ramal: String,
    local: String,
    patrimonio: String
})


</script>

<template>
    <p class="">Prezados, Sr(a). {{ nome.split(' ')[0] }} entrou em contato {{ informacao }}</p>
    <p>Nome: {{ nome }}</p>
    <p>Login: {{ login }}</p>
    <p>Ramal: {{ ramal }}</p>
    <p>Local: {{ local }}</p>
    <p>Patrimônio: {{ patrimonio }}</p>
</template>