<!--autor: MARCILLO FALCONES FERNANDO-->
<?php include_once HEADER;?>
<main>
    <div class="row">
        <div class="col-sm-6">
            <input type="text" name="b" id="buscarArticuloPorNombre" placeholder="Buscar articulo" />
            <button type="submit" class="btn btn-primary" id="boton"><i class="fas fa-search"></i>Buscar</button>
        </div>
        <div class="col-sm-6 d-flex flex-column align-items-end">
            <a href="<?php echo constant('URLBASE')?>ArticuloController/Nuevo">
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
                    <th>Articulo </th>
                    <th>Valor </th>
                    <th>Cantidad </th>
                    <th>Descripcion </th>
                    <th>Marca </th>
                    <th>Fecha </th>
                    <th>Accion Editar</th>
                    <th>Accion Buscar</th>
                </thead>
                <tbody class="tabladatos">
                    <?php
                    foreach ($resultado as $fila) {
                    ?>
                    <tr>
                        <td><?php echo $fila['art_id'];?></td>
                        <td><?php echo $fila['art_nombre']; ?></td>
                        <td><?php echo $fila['art_valor']; ?></td>
                        <td><?php echo $fila['art_cantidad']; ?></td>
                        <td><?php echo $fila['art_descripcion']; ?></td>
                        <td><?php echo $fila['art_marca'];?></td>
                        <td><?php echo $fila['art_fecha_actualizacion'];?></td>
                        <td>
                            <a class="btn btn-primary"
                                href="<?php echo constant('URLBASE')?>ArticuloController/editarVista?id=<?php echo $fila['art_id'];?>">
                                Editar</a>
                        </td>
                        <td>
                            <a class="btn btn-primary"
                                href="<?php echo constant('URLBASE')?>ArticuloController/eliminar?id=<?php echo $fila['art_id'];?>">
                                Eliminar</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
    </div>
</main>
<script>
var txtBuscar = document.getElementById("buscarArticuloPorNombre");
var Buscar = document.getElementById("boton");
Buscar.addEventListener('click', cargarArticulos);

function cargarArticulos() {
    // leer paramteros
    var bus = txtBuscar.value;
    // realizar la peticion            
    var url = "http://localhost/MVC-DAW/ArticuloController/searchAjax&b=" + bus;
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
    var articulos = JSON.parse(respuesta); // parse de respuesta aformato json            

    console.log(articulos);
    resultados = '';

    for (var i = 0; i < articulos.length; i++) {

        resultados += '<tr>';
        resultados += '<td>' + articulos[i].art_id + '</td>';
        resultados += '<td>' + articulos[i].art_nombre + '</td>';
        resultados += '<td>' + articulos[i].art_valor + '</td>';
        resultados += '<td>' + articulos[i].art_cantidad + '</td>';
        resultados += '<td>' + articulos[i].art_descripcion + '</td>';
        resultados += '<td>' + articulos[i].art_marca + '</td>';
        resultados += '<td>' + articulos[i].art_fecha_actualizacion + '</td>';
        resultados += '<td>' +
            "<a class='btn btn-primary' href='http://localhost/MVC-DAW/ArticuloController/editarVista?id=" +
            articulos[i].art_id + "' >Editar</a></td>";
        resultados += '<td>' +
            "<a class='btn btn-primary' href='http://localhost/MVC-DAW/ArticuloController/eliminar?id=" +
            articulos[i].art_id + "'>Eliminar</a></td>";
        resultados += '</tr>';

    }
    tbody.innerHTML = resultados;
}
</script>
<?php  require_once FOOTER?>

</body>
<style>
.contedor {
    width: 100%;
}
</style>

</html>