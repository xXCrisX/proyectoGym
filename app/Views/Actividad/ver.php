<div class="container">
    <div class="row">
        <div class="col">
            <h1>actividades</h1>
            <a href="<?= base_url('actividad/agregar/');?>" class="btn btn-success">Agregar</a>
        </div>
    </div>

<div class="row justify-content-center">
    <div class="col-auto table-responsive-sm" >
        <table class='table table-dark'>
            <thead>
                <th>Id actividad</th>
                <th>Entrenador</th> 
                <th>Tipo de entrenamiento</th>      
                <th>Capacidad</th>
                <th></th>
            </thead>
            <tbody>
                    <?php foreach($actividad AS $actividades):?>    
                    <tr>
                       
                        <td><?= $actividades->idactividad?></td>
                        <td><?= $actividadss->idEtrenador?></td>
                        <td><?=$actividades->tipoAct?></td>
                        <td><?=$actividades->capacidad?></td>
                        <td><a href="<?= base_url('actividad/editar/'.$actividades->idActividad);?>" class="btn btn-primary">Editar</a>
                        <a href="<?= base_url('actividad/eliminar/'.$actividades->idActividad);?>"class="btn btn-danger">Eliminar</a></td>
                     
                    </tr>
                    <?php endforeach ?>
             </tbody>
        </table>
    </div>
</div>
</div>