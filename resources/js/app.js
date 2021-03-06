/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import store from './store';
import CKEditor from '@ckeditor/ckeditor5-vue';
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

Vue.use(CKEditor);
Vue.use(new ClassicEditor);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('painel', require('./components/Painel.vue').default);
Vue.component('topo', require('./components/Topo.vue').default);
Vue.component('caixa', require('./components/Caixa.vue').default);
Vue.component('pagina', require('./components/Pagina.vue').default);
Vue.component('tabela-lista', require('./components/TabelaLista.vue').default);
Vue.component('migalhas', require('./components/Migalhas.vue').default);
Vue.component('modal', require('./components/modal/Modal.vue').default);
Vue.component('modal-link', require('./components/modal/ModalLink.vue').default);
Vue.component('formulario', require('./components/Formulario.vue').default);
Vue.component('ckeditor', CKEditor.component);
Vue.component('artigo-card', require('./components/ArtigoCard.vue').default);


/**
 * Vue filters
 */
Vue.filter('formataData', function (value) {
    if (!value) return "";

    value = value.toString();

    if (value.split("-").length == 3) {
        value = value.split("-");
        return value[2] + "/" + value[1] + "/" + value[0];
    }

    return value;
});


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    store,
    mounted: () => {
        document.querySelector('#app').style.display = 'block'
    },
    data() {
        return {
            editor: ClassicEditor,
            editorConfig: {
                toolbar: [
                    "bold",
                    "italic",
                    "blockQuote",
                    "|",
                    "heading",
                    "indent",
                    "outdent",
                    "|",
                    "redo",
                    "undo",
                    "|",
                    "numberedList",
                    "bulletedList",
                    "|",
                    "insertTable",
                    "tableColumn",
                    "tableRow",
                    "mergeTableCells"
                ]
            }
        };
    }
});
