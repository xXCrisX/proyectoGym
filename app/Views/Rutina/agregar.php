<div class="row justify-content-center">
        <div class="col-auto">
            <h2>Agregar Rutina</h2>
            <?= validation_list_errors()?>
            <form action="<?= base_url('rutinas/insertar'); ?>" method="POST">
                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">
            <div > 
            <label for="tipoRutina" class="form-label">Tipo de Rutina</label>
            <input type="text" name="tipoRutina" class="form-control" id="tipoRutina" placeholder="Tipo de rutina" required value="<?= set_value('tipoRutina')?>">
            <label for="descripcion" class="form-label">Descripcion</label>
            <input type="text" name="descripcion" class="form-control" id="descripcion"  placeholder="Explica la rutina" required value="<?= set_value('descripcion')?>">    
            <label for="recomendacion" class="form-label">Recomendaciones : </label>
            <input type="text" name="recomendacion" class="form-control" id="recomendacion" placeholder="recomendaciones"  required value="<?= set_value('recomendacion')?>">
            </div>
            <input type="submit" class="btn btn-success" value="Agregar">   
            </form>
        </div>
    </div>
</div>
