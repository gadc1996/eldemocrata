<template lang="pug">
.modal
  .tools
    eva-icon.close-icon(name="close-outline" @click="setModalVisible(false)")
    h2(v-if="storeResource") Create Customer
    h2(v-if="!storeResource") Update Customer
    form(@submit.prevent="submitResource()")
      ModalInput(placeholder="First Name" :value="newRecord.first_name" v-model="newRecord.first_name")
      ModalInput(placeholder="Last Name" :value="newRecord.last_name" v-model="newRecord.last_name")
      ModalInput(placeholder="Email" :value="newRecord.email" v-model="newRecord.email")
      ModalInput(placeholder="Phone Number" :value="newRecord.phone_number" v-model="newRecord.phone_number")
      SubmitButton
</template>

<script>
import { createNamespacedHelpers } from "vuex";
const { mapActions } = createNamespacedHelpers("Customers");
export default {
    name: "ModalCustomers",
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
    async created() {
        await this.loadCustomers();
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
