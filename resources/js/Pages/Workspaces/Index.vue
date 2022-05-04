<script setup>
    import Layout from '@/Layouts/Layout.vue';
    //paginator
    import Paginator from "../../Components/Paginator";
    import {
        defineProps,
        ref,
        watch
    } from 'vue';
    import {
        Inertia
    } from '@inertiajs/inertia';
    import {
        Link
    } from '@inertiajs/inertia-vue3';

    let props = defineProps({
        workspaces: Object,
        filters: Object
    });

    //search
    let search = ref(props.filters.search);

    watch(search, value=>{
        Inertia.get('/workspaces',{ search: value },{
            preserveState: true,
            replace: true
        });
    });
</script>
<template>

    <Head>
        <title>TestPage</title>
    </Head>

    <Layout>
        <!--<li v-for="workspace in workspaces" :key="workspace.id" v-text="workspace.workspace_name"></li>-->
        <div class="container flex justify between">
        <input v-model="search" type="text" placeholder="Search.." class="border px-2 rounded-lg flex-col">

            <div id="app" class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                        <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead>
                                    <tr>
                                        <th
                                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                                            Workspace name
                                        </th>
                                        <th
                                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                                            Workspace description
                                        </th>
                                        <th class="px-6 py-3 bg-gray-50"></th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr v-for="workspace in workspaces.data" :key="workspace.id">
                                        <td class="px-6 py-4 whitespace-no-wrap">
                                            <div class="flex items-center">
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium leading-5 text-gray-900">
                                                        {{ workspace.workspace_name }}
                                                    </div>
                                                    <div class="text-sm leading-5 text-gray-500">
                                                        {{ workspace.workspace_description }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap">
                                            <div class="text-sm leading-5 text-gray-900">{{ workspace.workspace_name }}
                                            </div>
                                            <div class="text-sm leading-5 text-gray-500">
                                                {{ workspace.workspace_description }}</div>
                                        </td>
                                        <!--<td class="px-6 py-4 whitespace-no-wrap">
                <span class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                  {{ person.state }}
                </span>
              </td>
              <td class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap">
                {{ person.role }}
              </td>-->
                                        <td
                                            class="px-6 py-4 text-sm font-medium leading-5 text-right whitespace-no-wrap">
                                            <Link :href="`/workspaces/${workspace.id}+'/update`"
                                                class="text-indigo-600 hover:text-indigo-900">Edit</Link>
                                        </td>
                                    </tr>
                                    <!-- More rows... -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- PAGINATOR -->
            <Paginator :links="workspaces.links"/>

        </div>
        


    </Layout>


</template>