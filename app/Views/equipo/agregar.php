<div class="row justify-content-center">
        <div class="col-auto">
            <h2>Agregar Equipo</h2>
            <?= validation_list_errors()?>
            <form action="<?= base_url('equipos/insertar'); ?>" method="POST">
                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">
            <div > 
            <label for="marca" class="form-label">Marca</label>
            <input type="text" name="marca" class="form-control" id="marca" placeholder="marca" required value="<?= set_value('marca')?>">
            <label for="nombre" class="form-label">nombre</label>
            <input type="text" name="nombre" class="form-control" id="nombre"  placeholder="nombre" required value="<?= set_value('nombre')?>">    
            <label for="cantidad" class="form-label">Cantidad : </label>
            <input type="text" name="cantidad" class="form-control" id="cantidad" placeholder="camtidad"  required value="<?= set_value('camtidad')?>">
            <div>
            <label for="fechaAdq">Fecha de Adquisición: </label>
            <input type="date" name="fechaAdq" id="fechaAdq" required value="<?=set_value('fechaAdq') ?>">
            </div>
            <label for="fotografia" class="form-label">Fotografía: </label>
            <input type="text" name="fotografia" class="form-control" id="fotografia" placeholder="fotografia"  required value="<?= set_value('fotografia')?>">
            </div>
            <input type="submit" class="btn btn-success" value="Agregar">   
            </form>
        </div>
    </div>
</div>