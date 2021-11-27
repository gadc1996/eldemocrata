<template lang="pug">
.modal
  .tools
    eva-icon.close-icon(name="close-outline" @click="setModalVisible(false)")
    h2(v-if="storeResource") Create Article
    h2(v-if="!storeResource") Update Article
    form(@submit.prevent="submitResource()")
      h2 {{ newRecord }}
      label Title
      ModalInput(placeholder="Title" :value="newRecord.title" v-model="newRecord.title")
      label Content
      VueEditor(v-model="newRecord.content")
      SubmitButton
</template>

<script>
import { VueEditor } from 'vue2-editor';
import { createNamespacedHelpers } from "vuex";
const { mapActions } = createNamespacedHelpers("Articles");
export default {
    name: "ModalArticles",
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
        VueEditor
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
