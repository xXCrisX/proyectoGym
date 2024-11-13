<div class="container ">
    <div class="row justify-content-center">
        <div class="col-6">
            <h2>Editar usuario</h2>
           <?php print_r ($usuario);?>    
            <form action="<?= base_url('socio/actualizar/'); ?>" method="POST">
            
            <input type="hidden" name="idSocio" value="<?= $socio[0]->idSocio;?>">
            <input type="hidden" name="idUsuario" value="<?=$usuario[0]->idUsuario;?>">
            <label for="alias" class="form-label">Nombre de usuario</label>
            <input type="text" name="alias" class="form-control" id="alias" placeholder="nombre de usuario" required value="<?= $usuario[0]->alias?>">  
            <label for="nombre" class="form-label">nombre(s)</label>
            <input type="text" name="nombre" class="form-control" id="nombre" required value="<?= $usuario[0]->nombre;?>">
            <label for="apellidoP" class="form-label">Apellido Paterno</label>
            <input type="text" name="apellidoP" class="form-control" id="apellidoP" value="<?= $usuario[0]->apellidoP;?>">
            <label for="apellidoM" class="form-label">Apellido Materno</label>
            <input type="text" name="apellidoM" class="form-control" id="apelldioM" value="<?=$usuario[0]->apellidoM;?>">
            <label for="estatura" class="form-label">Estatura: </label>
            <input type="text" name="estatura" class="form-control" id="estatura" value="<?=$usuario[0]->estatura;?>">
            <label for="peso" class="form-label">Peso: </label>
            <input type="text" name="peso" class="form-control" id="peso" value="<?=$usuario[0]->peso;?>">
            <label for="cta" class="form-label">Contraseña</label>
            <input type="password" name="cta" class="form-control" id="cta" placeholder="Contraseña"  value="<?= $usuario[0]->cta;?>">
            <p>selecciona tu sexo:</p>
            <input type="radio" class="form-check-input" name="sexo"   id="sexoM" value="M" <?= $usuario[0]->sexo == 'M' ? 'checked' : ''; ?>>
            <label for="sexoM" class="form-check-label">M</label>
            <input type="radio" class="form-check-input" name="sexo"  id="sexoF" value="F" <?= $usuario[0]->sexo == 'F' ? 'checked' : ''; ?>>
            <label for="sexoF" class="form-check-label">F</label>
            <input type="radio" class="form-check-input" name="sexo"  id="sexoO" value="O" <?= $usuario[0]->sexo == 'O' ? 'checked' : ''; ?>>
            <label for="sexoO" class="form-check-label">O</label>
            <label for="fechaNacimiento" class="form-label">Fecha de Nacimiento</label>
            <input type="date" class="form-control" name="fechaNacimiento" id="fechaNacimiento" value="<?= $usuario[0]->fechaNacimiento?>">
            <label for="telefonoM" class="form-label">Telefono Movil:</label>
            <input type="tel" class="form-control" id="telefonoM" name="telefonoM" placeholder="numero de telefono" value="<?=$usuario[0]->telefonoM?>">
            <label for="telefonoC" class="form-label">Telefono de casa:</label>
            <input type="tel" class="form-control"id="telefonoC" name="telefonoC" placeholder="numero de telefono" required value="<?=$usuario[0]->telefonoC?>">
            <label for="correo" class="form-label">Correo Electronico</label>
            <input type="text" name="correo" class="form-control" id="correo" value="<?=$usuario[0]->correo;?>">

            <label for="foto" class="form-label">Foto:</label>
            <input type="file" class="form-control" name="foto" id="foto" value="<?=$socio[0]->foto;?>">
            <label for="peso" class="form-label">Peso</label>
            <input type="text" class="form-control" name="peso" id="peso"value="<?=$socio[0]->peso;?>">
            <label for="estatura" class="form-label">Estatura</label>
            <input type="text" class="form-control" name="estatura" id="estatura" value="<?=$socio[0]->estatura;?>">
            <label for="condicionMedicas" class="form-label">Condiciones Medicas</label>
            <input type="text" class="form-control" name="condicionMedicas" id="condicionMedicas" value="<?=$socio[0]->condicionMedicas?>">
            <label for="lesionesPrevias" class="form-label">Lesiones Previas</label>
            <input type="text" class="form-control" name="lesionesPrevias" id="lesionesPrevias" value="<?=$socio[0]->lesionesPrevias?>">
            <label for="alergias" class="form-label">Alergias</label>
            <input type="text" class="form-control" name="alergias" id="alergias" value="<?=$socio[0]->alergias?>">
            <label for="medicacionActual" class="form-label">Medicación Actual</label>
            <input type="text" class="form-control" name="medicacionActual" id="medicacionActual" value="<?=$socio[0]->medicacionActual?>">             
            <input type="submit" class="btn btn-primary margen" value="Actualizar">   
            </form>
         
        </div>
    </div>
</div>