<div class="container">
    <div class="row">
        <div class="col">
            <h1>Equipos</h1>
            <a href="<?= base_url('equipos/agregar/');?>" class="btn btn-success">Agregar</a>
        </div>
    </div>

<div class="row justify-content-center">
    <div class="col-auto table-responsive-sm" >
        <table class='table table-dark'>
            <thead>
                <th>Id Equipo</th>
                <th>marca</th> 
                <th>Cantidad</th>      
                <th>Nombre</th>
                <th></th>
            </thead>
            <tbody>
                    <?php foreach($equipo AS $equipos):?>    
                    <tr>
                       
                        <td><?= $equipos->idEquipo?></td>
                        <td><?= $equipos->marca?></td>
                        <td><?=$equipos->cantidad?></td>
                        <td><?=$equipos->nombre?></td>
                        <td><a href="<?= base_url('equipos/editar/'.$equipos->idEquipo);?>" class="btn btn-primary">Editar</a>
                        <a href="<?= base_url('equipos/eliminar/'.$equipos->idEquipo);?>"class="btn btn-danger">Eliminar</a></td>
                     
                    </tr>
                    <?php endforeach ?>
             </tbody>
        </table>
    </div>
</div>
</div>