<div class="container">
    <div class="row justify-content-center">
        <div class="col-auto">
            <h2>Editar Rutina</h2>
           <?php //print_r ($usuario);?>    
            <form action="<?= base_url('rutinas/actualizar/'); ?>" method="POST">
            <div class=""> 
            <input type="hidden" name="idRutina" value="<?= $rutina[0]->idRutina;?>">
            <label for="tipoRutina" class="form-label">Tipo de Rutina</label>
            <input type="text" name="tipoRutina" class="form-control" id="tipoRutina" placeholder="Tipo de rutina" required value="<?= $rutina[0]->tipoRutina;?>">
            <label for="descripcion" class="form-label">Descripcion</label>
            <input type="text" name="descripcion" class="form-control" id="descripcion"  placeholder="Explica la rutina" required value="<?= $rutina[0]->descripcion;?>">    
            <label for="recomendacion" class="form-label">Recomendaciones : </label>
            <input type="text" name="recomendacion" class="form-control" id="recomendacion" placeholder="recomendaciones"  required value="<?= $rutina[0]->recomendacion;?>">
            </div>
            <input type="submit" class="btn btn-primary" value="Actualizar">   
            </form>
         
        </div>
    </div>
</div>