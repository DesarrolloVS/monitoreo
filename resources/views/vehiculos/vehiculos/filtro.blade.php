<div class="row">
    <div class="col my-3">
        <a class="btn btn-primary pull-right" href="/cat_vehiculos/create/{{ $id }}"><i class="fas fa-plus"></i>&nbsp;&nbsp;&nbsp;Agregar Vehículo</a>
    </div>
</div>

@if($vehiculos->first())
<div class="row">
    <div class="col">
        <table class="table table-bordered table-hover table-sm">

        <thead class="thead-light">
            <tr>
                <th class="text-center">Id</th>
                <th class="text-center">Marca</th>
                <th class="text-center">Submarca</th>
                <th class="text-center">Placa</th>
                <th class="text-center">Estado</th>
                <th class="text-center">Gps</th>
                <th class="text-center">Responsable</th>
                <th class="text-center">Modificar</th>
                <th class="text-center">Eliminar</th>
            </tr>
        </thead>
            
            @foreach($vehiculos as $x)
            <tr>
                <td class="text-center">{{ $x->id }}</td>
                <td class="text-center">{{ $x->marca->descripcion }}</td>
                <td class="text-center">{{ $x->submarca->descripcion }}</td>
                <td class="text-center">{{ $x->placa }}</td>
                <td class="text-center"><a class="btn btn-info btn-sm" href="/cat_vehiculos/{{ $x->id }}/estatus">{{ ($x->estadovehiculo_id == "" ) ? estatus_vehiculos($x->estadovehiculo_id) : $x->estadovehiculo->descripcion }}&emsp;<i class="fas fa-exchange-alt"></i></a></td>
                <td class="text-center"><a class="btn btn-primary btn-sm" href="/cat_vehiculos/{{ $x->id }}/gps">{{ ($x->gpscliente_id == "" ) ? "NO ASIGNADO" : $x->gpscliente->imei }}&emsp;<i class="fas fa-location-arrow"></i></a></td>
                <td class="text-center"><a class="btn btn-warning btn-sm" href="/cat_vehiculos/{{ $x->id }}/resp">Responsables&emsp;<i class="fas fa-user-check"></i></a></td>
                <td class="text-center"><a class="btn btn-success btn-sm" href="/cat_vehiculos/{{ $x->id }}/edit"><i class="fas fa-pencil-alt"></i></a></td>
                <td class="text-center"><a class="btn btn-danger btn-sm" href="/cat_vehiculos/{{ $x->id }}/confirmDelete"><i class="fas fa-trash-alt"></i></a></td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@else
<div class="row">
    <br><br><br><br>
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Atención: </strong> No hay registros de vehículos para este cliente.
    </div>
</div>
@endif