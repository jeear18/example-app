<template>
  <div v-if="isOpen" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
    <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md mx-auto">
      <h2 class="text-xl font-semibold mb-4">Create New Entry</h2>
      <form @submit.prevent="submitForm">
        <div class="mb-4">
          <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
          <input v-model="form.fname" type="text" id="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
        </div>
        <div class="flex justify-end">
          <button @click="closeModal" type="button" class="btn-secondary mr-2">Cancel</button>
          <button type="submit" class="btn-primary">Create</button>
        </div>
      </form>
    </div>
  </div>
</template>

<script setup>
import { useForm, usePage } from '@inertiajs/vue3';
import { route } from '../../../../vendor/tightenco/ziggy/src/js';
import Swal from 'sweetalert2';

const props = defineProps({
  isOpen: Boolean,
  closeModal: Function,
});

const form = useForm({
  fname: null,
});

const page = usePage();
const flash = page.props.flash;

const submitForm = () => {
  form.post(route('names.store'), {
    onFinish: () => {
      if (flash.success) {
        Swal.fire({
          title: 'Success!',
          text: flash.success,
          icon: 'success',
          confirmButtonText: 'OK'
        }).then(() => {
          props.closeModal(); // Close the modal after the alert is confirmed
        });
      }
    },
    onError: (errors) => {
      const errorMessage = errors?.fname?.[0] || 'There was an error saving the item.';
      Swal.fire({
        title: 'Error!',
        text: errorMessage,
        icon: 'error',
        confirmButtonText: 'OK'
      });
    }
  });
};
</script>