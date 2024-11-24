<div class="container">
    <div class="row">
        <div class="col">
            <h1>Socios y sus Dietas</h1>
            <a href="<?= base_url('socioDieta/agregar/');?>" class="btn btn-success margen">Agregar</a>
        </div>
    </div>

<div class="row justify-content-center">
    <div class="col-10 table-responsive-sm" >
        <table class='table text-center' style="margin-bottom: 100px;">
            <thead class="table-active">
                <th>id Dieta asiganda</th>
                <th>nombre Socio</th> 
                <th>tiempo De comida</th>      
                <th>Fecha de inicio</th>
                <th>Fecha Fin</th>
                <th>Nombre de entrenador</th>
            </thead>
            <tbody>
                    <?php foreach($socioDieta AS $key):?>    
                    <tr>
                        <td><?= $key->idSocioDieta?></td>
                        <td><?= $key->socio?></td>
                        <td><?= $key->tiempoDeComida?></td>
                        <td><?= $key->fechaInicio?></td>
                        <td><?= $key->fechaFin?></td>
                        <td><?php
                                 $session=session();
                                 if($session->get('idUsuario')==$key->idUsuario){
                                    echo "Eres tú";
                                 }else{echo $key->entrenador;
                                 }?></td>
                    </tr>
                    <?php endforeach ?>
             </tbody>
        </table>
    </div>
</div>
</div>