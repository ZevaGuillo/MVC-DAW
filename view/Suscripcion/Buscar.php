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
                <form action="<?php echo constant('URLBASE')?>SuscripcionController/search" method="POST" >
                    <input type="text" name="b" id="busqueda"  placeholder="buscar..." style="color: black;"/>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i>Buscar</button>
                </form>       
            </div>
            <div class="col-sm-6 d-flex flex-column align-items-end" style="width: 60%; display: flex; align-items: flex-start!important;">
                <a href="<?php echo constant('URLBASE')?>SuscripcionController/Nuevo" style="text-align: center; text-align: center;"> 
                    <button type="button" class="btn btn-primary" >
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
                        href="<?php echo constant('URLBASE')?>SuscripcionController/editarVista&id=<?php echo $fila['id']; ?>"><i class="fas fa-marker"></i></a>
                                 
                        <a class="btn btn-danger" onclick="if(!confirm('Esta seguro de eliminar el producto?'))return false;" 
                        href="<?php echo constant('URLBASE')?>SuscripcionController/eliminar?id=<?php echo $fila['id']; ?>">
                        <i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>        
    </main><br><br>

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
    th{
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