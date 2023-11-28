import { ref, computed } from 'vue'
import { defineStore } from 'pinia'
import  axios  from  'axios' ;

export const useCadastroStore = defineStore('cadastro', () => {
    const nome = ref('');
    const email = ref('');
    const senha = ref('');
    const cargo = ref('')
    const retorno = ref()
    
    const cadastrarUsuario = async () => {
        try {
          console.log("Dados antes da submissão:", cargo.value);
          const response = await axios.post("https://n1track.com/api.php", {
            nome: nome.value,
            email: email.value,
            senha: senha.value,
            cargo: cargo.value
          })
    
          retorno.value = response.data
          console.log(response.data)
          nome.value = ""
          email.value = ""
          senha.value = ""
          cargo.value = ""
    
        } catch (error) {
           console.error("erro ao cadastrar: ", error)
        }
    };

  return { cadastrarUsuario, retorno, nome, email, senha, cargo  }
})
