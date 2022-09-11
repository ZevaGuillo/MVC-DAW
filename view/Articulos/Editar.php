<!--autor: MARCILLO FALCONES FERNANDO-->
<?php include_once HEADER;?>

<div class="container">
    <div class="card card-body">
        <form action="<?php echo constant('URLBASE')?>ArticuloController/editarArticulos" method="POST"
            name="formArtNuevo" id="formArtNuevo">
            <input type="hidden" name="id" id="id" value="<?php echo $resultado['art_id']; ?>" />
            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="id">ID</label>
                    <input type="text" name="id" id="id" value="<?php echo $resultado['art_id']; ?>"
                        class="form-control" disabled>
                </div>
                <div class="form-group col-sm-6">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" value="<?php echo $resultado['art_nombre']; ?>"
                        class="form-control" placeholder="nombre articulo" required>
                </div>

                <div class="form-group col-sm-6">
                    <label for="valor" class="form-label">Valor</label>
                    <label for="valor" class="form-label" id="txtValor"><?php echo $resultado['art_valor']; ?></label>
                    <input type="text" id="valor" name="valor" value="<?php echo $resultado['art_valor']; ?>"
                        onchange="changeValue(this.value)">
                </div>

                <div class="form-group col-sm-6">
                    <label for="cantidad">Cantidad</label>
                    <input type="Number" name="cantidad" id="cantidad" value="<?php echo $resultado['art_cantidad']; ?>"
                        class="form-control" placeholder="Cantidad en inventario" required>
                </div>

                <div class="form-check">
                    <h2>Descripcion</h2>
                    <input type="text" name="descripcion" id="descripcion"
                        value="<?php echo $resultado['art_descripcion']; ?>" class="form-control"
                        placeholder="Descripcion" enabled>
                </div>

                <div class="form-group col-sm-6">
                    <label for="marca">Cod.Proveedor actual</label>
                    <input type="text" name="marca" id="proveedorExtra" value="<?php echo $resultado['art_marca']; ?>"
                        class="form-control" placeholder="Marca" disabled>
                </div>

                <div class="form-group col-sm-6">
                    <label for="marca">Cambiar proveedor a:</label>
                    <select id="marca" name="marca" class="form-control">
                        <option value="HTGYM">HTGYM</option>
                        <option value="TAURUS" selected>TAURUS</option>
                        <option value="LYCANS" selected>LYCANS</option>
                        <option value="SYF" selected>SYF</option>
                    </select>
                </div>

                <div class="form-group mx-auto">
                    <button type="submit" class="btn btn-primary"
                        onclick="if (!confirm('Esta seguro de modificar el producto?')) return false;">Guardar</button>
                    <a href="<?php echo constant('URLBASE')?>ArticuloController/buscarArticulo"
                        class="btn btn-primary">Cancelar</a>
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
<?php 
?>
<?php  require_once FOOTER?>