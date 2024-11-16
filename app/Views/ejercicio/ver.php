<div class="container ">
    <div class="row">
        <div class="col">
            <h1>Ejercicios</h1>
            <a href="<?=base_url('ejercicios/agregar')?>" class="btn btn-success margen">Agregar</a>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-8">
            <table class="table table-striped text-center" style="margin-bottom: 97px;" border="1">
                <thead>
                    <th>id</th>
                    <th>Nonbre De ejercicio</th>
                    <th>grupo Muscular</th>
                    <th>Rutina</th>
                    <th>Equipo</th>
                    <th></th>
                    <th></th>
                </thead>
                <tbody>
                    <?php foreach($ejercicio as $key):?>
                    <tr>
                    <td> <?=$key->idEjercicio?></td>
                    <td><?=$key->nombre?></td>
                    <td><?=$key->grupoMuscular?></td>
                    <td><?=$key->tipoRutina?></td>
                    <td><?=$key->Nombre_Equipo?></td>
                    <td><a href="<?=base_url('ejercicios/editar/'.$key->idEjercicio)?>" class="btn btn-outline-warning">Editar</a></td>
                    <td><a href="<?=base_url('ejercicios/eliminar/'.$key->idEjercicio)?>" class="btn btn-outline-danger">ELiminar</a></td>
                    </tr>
                    <?php endforeach?>
                </tbody>
            </table>
        </div>
    </div>
</div>