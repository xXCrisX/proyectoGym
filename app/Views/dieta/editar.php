<div class="container">
    <div class="row justify-content-center">
        <div class="col-auto">
            <h2>Editar Dieta</h2>
           <?php //print_r ($usuario);?>    
            <form action="<?= base_url('dietas/actualizar/'); ?>" method="POST">
            <div class=""> 
            <input type="hidden" name="idDieta" value="<?= $dieta[0]->idDieta;?>">
            <label for="descripcion" class="form-label">Descripción:</label>
            <input type="text" name="descripcion" class="form-control" id="descripcion" placeholder="Descripción"  required value="<?= $dieta[0]->descripcion;?>">
            <label for="recomendacion" class="form-label">Recomendación</label>
            <input type="text" name="recomendacion" class="form-control" id="recomendacion" placeholder="recomendacion"  required value="<?= $dieta[0]->recomendacion?>">    
            <label for="opcion" class="form-label">Opcion</label>
            <input type="text" name="opcion" class="form-control" id="opcion" placeholder="opcion"  required value="<?= $dieta[0]->opcion?>">
            <label for="tiempoComida" class="form-label">Tiempo de Comida</label>
            <input type="text" name="tiempoComida" class="form-control" id="tiempoComida" placeholder="Tiempo de comida"  required value="<?=$dieta[0]->tiempoComida?>">
            </div>
            <input type="submit" class="btn btn-primary" value="Actualizar">   
            </form>
         
        </div>
    </div>
</div>