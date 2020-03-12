<template>
    <div class="container">
        <a v-if="criar" :href="criar">Criar</a>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th v-for="titulo in titulos">{{ titulo }}</th>

                    <th v-if="detalhe || editar || deletar">Ação</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(item, index) in itens">
                    <td v-for="i in item">{{ i }}</td>

                    <td v-if="detalhe || editar || deletar">
                        <form
                            :id="index"
                            v-if="deletar && token"
                            :action="deletar"
                            method="post"
                        >
                            <input
                                type="hidden"
                                name="_method"
                                value="DELETE"
                            />
                            <input type="hidden" name="_token" :value="token" />
                            <a v-if="editar" :href="editar">Editar | </a>
                            <a v-if="detalhe" :href="detalhe">Detalhe | </a>
                            <a
                                v-if="deletar"
                                href="#"
                                @click="executaForm(index)"
                                >Deletar</a
                            >
                        </form>
                        <span v-if="!token">
                            <a v-if="editar" :href="editar">Editar | </a>
                            <a v-if="detalhe" :href="detalhe">Detalhe | </a>
                            <a v-if="deletar" :href="deletar">Deletar</a>
                        </span>
                        <span v-if="token && !deletar">
                            <a v-if="editar" :href="editar">Editar | </a>
                            <a v-if="detalhe" :href="detalhe">Detalhe </a>
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    name: "TabelaLista",
    props: [
        "titulos",
        "itens",
        "criar",
        "editar",
        "detalhe",
        "deletar",
        "token"
    ],
    data() {
        return {};
    },
    methods: {
        executaForm(index) {
            document.getElementById(index).submit();
        }
    }
};
</script>

<style media="screen" scoped></style>
