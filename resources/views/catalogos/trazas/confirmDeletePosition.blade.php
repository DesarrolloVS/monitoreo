@extends('layoutbasico')

@section('content')
<div class="container">
    <div class="row">
        <div class=""><br><br><br>
            <h1>Eliminar Posición</h1>
        </div>
    </div>

    <div class="row">
    <br><br>
        <div class="d-flex justify-content-between">
            <div>
                <a class="btn btn-primary" href="/cat_trazas/{{ $t->id }}/posiciones"><i class="fas fa-angle-double-left"></i>&nbsp;&nbsp;&nbsp;Regresar a Posiciones</a>
            </div>
            <div>
                <a class="btn btn-success" href="/cat_trazas"><i class="fas fa-angle-double-left"></i>&nbsp;&nbsp;&nbsp;Ir a Catálogo Trazas</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col"><br><br>            
            <p>Campo: {{ $tp->camposgps->descripcion }}</p>
            <p>Marca: {{ $t->gpsmarcamodelo->marca }}</p>
            <p>Modelo: {{ $t->gpsmarcamodelo->modelo }}</p>
            <p>Tipo Traza: {{ $t->tipotraza->descripcion }}</p>
        </div>
    </div>

    <div class="row">
        <div class="">
            <form action="/cat_deleteposicion/{{ $tp->id }}" method="POST">
                {{ csrf_field() }}
                @method('delete')
                <br><br><br>
                <button class="btn btn-danger" type="submit">Eliminar</button>
            </form>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script src="{{ asset('js/librerias/jquery.min.js') }}"></script>
<script src="{{ asset('js/gpscliente/eventsIndex.js') }}"></script>
@endpush