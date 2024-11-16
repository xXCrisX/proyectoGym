<div class="row justify-content-center">
        <div class="col-6">
            <h2>Agregar Pagos</h2>
            <?= validation_list_errors()?>
            <form action="<?= base_url('pago/insertar'); ?>" method="POST">
                <input type="hidden" name="<?= csrf_token() ?>" required value="<?= csrf_hash() ?>">
            <label for="metodo" class="form-label">Método de pago</label>
            <input type="text" name="metodo" class="form-control" id="metodo" placeholder="Método"  required value="<?= set_value('metodo')?>">
            <label for="monto" class="form-label">Monto</label>
            <input type="text" name="monto" class="form-control" id="monto" placeholder="Monto"  required value="<?= set_value('monto')?>">   
            <label for="idSocio" class="form-label">Elige el nombre de usuario</label>
            <select id="idSocio" name="idSocio" class="form-control">
            <?php foreach ($socio as $key):?>
            <option value="<?= $key-> idSocio ?>"><?= $key-> nombre ?></option>
            <?php endforeach?>
             </select>
            <label for="fechaPago" class="form-label">Fecha de pago:</label>
            <input type="date" class="form-control" name="fechaPago" id="fechaPago" required value="<?=set_value('fechaPago') ?>">
            <label for="fechaFinPago" class="form-label">Fecha que vence el pago</label>
            <input type="date" class="form-control" name="fechaFinPago" id="fechaFinPago" required value="<?=set_value('fechaFinpago');?>">
            <input type="submit" class="btn btn-success margen" value="Agregar">   
            </form>
        </div>
    </div>
</div>
