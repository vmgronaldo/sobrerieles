<script>
    import FullCalendar from '@fullcalendar/vue'
    import dayGridPlugin from '@fullcalendar/daygrid'
    import lang from 'element-ui/lib/locale/lang/es'
    import locale from 'element-ui/lib/locale'
    locale.use(lang);
    export default {
        components: {
            FullCalendar // make the <FullCalendar> tag available
        },
        props: {
            user: String,
        },
        data() {
            return {

                calendarPlugins: [dayGridPlugin],
                events: "",
                items: [],
                errors: {},
                success: false,
                loaded: false,
                newEvent: {
                    user_id: this.user,
                    course_id: this.course_id,
                    event_name: "",
                    descripcion: "",
                    start_date: "",
                    fecha_fin: "",
                },
                addingMode: true,
                indexToUpdate: ""
            };
        },
        created() {
            this.list_items();
            this.getEvents();
        },
        methods: {
            list_items() {
                let vm = this;
                axios.get('/course/all/')
                    .then(resp => (vm.items = resp.data))
                    .catch(err => console.log(err.response.data));

            },
            addNewEvent() {
                this.loaded = true;
                this.success = false;
                this.errors = {};
                var vm = this;
                axios
                    .post("/calendar", {
                        ...this.newEvent

                    })
                    .then(data => {
                        vm.loaded = false;
                        vm.success = true;
                        this.$notify({
                            showClose: true,
                            title: 'Exito',
                            message: 'Se registro actividad',
                            type: 'success'
                        });
                        this.getEvents(); // update our list of events
                        this.resetForm(); // clear newEvent properties (e.g. title, start_date and end_date)
                    })
                    .catch((d) => {
                        vm.loaded = false;
                        console.log(d.response.data);
                        this.$notify({
                            showClose: true,
                            title: 'Ups paso algo...!',
                            message: 'Revisa cual es el error.',
                            type: 'error'
                        });
                        if (d.response.data.errors) {
                            vm.errors = d.response.data.errors || {};
                        }
                    })
            },

            showEvent(arg) {
                this.addingMode = false;
                const {id,course_id, title, start, end} = this.events.find(
                    event => event.id === +arg.event.id
                );
                this.indexToUpdate = id;
                this.newEvent = {
                    user_id: this.user,
                    event_name: title,
                    start_date: start,
                    fecha_fin: end,
                    course_id: course_id,
                };
            },
            updateEvent() {
                axios
                    .put("/calendar/" + this.indexToUpdate, {
                        ...this.newEvent
                    })
                    .then(resp => {
                        this.resetForm();
                        this.$notify({
                            showClose: true,
                            title: 'Exito',
                            message: 'Se Actualizo registro',
                            type: 'success'
                        });
                        this.getEvents();
                        this.addingMode = !this.addingMode;
                    })
                    .catch(err =>
                        console.log("Unable to update event!", err.response.data)
                    );
            },
            deleteEvent() {
                axios
                    .delete("/calendar/" + this.indexToUpdate)
                    .then(resp => {
                        this.resetForm();
                        this.getEvents();
                        this.$notify({
                            showClose: true,
                            title: 'Exito',
                            message: 'Se pudo eliminar',
                            type: 'success'
                        });
                        this.addingMode = !this.addingMode;
                    })
                    .catch((d) => {
                        console.log("Unable to delete event!", d.response.data);
                        this.$notify({
                            showClose: true,
                            title: 'Ups paso algo...!',
                            message: 'No se pudo eliminar',
                            type: 'error'
                        });
                    });
            },
            getEvents() {
                axios.get('/calendario/all/')
                    .then(resp => (this.events = resp.data))
                    .catch(err => console.log(err.response.data));
            },
            resetForm() {
                Object.keys(this.newEvent).forEach(key => {
                    return (this.newEvent[key] = "");
                });
                this.newEvent = {
                    user_id: this.user,
                };
            }
        },

        watch: {
            indexToUpdate() {
                return this.indexToUpdate;
            }
        }
    };
</script>

<template>
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-4">
                <div class="card card-primary">
                    <div class="card-header">
                       Calendario de capacitaciones
                    </div>
                    <div class="card-body">
                        <form v-loading="loaded" @submit.prevent>
                            <input type="hidden" id="model_id" v-model="newEvent.user_id">
                            <div class="form-group">
                                <select name="course_id" id="course_id" class="form-control " placeholder="Seleccionar"  v-model="newEvent.course_id" >
                                    <option value="">Seleccionar curso:</option>
                                    <option :value="item.id" v-for="item in items"    :key="item.name">{{item.curso}} - {{item.type}}</option>
                                </select>
                                <div v-if="errors && errors.course_id" class="text-danger">{{ errors.course_id[0] }}</div>
                            </div>
                            <div class="form-group">
                                <label for="event_name">Asunto</label>
                                <input type="text" id="event_name" class="form-control" v-model="newEvent.event_name">
                                <div v-if="errors && errors.event_name" class="text-danger">{{ errors.event_name[0] }}</div>
                            </div>
                            <div class="form-group">
                                <label for="event_name">Descripcion</label>
                                <input type="text" id="descripcion" class="form-control" v-model="newEvent.descripcion">
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Fecha Inicio:</label>

                                        <input type="date"  v-model="newEvent.start_date" class="form-control">
                                        <div v-if="errors && errors.start_date" class="text-danger">{{ errors.start_date[0] }}</div>

                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Fecha Fin:</label>

                                        <input type="date"  v-model="newEvent.fecha_fin" class="form-control">
                                        <div v-if="errors && errors.fecha_fin" class="text-danger">{{ errors.fecha_fin[0] }}</div>

                                    </div>
                                </div>
                                <div class="col-md-6 mb-4 mt-2" v-if="addingMode">
                                    <button class="btn btn-sm btn-primary" @click="addNewEvent">Guardar</button>
                                </div>
                                <div class="col-12 mt-3" v-else>
                                    <div class="row">
                                        <button class="btn btn-sm btn-success ml-2 mb-2 col-12" @click="updateEvent"><i
                                            class="fa fa-edit"></i> Actualizar
                                        </button>
                                        <button class="btn btn-sm btn-danger ml-2  mb-2 col-12" @click="deleteEvent"><i
                                            class="fa fa-trash"></i> Borrar
                                        </button>
                                        <button class="btn btn-sm btn-light ml-2 col-12" @click="addingMode = !addingMode"><i
                                            class="fa fa-close"></i> Cancelar
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
            <div class="col-md-8">
                <div class="card card-primary">
                    <div class="card-body">
                <FullCalendar  locales="es"   @eventClick="showEvent" :plugins="calendarPlugins" v-model="events" :events="events"
                />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style lang='scss'>

    @import '~@fullcalendar/core/main.css';
    @import '~@fullcalendar/daygrid/main.css';

    .fc-title {
        color: #fff;
    }

    .fc-title:hover {
        cursor: pointer;
    }

</style>
