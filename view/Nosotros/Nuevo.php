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
                     <button type="button" ONCLICK=" validarDatos()" class="btn btn-primary">Guardar</button>

                     <a href="<?php echo constant('URLBASE')?>NosotrosController/buscarNosotros"
                         class="btn btn-primary">
                         Cancelar</a>
                 </div>
             </div>
         </form>


     </div>
 </div>
 <script>

var form = document.querySelector("#formNosNuevo");
form.addEventListener('submit', validarDatos);

function mensaje(cadenaMensaje, elemento) {
    elemento.focus();
    window.alert(cadenaMensaje);
}



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
   
    if (resultado == true) {
        window.alert("Se creo su registro");
    }
    return resultado;
    
}


 </script>


 </script>

 <?php include_once FOOTER;?>