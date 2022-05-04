<script setup>
import Layout from '@/Layouts/WorkspaceLayout.vue'; 
import SideNav from '@/Components/SideNav.vue'; 
// import Welcome from '@/Jetstream/Welcome.vue';
defineProps({
    laravelVersion: String,
    phpVersion: String,
});
</script>

<template>
    <Layout title="Workspace">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight flex justify-center">
                Im the workspace page
            </h2>
                <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0 flex justify-center">
                    Laravel v{{ laravelVersion }} (PHP v{{ phpVersion }})
                </div>
        </template>

        <!--<div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    
                </div>
            </div>
        </div>-->
        <div class="grid grid-cols-4">
            <div class=" w-full h-full col-span-1">
                <SideNav/>
            </div>
             <!-- Page Heading -->
            <!--<header v-if="$slots.header" class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex-col">
                    <slot name="header" />
                </div>
            </header>-->
            <!--<template #content>-->
                <div class="col-span-3 grid grid-rows-3">
                    <div class="w-full col-span-4 row-span-1 space-y-2 border-b border-gray-200 dark:border-gray-700 bg-indigo-500 font-extrabold flex items-center justify-center rounded-md">
                        <h1 class="italic place-items-center text-3xl md:text-4xl font-medium text-white ">Heading</h1>
                    </div>   
                    <div class=" bg-white col-span-4 row-span-2">
                    tekstas
                    </div>   
                </div>
            <!--</template>-->
        </div>

        
    </Layout>
</template>
