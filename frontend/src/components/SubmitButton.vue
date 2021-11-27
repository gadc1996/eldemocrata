<template lang="pug">
button.submit(type="submit") Submit
</template>

<script>
export default {
    name: "SubmitButton",
};
</script>

<style lang="scss">
.submit {
    background-color: black;
    color: white;
    border: none;
    border-radius: 2px;
    padding: 0.5rem 2rem;
    margin: 0.5rem 0;
    cursor: pointer;
}
</style>
