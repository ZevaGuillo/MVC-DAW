<!--autor: MARCILLO FALCONES FERNANDO  -->
<?php include_once HEADER;?>

<div class="container">
    <div class="card card-body">
        <form action="<?php echo constant('URLBASE')?>ArticuloController/nuevoArticulos" onsubmit="return validar()"
            method="POST" name="formArticuloNuevo" id="formArticuloNuevo">
            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="proveedor">Articulo:</label>
                    <select id="proveedor" class="proveedor" name="nombre" class="form-control">
                        <option value="0">SELECCIONE UN ARTICULO</option>
                        <option value="PESA">PESA</option>
                        <option value="MANCUERNA">MANCUERNA</option>
                        <option value="CAMINADORA">CAMINADORA</option>
                    </select>
                </div>

                <div class="form-group col-sm-6">
                    <label for="valor">Valor</label>
                    <input type="text" name="valor" id="valor" class="form-control valor"
                        placeholder="Valor de el Articulo" />
                </div>

                <div class="form-group col-sm-6">
                    <label for="cantidad">Cantidad</label>
                    <input type="Number" name="cantidad" id="cantidad" min="1" class="form-control cantidad"
                        placeholder="Cantidad en el inventario">
                </div>

                <div class="form-group col-sm-6">
                    <label for="marca">Cambiar marca a:</label>
                    <select id="marca" name="marca" class="form-control marca">
                        <option value="0">SELECCIONE UNA MARCA</option>
                        <option value="HTGYM">HTGYM</option>
                        <option value="TAURUS">TAURUS</option>
                        <option value="LYCANS">LYCANS</option>
                        <option value="SYF">SYF</option>
                    </select>
                </div>

                <div class="form-group col-sm-6">
                    <label for="descripcion">Descripcion</label>
                    <input type="text" name="descripcion" id="descripcion" class="form-control descripcion"
                        placeholder="Descripcion de el producto" />
                </div>

                <div class="form-group mx-auto">
                    <button type="submit" class="btn btn-primary">Guardar</button>

                    <a href="<?php echo constant('URLBASE')?>ArticuloController/buscarArticulos"
                        class="btn btn-primary">
                        Cancelar</a>
                </div>
            </div>
        </form>


    </div>
</div>
<script>
function changeValue(newColor) {
    var valor = document.getElementById('valor').value;
    document.getElementById('txtValor').innerHTML = valor;
}

function mensaje(cadenaMensaje, elemento) {
    elemento.focus();
    window.alert(cadenaMensaje);
}

function validar() {

    // variable para retornar
    var valido = true;
    // obtencion de los elementos a validar
    var selectNombre = document.getElementById("proveedor");
    var txtDescripcion = document.getElementById("descripcion");
    var txtValor = document.getElementById("valor");
    var txtCantidad = document.getElementById("cantidad");
    var selectMarca = document.getElementById("marca");

    var decimal = /^[0-9,0]{0,12}?$/i;
    var numero = /^[0-9]{0,12}?$/i;

    //VALIDAR NOMBRE     
    if (selectNombre.value === '0') {
        valido = false;
        mensaje("DEBE SELECCIONAR UN ARTICULO", selectNombre);
    }


    //validacion Valor
    if (txtValor.value === "") {
        valido = false;
        mensaje("DEBE INGRESAR UN VALOR", txtValor);
    } else if (txtValor.value < 1) {
        valido = false;
        mensaje("NO SE PERMITEN VALORES NEGATIVOS NI 0 EN VALOR", txtValor);
    } else if (!decimal.test(txtValor.value)) {
        valido = false;
        mensaje("SOLO SE PERMITEN NUMEROS ENTEROS O CON 2 DECIMALES", txtValor);
    }

    //validacion Cantidad
    if (txtCantidad.value === "") {
        valido = false;
        mensaje("DEBE INGRESAR UNA CANTIDAD", txtCantidad);
    } else if (txtCantidad.value < 1) {
        valido = false;
        mensaje("NO SE PERMITEN VALORES NEGATIVOS NI 0 EN CANTIDAD", txtCantidad);
    } else if (!numero.test(txtCantidad.value)) {
        valido = false;
        mensaje("SOLO SE PERMITEN NUMEROS ENTEROS", txtCantidad);
    }
    //VALIDAR MARCAR
    if (selectMarca.value === '0') {
        valido = false;
        mensaje("DEBE SELECCIONAR UNA MARCA", selectMarca);
    }
    //validacion Descripcion
    if (txtDescripcion.value === "") {
        valido = false;
        mensaje("DEBE INGRESAR UNA DESCRIPCION", txtDescripcion);
    }

    if (valido == true) {
        window.alert("SU ARTICULO HA SIDO CREADO");
    }
    return valido;

}
</script>

<?php include_once FOOTER;?>