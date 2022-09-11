 <!--autor: CHANGO QUINTO MAITTE MADELINE-->
 <?php include_once HEADER;?>

 <div class="container">
     <div class="card card-body">
         <form action="<?php echo constant('URLBASE')?>NosotrosController/nuevoNosotros" method="POST"
             name="formProdNuevo" id="formProdNuevo">
             <div class="form-row">
                 <div class="form-group col-sm-6">
                     <label for="nombre">Nombre</label>
                     <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre del cliente"
                         autofocus="" required />
                 </div>

                 <div class="form-group col-sm-6">
                     <label for="correo">Correo</label>
                     <input type="text" name="correo" id="correo" class="form-control" placeholder="correo del cliente"
                         autofocus="" required />
                 </div>

                 <div class="form-group col-sm-6">
                     <label for="valor" class="form-label">Pago Mensual</label>
                     <label for="valor" class="form-label" id="txtValor">0</label>
                     <input type="range" class="form-range" min="0" max="200" id="valor" name="valor"
                         onchange="changeValue(this.value)">
                 </div>
                 <div class="form-group col-sm-6">
                     <label for="fecha">Fecha de Pago</label>
                     <input type="date" name="fecha" id="fecha" class="form-control"
                         placeholder="fecha de pago del cliente" required>
                 </div>

                 <div class="form-check">
                     <label>Cuales son sus objetivos en el GYM:</label>
                     <input class="form-check-input" type="radio" name="objetivos" value="Adelgazar">Adelgazar</br>
                     <input class="form-check-input" type="radio" name="objetivos"
                         value="Aumento de Masa Muscular">Aumento de Masa Muscular</br>
                     <input class="form-check-input" type="radio" name="objetivos"
                         value="Tonificación">Tonificación</br>
                 </div>

                 <div class="form-group mx-auto">
                     <button type="submit" class="btn btn-primary">Guardar</button>

                     <a href="<?php echo constant('URLBASE')?>NosotrosController/buscarNosotros"
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