 <!--autor: Zevallos Escalante Guillermo David-->
 <?php include_once HEADER;?>

 <div class="container">
     <div class="card card-body">
         <form action="<?php echo constant('URLBASE')?>ClienteController/nuevoCliente" method="POST"
             name="formClientNuevo" id="formClientNuevo">
             <div class="form-row">
                 <div class="form-group col-sm-6">
                     <label for="codigo">Nombre</label>
                     <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre del Cliente"
                         autofocus="" required />
                 </div>

                 <div class="form-group col-sm-6">
                     <label for="codigo">telefono</label>
                     <input type="text" name="telefono" id="telefono" class="form-control" placeholder="telefono del Cliente"
                         autofocus="" required />
                 </div>

                 <div class="form-group col-sm-6">
                     <label for="codigo">email</label>
                     <input type="text" name="email" id="email" class="form-control" placeholder="email del Cliente"
                         autofocus="" required />
                 </div>

                 <div class="form-group col-sm-6">
                     <label for="codigo">asunto</label>
                     <input type="text" name="asunto" id="asunto" class="form-control" placeholder="asunto del Cliente"
                         autofocus="" required />
                 </div>

                 <div class="form-group col-sm-6">
                     <label for="codigo">mensaje</label>
                     <input type="text" name="mensaje" id="mensaje" class="form-control" placeholder="mensaje del Cliente"
                         autofocus="" required />
                 </div>

                 <div class="form-group mx-auto">
                     <button type="submit" class="btn btn-primary">Guardar</button>

                     <a href="<?php echo constant('URLBASE')?>ClienteController/buscarClientes"
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