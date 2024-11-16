<div class="container" id="app">
<div class="row justify-content-center">
        <div class="col-auto">
            <h2>Agregar Equipo</h2>
            <?= validation_list_errors()?>
            <form action="<?= base_url('equipos/insertar'); ?>" method="POST">
                <input type="hidden" name="<?= csrf_token() ?>" required value="<?= csrf_hash() ?>"> 
            <label for="marca" class="form-label">Marca</label>
            <input type="text" name="marca" class="form-control" id="marca" placeholder="marca" required value="<?= set_value('marca')?>">
            <label for="nombre" class="form-label">nombre</label>
            <input type="text" name="nombre" class="form-control" id="nombre"  placeholder="nombre" required value="<?= set_value('nombre')?>">    
            <label for="cantidad" class="form-label">Cantidad</label>
            <input type="text" name="cantidad" class="form-control" id="cantidad" placeholder="camtidad" required value="<?= set_value('camtidad')?>">
            
            <label for="fechaAdq" class="form-label">Fecha de Adquisición</label>
            <input type="date" class="form-control" name="fechaAdq" id="fechaAdq" required value="<?=set_value('fechaAdq') ?>">
            
            <label for="foto" class="form-label">Foto</label>
            <input type="file" name="foto" class="form-control" id="foto"  required value="<?= set_value('foto')?>">

            <label for="estado" class="form-label">Estado del equipo</label>
            <select name="estado" id="estado" class="form-control"  required value="<?= set_value('estado')?>">
                <option value="" selected disabled>Seleccione una opción</option>
                <option value="mantenimiento">Mantenimiento</option>
                <option value="sinFuncion">Sin funcion</option>
                <option value="operativo">Operativo</option>
            </select>
            <input type="submit" class="btn btn-success" value="Agregar">   
            </form>
    </div>
</div>
</div>