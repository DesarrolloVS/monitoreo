<div class="content-wrapper">
    <user-component
        :labels="{{ json_encode([
            'id' => __("Id"),
            'name' => __("Usuario"),
            'email' => __("Correo")
        ]) }}"
        route="{{ route('users_json') }}"
    ></user-component>
</div>