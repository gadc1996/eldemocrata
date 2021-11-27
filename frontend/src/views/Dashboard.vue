<template lang="pug">
  .dashboard
    NavBar
    router-view
</template>

<script>
export default {
    name: "Dashboard",
    components: {
        NavBar: () => import("@/components/NavBar"),
    },
};
</script>

<style lang="scss">
.dashboard {
    display: grid;
    grid-template-columns: 1fr 10fr;
    width: 100vw;
    height: 100vh;
    background-color: #000;
}
</style>
