import { ref, computed } from 'vue'
import { defineStore } from 'pinia'
import  axios  from  'axios' ;
import { useLoginStore } from './login';
import { useReturnStore } from '@/stores/returnTickets'
import { useReturnN2Store } from '@/stores/returnTicketN2'
import { useReturnVipStore } from '@/stores/vips.js'
const vipStore = useReturnVipStore()
const returnStore = useReturnStore()
const returnN2Store = useReturnN2Store()
const loginSotre = useLoginStore()


export const useTicketStore = defineStore('ticket', () => {
    const nome = ref('');
    const login = ref('');
    const ramal = ref('');
    const patrimonio = ref('');
    const informacao = ref('');
    const local = ref('');
    const chamado = ref('')
    const destinatario = ref('')
    const criador = ref('')
    const userId = ref()
    const tipo = ref()
    const secao = ref('')
    const retorno = ref()
    const dateTime = ref()
    const vip = ref()

    function vipValue() {
      vipStore.fetchUserData()
      return vipStore.userData
    }
    
    const vipsFilter = (login, vips) => {
      const termo = login.toLowerCase()
      const filtro = vips.some((item) => {
        if(termo.length > 1){
          return item.login.toLowerCase().includes(termo);
        }
      })

      return filtro
    }

    const cadastraTicket = async (tipoc) => {
      const vipsFiltered = vipsFilter(login.value, vipValue()); 
      if(vipsFiltered) {
        console.log(vipsFiltered);
        vip.value = 'sim'
      } else{
        vip.value = 'nao'
      }
      const now = new Date();
      const dia = now.getDate();
      const mes = now.getMonth() + 1;
      const ano = now.getFullYear();
      const hora = now.getHours();
      const minuto = now.getMinutes();
      const minutoFormatado = minuto < 10 ? `0${minuto}` : minuto;
      
      dateTime.value = `${dia}/${mes}/${ano} às ${hora}:${minutoFormatado}`;
      try {
          const response = await axios.post("https://n1track.com/ticket.php", {
            nome: nome.value,
            login: login.value,
            ramal: ramal.value,
            patrimonio: patrimonio.value,
            informacao: informacao.value,
            local: local.value,
            chamado: chamado.value,
            destinatario: destinatario.value,
            userId: loginSotre.dadosUsuario.id,
            criador: loginSotre.dadosUsuario.nome,
            created_at: dateTime.value,
            tipo: tipoc,
            secao: loginSotre.dadosUsuario.cargo,
            vip: vip.value
          })
    
          retorno.value = response.data
          console.log(response.data)
          nome.value = ""
          login.value = ""
          ramal.value = ""
          patrimonio.value = ""
          informacao.value = ""
          local.value = ""
          chamado.value = ""
          destinatario.value = ""
        } catch (error) {
           console.error("erro ao cadastrar: ", error)
        }finally {
          returnStore.fetchUserData(loginSotre.dadosUsuario.id)
          returnN2Store.fetchUserData()
        }
    };


  return { cadastraTicket, retorno, nome, login, ramal, patrimonio, informacao, local, userId, tipo, destinatario, chamado, criador, secao, vipsFilter  }
})
