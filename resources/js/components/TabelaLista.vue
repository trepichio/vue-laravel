<template>
    <div class="container">
        <form class="form">
            <a v-if="criar && !modal" :href="criar">Criar</a>
            <modal-link
                v-if="criar && modal"
                tipo="link"
                nome="adicionar"
                titulo="Criar"
                css=""
            ></modal-link>

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
                    <td v-for="i in item">{{ i | formataData }}</td>

                    <td v-if="detalhe || editar || deletar">
                        <form
                            :id="index"
                            v-if="deletar && token"
                            :action="deletar + item.id"
                            method="post"
                        >
                            <input
                                type="hidden"
                                name="_method"
                                value="DELETE"
                            />
                            <input type="hidden" name="_token" :value="token" />

                            <a v-if="editar && !modal" :href="editar"
                                >Editar |
                            </a>
                            <modal-link
                                v-if="editar && modal"
                                tipo="link"
                                nome="editar"
                                titulo="Editar | "
                                css=""
                                :item="item"
                                :url="editar"
                            ></modal-link>

                            <a v-if="detalhe && !modal" :href="detalhe"
                                >Detalhe |
                            </a>
                            <modal-link
                                v-if="detalhe && modal"
                                tipo="link"
                                nome="detalhe"
                                titulo="Detalhe | "
                                css=""
                                :item="item"
                                :url="detalhe"
                            ></modal-link>

                            <a
                                v-if="deletar"
                                href="#"
                                @click="executaForm(index)"
                                >Deletar</a
                            >
                        </form>

                        <span v-if="!token">
                            <a v-if="editar && !modal" :href="editar"
                                >Editar |
                            </a>
                            <modal-link
                                v-if="editar && modal"
                                tipo="link"
                                nome="editar"
                                titulo="Editar | "
                                css=""
                                :item="item"
                                :url="editar"
                            ></modal-link>

                            <a v-if="detalhe && !modal" :href="detalhe"
                                >Detalhe |
                            </a>
                            <modal-link
                                v-if="detalhe && modal"
                                tipo="link"
                                nome="detalhe"
                                titulo="Detalhe | "
                                css=""
                                :url="detalhe"
                            ></modal-link>

                            <a v-if="deletar" :href="deletar">Deletar</a>
                        </span>

                        <span v-if="token && !deletar">
                            <a v-if="editar && !modal" :href="editar"
                                >Editar |
                            </a>
                            <modal-link
                                v-if="editar && modal"
                                tipo="link"
                                nome="editar"
                                titulo="Editar |"
                                css=""
                                :item="item"
                                :url="editar"
                            ></modal-link>

                            <a v-if="detalhe && !modal" :href="detalhe"
                                >Detalhe
                            </a>
                            <modal-link
                                v-if="detalhe && modal"
                                tipo="link"
                                nome="detalhe"
                                titulo="Detalhe |"
                                css=""
                                :item="item"
                                :url="detalhe"
                            ></modal-link>
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
        "ordemCol",
        "modal"
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
            let lista = this.itens.data;
            let ordem = this.ordemAux;
            let ordemCol = this.ordemAuxCol;

            ordem = ordem.toLowerCase();
            ordemCol = parseInt(ordemCol);

            if (ordem === "asc") {
                lista.sort((a, b) =>
                    Object.values(a)[ordemCol] > Object.values(b)[ordemCol]
                        ? 1
                        : -1
                );
            } else {
                lista.sort((a, b) =>
                    Object.values(a)[ordemCol] < Object.values(b)[ordemCol]
                        ? 1
                        : -1
                );
            }

            if (this.buscar) {
                return lista.filter(res => {
                    res = Object.values(res);

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

            return lista;
        }
    }
};
</script>

<style media="screen" scoped>
.link {
    cursor: pointer;
}
</style>
