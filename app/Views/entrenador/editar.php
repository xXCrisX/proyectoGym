<div class="container">
    <div class="row justify-content-center">
        <div class="col-6">
            <h2>Editar Entrenador</h2>
            <?php //print_r($entrenador);?>
            <form action="<?=base_url('entrenador/actualizar');?>" method="POST">    
            <input type="hidden" name="idEntrenador" value="<?= $entrenador[0]->idEntrenador;?>">
            <input type="hidden" name="idUsuario" value="<?= $entrenador[0]->idUsuario;?>">
            <label for="alias" class="form-label">Nombre de usuario</label>
            <input type="text" name="alias" class="form-control" id="alias" placeholder="nombre de usuario" required value="<?= $entrenador[0]->alias?>">  
            <label for="nombre" class="form-label">nombre(s)</label>
            <input type="text" name="nombre" class="form-control" id="nombre" required value="<?= $entrenador[0]->nombre;?>">
            <label for="apellidoP" class="form-label">Apellido Paterno</label>
            <input type="text" name="apellidoP" class="form-control" id="apellidoP" required value="<?= $entrenador[0]->apellidoP;?>">
            <label for="apellidoM" class="form-label">Apellido Materno</label>
            <input type="text" name="apellidoM" class="form-control" id="apelldioM" required value="<?=$entrenador[0]->apellidoM;?>">
            <label for="curp" class="form-label">curp: </label>
            <input type="text" name="curp" class="form-control" id="curp" value="<?=$entrenador[0]->curp;?>">
            <label for="especialidad" class="form-label">especialidad: </label>
            <input type="text" name="especialidad" class="form-control" id="especialidad" required value="<?=$entrenador[0]->especialidad;?>">
            <label for="cta" class="form-label">Contraseña</label>
            <input type="password" name="cta" class="form-control" id="cta" placeholder="Contraseña" required value="<?= $entrenador[0]->cta;?>">
            <p>selecciona tu sexo:</p>
            <input type="radio" class="form-check-input" name="sexo"   id="sexoM" required value="M" <?= $entrenador[0]->sexo == 'M' ? 'checked' : ''; ?>>
            <label for="sexoM" class="form-check-label">M</label>
            <input type="radio" class="form-check-input" name="sexo"  id="sexoF" required value="F" <?= $entrenador[0]->sexo == 'F' ? 'checked' : ''; ?>>
            <label for="sexoF" class="form-check-label">F</label>
            <input type="radio" class="form-check-input" name="sexo"  id="sexoO" required value="O" <?= $entrenador[0]->sexo == 'O' ? 'checked' : ''; ?>>
            <label for="sexoO" class="form-check-label">O</label>
            <label for="fechaNacimiento" class="form-label">Fecha de Nacimiento</label>
            <input type="date" class="form-control" name="fechaNacimiento" id="fechaNacimiento" required value="<?= $entrenador[0]->fechaNacimiento?>">
            <label for="telefonoM" class="form-label">Telefono Movil:</label>
            <input type="tel" class="form-control" id="telefonoM" name="telefonoM" placeholder="numero de telefono" required value="<?=$entrenador[0]->telefonoM?>">
            <label for="telefonoC" class="form-label">Telefono de casa:</label>
            <input type="tel" class="form-control"id="telefonoC" name="telefonoC" placeholder="numero de telefono" required value="<?=$entrenador[0]->telefonoC?>">
            <label for="correo" class="form-label">Correo Electronico</label>
            <input type="text" name="correo" class="form-control" id="correo" required value="<?=$entrenador[0]->correo;?>">

            <label for="especialidad" class="form-label" >Elige la especialidad: </label>
            <select name="especialidad" id="especialidad" class="form-control"  required value="<?=$entrenador[0]->especialidad;?>">
                <option value="fuerza">Fuerza</option>
                <option value="hipertrofia">Hipertrofia</option>
                <option value="resistencia">Resistencia</option>
                <option value="perdidaPeso">Perdida de peso</option>
             </select>
            <label for="curp" class="form-label"  >Curp: </label>
            <input type="text" name="curp" class="form-control" id="curp" placeholder="curp"   required value="<?=$entrenador[0]->curp;?>"> 
            <label for="foto" >Foto</label>
            <input type="file" name="foto" id="foto"  class="form-control" required value="<?=$entrenador[0]->foto;?>">
            <label for="certificaciones"  class="form-label">Certificaciones:</label>
            <input type="textarea" name="certificaciones" id="certificaciones"  placeholder="Certificaciones" class="form-control" required value="<?=$entrenador[0]->certificaciones;?>">
            <div class="text-center">
            <input type="submit" class="btn btn-primary margen" value="Actualizar">
            </div> 
            </form>
        </div>
    </div>
</div>