<el-drawer
    size="70%"
    title="Registrar Participante"
    ref="drawer"
    @opened="handleOpened"
    :visible.sync="drawer">
    <div class="container" v-cloak v-loading="loading">
        <div class="card">
            <div class="card-body" v-if="form.errors.size()>0">
                <el-alert
                    v-for="err in form.errors.getErrors()"
                    :title="err"
                    type="error">
                </el-alert>
            </div>
            <div class="card-body">
                <form role="form" class="form-participants" method="POST" action="{{route('participants.store')}}" ref="formCertificado">
                    @csrf
                    <div class="card">
                        <div class="card-header">Crear de participante</div>
                        <div class="card-body">
                            <div class="">
                                <select name="tipo" id="tipo"  v-model="form.tipo" required class="form-control mb-3">
                                    <option value="DNI">DNI</option>
                                    <option value="RUC">RUC</option>
                                    <option value="C.E">C.E</option>
                                    <option value="PASAPORTE" >PASAPORTE</option>
                                </select>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-user"></i>
                                </span>
                                </div>
                                <input type="text"    v-model="form.dni" placeholder="Codigo DNI:" name="dni" max="8" maxlength="8" class="form-control" id="dni" aria-describedby="dni">

                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-user"></i>
                                </span>
                                </div>
                                <input type="text" name="firstname" v-model="form.firstname" placeholder="Nombre(s)" class="form-control" id="firstname">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-user"></i>
                                </span>
                                </div>
                                <input type="text" name="lastname" v-model="form.lastname"  placeholder="Apellido(s)" class="form-control" id="lastname">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                               <i class="fa fa-user"></i>
                                </span>
                                </div>
                                <input type="email" name="email" v-model="form.email" placeholder="Email" class="form-control" id="email">
                            </div>


                        </div>
                    </div>


                </form>
            </div>
            <div class="card-footer">
                <button class="btn btn-default" @click="cancelForm">Cancelar</button>
                <button v-loading="loading" class="btn btn-primary" @click="handleClose" :loading="loading">@{{ loading
                    ? 'Crenado ...' : 'Crear Participante' }}
                </button>
            </div>
        </div>
    </div>
</el-drawer>
