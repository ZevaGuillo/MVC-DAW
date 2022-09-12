 <!--autor: MUÑOZ SOLORZANO JOHANAN NATANAEL-->
 <?php include_once HEADER;?>

 <div class="container">
     <div class="card card-body">
         <form action="<?php echo constant('URLBASE')?>LoginController/login" method="POST" name="formProdNuevo"
             id="formProdNuevo">
             <div class="form-row">
                 <div class="form-group col-sm-6">
                     <label for="usuario">Nombre</label>
                     <input type="text" name="usuario" id="usuario" class="form-control" placeholder="Nombre de usuario"
                         autofocus="" required />
                 </div>

                 <div class="form-group col-sm-6">
                     <label for="contrasena">Contraseña</label>
                     <input type="text" name="contrasena" id="contrasena" class="form-control" placeholder="Contraseña"
                         autofocus="" required />
                 </div>
                 <div class="form-group mx-auto">
                     <button type="submit" class="btn btn-primary">Guardar</button>
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