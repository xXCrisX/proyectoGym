<div class="container">
    <div class="row justify-content-center">
        <div class="col-auto">
            <h2>Editar Horario</h2>
           <?php //print_r ($usuario);?>    
            <form action="<?= base_url('horarios/actualizar/'); ?>" method="POST">
            <div class=""> 
            <input type="hidden" name="idHorario" value="<?= $horario[0]->idHorario;?>">
            <label for="horaI" class="form-label">Hora Inicio</label>
            <input type="time" name="horaI" class="form-control" id="horaI"  required value="<?= $horario[0]->horaI;?>">
            <label for="horaF" class="form-label">Hora Finalizacion</label>
            <input type="time" name="horaF" class="form-control" id="horaF"   required value="<?= $horario[0]->horaF;?>">    
            <label for="tipoEn" class="form-label">Tipo De entrenamiento : </label>
            <input type="text" name="tipoEn" class="form-control" id="tipoEn" placeholder="Tipo de entrenamiento"  required value="<?= $horario[0]->tipoEn;?>">
            <label for="capacidad" class="form-label">Cantidad de participantes : </label>
            <input type="text" name="capacidad" class="form-control" id="capacidad" placeholder="Escribe el numero de total de participantes"  required value="<?= $horario[0]->capacidad;?>">
            <label for="idUsuario">Elige el nombre del Entredador</label>
            <select id="idUsuario" name="idUsuario">
            <?php foreach ($usuario as $key):?>
            <option value="<?= $key->idUsuario;?>" <?= $key->idUsuario == $horario[0]->idUsuario ? 'selected' : ''; ?>> <?= $key-> nombre ?></option>
            <?php endforeach;?>
             </select>
            </div>
            <input type="submit" class="btn btn-primary" value="Actualizar">   
            </form>
         
        </div>
    </div>
</div>