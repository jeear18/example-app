<template>
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
            <button class=" p-4 bg-blue-300 hover:bg-slate-500 rounded-md mt-3" type="submit">save</button>
       </div>
    </div>
</form>
</template>
<script setup>
    import { Link, useForm } from '@inertiajs/vue3' 

    const form = useForm({
        fname:null,
    })

    const create = () => form.post(route('names.store'));


</script>