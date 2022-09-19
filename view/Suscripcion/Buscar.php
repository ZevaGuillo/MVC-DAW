 <!--autor: Velez Calero Joe Fernando-->
 <title>Consultar Suscripcion</title>
 <?php include_once HEADER;?>
 <br>
 <main>

     <div style="margin: auto; width: 50%; background-color: #031634; border-radius: 20px;">
         <h1 style="color: white; padding: 5px; text-align: center;">Consultar Suscripciones</h1>
     </div><br>

     <div class="row" style="display: flex;" style="width: 80%; margin: auto; display: flex;">
         <div class="col-sm-6" style="width: 20%; margin: auto;">
             <input type="text" name="b" id="busqueda" placeholder="buscar..." style="color: black;" />
             <button type="submit" class="btn btn-primary" id="btn-busqueda"><i
                     class="fas fa-search"></i>Buscar</button>
         </div>
         <div class="col-sm-6 d-flex flex-column align-items-end"
             style="width: 60%; display: flex; align-items: flex-start!important;">
             <a href="<?php echo constant('URLBASE')?>SuscripcionController/Nuevo"
                 style="text-align: center; text-align: center;">
                 <button type="button" class="btn btn-primary">
                     <i class="fas fa-plus"></i>
                     Nuevo</button>
             </a>
         </div>
     </div>

     <br>
     <div class="Principal">
         <table class="tablaconsultarsuscrip">
             <thead>
                 <tr>
                     <th>ID_SUSCRIPCION</th>
                     <th>NOMBRES</th>
                     <th>APELLIDOS</th>
                     <th>EDAD</th>
                     <th>GENERO</th>
                     <th>PLAN</th>
                     <th>ACCIONES</th>
                 </tr>
             </thead>
             <tbody class="tabladatos">
                 <?php                
                foreach ($resultado as $fila) {
            ?>
                 <tr>
                     <td><?php echo $fila['id'] ?></td>
                     <td><?php echo $fila['nombre'] ?></td>
                     <td><?php echo $fila['apellido'] ?></td>
                     <td><?php echo $fila['edad'] ?></td>
                     <td><?php echo $fila['genero'] ?></td>
                     <td><?php echo $fila['plan']?></td>
                     <td>
                         <a class="btn btn-primary"
                             href="<?php echo constant('URLBASE')?>SuscripcionController/editarVista&id=<?php echo $fila['id']; ?>"><i
                                 class="fas fa-marker"></i></a>

                         <a class="btn btn-danger"
                             onclick="if(!confirm('Esta seguro de eliminar el producto?'))return false;"
                             href="<?php echo constant('URLBASE')?>SuscripcionController/eliminar?id=<?php echo $fila['id']; ?>">
                             <i class="fas fa-trash-alt"></i></a>
                     </td>
                 </tr>
                 <?php } ?>
             </tbody>
         </table>
     </div>
 </main><br><br>

 <script>
var txtBuscar = document.getElementById("busqueda");
var Buscar = document.getElementById("btn-busqueda");
Buscar.addEventListener('click', cargarSuscripciones);

function cargarSuscripciones() {
    // leer paramteros
    var bus = txtBuscar.value;
    // realizar la peticion            
    var url = "http://localhost/MVC-DAW/SuscripcionController/searchAjax?b=" + bus;
    var xmlh = new XMLHttpRequest();
    xmlh.open("GET", url, true);
    xmlh.send();
    // lectura de respuesta
    xmlh.onreadystatechange = function() {
        if (xmlh.readyState === 4 && xmlh.status === 200) {
            var respuesta = xmlh.responseText;
            actualizar(respuesta); //actualizar cierta parte de la pagina
        }
    };
}

function actualizar(respuesta) {
    // elemento a actualizar
    var tbody = document.querySelector('.tabladatos');
    var indice = respuesta.indexOf("<!--");
    var cadenaExtraida = respuesta.substring(0, indice);
    var suscripciones = JSON.parse(cadenaExtraida);
              
    console.log(suscripciones);
    resultados = '';

    for (var i = 0; i < suscripciones.length; i++) {

        resultados += '<tr>';
        resultados += '<td>' + suscripciones[i].id + '</td>';
        resultados += '<td>' + suscripciones[i].nombre + '</td>';
        resultados += '<td>' + suscripciones[i].apellido + '</td>';
        resultados += '<td>' + suscripciones[i].edad + '</td>';
        resultados += '<td>' + suscripciones[i].genero + '</td>';
        resultados += '<td>' + suscripciones[i].plan + '</td>';
        resultados += '<td style="text-align: center;">' +
            "<a href='http://localhost/MVC-DAW/SuscripcionController/editarVista?id=" + suscripciones[i].id +
            "' " + "class='btn btn-primary'><i class='fas fa-marker' ></i></a>" +
            "&nbsp;<a href='http://localhost/MVC-DAW/SuscripcionController/eliminar?id=" + suscripciones[i].id + "'" +
            "class='btn btn-danger' onclick = 'if (!confirm(\'Desea eliminar la actividad: '" + suscripciones[i].id +
            " \')) return false; " + " ><i class='far fa-trash-alt'></i> </a>" + '</td>';
        resultados += '</tr>';
    }
    tbody.innerHTML = resultados;

}
 </script>

 <?php include_once FOOTER;?>
 </body>
 <style>
* {
    color: #f2f2f2;
}


table {
    border: #b2b2b2 1px solid;
}

td,
th {
    border: #b2b2b2 1px solid;
    margin: 1%;
    text-align: center;
    padding: 10px;
    border: black solid 2px;
}

th {
    background-color: #f2f2f2;
    color: black;
    border: black solid 2px;
}

.Principal {
    display: flex;
    justify-content: center;
}

.tablaconsultarsuscrip {
    width: 80%;
    margin: auto;
    background: #031634;
}
 </style>
 </header>