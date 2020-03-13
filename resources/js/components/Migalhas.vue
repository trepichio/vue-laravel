<template>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li v-for="item in lista" class="breadcrumb-item">
                <a v-if="item.url" :href="item.url" :class="defineClass">{{
                    item.titulo
                }}</a>
                <span v-if="!item.url">{{ item.titulo }}</span>
            </li>
        </ol>
    </nav>
</template>

<script>
export default {
    name: "Migalhas",
    props: ["lista"],
    data() {
        return {};
    },
    computed: {
        defineClass() {
            if (this.url) {
                return "active";
            } else {
                return "";
            }
        }
    }
};
</script>

<style media="screen" scoped></style>
