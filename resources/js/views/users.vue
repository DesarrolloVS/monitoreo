<template>

    <div>
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Gestión Usuarios</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Demo</a></li>
                            <li class="breadcrumb-item active">Usuarios</li>
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
                    <div class="col-lg-6">
                        <!-- form start -->
                        <form class="form-horizontal" @submit.prevent="onSubmit" @keydown="form.errors.clear()">
                            <div class="card card-primary" style="height: 500px;">
                                <div class="card-header">
                                    <h3 class="card-title">Form Usuario</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-2 col-form-label">Nombre</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="name" name="name" required autocomplete="name" autofocus placeholder="Name" v-model="form.name">
                                            <span class="invalid-feedback d-block" role="alert" v-if="form.errors.has('name')" v-text="form.errors.get('name')"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Correo</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputEmail3" placeholder="Email" v-model="form.email" required>
                                                <span class="invalid-feedback d-block" role="alert" v-if="form.errors.has('email')" v-text="form.errors.get('email')"></span>
                                            </div>

                                        </div>

                                    <div class="form-group row">

                                        <label for="password" class="col-sm-2 col-form-label">Pass</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" id="password" placeholder="Password" v-model="form.password" required>
                                            <span class="invalid-feedback d-block" role="alert" v-if="form.errors.has('password')" v-text="form.errors.get('password')"></span>
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                
                                <div class="d-flex align-items-end p-4">
                                    <button type="submit" class="btn btn-outline-primary btn-block" :disabled="form.errors.any()"><i class="fas fa-plus"></i>&emsp;Agregar Usuario</button>
                                <!-- /.card-body -->
                                </div>
                            
                            
                            </div>
                        </form>

                    </div>

                    <div class="col-lg-6">
                        <div class="card card-primary" style="height: 500px;">
                            <div class="card-header">
                                <h3 class="card-title">Usuarios</h3>

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

                                    <!-- <div slot="activate_deactivate" slot-scope="props">
                                        <button
                                            v-if="parseInt(props.row.status) === 1"
                                            type="button"
                                            class="btn btn-danger btn-block"
                                            @click="updateStatus(props.row, 3)"
                                        >
                                            <i class="fa fa-ban"></i> {{ labels.reject }}
                                        </button>

                                        <button
                                            v-else
                                            type="button"
                                            class="btn btn-success btn-block"
                                            @click="updateStatus(props.row, 1)"
                                        >
                                            <i class="fa fa-rocket"></i> {{ labels.approve }}
                                        </button>
                                    </div> -->

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
                columns: ['id', 'name', 'email'],
                options: {
                    filterByColumn: true,
                    perPage: 5,
                    perPageValues: [10, 25, 50, 100, 500],
                    headings: {
                        id: 'ID',
                        name: this.labels.name,
                        email: this.labels.email
                    },
                    //customFilters: ['status'],
                    sortable: ['id', 'name', 'email'],
                    filterable: ['id','name','email'],
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
                    'name': '',
                    'email': '',
                    'password': '',
                    'password_confirmation': ''
                })
            }
        },

        // created() {
        //     let url = '/usuarios';
        //     //alert(url);
        //     axios.get(url)
        //         .then(({data}) => this.users = data);
        // },

        methods: {
            onSubmit(){
                this.form.password_confirmation = this.form.password; // Temp for this form only.
                const name = this.form.name;
                this.form
                    .post('/users')
                    //.then(user => this.users.push(user));
                    .then(response => {
                            this.$refs.table.refresh();
                            $(document).Toasts('create', {
                                title: 'Correcto',
                                body: 'El usuario ' + name + ' fue registrado correctamente.',
                                class: 'bg-success',
                                icon: 'fas fa-check'
                            })
                        })
                //this.$refs.table.refresh();
                
            }
        }
    }

</script>
