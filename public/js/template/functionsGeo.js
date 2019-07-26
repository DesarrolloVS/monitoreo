function registrarGeocerca(){

    //const descripcion = document.querySelector('#descripcion_geocerca').value;
    //const tipo = document.querySelector('#tipo_geocerca').value;
    //const datitos = {descripcion:descripcion, tipo:tipo};


    //const url = 'registrar/geocerca';
    var URL = $("#form_geocerca").attr("action");
    const datitos = new FormData(document.querySelector('#form_geocerca'));

    fetch(URL, {
        method: 'POST',
        body: datitos
    })
    /*
    .then((res) => res.json())
    .then(function(r){
        console.log(r)
    });
    */
    
    .then((r) => {
        if(r.codigo == 1){
            mostrarMensaje('correcto',r.mensaje);
            $('#modal').modal('hide');
        }else{
            mostrarMensaje('error',r.mensje);
            $('#modal').modal('hide');
        }
    })
    .catch((err) => {
        mostrarMensaje('error' , err)
        console.log(err)
    })
    
}