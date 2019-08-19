<?php

//parametro obligatorio
Route::get('saludo/{nombre}', function($nombre){
    return "Saludos " . $nombre;
});

//parametro no obligatorio
Route::get('saludo/{nombre?}', function($nombre = "Invitado"){
    return "Saludos " . $nombre;
});


?>