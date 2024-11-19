<div class="container">
    <div class="row">
        <div class="col">
            <h1>Pagos</h1>
            <a href="<?= base_url('pago/agregar/');?>" class="btn btn-success margen">Agregar</a>
        </div>
    </div>

<div class="row justify-content-center">
    <div class="col-8 table-responsive-sm" >
    <?php //print_r($pago)?>
        <table class='table table-dark text-center'>
            <thead>
                <th>Id Pago</th>
                <th>Monto</th> 
                <th>Fecha Pago</th>
                <th>Fecha Fin de Pago</th>      
                <th>Nombre del socio</th>
            </thead>
            <tbody>
                    <?php foreach($pago AS $pagos):?>    
                    <tr>
                        <td><?= $pagos->idPago?></td>
                        <td><?= $pagos->monto?></td>
                        <td><?=$pagos->fechaPago;?></td>
                        <td><?=$pagos->fechaFinPago?></td>
                        <td><?=$pagos->nombre?></td>
                    </tr>
                    <?php endforeach ?>
             </tbody>
        </table>
    </div>
</div>
</div>

