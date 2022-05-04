<template>
    <div>
        <Component 
        :is="link.url ? 'Link' : 'span'" 
        v-for="link in links" 
        :href="link.url" 
        v-html="link.label"
        class="py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
        :class="{ 'text-gray-500': !link.url, 'font-bold bg-gray-400 text-white': link.active}"/>
    </div>
</template>

<script>
export default{
    props:{
        links: Array
    }
};
</script>