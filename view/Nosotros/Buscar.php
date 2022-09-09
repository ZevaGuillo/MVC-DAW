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
                 </thead>
                 <tbody class="tabladatos">
                     <?php
                    foreach ($resultado as $fila) {
                    ?>
                     <tr>
                         <td><?php echo $fila['id'];?></td>
                         <td><?php echo $fila['nombre']; ?></td>
                         <td><?php echo $fila['prd_valor']; ?></td>
                         <td><?php echo $fila['correo']; ?></td>
                         <td><?php echo $fila['pagoMensual']; ?></td>
                         <td><?php echo $fila['fecha'];?></td>
                         <td><?php echo $fila['objetivos'];?></td>
                         <td>
                             <a class="btn btn-primary" href="<?php echo constant('URLBASE')?>NosotrosController/editarVista?id=
                                 <?php echo $fila['id']; ?>">
                                 Editar</a>
                         </td>
                     </tr>
                     <?php } ?>
                 </tbody>
             </table>
     </div>
 </main>
 <?php  require_once FOOTER?>