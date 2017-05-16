<?php
defined('BASEPATH') OR exit('No direct script access allowed');  ?>
<script>
  var vue=new Vue({
    el: '#root',
    data: {
      cantidad: '',
      productos:[
        {id:1, text: 'Globo '},
        {id:2, text: 'Mas globos '},
        {id:3, text: 'muchos mas globos '}
      ],
      productos_agregados:[]
    },
    methods: {
      agregarProductos(e){
        console.log(e)
        let aux {cantidad: this.cantidad, text: 'ejemplo', id:1}
        this.cantidad=''
      },
      eliminarDeLista(prod){
        let indice = this.productos_agregados.indexOF(prod)
        this.productos.agregados.splice(indice, 1)
      }
    }

  })


</script>
