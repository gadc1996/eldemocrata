<template lang="pug">
.modal
  .tools
    eva-icon.close-icon(name="close-outline" @click="setModalVisible(false)")
    h2(v-if="storeResource") Create Event
    h2(v-if="!storeResource") Update Event
    form(@submit.prevent="submitResource()")
      ModalInput(placeholder="Comments" :value="newRecord.comments" v-model="newRecord.comments")
      ModalInput(placeholder="DateTime" :value="newRecord.datetime" v-model="newRecord.datetime")
      ModalInput(placeholder="Guest Number" :value="newRecord.guests_number" v-model="newRecord.guests_number")
      ModalInput(placeholder="Location" :value="newRecord.location" v-model="newRecord.location")
      ModalInput(placeholder="Payed" :value="newRecord.payed" v-model="newRecord.payed")
      ModalInput(placeholder="Price" :value="newRecord.price" v-model="newRecord.price")
      SubmitButton
</template>

<script>
import { createNamespacedHelpers } from "vuex";
const { mapActions } = createNamespacedHelpers("Events");
export default {
    name: "ModalEvents",
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
