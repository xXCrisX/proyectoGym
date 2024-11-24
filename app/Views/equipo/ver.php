<div class="container">
    <div class="row">
        <div class="col">
            <h1>Equipo</h1>
            <a href="<?= base_url('equipos/agregar/');?>" class="btn btn-success margen">Agregar</a>
        </div>
    </div>

<div class="row justify-content-center">
    <div class="col-10 table-responsive-sm">
        <table class='table  text-center' style="margin-bottom: 100px;">
            <thead class="table-active">
                <th>Id Equipo</th>
                <th>marca</th> 
                <th>Cantidad</th>      
                <th>Nombre</th>
                <th>Estado del equipo</th>
                <th></th>
                <th></th>
            </thead>
            <tbody>
                    <?php foreach($equipo AS $equipos):?>    
                    <tr>
                        <td><?= $equipos->idEquipo?></td>
                        <td><?= $equipos->marca?></td>
                        <td><?=$equipos->cantidad?></td>
                        <td><?=$equipos->nombre?></td>
                        <td><?=$equipos->estado?></td>
                        <td><a href="<?= base_url('equipos/editar/'.$equipos->idEquipo);?>" class="btn btn-primary">Editar</a></td>
                        <td><a href="<?= base_url('equipos/eliminar/'.$equipos->idEquipo);?>"class="btn btn-danger">Eliminar</a></td>
                    </tr>
                    <?php endforeach ?>
             </tbody>
        </table>
    </div>
</div>
</div>