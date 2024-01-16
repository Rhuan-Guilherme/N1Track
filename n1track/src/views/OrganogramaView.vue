<script setup>
import Navbar from '@/components/layout/TheHeader.vue'
import organograma from '@/organograma.json';

console.log(organograma);
</script>

<template>
<Navbar />

<div class="relative overflow-x-auto shadow-md sm:rounded-lg p-20 h-screen">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <tbody>
            <tr v-for="organogramas in organograma" class="border-b border-cinza-400 dark:border-cinza-700 border ">
                <th  scope="row" class="px-6 py-4  font-medium text-cinza-900 whitespace-nowrap bg-cinza-100 dark:text-white dark:bg-cinza-950 border-r border-cinza-400">
                  {{ organogramas.area }}
                </th>
                <td  class="px-6 py-4 font-medium text-cinza-900 whitespace-nowrap bg-cinza-100 dark:text-white dark:bg-cinza-950 ">
                  <div>
                    <div class="py-2" v-for="sub in organogramas.sub">{{ sub.item }}</div>
                  </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>

</template>

<style scoped>

</style>