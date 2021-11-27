<template lang="pug">
  .nav-link
    router-link(:to="route") 
      eva-icon.icon(:name="icon" fill="white")

</template>
<script>
export default {
    name: "NavLink",
    props: {
        route: String,
        icon: String,
    },
};
</script>

<style lang="scss">
.nav-link {
    margin: 0.5rem auto;
}
</style>
