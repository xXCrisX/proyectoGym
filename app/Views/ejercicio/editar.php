<div class="container">
    <div class="row justify-content-center">
        <div class="col-6">
            <?php //print_r($ejercicio)?>
            <h1>Editar Ejercicio</h1>
            <form action="<?=base_url('ejercicios/actualizar')?>" method="POST">
                <input type="hidden" name="idEjercicio" id="idEjercicio" value="<?=$ejercicio[0]->idEjercicio?>">
                <label for="nombre" class="form-label">Nombre de ejercicio</label>
                <input type="text" class="form-control" name="nombre" id="nombre"  required value="<?=$ejercicio[0]->nombre;?>" placeholder="Escribe el nombre del ejercicio">
                <label for="descripcion" class="form-label">Descripcion</label>
                <input type="text" name="descripcion" id="descripcion" class="form-control" required value="<?=$ejercicio[0]->descripcion;?>" placeholder="Escibre una descripíon para elejercicio">
                <label for="grupoMuscular" class="form-label">Grupo muscular a trabajar</label>
                <input type="text" name="grupoMuscular" class="form-control" id="grupoMuscular" required value="<?=$ejercicio[0]->grupoMuscular;?>" placeholder="Escribe el musculo(s) que se trabajara">
                <label for="series" class="form-label">Series totales</label>
                <input type="text" name="series" id="series" class="form-control" required value="<?=$ejercicio[0]->series;?>" placeholder="Numero de series">
                <label for="repeticiones" class="form-label">repeticiones totales</label>
                <input type="text" name="repeticiones" id="repeticiones" class="form-control" required value="<?=$ejercicio[0]->repeticiones;?>" placeholder="Numero de repeticiones">
                <label for="descanso" class="form-label">Descanso</label>
                <input type="text" name="descanso" id="descanso" required value="<?=$ejercicio[0]->descanso;?>" class="form-control" placeholder="Descanso entre series">
                <label for="idRutina" class="form-label">Asigne a una rutina</label>
                <select name="idRutina" id="idRutina" class="form-select" required value="<?=$ejercicio[0]->idRutina;?>">
                    <?php foreach($rutina as $key):?>
                    <option value="<?=$key->idRutina?>" <?=$ejercicio[0]->idRutina==$key->idRutina ? "selected":'';?>><?=$key->tipoRutina; print " (".$key->dia.")";?></option>
                    <?php endforeach?>
                </select>
                <input type="submit" class="btn btn-primary margen" value="Editar">
            </form>
        </div>
    </div>
</div>