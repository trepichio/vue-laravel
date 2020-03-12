<template>
    <div class="container">
        <div class="row justify-content-center">
            <div :class="defineTamanho">
                <slot></slot>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Pagina",
    props: ["tamanho"],
    data() {
        return {};
    },
    computed: {
        defineTamanho() {
            let size = Math.abs(this.tamanho);
            size = size == 0 ? 1 : size >= 12 ? 12 : size;
            let offset = (12 - size) / 2;
            return `col-md-${size} col-md-offset-${offset}`;
        }
    }
};
</script>

<style media="screen" scoped></style>
