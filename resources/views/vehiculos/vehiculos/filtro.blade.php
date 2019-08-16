<div class="row">
    <div class="form-group">
        <br><br>
        <a class="btn btn-primary pull-right" href="/cat_vehiculos/create/{{ $id }}"><i class="fas fa-plus"></i>&nbsp;&nbsp;&nbsp;Agregar Vehículo</a>
    </div>
</div>

@if($vehiculos->first())
<div class="row">
    <br><br>
    <div class="form-group">
        <table class="table table-bordered">
            <th class="text-center">Id</th>
            <th class="text-center">Marca</th>
            <th class="text-center">Submarca</th>
            <th class="text-center">Placa</th>
            <th class="text-center">Estado</th>
            <th class="text-center">Gps</th>
            <th class="text-center">Modificar</th>
            <th class="text-center">Eliminar</th>
            @foreach($vehiculos as $x)
            <tr>
                <td class="text-center">{{ $x->id }}</td>
                <td class="text-center">{{ $x->marca->descripcion }}</td>
                <td class="text-center">{{ $x->submarca->descripcion }}</td>
                <td class="text-center">{{ $x->placa }}</td>
                <td class="text-center"><a class="btn btn-info btn-xs" href="/cat_vehiculos/{{ $x->id }}/estatus">{{ ($x->estadovehiculo_id == "" ) ? estatus_vehiculos($x->estadovehiculo_id) : $x->estadovehiculo->descripcion }}&emsp;<i class="fas fa-exchange-alt"></i></a></td>
                <td class="text-center"><a class="btn btn-primary btn-xs" href="/cat_vehiculos/{{ $x->id }}/gps">{{ ($x->gpscliente_id == "" ) ? "NO ASIGNADO" : $x->gpscliente->imei }}&emsp;<i class="fas fa-location-arrow"></i></a></td>
                <td class="text-center"><a class="btn btn-success btn-xs" href="/cat_vehiculos/{{ $x->id }}/edit"><i class="fas fa-pencil-alt"></i></a></td>
                <td class="text-center"><a class="btn btn-danger btn-xs" href="/cat_vehiculos/{{ $x->id }}/confirmDelete"><i class="fas fa-trash-alt"></i></a></td>
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