<div class="row justify-content-center">
        <div class="col-auto">
            <h2>Registrar Asistencias</h2>
            <?= validation_list_errors()?>
            <form action="<?= base_url('asistencias/insertar'); ?>" method="POST">
                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">
            <div > 
            <label for="horaE" class="form-label">Hora de Entrada: </label>
            <input type="time" name="horaE" class="form-control" id="horaE" required value="<?= set_value('horaE')?>">
            <label for="horaS" class="form-label">Hora de Salida:</label>
            <input type="time" name="horaS" class="form-control" id="horaS" required value="<?= set_value('horaS')?>">    
            <label for="idSocio">Elige el nombre de usuario</label>
            <select id="idSocio" name="idSocio">
            <?php foreach ($usuario as $key):?>
            <option value="<?=  $key-> idSocio ?>"><?= $key-> nombre ?></option>
            <?php endforeach?>
             </select>
            </div>
            <div>
            <label for="fecha">Fecha:</label>
            <input type="date" name="fecha" id="fecha" required value="<?=set_value('fecha') ?>">
            </div>
            <input type="submit" class="btn btn-success" value="Agregar">   
            </form>
        </div>
    </div>
</div>
