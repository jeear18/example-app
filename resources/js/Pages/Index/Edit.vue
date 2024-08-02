<template>
    <Link :href="route('names.index')">
        <h1>index</h1>
    </Link>
    <!-- <Link :href="route('names.tables')">
        <h1>tavles</h1>
    </Link> -->
    <form @submit.prevent="update">
        <div>
        <label class="label">Name</label>
        <input v-model="form.fname"  type="text" class="input" />
    </div>
    <div>
      
            <button  type="submit" class=" p-1 rounded-md bg-blue-300">Update</button>
       
    </div>
    </form>
  
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