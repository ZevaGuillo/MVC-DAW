 <!--autor: Velez Calero Joe Fernando-->
 <title>Insertar Suscripcion</title>
 <?php include_once HEADER;?>
 <main id="ContenedorPrinciapl" >
        <div style="margin: auto; width: 50%; background-color: #031634; border-radius: 20px;">
          <h1 style="color: white; padding: 5px; text-align: center;">Insertar Suscripcion</h1>
        </div><br>
        <div>
            <form action="<?php echo constant('URLBASE')?>SuscripcionController/nuevaSuscripcion" method="POST" style="background-color: #F2F7F6; border: solid 2px #031634;">

                <hr>

                <div class="formularios">
                    <label>Nombre</label>
                    <input type="text" name="nombre">
                </div>

                <hr>

                <div class="formularios">
                    <label>Apellido</label>
                    <input type="text" name="apellido">
                </div>

                <hr>

                <div class="formularios">
                    <label>Edad</label>
                    <input type="number" name="edad">
                </div>

                <hr>

                <div class="formularios">
                    <input type="radio" id="masculino" name="genero" value="Masculino" checked>
                    <label for="masculino" id="labeltext">Masculino</label><br>
                    <input type="radio" id="femenino" name="genero" value="Femenino">
                    <label for="femenino" id="labeltext">Femenino</label><br>
                </div>

                <hr>

                <div class="formularios">
                    <label class="labelprinci">Plan<label>
                            <div>
                                <input type="checkbox" name="plan" value="Gratis">
                                <label id="labeltext">Gratis</label>
                            </div>

                            <div>
                                <input type="checkbox" name="plan" value="Mensual">
                                <label id="labeltext">Mensual</label>
                            </div>
                            <div>
                                <input type="checkbox" name="plan" value="Anual">
                                <label id="labeltext">Anual</label>
                            </div>
                </div>

                <hr>

                <div class="principal_abajo">
                    <input type="submit" value="Agregar">
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