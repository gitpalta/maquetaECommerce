
<fieldset>
    <legend>Ingrese su información:</legend>
        <label for="email">Ingrese su email</label>
        <input type="email" name="email" value="<?php echo ( $customer->email ); ?>" placeholder="email@email.com" />
    <div>
        <label for="nombre">Ingrese su nombre</label>
        <input type="text" id="nombre" name="nombre" placeholder="Nombre" value="<?php echo ( $customer->nombre ); ?>">
    </div>
    <div>
        <label for="identificacion">Ingrese su DNI:</label>
        <input type="number" id="identificacion" name="identificacion" placeholder="1111111" value="<?php echo ( $customer->identificacion ); ?>">
    </div>
</fieldset>