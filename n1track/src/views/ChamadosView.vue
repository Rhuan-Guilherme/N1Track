<script setup>
import Navbar from '@/components/layout/TheHeader.vue'
import Cards from '@/components/chamados/cardChamados.vue'
import TheAreaFiltro from '../components/chamados/TheAreaFiltro.vue';
</script>

<template>
    <Navbar />

    <!-- <main class="max-w-screen-xl flex flex-col items-center justify-between mx-auto p-4 mt-3 ">
        <div class="fundoForm w-3/7">
            <Cards />
        </div>
    </main>

    <section class="flex justify-center mt-7 mb-7">
      <TheAreaFiltro />
   </section> -->

   <div class="p-3 h-screen">
       <div id="alert-additional-content-5" class="p-4 border border-gray-300 rounded-lg bg-gray-50 dark:border-gray-600 dark:bg-gray-800" role="alert">
         <div class="flex items-center">
        <svg class="flex-shrink-0 w-4 h-4 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
          <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
        </svg>
        <span class="sr-only">Info</span>
        <h3 class="text-lg font-medium text-gray-800 dark:text-gray-300">Atenção!!</h3>
         </div>
         <div class="mt-2 mb-4 text-sm text-gray-800 dark:text-gray-300">
        Está página ainda está em construção!
         </div>
         <div class="flex">
        <RouterLink to="/tickets">
            <button type="button" class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-xs px-3 py-1.5 mr-2 text-center inline-flex items-center dark:bg-gray-600 dark:hover:bg-gray-500 dark:focus:ring-gray-800">
              <svg class="-ml-0.5 mr-2 h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 14">
                <path d="M10 0C4.612 0 0 5.336 0 7c0 1.742 3.546 7 10 7 6.454 0 10-5.258 10-7 0-1.664-4.612-7-10-7Zm0 10a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z"/>
              </svg>
              Volte para pagina de registro
            </button>
        </RouterLink>
    
         </div>
       </div>
   </div>
</template>

<style scoped>
.fundoForm{
   border-radius: 10px;
   background: #525252;
   box-shadow: 0px 0px 15px 0px rgba(20, 20, 20, 0.25);
}
</style>