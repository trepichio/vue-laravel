<template>
    <form
        :class="css"
        :action="action"
        :method="defineMethod"
        :enctype="enctype"
    >
        <input v-if="token" type="hidden" name="_token" :value="token" />
        <input
            v-if="alterMethod"
            type="hidden"
            name="_method"
            :value="alterMethod"
        />
        <slot></slot>
    </form>
</template>

<script>
export default {
    name: "Formulario",
    props: ["css", "action", "method", "enctype", "token"],
    data() {
        return {
            alterMethod: ""
        };
    },
    computed: {
        defineMethod() {
            if (
                this.method.toLowerCase() === "post" ||
                this.method.toLowerCase() === "get"
            ) {
                return this.method.toLowerCase();
            }
            if (this.method.toLowerCase() === "put") {
                return (this.alterMethod = "put");
            }
            if (this.method.toLowerCase() === "delete") {
                return (this.alterMethod = "delete");
            }

            return "post";
        }
    }
};
</script>

<style media="screen" scoped></style>
