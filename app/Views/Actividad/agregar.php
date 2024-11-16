<div class="container">
        <div class="row justify-content-center">
        <div class="col-8" > 
            <h2>Agregar Actividad</h2>
            <?= validation_list_errors()?>
            <form action="<?= base_url('actividad/insertar'); ?>" method="POST">
                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">
            <label for="foto" class="form-label">foto</label>
            <input type="file" class="form-control" name="foto" id="foto" required value="<?=set_value('foto');?>">
            <label for="nombre" class="form-label">Nombre de actividad</label>
            <input type="text" name="nombre" id="nombre" placeholder="Escribe un nombre para la actividad" class="form-control" required value="<?= set_value('nombre');?>">
            <label for="fecha" class="form-label">Fecha</label>
            <input type="date" class="form-control" name="fecha" id="fecha" placeholder="Fecha de la actividad" required value="<?=set_value('fecha');?>">
            <label for="horaI" class="form-label">Hora Inicio</label>
            <input type="time" name="horaI" class="form-control" id="horaI"  required value="<?= set_value('horaI')?>">
            <label for="horaF" class="form-label">Hora Finalizacion</label>
            <input type="time" name="horaF" class="form-control" id="horaF"   required value="<?= set_value('horaF')?>">    
            <label for="tipoEn" class="form-label">Tipo De entrenamiento : </label>
            <input type="text" name="tipoAct" class="form-control" id="tipoAct" placeholder="Tipo de actividad"  required value="<?= set_value('tipoAct')?>">
            <label for="descripcion" class="form-label">Descripción</label>
            <input type="descripcion" class="form-control" name="descripcion" id="descripcion" placeholder="Escribe una descripción para la actividad" required value="<?=set_value('descripcion');?>">
            <label for="dificultad" class="form-label">Dificultad de la actividad</label>
            <select name="dificultad" id="dificultad" class="form-control">
                <option value="principiante">Principiante</option>
                <option value="intermedio">Intermedio</option>
                <option value="avanzado">Avanzado</option>
            </select>
            <label for="objetivo" class="fomr-label">Objetivo del entrenamiento</label>
            <select name="objetivo" id="objetivo" class="form-control">
                <option value="fuerza">Fuerza</option>
                <option value="hipertrofia">Hipertofía</option>
                <option value="resistencia">Resistencia</option>
                <option value="perdidaPeso">Perdida De peso</option>
            </select>
            <label for="capacidad" class="form-label">Cantidad de participantes : </label>
            <input type="text" name="capacidad" class="form-control" id="capacidad" placeholder="Escribe el numero de total de participantes"  required value="<?= set_value('capacidad')?>">
            <label for="idEntrenador" class="form-label">Elige el nombre del Entredador</label>
            <select id="idEntrenador" name="idEntrenador" class="form-control" required value="<?=set_value('idEntrenador');?>">
            <?php foreach ($entrenador as $key):?>
            <option value="<?= $key-> idEntrenador ?>"><?= $key-> nombre; print" ". $key->apellidoP ; print " (".$key->alias.")" ;?></option>
            <?php endforeach?>
             </select>
            <input type="submit" class="btn btn-success" value="Agregar">   
            </form>
        </div>
    </div>
</div>
