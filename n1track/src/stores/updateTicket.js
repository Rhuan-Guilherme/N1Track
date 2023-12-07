import { ref } from 'vue'
import { defineStore } from 'pinia'
import axios from 'axios'
import { useLoginStore } from './login';
import { useReturnStore } from '@/stores/returnTickets'
import { useReturnN2Store } from '@/stores/returnTicketN2'
const returnN2Store = useReturnN2Store()
const returnStore = useReturnStore()
const loginSotre = useLoginStore()

export const useUpdateStore = defineStore('update', () => {
    const isEditing = ref(false);
    const editedData = ref(null);

    const openEditModal = (data) =>{
        editedData.value = {...data}
        isEditing.value = true

    }

    const saveEdit = async () =>{
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
        };


        try{
            const response = await axios.post("https://n1track.com/updateTicket.php", updatedData)

            console.log(response.data);
        } catch (error) {
            console.error("Erro ao atualizar o chamado: ", error);
            // Lide com erros de forma apropriada
        } finally {
            isEditing.value = false;
            returnStore.fetchUserData(loginSotre.dadosUsuario.id)
            returnN2Store.fetchUserData()
        }
    }

    const cancelEdit = () =>{
        isEditing.value = false
    }

  


  return { isEditing, editedData, openEditModal, saveEdit, cancelEdit  }
})
