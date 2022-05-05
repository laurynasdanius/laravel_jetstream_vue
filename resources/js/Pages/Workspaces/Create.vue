<script setup>
// import {ref} from "vue";
// import {Inertia} from "@inertiajs/inertia";
import {useForm} from "@inertiajs/inertia-vue3";
import Layout from '@/Layouts/WorkspaceLayout.vue'; 

    defineProps({
        errors: Object
    });
    let form = useForm({
        workspace_name:'',
        workspace_description:''
    });
    let submit = () =>{
        form.post('/workspaces');
    };
</script>


<template>
<Layout>
<Head title="Create User"/>
    <h1 class="text-3xl">Create new user</h1>

    <form @submit.prevent="submit" class="max-w-md mx-auto mt-8">
        <!-- Workspace name-->
        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                for="workspace_name"
            >
            workspace_name
            </label>
            <input v-model="form.workspace_name" class="border border-gray-400 p-2 w-full"
                type="text"
                name="workspace_name"
                id="workspace_name"
                required
            >
            <div v-if="form.errors.workspace_name" v-text="form.errors.workspace_name" class="text-red-500 text-xs mt-1"/>
        </div>
        <!-- Workspace description-->
        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                for="workspace_description"
            >
            workspace_description
            </label>
            <input v-model="form.workspace_description" class="border border-gray-400 p-2 w-full"
                type="text"
                name="workspace_description"
                id="workspace_description"
                required
            >
            <div v-if="form.errors.workspace_description" v-text="form.errors.workspace_description" class="text-red-500 text-xs mt-1"/>
        </div>
        <!-- Submit button-->
        <div class="md-6">
            <button type="submit"
                class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500 justify-self-end float-right" :disabled="form.processing"
            >
                Submit
            </button>
        </div>
    </form>
    
</Layout>
</template>
