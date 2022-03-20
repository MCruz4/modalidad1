<body>

<div class="row mt-3">
  <div class="col-md-5 offset-3">
    <form>
      <h3 class="text-center">Agregar un Nuevo Producto</h3>
      <div class="form-group">
        <label for="prodNombre">Nombre de Producto</label>
        <input type="text" class="form-control" id="prodNombre">
      </div>

      <div class="form-group">
        <label for="prodDescription">Descripcion de Producto</label>
        <input type="text" class="form-control" id="prodDescription">
      </div>

      <div class="form-group">
        <label for="prodMarca">Marca Comercial</label>
        <input type="text" class="form-control" id="prodMarca">
      </div>

      <div class="row"><!--Fila para precios de Costo y Venta-->
        <div class="col-md-5">
          <div class="form-group">
            <label for="prodCosto">Costo de Compra</label>
            <input type="number" step="0.05" value="0.00" class="form-control" id="prodCosto">
          </div>
        </div>

        <div class="col-md-5 offset-2">
          <div class="form-group">
            <label for="prodPrecioVenta">Precio de Venta</label>
            <input type="number" step="0.05" value="0.00" class="form-control" id="prodPrecioVenta">
          </div>

        </div> 
      </div><!--Cierre de fila para precios de Costo y Venta-->

      

      <div class="row"><!--Fila para precios de Costo y Venta-->
        <div class="col-md-5">
          <div class="form-group">
            <label for="prodExistencias">Existencias Disponibles</label>
            <input type="number" step="1" class="form-control" value=0 id="prodExistencias">
          </div>
        </div>

        <div class="col-md-5 offset-2">
          <div class="form-group">
            <label for="prodMinExistencias">Cantidad Mínima de Existencias</label>
            <input type="number" step="1" class="form-control" value="0" id="prodMinExistencias">
          </div>

        </div> 
      </div><!--Cierre de fila para precios de Costo y Venta-->
      




      <button type="button" onclick="agregarProducto()" class="btn btn-primary">Agregar</button>
    </form>
  </div>

</div>


<script type="text/javascript" src="<?=base_url('assets/js/jquery-3.6.0.min.js')?>"></script>
<script type="text/javascript">
  
  function agregarProducto(){
    
    if(validarFormulario() == true){
      //obtener datos
      var data = {
          "prodNombre" : $('#prodNombre').value,
          "prodDescription" : $('#prodDescription').value,
          "prodMarca" : $('#prodMarca').value,
          "prodCosto" : $('#prodCosto').value,
          "prodPrecioVenta" : $('#prodPrecioVenta').value,
          "prodExistencias" : $('#prodExistencias').value,
          "prodMinExistencias" : $('#prodMinExistencias').value,
      }
      $.post('<?=base_url('productos/agregar')?>'){

      }
    }
    
  }

  function validarFormulario(){
    //Verificar que los campos no estén vacios
    var status = true;
    if($('#prodNombre').value == undefined || $('#prodNombre').value == '' ){
      status = remarcarCampo('prodNombre');
    }
    if($('#prodDescription').value == undefined || $('#prodDescription').value == ''){
      status = remarcarCampo('prodDescription');
    }
    if($('#prodCosto').value == undefined || parseFloat($('#prodCosto').value) <= 0.00){
      status = remarcarCampo('prodCosto');
    }
    if($('#prodPrecioVenta').value == undefined || parseFloat($('#prodPrecioVenta').value) <= 0.00){
      status = remarcarCampo('prodPrecioVenta');
    }
    if($('#prodExistencias').value == undefined || parseInt($('#prodExistencias').value) <= 0){
      status = remarcarCampo('prodExistencias');
    }
    if($('#prodMinExistencias').value == undefined || parseInt($('#prodMinExistencias').value) <= 0){
      status = remarcarCampo('prodMinExistencias');
    }
    return status;

  }

  function remarcarCampo(idCampo){
    var campo = document.getElementById(idCampo);
    console.log(campo.value);
    campo.style="border: 2px solid #ff0000;"
    setTimeout(function(){
      campo.style="";
    }, 1000);

    return false;
  }

</script>
</body>