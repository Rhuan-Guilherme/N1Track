import { ref, computed } from 'vue'
import { defineStore } from 'pinia'


export const useSelectStore = defineStore('select', () => {
  const estado = ref('chamado')

  const chamado = () =>{
    estado.value = 'chamado'
  }

  const reiteracao = () =>{
    estado.value = 'reiteracao'
  }

  const transferencia = () =>{
    estado.value = 'transferencia'
  }

  const queda = () =>{
    estado.value = 'queda'
  }

  
  const vizualizacao = ref(false)

  function toogleView(){
    vizualizacao.value = !vizualizacao.value
  }

  

  return { estado, chamado, reiteracao, transferencia, queda, vizualizacao, toogleView }
})
