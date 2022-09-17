<!--autor: MARCILLO FALCONES FERNANDO-->
<?php include_once HEADER;?>

<div class="container">
    <div class="card card-body">
        <form onsubmit="return validar()"
            action="<?php echo constant('URLBASE')?>ArticuloController/editarArticulos&id=<?php echo $resultado['art_id']; ?>"
            method="POST" name="formArtNuevo" id="formArtNuevo">
            <input type="hidden" name="id" id="id" value="<?php echo $resultado['art_id']; ?>" />
            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="id">ID</label>
                    <input type="text" name="id" id="id" value="<?php echo $resultado['art_id']; ?>"
                        class="form-control" disabled>
                </div>

                <div class="form-group col-sm-6">
                    <label for="nombre">Nombre</label>
                    <select id="proveedor" class="proveedor" name="nombre" class="form-control">
                        <option value="0">SELECCIONE UN ARTICULO</option>
                        <option value="PESA" <?php echo (($resultado['art_nombre']) == 'PESA')? "selected=''":"";?>>PESA
                        </option>
                        <option value="MANCUERNA"
                            <?php echo (($resultado['art_nombre']) == 'MANCUERNA')? "selected=''":"";?>>MANCUERNA
                        </option>
                        <option value="CAMINADORA"
                            <?php echo (($resultado['art_nombre']) == 'CAMINADORA')? "selected=''":"";?>>CAMINADORA
                        </option>
                    </select>
                </div>

                <div class="form-group col-sm-6">
                    <label for="valor" class="form-label">Valor</label>
                    <label for="valor" class="form-label" id="txtValor"><?php echo $resultado['art_valor']; ?></label>
                    <input type="text" id="valor" name="valor" value="<?php echo $resultado['art_valor']; ?>"
                        onchange="changeValue(this.value)">
                </div>

                <div class="form-group col-sm-6">
                    <label for="cantidad">Cantidad</label>
                    <input type="Number" min="1" name="cantidad" id="cantidad"
                        value="<?php echo $resultado['art_cantidad']; ?>" class="form-control"
                        placeholder="Cantidad en inventario" required>
                </div>

                <div class="form-check">
                    <h2>Descripcion</h2>
                    <input type="text" name="descripcion" id="descripcion"
                        value="<?php echo $resultado['art_descripcion']; ?>" class="form-control"
                        placeholder="Descripcion" enabled>
                </div>

                <div class="form-group col-sm-6">
                    <label for="marca">Cod.Proveedor actual</label>
                    <input type="text" name="marca1" id="proveedorExtra" value="<?php echo $resultado['art_marca']; ?>"
                        class="form-control" placeholder="Marca" disabled>
                </div>

                <div class="form-group col-sm-6">
                    <label for="marca">Cambiar proveedor a:</label>
                    <select id="marca" name="marca" class="form-control">
                        <option value="0">SELECCIONAR NUEVO PROOVEDOR</option>
                        <option value="HTGYM">HTGYM</option>
                        <option value="TAURUS">TAURUS</option>
                        <option value="LYCANS">LYCANS</option>
                        <option value="SYF">SYF</option>
                    </select>
                </div>

                <div class="form-group mx-auto">
                    <button type="submit" class="btn btn-primary"
                        onclick="if (!confirm('Esta seguro de modificar el producto?')) return false;">Guardar</button>
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
        window.alert("SU ARTICULO HA SIDO MODIFICADO");
    }
    return valido;

}
</script>
<?php 
?>
<?php  require_once FOOTER?>