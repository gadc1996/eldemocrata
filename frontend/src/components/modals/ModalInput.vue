<template lang="pug">
  .modal-input
    input(:placeholder="placeholder" @input="$emit('input', $event.target.value)" :value="value")
</template>
<script>
export default {
    name: "ModalInput",
    props: {
        placeholder: String,
        newRecord: Object,
        value: String,
    },
};
</script>

<style lang="scss">
.modal-input {
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

    input {
        grid-row-start: 1;
    }

    input {
        border: none;
        outline: none;
    }
}
</style>
