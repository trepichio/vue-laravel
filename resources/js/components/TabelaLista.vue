<template>
    <div class="container">
        <form class="form">
            <a v-if="criar" :href="criar">Criar</a>
            <div class="form-group float-right mb-2">
                <input
                    type="search"
                    class="form-control"
                    id="inputBuscar"
                    placeholder="Buscar"
                    v-model="buscar"
                />
            </div>
        </form>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th
                        v-for="(titulo, index) in titulos"
                        @click="ordenaColuna(index)"
                        class="link"
                    >
                        {{ titulo }}
                    </th>

                    <th v-if="detalhe || editar || deletar">Ação</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(item, index) in lista">
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
        "token",
        "ordem",
        "ordemCol"
    ],
    data() {
        return {
            buscar: "",
            ordemAux: this.ordem || "asc",
            ordemAuxCol: this.ordemCol || 0
        };
    },
    methods: {
        executaForm(index) {
            document.getElementById(index).submit();
        },
        ordenaColuna(coluna) {
            this.ordemAuxCol = coluna;
            if (String(this.ordemAux).toLowerCase() == "DESC") {
                this.ordemAuxCol = "asc";
            } else {
                this.ordemAuxCol = "desc";
            }
        }
    },
    computed: {
        lista() {
            let ordem = this.ordemAux;
            let ordemCol = this.ordemAuxCol;

            ordem = ordem.toLowerCase();
            ordemCol = parseInt(ordemCol);

            if (ordem === "asc") {
                this.itens.sort((a, b) => (a[ordemCol] > b[ordemCol] ? 1 : -1));
            } else {
                this.itens.sort((a, b) => (a[ordemCol] < b[ordemCol] ? 1 : -1));
            }

            return this.itens.filter(res => {
                for (let k = 0; k < res.length; k++) {
                    if (
                        String(res[k])
                            .toLowerCase()
                            .indexOf(this.buscar.toLocaleLowerCase()) >= 0
                    ) {
                        return true;
                    }
                }
                return false;
            });
        }
    }
};
</script>

<style media="screen" scoped>
.link {
    cursor: pointer;
}
</style>
