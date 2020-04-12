<template>

    <div>
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Gestión Afiliados</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Afiliados</a></li>
                            <li class="breadcrumb-item active">Afiliados</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">

            <div class="container-fluid">

                <div class="row mx-4">

                    <div class="col-lg-12">

                        

                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Nuevo Registro</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-4">
                                <form @submit.prevent="onSubmit" @keydown="form.errors.clear()" @click="form.errors.clear()">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="seccion">Sección:</label>
                                                <input placeholder="Sección" type="text" id="seccion" name="seccion" class="form-control form-control-sm" v-model="form.seccion" required>
                                                <span class="invalid-feedback d-block" role="alert" v-if="form.errors.has('seccion')" v-text="form.errors.get('seccion')"></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="telefono">Télefono:</label>
                                                <input placeholder="Teléfono" type="text" id="telefono" name="telefono" class="form-control form-control-sm" v-model="form.telefono" >
                                                <span class="invalid-feedback d-block" role="alert" v-if="form.errors.has('telefono')" v-text="form.errors.get('telefono')"></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="celular">Celular:</label>
                                                <input placeholder="Celular" type="text" id="celular" name="celular" class="form-control form-control-sm" v-model="form.celular" >
                                                <span class="invalid-feedback d-block" role="alert" v-if="form.errors.has('celular')" v-text="form.errors.get('celular')"></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="cp">Código postal:</label>
                                                <input placeholder="Código postal" type="text" id="cp" name="cp" class="form-control form-control-sm" v-model="form.cp" >
                                                <span class="invalid-feedback d-block" role="alert" v-if="form.errors.has('cp')" v-text="form.errors.get('cp')"></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="correo">Correo:</label>
                                                <input placeholder="Correo" type="text" id="correo" name="correo" class="form-control form-control-sm" v-model="form.correo" >
                                                <span class="invalid-feedback d-block" role="alert" v-if="form.errors.has('correo')" v-text="form.errors.get('correo')"></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="paterno">Paterno:</label>
                                                <input placeholder="Paterno" type="text" id="paterno" name="paterno" class="form-control form-control-sm" v-model="form.paterno" required>
                                                <span class="invalid-feedback d-block" role="alert" v-if="form.errors.has('paterno')" v-text="form.errors.get('paterno')"></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="materno">Materno:</label>
                                                <input placeholder="Materno" type="text" id="materno" name="materno" class="form-control form-control-sm" v-model="form.materno" required>
                                                <span class="invalid-feedback d-block" role="alert" v-if="form.errors.has('materno')" v-text="form.errors.get('materno')"></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="nombre">Nombre(s):</label>
                                                <input placeholder="Nombre(s)" type="text" id="nombre" name="nobre" class="form-control form-control-sm" v-model="form.nombre" required>
                                                <span class="invalid-feedback d-block" role="alert" v-if="form.errors.has('nombre')" v-text="form.errors.get('nombre')"></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="fechaafiliacion">Fecha de Afiliación:</label>
                                                <input placeholder="Fecha de Afiliación" type="date" id="fechaafiliacion" name="fechaafiliacion" class="form-control form-control-sm" v-model="form.fechaafiliacion" >
                                                <span class="invalid-feedback d-block" role="alert" v-if="form.errors.has('fechaafiliacion')" v-text="form.errors.get('fechaafiliacion')"></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="calle">Calle:</label>
                                                <input placeholder="Calle" type="text" id="calle" name="calle" class="form-control form-control-sm" v-model="form.calle" >
                                                <span class="invalid-feedback d-block" role="alert" v-if="form.errors.has('calle')" v-text="form.errors.get('calle')"></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="exterior">Número Exterior:</label>
                                                <input placeholder="Número Exterior" type="text" id="exterior" name="exterior" class="form-control form-control-sm" v-model="form.exterior" >
                                                <span class="invalid-feedback d-block" role="alert" v-if="form.errors.has('exterior')" v-text="form.errors.get('exterior')"></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="interior">Número Interior:</label>
                                                <input placeholder="Número Interior" type="text" id="interior" name="interior" class="form-control form-control-sm" v-model="form.interior" >
                                                <span class="invalid-feedback d-block" role="alert" v-if="form.errors.has('interior')" v-text="form.errors.get('interior')"></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="colonia_id">Colonia:</label>
                                                <select class="form-control form-control-sm" id="colonia_id" name="colonia_id" v-model="form.colonia_id" >
                                                    <option :value="null">Seleccione una Opción</option>
                                                    <option value="1">Colonia 1</option>
                                                    <option value="2">Colonia 2</option>
                                                </select>
                                                <span class="invalid-feedback d-block" role="alert" v-if="form.errors.has('colonia_id')" v-text="form.errors.get('colonia_id')"></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="delegacion_id">Delegación:</label>
                                                <select class="form-control form-control-sm" id="delegacion_id" name="delegacion_id" v-model="form.delegacion_id" >
                                                    <option :value="null">Seleccione una Opción</option>
                                                    <option value="1">DELEGACION 1</option>
                                                    <option value="2">DELEGACION 2</option>
                                                </select>
                                                <span class="invalid-feedback d-block" role="alert" v-if="form.errors.has('delegacion_id')" v-text="form.errors.get('delegacion_id')"></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="entidad_id">Entidad:</label>
                                                <select class="form-control form-control-sm" id="entidad_id" name="entidad_id" v-model="form.entidad_id" >
                                                    <option :value="null" selected>Seleccione una Opción</option>
                                                    <option value="1">ENTIDAD 1</option>
                                                    <option value="2">ENTIDAD 2</option>
                                                </select>
                                                <span class="invalid-feedback d-block" role="alert" v-if="form.errors.has('entidad_id')" v-text="form.errors.get('entidad_id')"></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="claveelector">Clave de Elector:</label>
                                                <input placeholder="Clave de Elector" type="claveelector" id="claveelector" name="claveelector" class="form-control form-control-sm" v-model="form.claveelector" required>
                                                <span class="invalid-feedback d-block" role="alert" v-if="form.errors.has('claveelector')" v-text="form.errors.get('claveelector')"></span>
                                            </div>
                                        </div>

                                        
                                    </div>
                                    
                                    <div class="p-4">
                                        <button type="submit" class="btn btn-outline-primary btn-block" :disabled="form.errors.any()"><i class="fas fa-plus"></i>&emsp;Agregar Registro</button>
                                    <!-- /.card-body -->
                                    </div>

                                </form>
                                
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>

                    <div class="col-lg-12">

                        <div class="card card-primary" style="height: 500px;">
                            <div class="card-header">
                                <h3 class="card-title">Afiliados</h3>

                                <!-- <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-4">
                                <!-- <table class="table table-bordered table-hover table-sm">
                                    <thead class="thead-light">
                                    <tr>
                                        <th>ID</th>
                                        <th>User</th>
                                        <th>Email</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="user in users">
                                        <td>{{user.id}}</td>
                                        <td>{{user.name}}</td>
                                        <td>{{user.email}}</td>
                                    </tr>
                                    </tbody>
                                </table> -->
                                <v-server-table ref="table" :columns="columns" :url="url" :options="options" class="table table-bordered table-hover table-sm">

                                    <div slot="link" slot-scope="props">
                                        <a  
                                            v-if="props.row.link"
                                            class="btn btn-primary btn-sm"
                                            :href="'/storage/images_base64/' + props.row.link"
                                            target="_blank"
                                        >
                                        <i class="fas fa-signature"></i> {{ labels.link }}
                                        </a>
                                    </div>

                                    <div slot="opciones" slot-scope="props">
                                        <div class="dropdown">
                                            <button class="btn btn-success btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Opciones
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="#">Agregar Foto</a>
                                                <a class="dropdown-item" :href="'ine/firma/' +  props.row.id ">Agregar Firma</a>
                                                <a class="dropdown-item" href="#">Modificar</a>
                                                <a class="dropdown-item" href="#">Eliminar</a>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- <div slot="status" slot-scope="props">
                                        {{ formattedStatus(props.row.status) }}
                                    </div>

                                    <div slot="filter__status" @change="filterByStatus">
                                        <select class="form-control" v-model="status">
                                            <option selected value="0">Selecciona una opción</option>
                                            <option value="1">Publicado</option>
                                            <option value="2">Pendiente</option>
                                            <option value="3">Rechazado</option>
                                        </select>
                                    </div> -->

                                </v-server-table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>

                    

                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /.content -->

    </div>

</template>

<script>
    import {Event} from 'vue-tables-2';
    export default {

        props: {
            labels: {
                type: Object,
                required: true
            },
            route: {
                type: String,
                required: true
            }
        },

        // data() {
        //     return {
        //         users: [],
        //         form: new Form({
        //             'name': '',
        //             'email': '',
        //             'password': '',
        //             'password_confirmation': ''
        //         })
        //     }

        // },

        data () {
            return {
                processing: false,
                url: this.route,
                columns: ['id', 'nombre', 'seccion','clave_elector','link','opciones'],
                options: {
                    filterByColumn: true,
                    perPage: 5,
                    perPageValues: [10, 25, 50, 100, 500],
                    headings: {
                        id: 'ID',
                        nombre: this.labels.nombre,
                        seccion: this.labels.seccion,
                        clave_elector: this.labels.clave,
                        opciones: this.labels.opciones
                    },
                    //customFilters: ['status'],
                    sortable: ['id','seccion','clave_elector'],
                    filterable: ['id', 'seccion', 'clave_elector'],
                    requestFunction: function (data) {
                        //console.log(data);
                        return window.axios.get(this.url, {
                            params: data
                        })
                        .catch(function (e) {
                            this.dispatch('error', e);
                        }.bind(this));
                    }
                },
                form: new Form({
                    'seccion': '',
                    'telefono': '',
                    'celular': '',
                    'cp': '',
                    'correo': '',
                    'paterno': '',
                    'materno': '',
                    'nombre': '',
                    'seccion': '',
                    'fechaafiliacion': '',
                    'calle': '',
                    'exterior': '',
                    'interior': '',
                    'colonia_id': '',
                    'delegacion_id': '',
                    'entidad_id': '',
                    'claveelector': ''
                })
            }
        },        

        methods: {
            onSubmit(){
                this.form
                .post('/nuevaine')
                    
                .then(response => {
                    this.$refs.table.refresh();
                    $(document).Toasts('create', {
                        title: 'Correcto',
                        body: 'Registro Correcto de Afiliado.',
                        class: 'bg-success',
                        icon: 'fas fa-check'
                    })
                })
                this.$refs.table.refresh();
                
            }
        }

        
    }

</script>
