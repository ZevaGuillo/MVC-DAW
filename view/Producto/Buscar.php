<!--autor: MUÑOZ SOLORZANO JOHANAN NATANAEL-->
 <?php include_once HEADER;?>
 <main style="height: 60vh">
     <div class="row">
         <div class="col-sm-6">
             <form action="<?php echo constant('URLBASE')?>ProductoController/buscarProductoPorNombre" method="GET">
                 <input type="text" name="b" id="buscarProductoPorNombre" placeholder="Buscar producto" />
                 <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i>Buscar</button>
             </form>
         </div>
         <div class="col-sm-6 d-flex flex-column align-items-end">
             <a href="<?php echo constant('URLBASE')?>ProductoController/Nuevo">
                 <button type="button" class="btn btn-primary">
                     <i class="fas fa-plus"></i>
                     Nuevo</button>
             </a>
         </div>
     </div>
     <div class="row">
         <div class="col-sm-6">
             <h4>Busqueda con ajax</h4>
             <input type="text" name="busquedaAjax" id="busquedaAjax"  placeholder="buscar..."/>
         </div>
     </div>
     <div class="contenedor">
         <table class="tabla">
             <table class="table">
                 <thead class="table-dark">
                     <th>Id</th>
                     <th>Nombre </th>
                     <th>Valor </th>
                     <th>Cantidad </th>
                     <th>Estado </th>
                     <th>Codigo Proveedor </th>
                     <th>Fecha </th>
                     <th></th>
                     <th></th>
                 </thead>
                 <tbody class="tabladatos">
                     <?php
                    foreach ($resultado as $fila) {
                    ?>
                     <tr>
                         <td><?php echo $fila['prd_id'];?></td>
                         <td><?php echo $fila['prd_nombre']; ?></td>
                         <td><?php echo $fila['prd_valor']; ?></td>
                         <td><?php echo $fila['prd_cantidad']; ?></td>
                         <td><?php echo $fila['prd_estado']; ?></td>
                         <td><?php echo $fila['prd_codigo_proveedor_producto'];?></td>
                         <td><?php echo $fila['prd_fecha_actualizacion'];?></td>
                         <td>
                             <a class="btn btn-primary" href="<?php echo constant('URLBASE')?>ProductoController/editarVista?id=
                                 <?php echo $fila['prd_id']; ?>">
                                 Editar</a>
                         </td>
                         <td>
                             <a class="btn btn-primary" href="<?php echo constant('URLBASE')?>ProductoController/eliminar?id=
                                 <?php echo $fila['prd_id']; ?>">
                                 Eliminar</a>
                         </td>
                         </td>
                     </tr>
                     <?php } ?>
                 </tbody>
             </table>
     </div>
 </main>
 <script type="text/javascript">
     var barraBusqueda = document.querySelector("#busquedaAjax");
     barraBusqueda.addEventListener('keyup', cargarProveedores);

     function cargarProveedores(){
         var valorBarraBusqueda = barraBusqueda.value;
         var url = "<?php echo constant('URLBASE')?>ProductoController/buscarProductoPorNombre?b="+valorBarraBusqueda;

         var xmlh = new XMLHttpRequest();
         xmlh.open('GET', url, true);
         xmlh.send();
         xmlh.onreadystatechange = function () {
             if (xmlh.readyState === 4 && xmlh.status === 200) {
                 var respuesta = "";
                 respuesta = xmlh.responseText;
                 actualizar(respuesta);
             }
         };
     }

     function actualizar(respuesta) {
         var tbody = document.querySelector('.tabladatos');
         var indice = respuesta.indexOf("<!--");
         var cadenaExtraida = respuesta.substring(0, indice);
         var productos = JSON.parse(cadenaExtraida);
         resultados = '';
         for (var i = 0; i < productos.length; i++) {
             resultados += '<tr>';
             resultados += '<td>' + productos[i].prd_id + '</td>';
             resultados += '<td>' + productos[i].prd_nombre + '</td>';
             resultados += '<td>' + productos[i].prd_valor + '</td>';
             resultados += '<td>' + productos[i].prd_cantidad + '</td>';
             resultados += '<td>' + productos[i].prd_estado + '</td>';
             resultados += '<td>' + productos[i].prd_codigo_proveedor_producto + '</td>';
             resultados += '<td>' + productos[i].prd_fecha_actualizacion + '</td>';
             resultados += '<td>' +
                 "<a href='http://localhost/MVC-DAW/ProductoController/editarVista?id="+productos[i].prd_id +
                 "'" + "class='btn btn-primary' ><i class='fas fa-marker'></i></a>" +
                 "<a href='http://localhost/MVC-DAW/ProductoController/eliminar?id="+productos[i].prd_id +
                 "'" + "class='btn btn-danger' ><i class='far fa-trash-alt'></i></a>"+'</td>';
             resultados += '</tr>';
         }
         tbody.innerHTML = resultados;
     }
 </script>
 <?php  require_once FOOTER?>