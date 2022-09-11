<!--autor: MARCILLO FALCONES FERNANDO-->
<?php include_once HEADER;?>

<div class="container">
    <div class="card card-body">
        <form action="<?php echo constant('URLBASE')?>ArticuloController/nuevoArticulos" method="POST"
            name="formArticuloNuevo" id="formArticuloNuevo">
            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="proveedor">Articulo:</label>
                    <select id="proveedor" name="nombre" class="form-control">
                        <option value="PESA">PESA</option>
                        <option value="MANCUERNA" selected>MANCUERNA</option>
                        <option value="CAMINADORA" selected>CAMINADORA</option>
                    </select>
                </div>

                <div class="form-group col-sm-6">
                    <label for="valor">Valor</label>
                    <input type="text" name="valor" id="valor" class="form-control" placeholder="Valor de el Articulo"
                        autofocus="" required />
                </div>

                <div class="form-group col-sm-6">
                    <label for="cantidad">Cantidad</label>
                    <input type="Number" name="cantidad" id="cantidad" class="form-control"
                        placeholder="Cantidad en el inventario" required>
                </div>

                <div class="form-group col-sm-6">
                    <label for="marca">Cambiar marca a:</label>
                    <select id="marca" name="marca" class="form-control">
                        <option value="HTGYM">HTGYM</option>
                        <option value="TAURUS" selected>TAURUS</option>
                        <option value="LYCANS" selected>LYCANS</option>
                        <option value="SYF" selected>SYF</option>
                    </select>
                </div>

                <div class="form-group col-sm-6">
                    <label for="descripcion">Descripcion</label>
                    <input type="text" name="descripcion" id="descripcion" class="form-control"
                        placeholder="Descripcion de el producto" autofocus="" required />
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
</script>

<?php include_once FOOTER;?>