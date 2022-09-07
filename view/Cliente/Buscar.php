 <!--autor: Zevallos Escalante Guillermo David-->
 <?php include_once HEADER;?>
 <main>
     <div class="row">
         <div class="col-sm-6">
             <form action="<?php echo constant('URLBASE')?>ClienteController/buscarClientePorNombre" method="POST">
                 <input type="text" name="b" id="buscarClientePorNombre" placeholder="Buscar Cliente" />
                 <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i>Buscar</button>
             </form>
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
                     </tr>
                     <?php } ?>
                 </tbody>
             </table>
     </div>
 </main>
 <?php  require_once FOOTER?>