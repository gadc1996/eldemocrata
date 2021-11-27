<template lang="pug">
  .home
    NavBar
    router-view
</template>

<script>
export default {
    name: "Home",
    components: {
        NavBar: () => import("@/components/NavBar"),
    },
};
</script>

<style lang="scss">
.home {
    display: grid;
    grid-template-columns: 1fr 10fr;
    width: 100vw;
    height: 100vh;
    background-color: white;
}
</style>
