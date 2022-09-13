 <!--autor: MUÑOZ SOLORZANO JOHANAN NATANAEL-->
 <?php include_once HEADER;?>
 <div class="container">
     <div class="card card-body">
         <form action="<?php echo constant('URLBASE')?>LoginController/validarUsuario" method="POST" name="formLogin"
             id="formLogin">
             <div class="form-row">
                 <div class="form-group col-sm-6">
                     <label for="usuario">Nombre</label>
                     <input type="text" name="usuario" id="usuario" class="form-control" placeholder="Nombre de usuario"
                         autofocus="" />
                 </div>

                 <div class="form-group col-sm-6">
                     <label for="contrasena">Contraseña</label>
                     <input type="text" name="contrasena" id="contrasena" class="form-control" placeholder="Contraseña"
                         autofocus="" />
                 </div>
                 <div class="form-group mx-auto">
                     <button type="button" class="btn btn-primary" onclick="validarFormulario()">Guardar</button>
                 </div>
             </div>
         </form>
     </div>
 </div>
 <script>
     function validarFormulario(){
         var valorConfirm = confirm('Desea ingresar al sistema?');
         if(valorConfirm){
             var campoNombre = document.querySelector("#usuario").value;
             var campoContrasena = document.querySelector("#contrasena").value;
             console.log(campoNombre);
             console.log(campoContrasena);
             if(campoNombre != "" && campoContrasena != ""){
                 document.forms.namedItem('formLogin').submit();
             }else{
                 alert("CAMPOS VACIOS");
             }
         }
     }
 </script>
 <?php include_once FOOTER;?>