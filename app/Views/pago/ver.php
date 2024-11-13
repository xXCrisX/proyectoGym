<div class="container">
    <div class="row">
        <div class="col">
            <h1>Pagos</h1>
            <a href="<?= base_url('pago/agregar/');?>" class="btn btn-success">Agregar</a>
        </div>
    </div>

<div class="row justify-content-center">
    <div class="col-auto table-responsive-sm" >
        <table class='table table-dark'>
            <thead>
                <th>Id Pago</th>
                <th>Monto</th> 
                <th>Fecha de Pago</th>      
                <th>id Socio</th>
            </thead>
            <tbody>
                    <?php foreach($pago AS $pagos):?>    
                    <tr>
                       
                        <td><?= $pagos->idPago?></td>
                        <td><?= $pagos->monto?></td>
                        <td><?=$pagos->fechaPago?></td>
                        <td><?=$pagos->idSocio?></td>
                     
                    </tr>
                    <?php endforeach ?>
             </tbody>
        </table>
    </div>
</div>
</div>

