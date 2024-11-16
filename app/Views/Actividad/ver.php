<div class="container">
    <div class="row">
        <div class="col">
            <h1>actividades</h1>
            <a href="<?= base_url('actividad/agregar/');?>" class="btn btn-success margen">Agregar</a>
        </div>
    </div>
    <?php //print_r($actividad);?>
<div class="row justify-content-center">
    <div class="col-auto table-responsive-sm" >
        <table class='table table-dark text-center'>
            <thead>
                <th>Id actividad</th>
                <th>Entrenador</th> 
                <th>Fecha</th>   
                <th>Cantidad de participantes disponibles</th>
                <th>Nombre de Actividad</th>   
                <th></th>
            </thead>
            <tbody>
                   
                    <?php foreach($actividad AS $actividades):?>    
                    <tr>
                       
                        <td><?= $actividades->idActividad?></td>
                        <td><?=$actividades->nombre;?></td>
                        <td><?=$actividades->fecha;?></td>
                        <td><?=$actividades->capacidad;?></td>
                        <td><?=$actividades->nombreAct?></td>
                       
                        <td><a href="<?= base_url('actividad/editar/'.$actividades->idActividad);?>" class="btn btn-primary">Editar</a>
                        <a href="<?= base_url('actividad/eliminar/'.$actividades->idActividad);?>"class="btn btn-danger">Eliminar</a></td>
                     
                    </tr>
                    <?php endforeach?>
                  
             </tbody>
        </table>
    </div>
</div>
</div>