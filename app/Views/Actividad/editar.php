<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <h2>Editar Actividad</h2>
           <?php //print_r ($actividad);?>    
            <form action="<?= base_url('actividad/actualizar/'); ?>" method="POST">
            <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">
            <input type="hidden" class="form-control" name="idActividad" id="idActividad" required value="<?=$actividad[0]->idActividad;?>">
            <label for="foto" class="form-label">foto</label>
            <input type="file" class="form-control" name="foto" id="foto" required value="<?=$actividad[0]->foto;?>">
            <label for="nombre" class="form-label">Nombre de actividad</label>
            <input type="text" name="nombre" id="nombre" placeholder="Escribe un nombre para la actividad" class="form-control" required value="<?= $actividad[0]->nombre;?>">
            <label for="fecha" class="form-label">Fecha</label>
            <input type="date" class="form-control" name="fecha" id="fecha" placeholder="Fecha de la actividad" required value="<?=$actividad[0]->fecha;?>">
            <label for="horaI" class="form-label">Hora Inicio</label>
            <input type="time" name="horaI" class="form-control" id="horaI"  required value="<?= $actividad[0]->horaI;?>">
            <label for="horaF" class="form-label">Hora Finalizacion</label>
            <input type="time" name="horaF" class="form-control" id="horaF"   required value="<?= $actividad[0]->horaF;?>">    
            <label for="tipoEn" class="form-label">Tipo De entrenamiento : </label>
            <input type="text" name="tipoAct" class="form-control" id="tipoAct" placeholder="Tipo de actividad"  required value="<?= $actividad[0]->tipoAct;?>">
            <label for="descripcion" class="form-label">Descripción</label>
            <input type="descripcion" class="form-control" name="descripcion" id="descripcion" placeholder="Escribe una descripción para la actividad" required value="<?=$actividad[0]->descripcion;?>">
            <label for="dificultad" class="form-label">Dificultad de la actividad</label>
            <select name="dificultad" id="dificultad" class="form-control">
                <option value="principiante" <?=$actividad[0]->dificultad =='principiante' ? "selected" : '';?>>Principiante</option>
                <option value="intermedio" <?=$actividad[0]->dificultad == 'intermedio' ? 'selected' : '';?>>Intermedio</option>
                <option value="avanzado"<?= $actividad[0]->dificultad=='avanzado' ? 'selected' : '';?>>Avanzado</option>
            </select>
            <label for="objetivo" class="fomr-label">Objetivo del entrenamiento</label>
            <select name="objetivo" id="objetivo" class="form-control" required>
                <option value="fuerza" <?=$actividad[0]->objetivo=='fuerza' ? 'selected' : '';?>>Fuerza</option>
                <option value="hipertrofia" <?=$actividad[0]->objetivo=='hipertrofia' ? 'selected' : '';?>>Hipertofía</option>
                <option value="resistencia" <?=$actividad[0]->objetivo=='resistencia' ? 'selected' : '';?>>Resistencia</option>
                <option value="perdidaPeso" <?=$actividad[0]->objetivo=='perdidaPeso' ? "selected" : '';?>>Perdida De peso</option>
            </select>
            <label for="capacidad" class="form-label">Cantidad de participantes : </label>
            <input type="text" name="capacidad" class="form-control" id="capacidad" placeholder="Escribe el numero de total de participantes"  required value="<?=$actividad[0]->capacidad; ?>">
            <label for="idEntrenador" class="form-label">Elige el nombre del Entredador</label>
            <select id="idEntrenador" name="idEntrenador" class="form-control">
            <?php foreach($entrenador as $key):?>
            <option requided value="<?=$key->idEntrenador;?>"<?= ($key->idEntrenador  == $actividad[0]->idEntrenador) ? 'selected' : ''; ?>><?=$key->nombre?> </option>
            <?php endforeach?>
             </select>
            <input type="submit" class="btn btn-primary margen" value="Actualizar">   
            </form>
        </div>
    </div>
</div>