<template lang="pug">
  .nav-bar
    NavLink(route='/dashboard/customers' icon='person-outline')
    NavLink(route='/dashboard/events' icon="gift-outline")
    NavLink(route='/dashboard/event-types' icon="gift-outline")
    NavLink(route='/dashboard/waiters' icon="gift-outline")
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
    background-color: inherit;
}
</style>
