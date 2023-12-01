import { ref, onMounted  } from 'vue'
import { defineStore } from 'pinia'
import  axios  from  'axios' ;

export const useReturnN2Store = defineStore('returnTicketN2', () => {
    const userData = ref(null);
    const loading = ref(false);
    const error = ref(null);
    
    const fetchUserData = async () => {
        loading.value = true;
        try {
          const response = await axios.get(`https://n1track.com/n2/returnN2.php`);
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

  return {  userData, loading, error, fetchUserData  }
})
