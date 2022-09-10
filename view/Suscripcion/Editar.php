<!--autor: Velez Calero Joe Fernando-->
<title>Editar Suscripcion</title>
 <?php include_once HEADER;?>
 <main id="ContenedorPrinciapl" >
        <div style="margin: auto; width: 50%; background-color: #031634; border-radius: 20px;">
          <h1 style="color: white; padding: 5px; text-align: center;">Editar Suscripcion</h1>
        </div><br>
        <div>
            <form action="<?php echo constant('URLBASE')?>SuscripcionController/editarSuscripcion&id=<?php echo $resultado['id']; ?>" method="POST" style="background-color: #F2F7F6; border: solid 2px #031634;">

                <hr>

                <div class="formularios">
                    <label>Nombre</label>
                    <input type="text" name="nombre" value="<?php echo $resultado['nombre']; ?>">
                </div>

                <hr>

                <div class="formularios">
                    <label>Apellido</label>
                    <input type="text" name="apellido" value="<?php echo $resultado['apellido']; ?>">
                </div>

                <hr>

                <div class="formularios">
                    <label>Edad</label>
                    <input type="number" name="edad" value="<?php echo $resultado['edad']; ?>">
                </div>

                <hr>

                <div class="formularios">
                    <input <?php echo (($resultado['genero'])=='Masculino')? "checked=''":"";?> type="radio" id="masculino" name="genero" value="Masculino" >
                    <label for="masculino" id="labeltext">Masculino</label><br>
                    <input <?php echo (($resultado['genero'])=='Femenino')? "checked=''":"";?> type="radio" id="femenino" name="genero" value="Femenino">
                    <label for="femenino" id="labeltext">Femenino</label><br>
                </div>

                <hr>

                <div class="formularios">
                    <label class="labelprinci">Plan<label>
                            <div>
                                <input <?php echo (($resultado['plan'])=='Gratis')? "checked=''":"";?> type="checkbox" name="plan" value="Gratis">
                                <label id="labeltext">Gratis</label>
                            </div>

                            <div>
                                <input <?php echo (($resultado['plan'])=='Mensual')? "checked=''":"";?> type="checkbox" name="plan" value="Mensual">
                                <label id="labeltext">Mensual</label>
                            </div>
                            <div>
                                <input <?php echo (($resultado['plan'])=='Anual')? "checked=''":"";?> type="checkbox" name="plan" value="Anual">
                                <label id="labeltext">Anual</label>
                            </div>
                </div>

                <hr>

                <div class="principal_abajo">
                    <input type="submit" value="Editar">
                </div>

                <hr>
            </form>
        </div>
    </main>
  
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