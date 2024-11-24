<div class="container">
    <div class="row">
        <div class="col">
            <h1>Asistencias</h1>
            <a href="<?= base_url('asistencias/registrar/');?>" class="btn btn-success">Registrar</a>
        </div>
    </div>

<div class="row justify-content-center">
    <div class="col-8 table-responsive-sm" >
        <table class='table'>
            <thead class="table-active" style="margin-bottom: 100px;" >
                <th>Hora de entrada</th>
                <th>Hora de salida</th> 
                <th>Nombre de socio</th>      
                <th>Fecha</th>
                <th></th>
            </thead>
            <tbody>
                    <?php foreach($asistencia AS $asistencias):?>    
                    <tr>
                        <td><?= $asistencias->horaE?></td>
                        <td><?= $asistencias->horaS?></td>
                        <td><?=$asistencias->nombre?></td>
                        <td><?=$asistencias->fecha?></td>
                        <td> <a href="<?= base_url('asistencias/editar/').$asistencias->idAsistencia?>" class="btn btn-primary">Editar</a></td>
                    </tr>
                    <?php endforeach ?>
             </tbody>
        </table>
    </div>
</div>
</div>