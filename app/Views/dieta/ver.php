<div class="container">
    <div class="row">
        <div class="col">
            <h1>Dietas</h1>
            <a href="<?= base_url('dietas/agregar/');?>" class="btn btn-success margen">Agregar</a>
        </div>
    </div>

<div class="row justify-content-center">
    <div class="col-10 table-responsive-sm" >
        <table class='table  text-center' style="margin-bottom: 100px;" >
            <thead class="table-active" >
                <th>Id dieta</th>
                <th>Tempo de Comida</th>
                <th>Objetivo</th> 
                <th>calorias</th>
                <th></th>
                <th></th>
            </thead>
            <tbody>
                    <?php foreach($dieta AS $dietas):?>    
                    <tr>
                        <td><?= $dietas->idDieta?></td>
                        <td><?=$dietas->tiempoDeComida;?></td>
                        <td><?= $dietas->objetivo?></td>
                        <td><?=$dietas->calorias?></td>
                        <td><a href="<?= base_url('dietas/editar/'.$dietas->idDieta);?>" class="btn btn-primary">Editar</a></td>
                        <td><a href="<?= base_url('dietas/eliminar/'.$dietas->idDieta);?>"class="btn btn-danger">Eliminar</a></td>
                    </tr>
                    <?php endforeach ?>
             </tbody>
        </table>
    </div>
</div>
</div>