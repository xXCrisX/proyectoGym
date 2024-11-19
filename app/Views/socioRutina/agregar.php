<div class="container" >
<div class="row justify-content-center">
        <div class="col-6">
            <h2>Agregar Rutina a Socio</h2>
            <?= validation_list_errors()?>
            <form action="<?= base_url('/socioRutina/insertar'); ?>" method="POST">
                <input type="hidden" name="<?= csrf_token() ?>" required value="<?= csrf_hash() ?>"> 
            <label for="idRutina" class="form-label">Elije una Rutina</label>
            <select name="idRutina" id="idRutina" class="form-select" required value="<?=set_value('idRutina');?>">
                <option value="" selected disabled>Elije una opcion</option>
                <?php foreach($rutina as $key):?>
                <option value="<?=$key->idRutina;?>"><?=$key->tipoRutina; echo" (".$key->dia.")";?></option>
                <?php endforeach?>
            </select>
            <label for="idSocio" class="form-label">Nombre del socio</label>
            <select name="idSocio" id="idSocio" class="form-select"  required value="<?= set_value('idSocio')?>">
                <option value="" selected disabled>Seleccione una opción</option>7
                <?php foreach($socio as $key):?>
                <option value="<?=$key->idSocio?>"><?=$key->nombre;?></option>
                <?php endforeach?>
            </select>
            <label for="fechaInicio" class="form-label">Fecha de Inicio</label>
            <input type="date" class="form-control" name="fechaInicio" id="fechaInicio" required value="<?=set_value('fechaInicio') ?>">
            <label for="fechaFin" class="form-label">Fecha de Finalización</label>
            <input type="date" class="form-control" name="fechaFin" id="fechaFin" required value="<?=set_value('fechaFin') ?>">
            <input type="submit" class="btn btn-success margen" value="Agregar">   
            </form>
    </div>
</div>
</div>