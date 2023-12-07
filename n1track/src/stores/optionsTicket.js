import { ref  } from 'vue'
import  axios  from  'axios' ;
import { defineStore } from 'pinia'
import { useLoginStore } from './login';
import { useReturnStore } from '@/stores/returnTickets'
import { useFiltroStore } from './filtroTicket';
import { useReturnN2Store } from '@/stores/returnTicketN2'
const returnN2Store = useReturnN2Store()
const filtroStore = useFiltroStore()
const returnStore = useReturnStore()
const loginSotre = useLoginStore()

export const useOptionStore = defineStore('option', () => {
    const ticketId = ref();
    
    const deleteTicket = async (id) => {
        ticketId.value = id 
        fetch(`https://n1track.com/apagarTicket.php?id=${ticketId.value}`, {
          method: 'DELETE',
        })
          .then(response => response.json())
          .then(data => {
            console.log(data.message); 
            returnStore.fetchUserData(loginSotre.dadosUsuario.id)
            filtroStore.fetchUserData(loginSotre.dadosUsuario.id)
            returnN2Store.fetchUserData()
          })
          .catch(error => {
            console.error('Erro:', error);
          })
         
    }

    const concluiTicket = async (id) => {
        ticketId.value = id
        axios.post("https://n1track.com/concluiTicket.php", { id: ticketId.value })
        .then(response => {
            returnStore.fetchUserData(loginSotre.dadosUsuario.id)
            filtroStore.fetchUserData(loginSotre.dadosUsuario.id)
            returnN2Store.fetchUserData()
            if (response.data.success) {
            console.log("Sucesso", response.data)
            } else {
            // Trate erros ou exiba mensagens de erro
            console.error(response.data.message);
            }
        })
        .catch(error => {
            console.error("Erro na solicitação POST:", error);
        });
      }

      const ReturnConcluiTicket = async (id) => {
        ticketId.value = id
        axios.post("https://n1track.com/returnConcluido.php", { id: ticketId.value })
        .then(response => {
            returnStore.fetchUserData(loginSotre.dadosUsuario.id)
            filtroStore.fetchUserData(loginSotre.dadosUsuario.id)
            returnN2Store.fetchUserData()
            if (response.data.success) {
            console.log("Sucesso", response.data)
            } else {
            // Trate erros ou exiba mensagens de erro
            console.error(response.data.message);
            }
        })
        .catch(error => {
            console.error("Erro na solicitação POST:", error);
        });
      }

    const notification = ref(false)
    function copyCardText(dados, tipo) {
      let cardText = '';
      let successMessage = 'Conteúdo copiado para a área de transferência.';
  
      switch (tipo) {
          case 'chamado':
              cardText = `Prezados, Sr(a). ${dados.nome} entrou em contato ${dados.informacao}\n
              Nome: ${dados.nome}
              Login: ${dados.login}
              Ramal: ${dados.ramal}
              Local: ${dados.local}
              Patrimônio: ${dados.patrimonio}
              `;
              break;
          case 'reiteracao':
              cardText = `Senhor(a) ${dados.nome} entrou em contato requisitando a reiteração e brevidade no chamado SERVICEDESK-${dados.chamado}.
              Login: ${dados.login}
              Ramal: ${dados.ramal}
              `;
              break;
  
          case 'transferencia':
              cardText = `Senhor(a) ${dados.nome} entrou em contato solicitando transferência de ligação para o(a) senhor(a) ${dados.destinatario}.
              Ramal: ${dados.ramal}
              `;
              break;
  
          case 'queda':
          cardText = `Senhor(a) Senhor(a) não identificado entrou em contato com o helpdesk no ramal 3416 e interrompeu a ligação antes do atendimento inicial.
              Ramal: ${dados.ramal}
              `;
              break;
          default:
              console.error('Tipo de cartão desconhecido:', tipo);
              successMessage = 'Erro ao copiar o conteúdo. Tipo de cartão desconhecido.';
              break;
      }
  
      navigator.clipboard.writeText(cardText)
          .then(() => {
            notification.value = true;
            setTimeout(() => {
              notification.value = false;
            }, 3000);
          })
          .catch((error) => {
              console.error('Erro ao copiar o conteúdo:', error);
              alert('Erro ao copiar o conteúdo. Verifique se o navegador suporta essa funcionalidade.');
          });
      
  }


  return {  deleteTicket, concluiTicket, ReturnConcluiTicket, copyCardText, notification   }
})
