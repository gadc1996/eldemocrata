<template lang="pug">
  .dashboard
    h2 This is the dashboard
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
}
</style>
