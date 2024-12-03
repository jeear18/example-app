<template>
  <div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="bg-white shadow-lg rounded-lg p-8 w-full md:w-4/5 lg:w-3/4">
      <div>
        <button @click="openCreateModal" type="button" class="btn-primary">Create</button>
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
          <tr v-for="name in names" :key="name.id">
            <td class="border px-4 py-2">{{ name.fname }}</td>
            <td class="border px-4 py-2 text-center">
                <span v-if="name.status === 'Active'" class="bg-green-200 text-green-700 py-1 px-3 rounded-full text-xs">Active</span>
                <span v-else class="bg-red-200 text-red-700 py-1 px-3 rounded-full text-xs"> Inactive</span>
            </td>
            <td class="border px-4 py-2 text-center">
              <button @click="confirmEditUser(name)" class="text-blue-500 hover:text-blue-700 mr-2">
                <i class="fa-regular fa-pen-to-square"></i>
              </button>
              <button @click="confirmDeleteUser(name)" class="text-red-500 hover:text-red-700">
                <i class="fa-solid fa-trash"></i>
              </button>
            </td>
          </tr>
        </tbody>
      </table>
      <CreateModal :isOpen="isCreateModalOpen" :closeModal="closeCreateModal" />
      <EditModal :isOpenEdit="isEditModalOpen" :name="selectedName" :closeModal1="closeEditModal" />
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { Link, useForm, usePage } from '@inertiajs/vue3';
import { route } from '../../../../vendor/tightenco/ziggy/src/js';
import CreateModal from '@/Pages/Modals/CreateModal.vue';
import EditModal from '@/Pages/Modals/EditModal.vue';
import Swal from 'sweetalert2';
import { router } from '@inertiajs/vue3';

// Vue.prototype.$swal = Swal;

const props = defineProps({
  names: Array,
});

const { flash } = usePage().props; // Get flash messages

const isCreateModalOpen = ref(false);
const isEditModalOpen = ref(false);
const selectedName = ref({});

const openCreateModal = () => {
  isCreateModalOpen.value = true;
};

const closeCreateModal = () => {
  isCreateModalOpen.value = false;
};

const openEditModal = (name) => {
  selectedName.value = { ...name };
  isEditModalOpen.value = true;
};

const closeEditModal = () => {
  isEditModalOpen.value = false;
};

const confirmDeleteUser = (name) => {
  Swal.fire({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
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

const confirmEditUser = (name) => {
  Swal.fire({
    title: 'Are you sure you want to edit?',
    text: "You won't be able to revert this!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#d33',
    cancelButtonColor: '#3085d6',
    confirmButtonText: 'Yes'
  }).then((result) => {
    if (result.isConfirmed) {
      openEditModal(name);
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
