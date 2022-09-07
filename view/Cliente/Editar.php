 <!--autor: Zevallos Escalante Guillermo David-->
 <?php include_once HEADER;?>

 <div class="container">
     <div class="card card-body">
         <form action="<?php echo constant('URLBASE')?>ClienteController/editarCliente" method="POST"
             name="formClientNuevo" id="formClientNuevo">
             <input type="hidden" name="id" id="id" value="<?php echo $resultado['id']; ?>" />
             <div class="form-row">
                 <div class="form-group col-sm-6">
                     <label for="id">ID</label>
                     <input type="text" name="id" id="id" value="<?php echo $resultado['id']; ?>"
                         class="form-control" disabled>
                 </div>
                 <div class="form-group col-sm-6">
                     <label for="nombre">Nombre</label>
                     <input type="text" name="nombre" id="nombre" value="<?php echo $resultado['nombre']; ?>"
                         class="form-control" placeholder="nombre Cliente" required>
                 </div>

                 <div class="form-group col-sm-6">
                     <label for="telefono" class="form-label">telefono</label>
                     <label for="telefono" class="form-label" id="txttelefono"><?php echo $resultado['telefono']; ?></label>
                     <input type="text" class="form-control" id="telefono" name="telefono"
                         value="<?php echo $resultado['telefono']; ?>" >
                 </div>

                 <div class="form-group col-sm-6">
                     <label for="email">email</label>
                     <input type="text" name="email" id="email" value="<?php echo $resultado['email']; ?>"
                         class="form-control" placeholder="email Cliente" required>
                 </div>

                 <div class="form-group col-sm-6">
                     <label for="asunto">asunto</label>
                     <input type="text" name="asunto" id="asunto"
                         value="<?php echo $resultado['asunto']; ?>" class="form-control"
                         placeholder="asunto en inventario" required>
                 </div>


                 <div class="form-group col-sm-6">
                     <label for="mensaje">Mensaje: </label>
                     <input type="text" name="mensaje" id="mensaje"
                         value="<?php echo $resultado['mensaje']; ?>" class="form-control"
                         placeholder="mensaje">
                 </div>


                 <div class="form-group mx-auto">
                     <button type="submit" class="btn btn-primary"
                         onclick="if (!confirm('Esta seguro de modificar el Cliente?')) return false;">Guardar</button>
                     <a href="<?php echo constant('URLBASE')?>ClienteController/buscarClientes"
                         class="btn btn-primary">Cancelar</a>
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
 <?php 
?>
 <?php  require_once FOOTER?>