<template>
    <div :class="'col-sm-' + (sm || '6') + ' col-md-' + (md || '4') + ' mb-2'">
        <div class="card" style="width: 20rem;">
            <img :src="imagePath" class="card-img-top" :alt="alt" />
            <div class="card-body">
                <p class="card-text">
                    <small class="text-muted"
                        >{{ data | formataData }} - {{ autor }}</small
                    >
                </p>
                <h5 class="card-title">{{ titulo }}</h5>
                <p class="card-text">
                    {{ conteudo }}
                </p>
                <slot name="botoes"></slot>
                <a :href="link" class="btn btn-info ">Leia mais</a>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "card",
    props: [
        "titulo",
        "conteudo",
        "imagePath",
        "alt",
        "link",
        "data",
        "autor",
        "sm",
        "md"
    ],
    data() {
        return {};
    }
};
</script>

<style media="screen" scoped>
.card-title {
    font-size: 4ch;
}
</style>
