<!--autor: MARCILLO FALCONES FERNANDO-->
<?php include_once HEADER;?>
<main>
    <div class="row">
        <div class="col-sm-6">
            <form action="<?php echo constant('URLBASE')?>ArticuloController/buscarArticuloPorNombre" method="POST">
                <input type="text" name="b" id="buscarArticuloPorNombre" placeholder="Buscar articulo" />
                <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i>Buscar</button>
            </form>
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
                    <th></th>
                    <th></th>
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
                            <a class="btn btn-primary" href="<?php echo constant('URLBASE')?>ArticuloController/editarVista?id=
                                 <?php echo $fila['art_id']; ?>">
                                Editar</a>
                        </td>
                        <td>
                            <a class="btn btn-primary" href="<?php echo constant('URLBASE')?>ArticuloController/eliminar?id=
                                 <?php echo $fila['art_id']; ?>">
                                Eliminar</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
    </div>
</main>
<?php  require_once FOOTER?>