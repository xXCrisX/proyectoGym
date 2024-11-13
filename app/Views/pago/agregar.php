<div class="row justify-content-center">
        <div class="col-auto">
            <h2>Agregar Pagos</h2>
            <?= validation_list_errors()?>
            <form action="<?= base_url('pago/insertar'); ?>" method="POST">
                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">
            <div > 
            <label for="metodo" class="form-label">Método</label>
            <input type="text" name="metodo" class="form-control" id="metodo" placeholder="Método"  required value="<?= set_value('metodo')?>">
            <label for="monto" class="form-label">Monto</label>
            <input type="text" name="monto" class="form-control" id="monto" placeholder="Monto"  required value="<?= set_value('monto')?>">    
            <label for="servicio" class="form-label">Servicio</label>
            <input type="text" name="servicio" class="form-control" id="servicio" placeholder="servicio"  required value="<?= set_value('servicio')?>">
            <label for="idSocio">Elige el nombre de usuario</label>
            <select id="idSocio" name="idSocio">
            <?php foreach ($usuario as $key):?>
            <option value="<?=  $key-> idSocio ?>"><?= $key-> nombre ?></option>
            <?php endforeach?>
             </select>
            </div>
            <div>
            <label for="fechaPago">Fecha de pago:</label>
            <input type="date" name="fechaPago" id="fechaPago" required value="<?=set_value('fechaPago') ?>">
            </div>
            <input type="submit" class="btn btn-success" value="Agregar">   
            </form>
        </div>
    </div>
</div>
