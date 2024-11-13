<div class="row justify-content-center">
        <div class="col-auto">
            <h2>Agregar Dietas</h2>
            <?= validation_list_errors()?>
            <form action="<?= base_url('dietas/insertar'); ?>" method="POST">
                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">
            <div > 
            <label for="descripcion" class="form-label">Descripción:</label>
            <input type="text" name="descripcion" class="form-control" id="descripcion" placeholder="Descripción"  required value="<?= set_value('descripcion')?>">
            <label for="recomendacion" class="form-label">Recomendación</label>
            <input type="text" name="recomendacion" class="form-control" id="recomendacion" placeholder="recomendacion"  required value="<?= set_value('monto')?>">    
            <label for="opcion" class="form-label">Opcion</label>
            <input type="text" name="opcion" class="form-control" id="opcion" placeholder="opcion"  required value="<?= set_value('opcion')?>">
            <label for="tiempoComida" class="form-label">Tiempo de Comida</label>
            <input type="text" name="tiempoComida" class="form-control" id="tiempoComida" placeholder="Tiempo de comida"  required value="<?= set_value('timpoComida')?>">
            </div>
            <input type="submit" class="btn btn-success" value="Agregar">   
            </form>
        </div>
    </div>
</div>
