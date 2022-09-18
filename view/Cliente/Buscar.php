 <!-- autor: Zevallos Escalante Guillermo David -->
 <?php include_once HEADER;?>
 <main>
     <div class="row">
         <div class="col-sm-6">
             
            <input type="text" name="b" id="buscarClientePorNombre" placeholder="Buscar Cliente" />
            <button type="button" class="btn btn-primary" id="buscar"><i class="fas fa-search"></i>Buscar</button>
             
         </div>
         <div class="col-sm-6 d-flex flex-column align-items-end">
             <a href="<?php echo constant('URLBASE')?>ClienteController/Nuevo">
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
                     <th>Telefono </th>
                     <th>Email </th>
                     <th>Asunto </th>
                     <th>Mensaje </th>
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
                         <td><?php echo $fila['telefono']; ?></td>
                         <td><?php echo $fila['email']; ?></td>
                         <td><?php echo $fila['asunto']; ?></td>
                         <td><?php echo $fila['mensaje'];?></td>
                         <td>
                             <a class="btn btn-primary" href="<?php echo constant('URLBASE')?>ClienteController/editarVista?id=
                                 <?php echo $fila['id']; ?>">
                                 Editar</a>
                         </td>
                         <td>
                             <a class="btn btn-primary" href="<?php echo constant('URLBASE')?>ClienteController/eliminar?id=
                                 <?php echo $fila['id']; ?>">
                                 Eliminar</a>
                         </td>
                     </tr>
                     <?php } ?>
                 </tbody>
             </table>
     </div>
 </main>
 <script type="text/javascript">
var inputBuscar = document.getElementById("buscarClientePorNombre");
var Buscar = document.getElementById("buscar");
Buscar.addEventListener('click', cargarArticulos);

function cargarArticulos() {
    // leer paramteros
    var res = inputBuscar.value;
    // realizar la peticion            
    var url = "<?php echo constant('URLBASE')?>ClienteController/buscarClientePorNombre&b=" + res;
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
    var clientes = JSON.parse(cadenaExtraida);
    console.log(clientes)
    resultados = '';

    for (var i = 0; i < clientes.length; i++) {

        resultados += '<tr>';
        resultados += '<td>' + clientes[i].id + '</td>';
        resultados += '<td>' + clientes[i].nombre + '</td>';
        resultados += '<td>' + clientes[i].telefono + '</td>';
        resultados += '<td>' + clientes[i].email + '</td>';
        resultados += '<td>' + clientes[i].asunto + '</td>';
        resultados += '<td>' + clientes[i].mensaje + '</td>';
        resultados += '<td>' +
            "<a class='btn btn-primary' href='http://localhost/MVC-DAW/ClienteController/editarVista?id=" +
            clientes[i].id + "' >Editar</a></td>";
        resultados += '<td>' +
            "<a class='btn btn-primary' href='http://localhost/MVC-DAW/ClienteController/eliminar?id=" +
            clientes[i].id + "'>Eliminar</a></td>";
        resultados += '</tr>';

    }
    tbody.innerHTML = resultados;
}
</script>
 <?php  require_once FOOTER?>