
<fieldset>
    <legend>Información de Pago</legend>
        <input type="hidden" name="id" value="<?php echo ( $pago->id ); ?>" />
    <div>
        <label for="Medio de Pago">medio de Pago</label> <!--(agregar option con tarjetas? ) -->
        <input type="text" id="mediodepago" name="mediodepago" placeholder="medio de Pago" value="<?php echo ( $pago->mediodepago ); ?>">
    </div>

    <div>
        <label for="valordepago">valordepago:</label>
        <input type="number" id="valordepago" name="valordepago" placeholder="0000" value="<?php echo ( $pago->valordepago ); ?>">
    </div>

    <div>
        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion"><?php echo ( $pago->descripcion ); ?></textarea>
    </div>
</fieldset>