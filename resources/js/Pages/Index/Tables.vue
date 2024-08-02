<template>
       
    <div  class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="bg-white shadow-lg rounded-lg p-8 w-fit">
          <div>
            <Link :href="route('names.create')">
              <button type="button" class="btn-primary">Create</button>
            </Link>
          </div>
            
            <table class="min-w-full bg-white">
        <thead class="bg-gray-800 text-white">
          <tr>
            <th class="w-1/3 px-4 py-2">Name</th>
            <th class="w-1/3 px-4 py-2">Status</th>
            <th class="px-4 py-2">Actions</th>
          
          </tr>
        </thead>
        <tbody class="text-gray-700">
          <tr v-for="name in names" >
            <td class="border px-4 py-2">{{ name.fname }}</td>
            <td class="border px-4 py-2">
              <span class="bg-green-200 text-green-700 py-1 px-3 rounded-full text-xs">Active</span>
            </td>
            <td class="border px-4 py-2 text-center">
                
                    <button class="text-blue-500 hover:text-blue-700 mr-2">
                    <i class="fa-regular fa-pen-to-square"></i>
                    </button>
                    <button @click="confirmDeleteUser(name)" class="text-red-500 hover:text-red-700">                 
                    <i class="fa-solid fa-trash"></i>
                    </button>
                         
            </td>
          </tr>
          
        </tbody>
      </table>
     
     
        </div>
        
    </div> 
  
</template>

<script setup>
    import { defineProps } from 'vue';
    import { Link, } from '@inertiajs/vue3' 
    import { route } from '../../../../vendor/tightenco/ziggy/src/js';
    import  DeleteModal  from '../../Pages/Modals/DeleteModal.vue';
    import Swal from 'sweetalert2';
    // import { Inertia } from '@inertiajs/vue3' 
    import { router } from '@inertiajs/vue3'

    const props = defineProps({
  names: Array,
});

const confirmDeleteUser = (name) => {
  Swal.fire({
    title: 'Are you sure?',
    text: 'You won\'t be able to revert this!',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#d33',
    cancelButtonColor: '#3085d6',
    confirmButtonText: 'Yes, delete it!'
  }).then((result) => {
    if (result.isConfirmed) {
      deleteUser(name);
    }
  });
};

const deleteUser = (name) => {
  router.delete(route('names.destroy', name.id), {
    onFinish: () => {
      Swal.fire(
        'Deleted!',
        'The item has been deleted.',
        'success'
      );
    },
  });
};
</script>
