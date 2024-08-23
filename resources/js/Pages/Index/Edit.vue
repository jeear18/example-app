<template>
   <div  class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="bg-white shadow-lg rounded-lg p-8 w-full md:w-4/5 lg:w-3/4">
    <form @submit.prevent="update">
        <div>
        <label class="label">Name</label>
        <input v-model="form.fname"  type="text" class="input" />
    </div>
    <div>
      
    <button  type="submit" class="btn-primary">Update</button>    
    </div>
    </form>
     </div>
 </div>
  


  
</template>

<script setup>
    import { Link, useForm, } from '@inertiajs/vue3' 
    import { route } from '../../../../vendor/tightenco/ziggy/src/js';
    
    
    const props = defineProps({
        names: Object,
    })
    const form = useForm({
        fname: props.names.fname
    })

    const update = () => form.put(route('update',{names: props.names.id}))

</script>