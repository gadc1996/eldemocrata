<template lang="pug">
  .alert
    p.text AlertMessage
  </div>
</template>

<script>
export default {
    name: "AlertMessage",
};
</script>

<style lang="scss">
.alert {
    background-color: red;
    .text {
        color: blue;
    }
}
</style>
