
<template>
    <div v-if="isOpen" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-10 ">
      <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md mx-auto">
        <h2 class="text-xl font-semibold mb-4">Create New Entry</h2>
        <form @submit.prevent="submitForm">
          <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input v-model="form.fname" type="text" id="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
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
            <button @click="closeModal"  type="button" class="btn-secondary mr-2">Cancel</button>
            <button type="submit" class="btn-primary">Create</button>
          </div>
        </form>
      </div>
    </div>
  </template>

  <script setup>
  import { router, useForm, usePage } from '@inertiajs/vue3';
  import { route } from '../../../../vendor/tightenco/ziggy/src/js';
  import Swal from 'sweetalert2';
   import {computed, ref} from 'vue'
  import axios from 'axios';

  const isDropdownOpen = ref(false);

  const props = defineProps({
    names: Object,
    isOpen: Boolean,
    closeModal: Function,
    isDropdownOpen: Boolean,
    isToggleOpen: Boolean,
  });

  const toggleDropdown = () => {
    isDropdownOpen.value = !isDropdownOpen.value;
  };

  const form = useForm({
    fname: null,
    status: null,
  });

  const page = usePage();
  const page1 = usePage();
  const flashSuccess = computed(
    () => page.props.flash.success,)

    const flashError = computed(
    () => page.props.flash.error,)


   const submitForm = () => {

    axios.post('store', { fname: form.fname, status:form.status }) // Replace this with your controller route
      .then((response) => {
        // If the response has a success message from the controller
        if (response.data.message === 'success') {
          Swal.fire({
            title: 'Success!',
            text: 'Entry created successfully.',
            icon: 'success',
            confirmButtonText: 'OK'

          }).then(() => {
            form.fname = ''; // Clear the form field
            props.closeModal(); // Close the modal
            router.get(route('tables'));
          });

        } else if(response.data.message === 'error') {
          // If there's an error or failure response
          Swal.fire({
            title: 'Error!',
            text:  'Already Exist.',
            icon: 'error',
            confirmButtonText: 'OK'
          });
        }
      })
      .catch((error) => {
        console.error('Error:', error);
        Swal.fire({
          title: 'Error!',
          text: 'An error occurred while submitting the form.',
          icon: 'error',
          confirmButtonText: 'OK'
        });
      }).then(() => {
            form.fname = ''; // Clear the form field
          });
      }

  </script>
