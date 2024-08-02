<template>
     
        <h1>index</h1>

    <Link :href="route('tables')">
        <h1>tables</h1>
    </Link>
    <!-- <slot></slot> -->
    <div>
        <Link :href="route('names.create')">
            <button  class=" p-1 bg-blue-300 hover:bg-slate-500 rounded-md mt-3" type="submit">create</button>
        </Link>
        
    </div>
    <div  v-for="name in names">
        {{ name.fname}}   
        <div>
        <Link :href="route('names.edit',{name: name.id})">
            <button class=" p-1 rounded-md bg-yellow-400">edit</button>
        </Link>
        <Link :href="route('names.destroy',{name: name.id})" as="button" method="DELETE" >
            <button  class=" p-1 rounded-md bg-red-400">dlete</button>
        </Link>
            
    
        
    </div>
  
    </div> 
  

</template>
<script setup>
    import { Link, } from '@inertiajs/vue3' 
    import { route } from '../../../../vendor/tightenco/ziggy/src/js';
    
    
    defineProps({
        names: Object,
    })

</script>