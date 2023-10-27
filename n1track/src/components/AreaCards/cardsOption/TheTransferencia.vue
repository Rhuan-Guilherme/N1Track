<script setup>

let props = defineProps({
    nome: String,
    destinatario: String,
    ramal: String,
})


</script>

<template>
    <p class="">Senhor(a) {{ nome }} entrou em contato solicitando transferência de ligação para o(a) senhor(a) {{ destinatario }} </p>
    <p>Ramal: {{ ramal }}</p>
</template>