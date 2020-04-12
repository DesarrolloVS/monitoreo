require('./bootstrap');

import Vue from 'vue';
window.Vue = Vue;

import Form from "./utilities/Form";
window.Form = Form;

import {ServerTable} from 'vue-tables-2';
Vue.use(ServerTable, {}, false, 'bootstrap4', 'default');

Vue.component('user-component', require('./views/users.vue').default);
Vue.component('ine-component', require('./views/ine.vue').default);
Vue.component('vue-signature', require('./views/signature.vue').default);

const app = new Vue({
    el: '#app',
    data() {
        return {
          option:{
            penColor:"rgb(0, 0, 0)"
          }
        };
      },
      methods:{
        save(){
          
          var _this = this;
          var png = _this.$refs.signature.save()

          const myId = document.querySelector('#my_id').value;

          axios.get('/ine/guardafirma', {
            params: {
              params: png,
              id: myId
            }
          })
          .then(response => {
            window.location.href = '/cards';
          })
          .catch(e => {
              // Podemos mostrar los errores en la consola
              console.log(e);
          })

          


          // var jpeg = _this.$refs.signature.save('image/jpeg')
          // var svg = _this.$refs.signature.save('image/svg+xml');
          //console.log(png);

          // console.log(jpeg)
          // console.log(svg)
        },
        clear(){
          var _this = this;
          _this.$refs.signature.clear();
        }
      }
});