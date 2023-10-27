<template>
      <div  class="elemento-animado fixed flex items-center w-full max-w-xs p-3 text-gray-500 bg-white divide-x divide-gray-200 rounded-lg top-5 right-4 shadow-fundo dark:shadow-lg  z-40 dark:text-cinza-200 space-x dark:bg-cinza-700 border-2 border-cinza-400">
            <div class="text-md transition-opacity font-bold">Copiado com sucesso</div>
        </div>
</template>

<style scoped>
@keyframes fade {
  0% {
    opacity: 0;
    transform: translateX(20px);
  }
  50% {
    opacity: 1;
    transform: translateX(0px);
  }
  100% {
    opacity: 0;
    transform: translateX(20px);
  }
}

.elemento-animado {
  animation: fade 3s ease-in-out forwards;
}
</style>