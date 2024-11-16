<div class="row justify-content-center">
        <div class="col-6">
            <h2>Agregar Rutina</h2>
            <?= validation_list_errors()?>
            <form action="<?= base_url('rutinas/insertar'); ?>" method="POST">
                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">            
            <label for="tipoRutina" class="form-label">Tipo de Rutina</label>
            <input type="text" name="tipoRutina" class="form-control" id="tipoRutina" placeholder="Tipo de rutina" required value="<?= set_value('tipoRutina')?>">
            <label for="dia" class="form-label">Dia de la rutina</label>
            <select name="dia" id="dia" class="form-select" required value="<?=set_value('dia');?>">
                <option value="" selected disabled>Seleccióne un día</option>
                <option value="Lunes">Lunes</option>
                <option value="Martes">Martes</option>
                <option value="Miércoles">Miércoles</option>
                <option value="Jueves">Jueves</option>
                <option value="Viernes">Viernes</option>
                <option value="Sábado">Sábado</option>
                <option value="Domingo">Domingo</option>
            </select>
            <label for="descripcion" class="form-label">Descripcion</label>
            <input type="text" name="descripcion" class="form-control" id="descripcion"  placeholder="Explica la rutina" required value="<?= set_value('descripcion')?>">    
            <label for="recomendacion" class="form-label">Recomendaciones : </label>
            <input type="text" name="recomendacion" class="form-control" id="recomendacion" placeholder="recomendaciones"  required value="<?= set_value('recomendacion')?>">
            <label for="nivelDificultad" class="form-label">Nivel de dificultad</label>
            <select name="nivelDificultad" id="nivelDificultad" class="form-select" required value="<?=set_value('nivelDificultad');?>">
                <option value="" selected disabled> Selecciona una opción</option>
                <option value="principiante">Principiante</option>
                <option value="intermedio">Intermedio</option>
                <option value="avanzado">Avanzado</option>
            </select>
            <label for="objetivo" class="form-label">Objetivo</label>
            <select name="objetivo" id="objetivo" class="form-select" required value="<?=set_value('objetivo');?>">
                <option value=""selected disabled>Seleccione una opción</option>
                <option value="fuerza">Fuerza</option>
                <option value="hipertrofia">Hipertrofia</option>
                <option value="resistencia">Resistencia</option>
                <option value="perdidaPeso">Perdida de Peso</option>
            </select>
            <label for="duracionSemanas" class="form-label">Duración de semanas de esta rutina</label>
            <input type="text" class="form-control" name="duracionSemanas" id="duracionSemanas" placeholder="Escribe el número de semanas que durara la rutina" required value="<?=set_value('duracionSemanas');?>">
            <label for="foto" class="form-label">Foto</label>
            <input type="file" class="form-control" name="foto" id="foto"  required value="<?=set_value('foto');?>">
            <input type="submit" class="btn btn-success margen" value="Agregar">   
            </form>
        </div>
    </div>
</div>
