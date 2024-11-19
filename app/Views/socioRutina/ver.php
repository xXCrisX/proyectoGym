<div class="container">
    <div class="row">
        <div class="col">
            <h1>Socios y sus rutinas</h1>
            <a href="<?= base_url('socioRutina/agregar/');?>" class="btn btn-success margen">Agregar</a>
        </div>
    </div>

<div class="row justify-content-center">
    <div class="col-10 table-responsive-sm" >
        <table class='table table-striped text-center'>
            <thead>
                <th>id Rutina asiganda</th>
                <th>nombre Socio</th> 
                <th>tipo rutina</th>      
                <th>Fecha de inicio</th>
                <th>Fecha Fin</th>
                <th>Nombre de entrenador</th>   
            </thead>
            <tbody>
                    <?php foreach($socioRutina AS $socioRutinas):?>    
                    <tr>
                        <td><?= $socioRutinas->idSocioRutina?></td>
                        <td><?= $socioRutinas->socio?></td>
                        <td><?= $socioRutinas->tipoRutina?></td>
                        <td><?= $socioRutinas->fechaInicio?></td>
                        <td><?= $socioRutinas->fechaFin?></td>
                        <td><?php
                                 $session=session();
                                 if($session->get('idUsuario')==$socioRutinas->idUsuario){
                                    echo "Eres tú";
                                 }else{echo $socioRutinas->entrenador;
                                 }?></td>
                    </tr>
                    <?php endforeach ?>
             </tbody>
        </table>
    </div>
</div>
</div>