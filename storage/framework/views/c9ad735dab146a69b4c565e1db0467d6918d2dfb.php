<br><br>

<form>
    
    <div class="form-group col-md-10 col-offset-1">
        <div class="row">
            <div class="form-group col-md-6">
                <label for="descripcion_geocerca">Descripcion</label>
                <input type="text" class="form-control" id="descripcion_geocerca" name="descripcion_geocerca" placeholder="Descripción Geocerca">
            </div>
            <div class="form-group col-md-6">
                <label for="tipo_geocerca">Tipo de Geocerca</label>
                <select name="tipo_geocerca" id="tipo_geocerca" class="form-control">
                    <option value="1">Tipo Geocerca 1</option>
                    <option value="2">Tipo Geocerca 2</option>
                    <option value="3">Tipo Geocerca 3</option>
                    <option value="4">Tipo Geocerca 4</option>
                </select>
            </div>
        </div>

        

        <div class="row">
            <div class="form-group col-md-6">
                <label for="tipo_alerta">Tipo de Geocerca</label>
                <select name="tipo_alerta" id="tipo_alerta" class="form-control">
                    <option value="1">Tipo Alerta 1</option>
                    <option value="2">Tipo Alerta 2</option>
                    <option value="3">Tipo Alerta 3</option>
                    <option value="4">Tipo Alerta 4</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="metros_alerta">Metros Alerta</label>
                <input name="metros_alerta" id="metros_alerta" class="form-control">
            </div>
        </div>

        
    </div>




    

    <input type="hidden" id="latitud" name="latitud">
    <input type="hidden" id="longitud" name="longitud">

</form>

<?php /**PATH C:\laragon\www\sismon\resources\views/forms/form_geocerca.blade.php ENDPATH**/ ?>