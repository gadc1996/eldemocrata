<template lang="pug">
  .login-input
    eva-icon.icon(:name="icon") 
    input(:placeholder="placeholder" :type="type" @input="$emit('input', $event.target.value)")
</template>
<script>
export default {
    name: "LoginInput",
    props: {
        placeholder: String,
        icon: String,
        type: String,
        newRecord: Object,
    },
};
</script>

<style lang="scss">
.login-input {
    display: grid;
    grid-template-colums: 1fr;
    grid-column-gap: 10px;
    border: 2px solid transparent;
    box-shadow: 0px 0px;
    align-items: center;
    padding: 0.2rem;
    margin: 0.5rem 0;
    border-radius: 5px;
    box-shadow: 0 2px 8px 0 rgba(59, 65, 94, 0.1),
        0 1px 1px 0 rgba(0, 0, 0, 0.07);

    &:focus-within {
        border: 2px solid black;
    }

    .icon,
    input {
        grid-row-start: 1;
    }

    input {
        border: none;
        outline: none;
    }
}
</style>
