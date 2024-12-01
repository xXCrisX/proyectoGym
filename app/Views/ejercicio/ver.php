<div class="container ">
    <div class="row">
        <div class="col">
            <h1>Ejercicios</h1>
            <a href="<?=base_url('ejercicios/agregar')?>" class="btn btn-success margen">Agregar</a>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-10">
            <table class="table  text-center" style="margin-bottom: 100px;" >
                <thead class="table-active">
                    <th>id</th>
                    <th>Nonbre De ejercicio</th>
                    <th>grupo Muscular</th>
                    <th>Rutina</th>
                    <th>Equipo Asignado</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </thead>
                <tbody>
                    <?php foreach($ejercicio as $key):?>
                     
                    <tr>
                    <td> <?=$key->idEjercicio?></td>
                    <td><?=$key->nombre?></td>
                    <td><?=$key->grupoMuscular?></td>
                    <td><?=$key->tipoRutina; print " (".$key->dia.")";?></td>
                    
                    <td>
                    <?php foreach($eq as $key2):?>
                      <?php if($key2->idEjercicio==$key->idEjercicio):?>
                     <li> <?= $key2->nombre."<br>"?></li>
                      <?php endif?>
                      <?php endforeach?>
                    </td>
                    
                    <td><a href="<?=base_url('ejercicios/editar/'.$key->idEjercicio)?>" class="btn btn-primary">Editar</a></td>
                    <td><a href="<?=base_url('ejercicios/eliminar/'.$key->idEjercicio)?>" class="btn btn-danger">ELiminar</a></td>
                    <td><button data-id-ejercicio="<?=$key->idEjercicio;?>" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#agregarEquipo">Agregar Equipo</button></td>
                    </tr>
                    
                    <?php endforeach?>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="agregarEquipo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" >Agregar Equipo</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="<?=base_url('ejercicioEquipo/insertar/')?>" method="POST">
        <p>Elige el equipo para el ejercicio</p>
        <input type="hidden" name="idEjercicio" id="idEjercicioHidden" required value="">
      <?php foreach($equipo as $key):?>
                <div class="form-check form-check-inline">
                <input type="checkbox" class="form-check-input" name="idEquipos[]" id="idEquipos" value="<?=$key->idEquipo;?>">
                <label for="idEquipo_<?=$key->idEquipo;?>" class="form-check-label"><?=$key->nombre;?></label>
                </div>
                <?php endforeach?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-success">Agregar</button>
        </form>
      </div>
    </div>
  </div>
</div> 