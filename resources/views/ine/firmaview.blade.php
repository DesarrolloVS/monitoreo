<div class="content-wrapper">
    <vue-signature 
        ref="signature" 
        :sigOption="option" 
        :w="'800px'" 
        :h="'400px'"
        :test-data="{{ json_encode($id) }}"
    >
    </vue-signature>

    <input type="hidden" id="my_id" value="{{ $id }}">

    <button @click="save">Save</button>
    <button @click="clear">clear</button>
</div>