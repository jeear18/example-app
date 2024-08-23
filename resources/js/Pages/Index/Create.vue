<template>

<div class="flex items-center justify-center min-h-screen bg-gray-100">
  <div class="bg-white shadow-lg rounded-lg p-8 w-1/2 h-1/2">
    <form  @submit.prevent="create">
    <div >
        <Link :href="route('names.index')">
        <h1>back to index</h1>
    </Link>
       <div>
        <label class="label">Name</label>
        <input v-model="form.fname"  type="text" class="input" />
       </div>
       <div>
        <button class="mt-4 bg-blue-500 text-white font-semibold py-2 px-4 rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50" type="submit">Save</button>
            <!-- <button class=" p-4 bg-blue-300 hover:bg-slate-500 rounded-md mt-3" type="submit">save</button> -->
       </div>
    </div>

    
    
</form>
  </div>
</div>

    
</template>
<script setup>
    import { Link, useForm } from '@inertiajs/vue3' 
    import { route } from '../../../../vendor/tightenco/ziggy/src/js';
    
    const form = useForm({
        fname:null,
    })

    const create = () => form.post(route('names.store'));


</script>