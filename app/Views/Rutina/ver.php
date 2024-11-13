<div class="container">
    <div class="row">
        <div class="col">
            <h1>Rutinas</h1>
            <a href="<?= base_url('rutinas/agregar/');?>" class="btn btn-success">Agregar</a>
        </div>
    </div>

<div class="row justify-content-center">
    <div class="col-auto table-responsive-sm" >
        <table class='table table-dark'>
            <thead>
                <th>Id Rutina</th>
                <th>Tipo de Rutina</th> 
                <th>Descripcion</th>      
                <th>Recomendaciones</th>
                <th></th>
            </thead>
            <tbody>
                    <?php foreach($rutina AS $rutinas):?>    
                    <tr>
                       
                        <td><?= $rutinas->idRutina?></td>
                        <td><?= $rutinas->tipoRutina?></td>
                        <td><?=$rutinas->descripcion?></td>
                        <td><?=$rutinas->recomendacion?></td>
                        <td><a href="<?= base_url('rutinas/editar/'.$rutinas->idRutina);?>" class="btn btn-primary">Editar</a>
                        <a href="<?= base_url('rutinas/eliminar/'.$rutinas->idRutina);?>"class="btn btn-danger">Eliminar</a></td>
                     
                    </tr>
                    <?php endforeach ?>
             </tbody>
        </table>
    </div>
</div>
</div>