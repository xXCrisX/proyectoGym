<div class="container">
    <div class="row">
        <div class="col">
            <h1>Dietas</h1>
            <a href="<?= base_url('dietas/agregar/');?>" class="btn btn-success">Agregar</a>
        </div>
    </div>

<div class="row justify-content-center">
    <div class="col-auto table-responsive-sm" >
        <table class='table table-dark'>
            <thead>
                <th>Id dieta</th>
                <th>Descripcion</th> 
                <th>tiempo de Comida</th>      
                <th>opcion</th>
                <th></th>
            </thead>
            <tbody>
                    <?php foreach($dieta AS $dietas):?>    
                    <tr>
                       
                        <td><?= $dietas->idDieta?></td>
                        <td><?= $dietas->descripcion?></td>
                        <td><?=$dietas->tiempoComida?></td>
                        <td><?=$dietas->opcion?></td>
                        <td><a href="<?= base_url('dietas/editar/'.$dietas->idDieta);?>" class="btn btn-primary">Editar</a>
                        <a href="<?= base_url('dietas/eliminar/'.$dietas->idDieta);?>"class="btn btn-danger">Eliminar</a></td>
                    </tr>
                    <?php endforeach ?>
             </tbody>
        </table>
    </div>
</div>
</div>