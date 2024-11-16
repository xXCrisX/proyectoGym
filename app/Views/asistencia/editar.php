<div class="container">
    <div class="row justify-content-center">
        <div class="col-auto">
            <h2>Editar Assitenia</h2>
           <?php //print_r ($usuario);?>    
            <form action="<?= base_url('asistencias/actualizar/'); ?>" method="POST">
            <input type="hidden" name="idAsistencia" value="<?= $asistencia[0]->idAsistencia;?>">
            <label for="horaE" class="form-label">Hora de Entrada: </label>
            <input type="time" name="horaE" class="form-control" id="horaE" required value="<?= $asistencia[0]->horaE;?>">
            <label for="horaS" class="form-label">Hora de Salida:</label>
            <input type="time" name="horaS" class="form-control" id="horaS" required value="<?= $asistencia[0]->horaS;?>">    
            <label for="idSocio" class="form-label">Elige el nombre de usuario</label>
            <select id="idSocio" name="idSocio" class="form-select" required value="<?=$asistencia[0]->idSocio;?>">
            <?php foreach ($socio as $key):?>
            <option value="<?=  $key-> idSocio ?>" <?= $key->idSocio == $asistencia[0]->idSocio ? 'selected' : ''; ?>><?= $key-> nombre ?></option>
            <?php endforeach?>
             </select>
            <label for="fecha" class="form-label">Fecha:</label>
            <input type="date" class="form-control"name="fecha" id="fecha" required value="<?=$asistencia[0]->fecha;?>">
            <input type="submit" class="btn btn-primary margen" value="Actualizar">   
            </form>
        </div>
    </div>
</div>