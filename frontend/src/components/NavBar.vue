<template lang="pug">
  .nav-bar
    NavLink(route='/dashboard/' icon='grid-outline')
    NavLink(route='/articles' icon='book-outline')
</template>
<script>
export default {
    name: "NavBar",
    components: {
        NavLink: () => import("@/components/NavLink"),
    },
};
</script>

<style lang="scss">
.nav-bar {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    background-color: black;
}
</style>
