<div class="container">
    <div class="row justify-content-center">
        <div class="col-6">
            <h1>Agregar Ejercicios</h1>
            <form action="<?=base_url('ejercicios/insertar')?>" method="POST">
                <label for="nombre" class="form-label">Nombre de ejercicio</label>
                <input type="text" class="form-control" name="nombre" id="nombre"  required value="<?=set_value('nombre');?>" placeholder="Escribe el nombre del ejercicio">
                <label for="descripcion" class="form-label">Descripcion</label>
                <textarea type="text" name="descripcion" id="descripcion" class="form-control" required value="<?=set_value('descripcion')?>" placeholder="Escibre una descripíon para elejercicio" rows="5"></textarea>
                <label for="grupoMuscular" class="form-label">Grupo muscular a trabajar</label>
                <input type="text" name="grupoMuscular" class="form-control" id="grupoMuscular" required value="<?=set_value('grupoMuscular');?>" placeholder="Escribe el musculo(s) que se trabajara">
                <label for="series" class="form-label">Series totales</label>
                <input type="text" name="series" id="series" class="form-control" required value="<?=set_value('series');?>" placeholder="Numero de series">
                <label for="repeticiones" class="form-label">repeticiones totales</label>
                <input type="text" name="repeticiones" id="repeticiones" class="form-control" required value="<?=set_value('repeticiones');?>" placeholder="Numero de repeticiones">
                <label for="descanso" class="form-label">Descanso</label>
                <input type="text" name="descanso" id="descanso" required value="<?=set_value('descanso');?>" class="form-control" placeholder="Descanso entre series">
                <div class="mb-3">
                <label for="idRutina" class="form-label">Asigne a una rutina</label>
                <select name="idRutina" id="idRutina" class="form-select" required value="<?=set_value('idRutina')?>">
                    <option value="" selected disabled>Seleciona una opción</option>
                    <?php foreach($rutina as $key):?>
                    <option value="<?=$key->idRutina?>"><?=$key->tipoRutina; print " (".$key->dia.")";?></option>
                    <?php endforeach?>
                </select>
                </div>
                <input type="submit" class="btn btn-success margen" value="Agregar">
            </form>
        </div>
    </div>
</div>