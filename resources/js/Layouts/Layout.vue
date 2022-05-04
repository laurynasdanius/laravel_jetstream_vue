<script>

import SideNav from '@/Components/SideNav.vue'; 

export default {
    components: {SideNav}
};
</script>

<template>

    <p>tekstas from the layout</p>
    <SideNav/>
   <slot/>
   
</template>