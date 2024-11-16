<div class="container">
    <div class="row justify-content-center">
        <div class="col-6">
            <h2>Editar Dieta</h2>
           <?php //print_r ($usuario);?>    
            <form action="<?= base_url('dietas/actualizar/'); ?>" method="POST"> 
            <input type="hidden" name="idDieta" value="<?= $dieta[0]->idDieta;?>">
            <label for="descripcion" class="form-label">Descripción:</label>
            <input type="text" name="descripcion" class="form-control" id="descripcion" placeholder="Escribe toda la información sobre la dieta"  required value="<?=$dieta[0]->descripcion;?>">
            <label for="recomendacion" class="form-label">Recomendación</label>
            <input type="text" name="recomendacion" class="form-control" id="recomendacion" placeholder="recomendacion"  required value="<?= $dieta[0]->recomendacion;?>">    
            <label for="calorias" class="form-label">Calorias totales a consumir</label>
            <input type="text" name="calorias" class="form-control" id="calorias" placeholder="Escribe las calorías totales para esta dieta por día"  required value="<?=$dieta[0]->calorias;?>">
            <label for="objetivo" class="form-label">Objetivo de esta dieta</label>
            <select name="objetivo" id="objetivo" class="form-select" required value="<?=$dieta[0]->objetivo;?>">
                <option value="Perdida de peso"<?=$dieta[0]->objetivo=="Perdida de peso"?'selected':'';?>>Perdida de peso</option>
                <option value="Aumento de masa muscular" <?=$dieta[0]->objetivo=="Aumento de masa muscular"?'selected':'';?>>Aumento de masa muscular</option>
                <option value="Mantenimiento"<?=$dieta[0]->objetivo=="Mantenimiento"?'selected':"";?>>Mantenimiento</option>
            </select>
            <label for="foto" class="form-label">Foto</label>
            <input type="file" name="foto" class="form-control" id="foto" required value="<?= $dieta[0]->foto;?>">
            <label for="duracionSemanas" class="form-label">Duración de la dieta</label>
            <input type="text" class="form-control" name="duracionSemanas" id="duracionSemanas" placeholder="Escribe las semanas que durara esta dieta" required value="<?=$dieta[0]->duracionSemanas;?>">
            <label for="tiempoDeComida" class="form-label">Tiempo de comida al día</label>
            <select name="tiempoDeComida" id="tiempoDeComida" class="form-select" required value="<?=$dieta[0]->tiempoDeComida;?>">
                <option value="Desayuno"<?=$dieta[0]->tiempoDeComida=="Desayuno"?'selected':'';?> >Desayuno</option>
                <option value="Media mañana"<?=$dieta[0]->tiempoDeComida=="Media mañana"?"selected":'';?>>Media mañana</option>
                <option value="Comida"<?=$dieta[0]->tiempoDeComida=="Comida"?"selected":''?>>Comida</option>
                <option value="Merienda"<?=$dieta[0]->tiempoDeComida=="Merienda"?"selected":'';?>>Merienda</option>
                <option value="Cena"<?=$dieta[0]->tiempoDeComida=="Cena"?'selected':'';?>>Cena</option>
            </select>
            <input type="submit" class="btn btn-primary margen" value="Actualizar">   
            </form>
         
        </div>
    </div>
</div>