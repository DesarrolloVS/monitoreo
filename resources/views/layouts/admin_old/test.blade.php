<template id="vue-signature" :style="{width:w,height:h}">
    <canvas style="border:1px solid #000000;" :id="uid" class="canvas" :data-uid="uid"></canvas>
</template>
<div id="app">
    <vue-signature ref="signature" :sigOption="option" :w="'800px'" :h="'400px'"></vue-signature>
    <button @click="save">Guardar</button>
    <button @click="clear">Limpiar</button>
</div>

<script>

axios.get('/users', {
    params: {
      name: 'Sherlock'
    }
  })
.then(response => {
    this.user = response.data;
}).catch(e => {
    console.log(e);
})
</script>
