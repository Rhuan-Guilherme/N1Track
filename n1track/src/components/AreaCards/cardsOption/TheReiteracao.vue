<script setup>

let props = defineProps({
    nome: String,
    chamado: String,
    login: String,
    ramal: String,
})


</script>

<template>
   <p class="">Senhor(a) {{ nome }} entrou em contato requisitando a reiteração e brevidade no chamado SERVICEDESK-{{ chamado }}.</p>
   <p>Login: {{ login }}</p>
   <p>Ramal: {{ ramal }}</p>
</template>