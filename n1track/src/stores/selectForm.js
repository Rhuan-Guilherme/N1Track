import { ref, computed } from 'vue'
import { defineStore } from 'pinia'


export const useSelectStore = defineStore('select', () => {
  const estado = ref('chamado')

  const chamado = () =>{
    estado.value = 'chamado'
    console.log(estado.value);
  }

  const reiteracao = () =>{
    estado.value = 'reiteracao'
    console.log(estado.value);
  }

  const transferencia = () =>{
    estado.value = 'transferencia'
    console.log(estado.value);
  }

  const queda = () =>{
    estado.value = 'queda'
    console.log(estado.value);
  }

  
  const vizualizacao = ref(false)

  function toogleView(){
    vizualizacao.value = !vizualizacao.value
  }

  

  return { estado, chamado, reiteracao, transferencia, queda, vizualizacao, toogleView }
})
