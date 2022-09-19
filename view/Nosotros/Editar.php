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
                         class="form-control" placeholder="nombre" >
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
                     <button type="button" class="btn btn-primary"
                         onclick="validarDatos()" >Guardar</button>
                     <a href="<?php echo constant('URLBASE')?>NosotrosController/buscarNosotros"
                         class="btn btn-primary">Cancelar</a>
                 </div>

             </div>
         </form>
     </div>
 </div>

<script>
var form = document.querySelector("#formNosNuevo");
form.addEventListener('submit', validarDatos);

function validarDatos(event) {
    var resultado = true;
    var txtNombre = document.getElementById("nombre");
    var txtCorreo = document.getElementById("correo");
    var txtValor = document.getElementById("pagoMensual");
    var btnRadiosObj = document.getElementsByName("objetivos);
    
    var letra = /^[a-z ,.'-]+$/i;// letrasyespacio   ///^[A-Z]+$/i;// solo letras
    var correo = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;

    limpiarMensajes();

    //VALIDAR NOMBRE
    if (txtNombre.value === '') {
        resultado = false;
        mensaje("Ingrese nombre", txtNombre);
    } else if (!letra.test(txtNombre.value)) { 
        resultado = false;
        mensaje("Nombre solo debe contener letras", txtNombre);
    } else if (txtNombre.value.length > 24) {
        resultado = false;
        mensaje("Nombre maximo 24 caracteres", txtNombre);
    }
    
    //VALIDAR CORREO 
    if (txtCorreo.value === "") {
        resultado = false;
        mensaje("Correo es obligatorio", txtCorreo);
    } else if (!correo.test(txtCorreo.value)) {
        resultado = false;
        mensaje("correo no es correcto", txtCorreo);
    }
    //VALIDAR PAGO
    if (txtValor.value === '') {
        resultado = false;
        mensaje("Pago mensual obligatorio", txtValor, mensaje);
    }

    //VALIDAR RADIOS
    var marc = false;
    for (let i = 0; i < btnRadios.length; i++) {
        if (btnRadiosObj[i].checked) {
           marc = true;
            let res = btnRadiosObj[i].value;
            break;
        }
    }
    if (!marc) {
        resultado = false;
        mensaje("Debe seleccionar un objetivo", btnRadiosObj[0]);
    }
   
   
    if (!resultado) {
        event.preventDefault();
    } else {
        alert("Gracias por querer ser parte de nosotros");
    }
}


function mensaje(cadenaMensaje, elemento) {
    elemento.focus();
    window.alert(cadenaMensaje);
}
if (resultado == true) {
        window.alert("Su registro se modifico");
    }
    return resultado;




 </script>
 <?php 
?>
 <?php  require_once FOOTER?>