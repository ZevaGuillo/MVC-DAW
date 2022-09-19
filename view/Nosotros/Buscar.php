 <!--autor: CHANGO QUINTo MAITTE MADELINE-->
 <?php include_once HEADER;?>
 <main>
     <div class="row">
         <div class="col-sm-6">
             <form action="<?php echo constant('URLBASE')?>NosotrosController/buscarNosotrosPorNombre" method="POST">
                 <input type="text" name="b" id="buscarNosotrosPorNombre" placeholder="Buscar Nosotros" />
                 <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i>Buscar</button>
             </form>
         </div>
         <div class="col-sm-6 d-flex flex-column align-items-end">
             <a href="<?php echo constant('URLBASE')?>NosotrosController/Nuevo">
                 <button type="button" class="btn btn-primary">
                     <i class="fas fa-plus"></i>
                     Nuevo</button>
             </a>
         </div>
     </div>
     <div class="contenedor">
         <table class="tabla">
             <table class="table">
                 <thead class="table-dark">
                     <th>Id</th>
                     <th>Nombre </th>
                     <th>Correo </th>
                     <th>Pago mensual </th>
                     <th>Fecha </th>
                     <th>Objetivos </th>
                     <th></th>
                     <th></th>
                 </thead>
                 <tbody class="tabladatos">
                     <?php
                    foreach ($resultado as $fila) {
                    ?>
                     <tr>
                         <td><?php echo $fila['id'];?></td>
                         <td><?php echo $fila['nombre']; ?></td>
                         <td><?php echo $fila['correo']; ?></td>
                         <td><?php echo $fila['pagoMensual']; ?></td>
                         <td><?php echo $fila['fecha'];?></td>
                         <td><?php echo $fila['objetivos'];?></td>
                         <td>
                             <a class="btn btn-primary" href="<?php echo constant('URLBASE')?>NosotrosController/editarVista?id=
                                 <?php echo $fila['id']; ?>">
                                 Editar</a>
                         </td>
                         <td>
                             <a class="btn btn-primary" href="<?php echo constant('URLBASE')?>NosotrosController/eliminar?id=
                                 <?php echo $fila['id']; ?>">
                                 Eliminar</a>
                         </td>
                     </tr>
                     <?php } ?>
                 </tbody>
             </table>
     </div>
 </main>
 <script>
var campoBuscar = document.getElementById("busquedaPorNombre");
var Buscar = document.getElementById("btn-busqueda");
Buscar.addEventListener('click', cargarNosotros);

function cargarNosotros() {
    // leer paramteros
    var search = campoBuscar.value;
    // realizar la peticion            
    var url = "<?php echo constant('URLBASE')?>NosotrosController/buscarNosotrosPorNombre&b=" + search;
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
    var nosotros = JSON.parse(cadenaExtraida); // parse de respuesta aformato json            

    console.log(nosotros);
    resultados = '';

    for (var i = 0; i < nosotros.length; i++) {

        resultados += '<tr>';
        resultados += '<td>' + nosotros[i].id + '</td>';
        resultados += '<td>' + nosotros[i].nombre + '</td>';
        resultados += '<td>' + nosotros[i].correo + '</td>';
        resultados += '<td>' + nosotros[i].pagoMensual + '</td>';
        resultados += '<td>' + nosotros[i].fecha + '</td>';
        resultados += '<td>' + nosotros[i].objetivos + '</td>';
        resultados += '<td style="text-align: center;">' +
            "<a href='http://localhost/MVC-DAW/NosotrosController/editarVista?id=" + nosotros[i].id +
            "' " + "class='btn btn-primary'><i class='fas fa-marker' ></i></a>" +
            "<a href='http://localhost/MVC-DAW/NosotrosController/eliminar?id=" + nosotros[i].id + "'" +
            "class='btn btn-danger' onclick = 'if (!confirm(\'Desea eliminar la actividad: '" + nosotros[i].id +
            " \')) return false; " + " ><i class='far fa-trash-alt'></i> </a>" + '</td>';
        resultados += '</tr>';
    }
    tbody.innerHTML = resultados;

}
 </script>
 <?php  require_once FOOTER?>