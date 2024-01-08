import { ref } from 'vue'
import { defineStore } from 'pinia'
import axios from 'axios'
import { useLoginStore } from './login';
import { useReturnStore } from '@/stores/returnTickets'
import { useReturnN2Store } from '@/stores/returnTicketN2'
const returnN2Store = useReturnN2Store()
const returnStore = useReturnStore()
const loginSotre = useLoginStore()

export const useCloneStore = defineStore('clone', () => {
    const cloneFecth = async (data) =>{
        const editedData = ref({...data})
        const updatedData = {
            chamado_id: editedData.value.id, 
            nome: editedData.value.nome,
            login: editedData.value.login,
            ramal: editedData.value.ramal,
            patrimonio: editedData.value.patrimonio,
            informacao: editedData.value.informacao,
            local: editedData.value.local,
            chamado: editedData.value.chamado,
            destinatario: editedData.value.destinatario,
            userId: editedData.value.user_id,
            criador: editedData.value.criador,
            created_at: editedData.value.created_at,
            tipo: editedData.value.tipo,
            secao: editedData.value.secao
           
        };

        console.log(editedData.value);
        try{
            const response = await axios.post("https://n1track.com/ticket.php", updatedData)

            console.log(response.data);
        } catch (error) {
            console.error("Erro ao clonar o chamado: ", error);
            // Lide com erros de forma apropriada
        } finally {
            returnStore.fetchUserData(loginSotre.dadosUsuario.id)
            returnN2Store.fetchUserData()
        }
    }


  return { cloneFecth  }
})
