<div class="container">
    <div class="row">
        <div class="col">
            <h1>Socios</h1>
            <a href="<?= base_url('/socio/agregar') ?>" class="btn btn-success">Agregar</a>
            <table>
                <thead>
                    <th>id</th>
                    <th>Nombre</th>
                    <th>Estatura </th>
                    <th>Peso</th>
                    <th></th>
                    <th></th>
                </thead>
                <tbody> 
                    <?php foreach($socios as $key): ?>
                    <tr>
                        <td>
                           <?=$key->idSocio;?>
                        </td>
                        <td>
                           <?=$key->nombre;?>
                        </td>
                        <td>
                            <?=$key->estatura; ?>
                        </td>
                        <td>
                            <?=$key->peso; ?>
                        </td>
                        <td>
                            <a href="<?= base_url('socio/editar/'.$key->idSocio) ?>" class="btn btn-primary">Editar</a>
                        </td>
                        <td>
                            <a href="<?= base_url('socio/eliminar/'.$key->idSocio) ;?>" class="btn btn-danger">Eliminar</a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>