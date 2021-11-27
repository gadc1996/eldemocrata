<template lang="pug">
.modal
  .tools
    eva-icon.close-icon(name="close-outline" @click="setModalVisible(false)")
    h2(v-if="storeResource") Create Event Type
    h2(v-if="!storeResource") Update Event Type
    form(@submit.prevent="submitResource()")
      ModalInput(placeholder="Name" :value="newRecord.name" v-model="newRecord.name")
      SubmitButton
</template>

<script>
import { createNamespacedHelpers } from "vuex";
const { mapActions } = createNamespacedHelpers("EventTypes");
export default {
    name: "ModalEventTypes",
    props: {
        newRecord: {
            type: Object,
        },
        storeResource: {
            type: Boolean,
        },
    },
    components: {
        ModalInput: () => import("@/components/modals/ModalInput"),
        SubmitButton: () => import("@/components/SubmitButton"),
    },
    methods: {
        ...mapActions(["setModalVisible", "store", "update"]),
        submitResource() {
            this.storeResource
                ? this.store(this.newRecord)
                : this.update(this.newRecord);
        },
    },
};
</script>

<style lang="scss">
.modal {
    position: absolute;
    top: 10%;
    background-color: white;
    border: 1px solid black;
    right: 25%;
    width: 50%;
    border-radius: 20px;
    padding: 1rem;

    h2 {
        margin: 0.5rem;
    }

    .close-icon {
        display: block;
        text-align: right;
        cursor: pointer;
    }

    form {
        display: flex;
        flex-direction: column;
        align-items: center;

        input {
            width: 50%;
            margin-bottom: 1rem;
        }
    }
}
</style>
