<template>
    <div class="">
        <button
            v-if="!tipo || (tipo !== 'button' && tipo !== 'link')"
            type="button"
            :class="css || 'btn btn-primary'"
            data-toggle="modal"
            :data-target="`#${nome}`"
        >
            {{ titulo }}
        </button>
        <button
            v-if="tipo == 'button'"
            type="button"
            :class="css || 'btn btn-primary'"
            data-toggle="modal"
            :data-target="`#${nome}`"
        >
            {{ titulo }}
        </button>
        <a
            v-if="tipo == 'link'"
            href="#"
            data-toggle="modal"
            :data-target="`#${nome}`"
            :class="css || ''"
        >
            {{ titulo }}
        </a>
    </div>
</template>

<script>
export default {
    name: "ModalLink",
    props: ["tipo", "nome", "titulo", "css"],
    data() {
        return {};
    }
};
</script>

<style media="screen" scoped></style>
