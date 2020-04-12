<div class="content-wrapper">
    <ine-component
        :labels="{{ json_encode([
            'id' => __("Id"),
            'nombre' => __("Afiliado"),
            'seccion' => __("Sección"),
            'clave' => __("cve_elec"),
            'link' => __("Firma"),
            'opciones' => __("Opciones")
        ]) }}"
        route="{{ route('ines_json') }}"
    ></ine-component>
</div>