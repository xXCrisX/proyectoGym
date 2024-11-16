<div class="container">
    <div class="row justify-content-center">
        <div class="col-auto">
            <h2>Registrar Asistencias</h2>
            <?= validation_list_errors()?>
            <form action="<?= base_url('asistencias/insertar'); ?>" method="POST">
                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>"> 
            <label for="horaE" class="form-label">Hora de Entrada: </label>
            <input type="time" name="horaE" class="form-control" id="horaE" required value="<?= set_value('horaE')?>">
            <label for="horaS" class="form-label">Hora de Salida:</label>
            <input type="time" name="horaS" class="form-control" id="horaS" required value="<?= set_value('horaS')?>">    
            <label for="idSocio" class="form-label">Elige el nombre de usuario</label>
            <select id="idSocio" name="idSocio" class="form-select" reuquired value="<?=set_value('idSocio');?>">
            <?php foreach ($socio as $key):?>
            <option value="<?=  $key-> idSocio ?>"><?= $key-> nombre ?></option>
            <?php endforeach?>
             </select>
            <label for="fecha" class="form-label">Fecha:</label>
            <input type="date" class="form-control" name="fecha" id="fecha" required value="<?=set_value('fecha') ?>">
            <input type="submit" class="btn btn-success margen" value="Agregar">   
            </form>
        </div>
    </div>
</div>
