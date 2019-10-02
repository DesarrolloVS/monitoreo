@if($count > 0)
<div class="row">

    <div class="col">
        <table class="table table-bordered table-hover table-sm">
            <thead class="thead-light">
                <tr>
                    <th class="text-center">Id</th>
                    <!-- <th class="text-center">Marca</th>
                    <th class="text-center">Modelo</th> -->
                    <th class="text-center">Alerta</th>
                    <!-- <th class="text-center">Campo</th>
                    <th class="text-center">Tipo Alerta</th>
                    <th class="text-center">Tipo de Dato</th>
                    <th class="text-center">Valor</th> -->
                    <th class="text-center">Repetir</th>
                    <th class="text-center">Revisar</th>
                    <th class="text-center">Habilitada</th>
                    
                </tr>
            </thead>
            @foreach($alertas as $x)
            <tr>
                @php
                $r = fnValor($x['tipodato'])
                @endphp
                <td class="text-center">{{ $x['id'] }}</td>
                <td class="text-center">{{ $x['alerta'] }}</td>
                <td class="text-center">{{ $x['repetir'] }}</td>
                <td class="text-center">{{ $x['revisar'] }}</td>
                <td class="text-center"><input data-alerta_id="{{ $x['id'] }}" class="alertaz" type="checkbox" onclick="escuchaChecks()"
                @if($x['aux'] == 1)
                checked
                @endif
                ></td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@else
<div class="row ">
    <div class="col">
        <br><br>
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Atención: </strong> No hay registros de alertas para este GPS.
        </div>
    </div>
</div>
@endif

<div class="row">
    <div class="col">
        <br><br>
        <div id="updatee" style="display:none">
            <!-- <a href="" class="btn btn-primary btn-block" onclick="actualizaAlertas()">Actualizar</a> -->
            <button class="btn btn-primary btn-block" onclick="actualizaAlertas()">Actualizar</button>
        </div>
    </div>
</div>

<input href="#" type="hidden" name="" onclick="seteaValores()">




