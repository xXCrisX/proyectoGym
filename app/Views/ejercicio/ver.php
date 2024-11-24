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
                    <td><?= $key->nombreEquipo?></td>
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