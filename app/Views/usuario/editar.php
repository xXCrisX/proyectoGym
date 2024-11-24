<div class="container">
    <div class="row justify-content-center">
        <div class="col-6"  >
            <h2>Editar usuarios</h2>
           <?php //print_r ($usuario);?>    
            <form action="<?= base_url('usuario/actualizar/'); ?>" method="POST" style="margin-bottom: 50px;">
          
            <input type="hidden" name="idUsuario" value="<?= $usuario[0]->idUsuario;?>">
            <label for="alias" class="form-label">Nombre de usuario</label>
            <input type="text" name="alias" class="form-control" id="alias" placeholder="nombre de usuario" required value="<?= $usuario[0]->alias?>">  
            <label for="nombre" class="form-label">nombre(s)</label>
            <input type="text" name="nombre" class="form-control" id="nombre" required value="<?= $usuario[0]->nombre;?>">
            <label for="apellidoP" class="form-label">Apellido Paterno</label>
            <input type="text" name="apellidoP" class="form-control" id="apellidoP" required value="<?= $usuario[0]->apellidoP;?>">
            <label for="apellidoM" class="form-label">Apellido Materno</label>
            <input type="text" name="apellidoM" class="form-control" id="apelldioM" reuired value="<?=$usuario[0]->apellidoM;?>">
            <label for="cta" class="form-label">Contraseña</label>
            <input type="password" name="cta" class="form-control" id="cta" placeholder="Contraseña"  required value="<?= $usuario[0]->cta;?>">
            <p >selecciona tu sexo</p>
            <input type="radio" name="sexo" class="form-check-input"  id="sexoM" required  value="M" <?= $usuario[0]->sexo == 'M' ? 'checked' : ''; ?>>
            <label for="sexoM" class="form-check-label">Masculino</label>
            <input type="radio" class="form-check-input" name="sexo"  id="sexoF" required  value="F" <?= $usuario[0]->sexo == 'F' ? 'checked' : ''; ?>>
            <label for="sexoF" class="forme-check-label">Femenino</label>
            <input type="radio" class="form-check-input" name="sexo"  id="sexoO" required  value="O" <?= $usuario[0]->sexo == 'O' ? 'checked' : ''; ?>>
            <label for="sexoO" class="fomr-check-label">Otro</label>
            <label for="fechaNacimiento" class="form-label">Fecha de Nacimiento</label>
            <input type="date" class="form-control" name="fechaNacimiento" id="fechaNacimiento" required  value="<?= $usuario[0]->fechaNacimiento?>">
            <label for="telefonoM" class="form-label">Telefono Movil:</label>
            <input type="tel" class="form-control" id="telefonoM" name="telefonoM" placeholder="numero de telefono" required  value="<?=$usuario[0]->telefonoM?>">
            <label for="telefonoC" class="form-label">Telefono de casa:</label>
            <input type="tel"  class="form-control" id="telefonoC" name="telefonoC" placeholder="numero de telefono" required value="<?=$usuario[0]->telefonoC?>">
            <label for="correo" class="form-label">Correo Electronico</label>
            <input type="text" name="correo" class="form-control" id="correo"required  value="<?=$usuario[0]->correo;?>">
    
            <input type="submit" class="btn btn-primary margen" value="Actualizar">  
            </form>
         
        </div>
    </div>
</div>