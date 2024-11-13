<div class="container text-start" id="app">
    <div class="row justify-content-center ">
        <div class="col-6">
            <h2>Agregar usuario</h2>
            <?= validation_list_errors()?>
            <form action="<?= base_url('usuario/insertar'); ?>" method="POST">
                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">
            <label for="alias" class="form-label">Nombre de usuario</label>
            <input type="text" name="alias" class="form-control" id="alias" placeholder="escri  be tu nombre de usuario"  required value="<?= set_value('alias')?>">    
            <label for="nombre" class="form-label">Nombre(s)</label>
            <input type="text" name="nombre" class="form-control" id="nombre" placeholder="escribe tu nombre"  required value="<?= set_value('nombre')?>">
            <label for="apellidoP" class="form-label">Apellido Paterno</label>
            <input type="text" name="apellidoP" class="form-control" id="apellidoP" placeholder="escribe tu apellido paterno"  required value="<?= set_value('apellidoP') ?>">
            <label for="apellidoM" class="form-label">Apellido Materno</label>
            <input type="text" name="apellidoM" class="form-control" id="apelldioM" placeholder="escribe tu apellido materno" required value="<?= set_value('apellidoM') ?>">
            <label for="cta" class="form-label">Contraseña</label>
            <input type="password" name="cta" class="form-control" id="cta" placeholder="escribe tu contraseña"  required value="<?= set_value('cta')?>">
            <div> 
            <p>selecciona tu sexo:</p>
            <input type="radio" name="sexo"   id="sexoM" value='M' class="form-check-input" required>
            <label for="sexoM"  class="form-check-label">M</label>
            <input type="radio" name="sexo"  id="sexoF" value='F' class="form-check-input" required>
            <label for="sexoF" class="form-check-label">F</label>
            <input type="radio" name="sexo"  id="sexoO" value='O' class="form-check-input" required>
            <label for="sexoF" class="form-check-label">Otro</label>
            </div>
            <label for="fechaNacimiento" class="form-label">Fecha de Nacimiento</label>
            <input type="date" name="fechaNacimiento" id="fechaNacimiento" required value="<?=set_value('fechaNacimineto') ?>" class="form-control">            
            
            <label for="telefonoM" class="form-label">Telefono Movil:</label>
            <input type="tel" id="telefonoM" name="telefonoM" placeholder="número de telefono" required value="<?=set_value('telefonoM') ?>" class="form-control">
            <label for="telefonoC" class="form-label">Telefono de casa:</label>
            <input type="tel" id="telefonoC" name="telefonoC" placeholder="número de telefono" required value="<?=set_value('telefonC') ?>" class="form-control">
            <label for="correo" class="form-label">Correo Electronico</label>
            <input type="text" name="correo" class="form-control" id="correo" placeholder="correo" required value="<?= set_value('correo') ?>">
            
            <label for="tipo" class="form-label">Elige tipo de usuario:</label>
            <select id="tipo" name="tipo" @change="cambiarTipo" class="form-control" required value="<?=set_value('tipo')?>">
             <option value="0">Admistrador</option>
             <option value="1">Entrenador</option>
             <option value="2">Socio</option>
             </select>
            
                <label for="especialidad" class="form-label" v-if="entrenador">Elige la especialidad: </label>
            <select name="especialidad" id="especialidad" class="form-control" v-if="entrenador" required value="<?=set_value('especialidad')?>">
                <option value="fuerza">Fuerza</option>
                <option value="hipertrofia">Hipertrofia</option>
                <option value="resistencia">Resistencia</option>
                <option value="perdidaPeso">Perdida de peso</option>
             </select>
            <label for="curp" class="form-label" v-if="entrenador" >Curp: </label>
            <input type="text" name="curp" class="form-control" id="curp" placeholder="curp" v-if="entrenador"  required value="<?=set_value('curp')?>"> 
            <label for="foto" v-if="entrenador">Foto</label>
            <input type="file" name="foto" id="foto" v-if="entrenador" class="form-control" required value="<?=set_value('foto')?>">
            <label for="certificaciones" v-if="entrenador" class="form-label">Certificaciones:</label>
            <input type="textarea" name="certificaciones" id="certificaciones" v-if="entrenador" placeholder="Certificaciones" class="form-control" required value="<?=set_value('certificaciones')?>">
            
            <label for="foto" class="form-label" v-if="socio">Foto:</label>
            <input type="file" name="foto" id="foto" class="form-control" v-if="socio" required value="<?=set_value('foto')?>">
            <label for="peso" class="form-label" v-if="socio">Peso:</label>
            <input type="text" name="peso" id="peso" class="form-control" placeholder="Escribe tu peso en kg" v-if="socio" required value="<?=set_value('peso')?>" >
            <label for="estatura" class="form-label" v-if="socio">Estatura:</label>
            <input type="text" name="estatura" id="estatura" class="form-control" placeholder="Escribe tu estatura en metros" v-if="socio" required value="<?=set_value('estatura')?>">
            <label for="condicionMedicas" class="form-label" v-if="socio">Condiciones Medicas</label>
            <input type="textarea" name="condicionMedicas" id="condicionMedicas" class="form-control" placeholder="escribe las condiciones medicas que padezcas" v-if="socio" required value="<?=set_value('condicionMedicas')?>">
            <label for="lesionesPrevias" class="form-label" v-if="socio">Lesiones previas:</label>
            <input type="textarea" name="lesionesPrevias" id="lesionesPrevias" class="form-control" placeholder="escribe las lesiones que hayas tenido" v-if="socio" required value="<?=set_value('lesionesPrevias')?>">
            <label for="alergias" class="form-label" v-if="socio">Alergias:</label>
            <input type="textarea" name="alergias" id="alergias" class="form-control" placeholder="Escribe a que eres alergico" v-if="socio" required value="<?=set_value('alergias')?>">
            <label for="medicacionActual" class="form-label" v-if="socio">Medicación Actual:</label>
            <input type="textarea" name="medicacionActual" id="medicacionActual" class="form-control" placeholder="Escribe los medicamentos que alctualmente consumes" v-if="socio" required value="<?=set_value('medicacionActual')?>">
            
            <input type="submit" class="btn btn-success" value="Agregar"> 
            
            </form>
        </div>
    </div>
</div>

