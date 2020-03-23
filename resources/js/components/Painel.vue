<template>
    <div class="card" :class="defineCor">
        <div v-if="titulo" class="card-header">
            {{ titulo }}
        </div>

        <div class="card-body">
            <slot></slot>
        </div>
    </div>
</template>

<script>
export default {
    name: "Painel",
    props: ["titulo", "cor"],
    data() {
        return {};
    },
    computed: {
        defineCor() {
            return `${this.cor || "bg-light"}`;
        }
    }
};
</script>

<style lang="css" scoped>
.green {
    border-color: #38c172;
}

.green > .card-header {
    background-color: #52d320;
    color: #424e44;
    border-color: #38c172;
}
.blue {
    border-color: #38c172;
}

.blue > .card-header {
    background-color: #350ce7;
    color: #eaf3ec;
    border-color: #350ce7;
}
.orange {
    border-color: #38c172;
}

.orange > .card-header {
    background-color: #ee660bea;
    color: #703803;
    border-color: #ee660bea;
}
</style>
