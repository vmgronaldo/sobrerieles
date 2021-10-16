import ViewManager from "./ViewManager";
import Form from "../plugins/form";
import Vue from "vue";

const app = new Vue({
    el: '#certificado',
    data() {
        return {
            drawer: false,
            loading: false,
            timer: null,
            form: new Form(this.$refs.formCertificado),
            refInterval: null,
        }
    },
    created() {
        try {
            ViewManager.emit('certificados', 'created', this)
        } catch (e) {
        }
    },
    mounted() {
        window.certificado = this
        try {
            ViewManager.emit('mounted', 'created', this)
        } catch (e) {
        }
    },
    methods: {
        handleOpened() {
            this.refInterval = setInterval(() => {


                    this.form.setFormId(this.$refs.formCertificado)
                    clearInterval(this.refInterval)

            }, 500);
        },
        renderSelectProp(data) {
            if (!this.$refs.model_id_select) {
                this.$refs.model_id_select = $("select[name=model_id]")[0];//.children().each
            }
            let exists = null;
            $(this.$refs.model_id_select).children().each((i, el) => {
                if (el.value == data.id) {
                    exists = el
                }
                el.selected = false;
            })
            if (exists) {
                exists.selected = true
            } else {
                let option = document.createElement("option")
                option.value = data.id
                option.text = data.firstname + ' ' + data.lastname;
                $(this.$refs.model_id_select).append(option)
                option.selected = true
            }
        },
        handleClose() {
            if (this.loading) {
                return;
            }
            this.loading = true;
            this.form.submit().then((d) => {
                console.log(d);
                this.loading = false;
                this.drawer = false;
                this.$notify({
                    title: 'Success',
                    message: 'Se creo correctamente',
                    type: 'success'
                });
                this.renderSelectProp(d.data)
            }).catch((d) => {
                this.loading = false;
                console.log(d.response)
            })
        },
        cancelForm() {
            this.loading = false;
            this.drawer = false;
            clearTimeout(this.timer);
        }
    }
});
