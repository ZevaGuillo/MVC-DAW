 <!--autor: Zevallos Escalante Guillermo David-->
 <?php include_once HEADER;?>

 <div class="container">
     <div class="card card-body">
         <form  onsubmit="return validarFormularios()" action="<?php echo constant('URLBASE')?>ClienteController/nuevoCliente" method="POST"
             name="formClientNuevo" id="formClientNuevo">
             <div class="form-row">
                 <div class="form-group col-sm-6">
                     <label for="codigo">Nombre</label>
                     <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre del Cliente"
                         autofocus=""  />
                 </div>

                 <div class="form-group col-sm-6">
                     <label for="codigo">telefono</label>
                     <input type="text" name="telefono" id="telefono" class="form-control" placeholder="telefono del Cliente"
                         autofocus=""  />
                 </div>

                 <div class="form-group col-sm-6">
                     <label for="codigo">email</label>
                     <input type="text" name="email" id="email" class="form-control" placeholder="email del Cliente"
                         autofocus=""  />
                 </div>

                 <div class="form-group col-sm-6">
                     <label for="codigo">asunto</label>
                     <input type="text" name="asunto" id="asunto" class="form-control" placeholder="asunto del Cliente"
                         autofocus=""  />
                 </div>

                 <div class="form-group col-sm-6">
                     <label for="codigo">mensaje</label>
                     <input type="text" name="mensaje" id="mensaje" class="form-control" placeholder="mensaje del Cliente"
                         autofocus=""  />
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
    const inputNombre = document.getElementById('nombre');
    const inputTelefono = document.getElementById('telefono');
    const inputEmail = document.getElementById('email');
    const inputAsunto = document.getElementById('asunto');
    const inputMensaje = document.getElementById('mensaje');

    const onlyNumbers = /^\d+$/;
    const validEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

    function mensaje(cadenaMensaje, elemento) {
        elemento.focus();
        window.alert(cadenaMensaje);
    }

    function validarFormularios(){
        if(!inputNombre.value || !inputTelefono.value || !inputEmail.value || !inputAsunto.value || !inputMensaje.value){
            mensaje('LLene Todos los campos', inputNombre);
            return false;
        }
        if(!onlyNumbers.test(inputTelefono.value)){
            mensaje('El telefono debe ser un numero', inputTelefono);
            return false;
        }
        if(!validEmail.test(inputEmail.value)){
            mensaje('Debe ser un email valido', inputEmail);
            return false;
        }
        
        return true;
    }
 </script>

 <?php include_once FOOTER;?>