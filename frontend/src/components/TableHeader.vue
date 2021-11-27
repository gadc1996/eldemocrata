<template lang="pug">
  tr.table-header
    th(v-for="column in columns") {{ column }}
    th Options
</template>

<script>
export default {
    name: "TableHeader",
    props: {
        columns: {
            type: Array,
        },
    },
};
</script>

<style lang="scss">
.table-header {
    background-color: inherit;
    padding: 10px 0;
    color: #fff;
}
</style>
