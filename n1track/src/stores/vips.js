import { ref, onMounted  } from 'vue'
import { defineStore } from 'pinia'
import  axios  from  'axios' ;

export const useReturnVipStore = defineStore('returnVip', () => {
    const userData = ref();
    const loading = ref(false);
    const error = ref(null);
    const nome = ref('');
    const login = ref('');
    
    const fetchUserData = async () => {
        loading.value = true;
        try {
          const response = await axios.get(`https://n1track.com/vips/returnVips.php`);
          userData.value = response.data;
          error.value = null;
        } catch (err) {
          error.value = err.message;
        } finally {
          loading.value = false;
        }
      };
    
         
      onMounted(() => {
        fetchUserData();
      });

      const cadastraVip = async () => {
        try {
            const response = await axios.post("https://n1track.com/vips/addVips.php", {
              nome: nome.value,
              login: login.value,
            })

            nome.value = ""
            login.value = ""
          } catch (error) {
             console.error("erro ao cadastrar: ", error)
          }finally {
            fetchUserData();
          }
      };

      const ticketId = ref();
    
      const deleteVip = async (id) => {
          ticketId.value = id 
          fetch(`https://n1track.com/vips/apagaVip.php?id=${ticketId.value}`, {
            method: 'DELETE',
          })
            .then(response => response.json())
            .then(data => {
              console.log(data.message); 
              fetchUserData();
            })
            .catch(error => {
              console.error('Erro:', error);
            })
        }

  return { userData, loading, error, fetchUserData, cadastraVip, nome, login, deleteVip }
})
