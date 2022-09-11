 <!--autor: CHANGO QUINTO MAITTE MADELINE-->
 <?php include_once HEADER;?>

 <div class="container">
     <div class="card card-body">
         <form action="<?php echo constant('URLBASE')?>NosotrosController/editarNosotros" method="POST"
             name="formNosNuevo" id="formNosNuevo">
             <input type="hidden" name="id" id="id" value="<?php echo $resultado['id']; ?>" />
             <div class="form-row">
                 <div class="form-group col-sm-6">
                     <label for="id">ID</label>
                     <input type="text" name="id" id="id" value="<?php echo $resultado['id']; ?>" class="form-control"
                         disabled>
                 </div>
                 <div class="form-group col-sm-6">
                     <label for="nombre">Nombre</label>
                     <input type="text" name="nombre" id="nombre" value="<?php echo $resultado['nombre']; ?>"
                         class="form-control" placeholder="nombre  " required>
                 </div>
                 <div class="form-group col-sm-6">
                     <label for="correo">Correo</label>
                     <input type="text" name="correo" id="correo" value="<?php echo $resultado['correo']; ?>"
                         class="form-control" placeholder=" correo " required>
                 </div>

                 <div class="form-group col-sm-6">
                     <label for="valor" class="form-label">Pago Mensual</label>
                     <label for="valor" class="form-label"
                         id="txtValor"><?php echo $resultado['pagoMensual']; ?></label>
                     <input type="range" class="form-range" min="0" max="100" id="valor" name="valor"
                         value="<?php echo $resultado['pagoMensual']; ?>" onchange="changeValue(this.value)">
                 </div>

                 <div class="form-check">
                     <label>objetivos</label>
                     <input class="form-check-input" type="radio" name="objetivos" id="objetivos"
                         value="Adelgazar">Adelgazar</br>
                     <input class="form-check-input" type="radio" name="objetivos" id="objetivos"
                         value="AumentoMasaMuscular">Aumento de Masa Muscular</br>
                     <input class="form-check-input" type="radio" name="objetivos" id="objetivos"
                         value="Tonificación">Tonificación</br>


                 </div>



                 <div class="form-group mx-auto">
                     <button type="submit" class="btn btn-primary"
                         onclick="if (!confirm('Esta seguro de modificar los datos?')) return false;">Guardar</button>
                     <a href="<?php echo constant('URLBASE')?>NosotrosController/buscarNosotros"
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