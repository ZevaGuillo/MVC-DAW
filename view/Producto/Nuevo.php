 <!--autor: MUÑOZ SOLORZANO JOHANAN NATANAEL-->
 <?php include_once HEADER;?>

 <div class="container">
     <div class="card card-body">
         <form action="<?php echo constant('URLBASE')?>ProductoController/nuevoProducto" method="POST"
             name="formProdNuevo" id="formProdNuevo">
             <div class="form-row">
                 <div class="form-group col-sm-6">
                     <label for="codigo">Nombre</label>
                     <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre del producto"
                         autofocus="" required />
                 </div>

                 <div class="form-group col-sm-6">
                     <label for="valor" class="form-label">Valor</label>
                     <label for="valor" class="form-label" id="txtValor">0</label>
                     <input type="range" class="form-range" min="0" max="200" id="valor" name="valor"
                         onchange="changeValue(this.value)">
                 </div>

                 <div class="form-group col-sm-6">
                     <label for="cantidad">Cantidad</label>
                     <input type="Number" name="cantidad" id="cantidad" class="form-control"
                         placeholder="Cantidad en el inventario" required>
                 </div>

                 <div class="form-group col-sm-6">
                     <label for="proveedor">Cambiar proveedor a:</label>
                     <select id="proveedor" name="proveedor" class="form-control">
                         <option value="100">NATANAEL</option>
                         <option value="200" selected>NC_CODE</option>
                     </select>
                 </div>

                 <div class="form-check">
                     <h2>Estados</h2>
                     <label><input class="form-check-input" type="radio" name="estado" value="1">Disponible</label></br>
                     <label><input class="form-check-input" type="radio" name="estado" value="0">Agotado</label>
                 </div>

                 <div class="form-group mx-auto">
                     <button type="submit" class="btn btn-primary">Guardar</button>

                     <a href="<?php echo constant('URLBASE')?>ProductoController/buscarProductos"
                         class="btn btn-primary">
                         Cancelar</a>
                 </div>
             </div>
         </form>


     </div>
 </div>
 <script>
function changeValue(newColor) {
    var valor = document.getElementById('valor').value;
    document.getElementById('txtValor').innerHTML = valor;
}
 </script>

 <?php include_once FOOTER;?>