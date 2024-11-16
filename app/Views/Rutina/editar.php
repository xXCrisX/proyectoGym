<div class="container">
    <div class="row justify-content-center">
        <div class="col-6">
            <h2>Editar Rutina</h2>
           <?php //print_r ($rutina);?>    
            <form action="<?= base_url('rutinas/actualizar/'); ?>" method="POST">
            
            <input type="hidden" name="idRutina" value="<?= $rutina[0]->idRutina;?>">
            <label for="tipoRutina" class="form-label">Tipo de Rutina</label>
            <input type="text" name="tipoRutina" class="form-control" id="tipoRutina" placeholder="Tipo de rutina" required value="<?=$rutina[0]->tipoRutina;?>">
            <label for="dia" class="form-label">Dia de la rutina</label>
            <select name="dia" id="dia" class="form-select" required value="<?=$rutina[0]->dia;?>">
                <option value="Lunes"<?=$rutina[0]->dia=="Lunes"?"selected":"";?>>Lunes</option>
                <option value="Martes"<?=$rutina[0]->dia=="Martes"?"Selected":"";?>>Martes</option>
                <option value="Miércoles"<?=$rutina[0]->dia=="Miércoles"?"selected":"";?>>Miércoles</option>
                <option value="Jueves"<?=$rutina[0]->dia=="Jueves"?"selected":"";?>>Jueves</option>
                <option value="Viernes"<?=$rutina[0]->dia=="Viernes"?"Selected":"";?>>Viernes</option>
                <option value="Sábado"<?=$rutina[0]->dia=="Sábado"?"selected":"";?>>Sábado</option>
                <option value="Domingo"<?=$rutina[0]->dia=="Domingo"?"selected":"";?>>Domingo</option>
            </select>
            <label for="descripcion" class="form-label">Descripcion</label>
            <input type="text" name="descripcion" class="form-control" id="descripcion"  placeholder="Explica la rutina" required value="<?=$rutina[0]->descripcion;?>">    
            <label for="recomendacion" class="form-label">Recomendaciones : </label>
            <input type="text" name="recomendacion" class="form-control" id="recomendacion" placeholder="recomendaciones"  required value="<?=$rutina[0]->recomendacion;?>">
            <label for="nivelDificultad" class="form-label">Nivel de dificultad</label>
            <select name="nivelDificultad" id="nivelDificultad" class="form-select" required value="<?=$rutina[0]->nivelDificultad;?>">
                <option value="principiante"<?=$rutina[0]->nivelDificultad=="principiante"?"selected":"";?>>Principiante</option>
                <option value="intermedio"<?=$rutina[0]->nivelDificultad=="intermedio"?"selected":"";?>>Intermedio</option>
                <option value="avanzado"<?=$rutina[0]->nivelDificultad=="avanzado"?"selected":""?>>Avanzado</option>
            </select>
            <label for="objetivo" class="form-label">Objetivo</label>
            <select name="objetivo" id="objetivo" class="form-select" required value="<?=$rutina[0]->objetivo;?>">
                <option value="fuerza" <?=$rutina[0]->objetivo=="fuerza"?"selected":"";?>>Fuerza</option>
                <option value="hipertrofia" <?=$rutina[0]->objetivo=="hipertrofia"?"selected":"";?>>Hipertrofia</option>
                <option value="resistencia"<?=$rutina[0]->objetivo=="resistencia"?"selected":"";?>>Resistencia</option>
                <option value="perdidaPeso"<?=$rutina[0]->objetivo=="perdidaPeso"?"selected":"";?>>Perdida de Peso</option>
            </select>
            <label for="duracionSemanas" class="form-label">Duración de semanas de esta rutina</label>
            <input type="text" class="form-control" name="duracionSemanas" id="duracionSemanas" placeholder="Escribe el número de semanas que durara la rutina" required value="<?=$rutina[0]->duracionSemanas?>">
            <label for="foto" class="form-label">Foto</label>
            <input type="file" class="form-control" name="foto" id="foto"  required value="<?=$rutina[0]->foto;?>">
            <input type="submit" class="btn btn-primary" value="Actualizar">   
            </form>
         
        </div>
    </div>
</div>