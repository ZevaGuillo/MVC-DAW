 <!--autor: MUÑOZ SOLORZANO JOHANAN NATANAEL-->
 <?php include_once HEADER;?>
<main>
    <div class="container">
        <div class="card card-body">
            <form action="<?php echo constant('URLBASE')?>ProductoController/editarProducto" method="POST"
                  name="formProdNuevo" id="formProdNuevo">
                <input type="hidden" name="id" id="id" value="<?php echo $resultado['prd_id']; ?>" />
                <div class="form-row">
                    <div class="form-group col-sm-6">
                        <label for="id">ID</label>
                        <input type="text" name="id" id="id" value="<?php echo $resultado['prd_id']; ?>"
                               class="form-control" disabled>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" id="nombre" value="<?php echo $resultado['prd_nombre']; ?>"
                               class="form-control" placeholder="nombre producto">
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="valor" class="form-label">Valor</label>
                        <label for="valor" class="form-label" id="txtValor"><?php echo $resultado['prd_valor']; ?></label>
                        <input type="range" class="form-range" min="0" max="200" id="valor" name="valor"
                               value="<?php echo $resultado['prd_valor']; ?>" onchange="changeValue(this.value)">
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="cantidad">Cantidad</label>
                        <input type="Number" name="cantidad" id="cantidad"
                               value="<?php echo $resultado['prd_cantidad']; ?>" class="form-control"
                               placeholder="Cantidad en inventario">
                    </div>

                    <div class="form-check">
                        <h2>Estados</h2>
                        <label><input class="form-check-input" type="radio" name="estado" id="estado"
                                      value="1">Disponible</label></br>
                        <label><input class="form-check-input" type="radio" name="estado" id="estado" value="0"
                                      checked>Agotado</label>
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="proveedorExtra">Cod.Proveedor actual</label>
                        <input type="Number" name="proveedorExtra" id="proveedorExtra"
                               value="<?php echo $resultado['prd_codigo_proveedor_producto']; ?>" class="form-control"
                               placeholder="Proveedor" disabled>
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="proveedor">Cambiar proveedor a:</label>
                        <select id="proveedor" name="proveedor" class="form-control" onclick="SelectProveedor()">
                        </select>
                    </div>

                    <div class="form-group mx-auto">
                        <button type="button" class="btn btn-primary"
                                onclick="validarFormularios()">Guardar</button>
                        <a href="<?php echo constant('URLBASE')?>ProductoController/buscarProductos"
                           class="btn btn-primary">Cancelar</a>
                    </div>

                </div>
            </form>
        </div>
    </div>
</main>
 <script>
     function SelectProveedor(){
         let url = "<?php echo constant('URLBASE')?>ProductoController/consultarProveedores/";
         var request = new XMLHttpRequest();
         request.open('GET', url, true);
         request.send();
         request.onreadystatechange = function () {
             if (request.readyState == 4 && request.status == 200) {
                 var respuesta = request.responseText;
                 agregar(respuesta);
             }
         };
     }

     function agregar(respuesta){
         var selectBox = document.querySelector('#proveedor');
         var indice = respuesta.indexOf("<!--");
         var cadenaExtraida = respuesta.substring(0, indice);
         var proveedores = JSON.parse(cadenaExtraida);
         resultados = '';

         for (var i = 0; i < proveedores.length; i++) {
             var option=document.createElement("option");
             option.value= proveedores[i].prv_id;
             option.text=proveedores[i].prv_nombre;
             selectBox.appendChild(option);
         }
     }

     function changeValue(newColor) {
         var valor = document.getElementById('valor').value;
         document.getElementById('txtValor').innerHTML = valor;
     }

    function validarFormularios(){
        var valorConfirm = confirm('Esta seguro de modificar el producto?');
        if(valorConfirm){
            var campoNombre = document.querySelector("#nombre").value;
            var campoValor = document.querySelector("#valor").value;
            var campoCantidad = document.querySelector("#cantidad").value;
            var campoEstado = validarRadio();

            if(campoCantidad < 0){
                alert("No debe haber valores negativos");
            }else if(!campoNombre || campoValor != 0
                || (campoEstado != 0 || campoEstado != 1)){
                document.forms.namedItem('formProdNuevo').submit();
            }else{
                alert("CAMPOS VACIOS");
            }
        }
    }

    function validarRadio(){
        var campoRadio = document.querySelectorAll("#estado");
        for (i = 0; i < campoRadio.length; i++){
            if (campoRadio[i].checked) {
                break;
            }
        }
        return seleccionado = campoRadio[i].value
    }
 </script>
 <?php 
?>
 <?php  require_once FOOTER?>