<!-- <template>
  <div v-if="isOpenEdit" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
    <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md mx-auto">
      <h2 class="text-xl font-semibold mb-4">Edit</h2>
      <form @submit.prevent="editForm">
        <div class="mb-4">
          <label for="fname" class="block text-sm font-medium text-gray-700">Name</label>
          <input v-model="form.fname" type="text" id="fname" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
        </div>
        <div class="flex justify-end">
          <button @click="closeModal1" type="button" class="btn-secondary mr-2">Cancel</button>
          <button type="submit" class="btn-primary">Update</button>
        </div>
      </form>
    </div>
  </div>
</template>

<script setup>
import { ref, watch } from 'vue';
import { useForm } from '@inertiajs/vue3';
import Swal from 'sweetalert2';
import Tables from '../Index/Tables.vue';

const props1 = defineProps({
  isOpenEdit: Boolean,
  name: Object,
  closeModal1: Function,
});

// const emit = defineEmits(['close']);

const form = useForm({
  fname: null,
});

// Watch for changes in props.name to update the form
watch(() => props1.name, (newValue) => {
  form.fname = newValue.fname || null;
}, { immediate: true });



const editForm = () => {
 form.put(route('update',{name: props1.name.id}), {
    onFinish: () => {
      Swal.fire(
        'Sucess!',
        'The item has been Edited.',
        'success',

      );
      props1.closeModal1();
    },
  });
};


</script> -->

<template>
    <div v-if="isOpenEdit" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
      <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md mx-auto">
        <h2 class="text-xl font-semibold mb-4">Edit</h2>
        <form @submit.prevent="editForm">
          <div class="mb-4">
            <label for="fname" class="block text-sm font-medium text-gray-700">Name</label>
            <input v-model="form.fname" type="text" id="fname" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
          </div>
          <div  class=" mt-4 mb-4">
            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900">Select an option</label>
            <select v-model="form.status" id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
              <option selected>Select Status</option>
              <option value="Active">Active</option>
              <option value="Inactive">Inactive</option>
            </select>
          </div>
          <div class="flex justify-end">
            <button @click="closeModal1" type="button" class="btn-secondary mr-2">Cancel</button>
            <button type="submit" class="btn-primary">Update</button>
          </div>
        </form>
      </div>
    </div>
  </template>

  <script setup>
  import { ref, watch } from 'vue';
  import {router, useForm } from '@inertiajs/vue3';
  import Swal from 'sweetalert2';
  import Tables from '../Index/Tables.vue';

  const props1 = defineProps({
    isOpenEdit: Boolean,
    name: Object,
    closeModal1: Function,
  });

  // const emit = defineEmits(['close']);

  const form = useForm({
    fname: null,
    status:null
  });

  // Watch for changes in props.name to update the form
  watch(() => props1.name, (newValue) => {
    form.fname = newValue.fname || null;
    form.status = newValue.status || null;
  }, { immediate: true });



  const editForm = () => {
   form.put(route('update',{name: props1.name.id,}), {
      onFinish: () => {
        Swal.fire(
          'Sucess!',
          'The item has been Edited.',
          'success',

        );
        props1.closeModal1();
      },
    });
  };


  </script>
