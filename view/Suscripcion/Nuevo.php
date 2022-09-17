 <!--autor: Velez Calero Joe Fernando -->
 <title>Insertar Suscripcion</title>
 <?php include_once HEADER;?>
 <main id="ContenedorPrinciapl">
     <div style="margin: auto; width: 50%; background-color: #031634; border-radius: 20px;">
         <h1 style="color: white; padding: 5px; text-align: center;">Insertar Suscripcion</h1>
     </div><br>
     <div>
         <form onsubmit="return validar()"
             action="<?php echo constant('URLBASE')?>SuscripcionController/nuevaSuscripcion" method="POST"
             style="background-color: #F2F7F6; border: solid 2px #031634;">

             <hr>

             <div class="formularios">
                 <label>Nombre</label>
                 <input type="text" name="nombre" id="nombre">
             </div>

             <hr>

             <div class="formularios">
                 <label>Apellido</label>
                 <input type="text" name="apellido" id="apellido">
             </div>

             <hr>

             <div class="formularios">
                 <label>Edad</label>
                 <input type="number" name="edad" min="18" max="80" id="edad">
             </div>

             <hr>

             <div class="formularios">
                 <input type="radio" id="masculino" name="genero" class="genero" value="Masculino" checked>
                 <label for="masculino" id="labeltext">Masculino</label><br>
                 <input type="radio" id="femenino" name="genero" class="genero" value="Femenino">
                 <label for="femenino" id="labeltext">Femenino</label><br>
             </div>

             <hr>

             <div class="formularios">
                 <label class="labelprinci">Plan<label>
                         <div>
                             <input type="checkbox" name="plan" value="Gratis" class="plan">
                             <label id="labeltext">Gratis</label>
                         </div>

                         <div>
                             <input type="checkbox" name="plan" value="Mensual" class="plan">
                             <label id="labeltext">Mensual</label>
                         </div>
                         <div>
                             <input type="checkbox" name="plan" value="Anual" class="plan">
                             <label id="labeltext">Anual</label>
                         </div>
             </div>

             <hr>

             <div class="principal_abajo">
                 <input type="submit" value="Agregar">
             </div>

             <hr>
         </form>
     </div>
 </main>
 <script>
function mensaje(cadenaMensaje, elemento) {
    elemento.focus();
    window.alert(cadenaMensaje);
}

function validar() {

    // variable para retornar
    var valido = true;
    // obtencion de los elementos a validar
    var txtNombres = document.getElementById("nombre");
    var txtApellidos = document.getElementById("apellido");
    var txtEdad = document.getElementById("edad");
    var radiosGenero = document.getElementsByName("genero"); //retorna un arreglo;
    var checkboxsPlan = document.getElementsByClassName("plan");



    var letra = /^[a-z ,.'-]+$/i; // letrasyespacio   ///^[A-Z]+$/i;// solo letras

    //validacion para nombres
    if (txtNombres.value === "") {
        valido = false;
        mensaje("DEBE INGRESAR UN NOMBRE", txtNombres);
    } else if (!letra.test(txtNombres.value)) {
        valido = false;
        mensaje("EL NOMBRE SOLO DEBE CONTENER LETRAS Y ESPACIOS", txtNombres);
    }

    // Validacion para apellidos
    if (txtApellidos.value === "") {
        valido = false;
        mensaje("DEBE INGRESAR UN APELLIDO", txtApellidos);
    } else if (!letra.test(txtApellidos.value)) {
        valido = false;
        mensaje("EL APELLIDO SOLO DEBE CONTENER LETRAS Y ESPACIOS", txtApellidos);
    }

    //validacion EDAD
    if (txtEdad.value === "") {
        valido = false;
        mensaje("DEBE INGRESAR UNA EDAD", txtEdad);
    } else if (txtEdad.value < 18 && txtEdad.value > 80) {
        valido = false;
        mensaje("LA EDAD DEBE SER ENTRE 18 Y 80 AÑOS", txtEdad);
    }

    //validacion radio button
    var sel = false;
    var cont = false;
    for (let i = 0; i < radiosGenero.length; i++) {
        if (radiosGenero[i].checked) {
            sel = true;
            break;
        }
    }
    if (!sel) {
        valido = false;
        mensaje("DEBE SELECCIONAR UN GENERO", radiosGenero[0]);
    }

    //VALIDAR PLAN
    sel = false;
    for (let i = 0; i < checkboxsPlan.length; i++) {
        if (checkboxsPlan[i].checked) {
            sel = true;
            cont++;
            // break;
        }
    }
    if (!sel) {
        valido = false;
        mensaje("DEBE SELECCIONAR UN PLAN", checkboxsPlan[0]);
    }
    if (cont >= 2) {
        valido = false;
        mensaje("DEBE SELECCIONAR SOLO UN PLAN", checkboxsPlan[0]);
    }



    if (valido == true) {
        window.alert("SU SUSCRIPCION HA SIDO CREADA");
    }
    return valido;

}
 </script>

 <?php include_once FOOTER;?>
 </body>
 <style>
* {
    color: black;
    font-size: 18px;
}

form {
    width: auto;
    display: flex;
    flex-direction: column;
    flex-wrap: wrap;
    align-content: center;
    justify-content: center;
}

.formularios {
    width: 1000px;
    padding: 1%;
    margin: 1%;
}

.principal_abajo {
    display: flex;
    justify-content: center;
    margin: 1%;
}

#labeltext {
    margin-left: 30px;
    padding: 1%;
    font-size: 18px;
}

.labelprinci {
    font-size: 30px;
}

#ContenedorPrinciapl {
    padding: 1rem 15%;
}
 </style>
 </header>