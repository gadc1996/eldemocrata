<template lang="pug">
  .login
    LoginForm
    LoginImage
</template>

<script>
import { mapGetters } from "vuex";

export default {
    components: {
        AlertMessage: () => import("@/components/AlertMessage"),
        LoginForm: () => import("@/components/LoginForm"),
        LoginImage: () => import("@/components/LoginImage"),
    },
    data: () => ({
        form: {},
    }),
    computed: {
        ...mapGetters(["user", "userIsAuthenticated"]),
    },
    watch: {
        userIsAuthenticated: function (userIsAuthenticated) {
          if(userIsAuthenticated)
            this.$router.push("/dashboard");
        },
    },
};
</script>

<style lang="scss">
.login {
    display: grid;
    grid-template-columns: 1fr 2fr;
    width: 100vw;
    height: 100vh;
    overflow: hidden;
}
</style>
