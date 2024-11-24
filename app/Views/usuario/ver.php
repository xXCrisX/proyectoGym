<div class="container margenContainer" id="app">
    <div class="row justify-content-start">
        <div class="col-auto">
            <h1>Usuarios</h1>
        </div>
    </div>
    <div class="row text-center">
        <div class="col">
            <h2>Selecciona el tipo de usuario</h2>
            <button class="btn btn-dark margen" @click="showSoc">Socio</button>
            <button class="btn btn-dark margen" @click="showEntr">Entrenador</button>
            <button class="btn btn-dark margen" @click="showAdm">Administrador</button>
            <a href="<?= base_url('usuario/agregar/');?>" class="btn btn-success">Agregar</a>
        </div>
    </div>

<div class="row justify-content-center text-center" v-if="sAdm">
    <div class="col-10 table-responsive-sm">
        <h3>Administradores</h3>
        <table class='table' style="margin-bottom: 100px;">
            <thead class="table-active">
                <th >Id usuario</th>
                <th>Nombre(s)</th> 
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>      
                <th></th>
                <th></th>
            </thead>
            <tbody>
                    <?php foreach($usuario AS $usuarios):?>    
                    <tr>
                        <td><?= $usuarios->idUsuario?></td>
                        <td><?= $usuarios->nombre?></td>
                        <td><?=$usuarios->apellidoP?></td>
                        <td><?=$usuarios->apellidoM?></td>
                        <td><a href="<?= base_url('usuario/editar/'.$usuarios->idUsuario);?>" class="btn btn-warning marButt">Editar</a></td>
                        <td><a href="<?= base_url('usuario/eliminar/'.$usuarios->idUsuario);?>"class="btn btn-danger marButt">Eliminar</a></td>
                     
                    </tr>
                    <?php endforeach ?>
             </tbody>
        </table>
    </div>
</div>
<div class="row justify-content-center text-center" v-if="sEntr">
    <div class="col-10 table-responsive-sm" style="margin-bottom: 100px;">
        <h3>Entrenadores</h3>
        <table class="table  ">
            <thead class="table-active">
                <th >Id Entrenador</th>
                <th>Foto</th>
                <th>Nombre(s)</th> 
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th></th>
                <th></th>
            </thead>
            <tbody>
                <?php foreach($entrenador as $key):?>
                <tr>
                    <td><?=$key->idEntrenador?></td>
                    <td><img src="<?=base_url($key->foto);?>" alt="" style="width: 50%;"></td>
                    <td><?=$key->nombre?></td>
                    <td><?=$key->apellidoP?></td>
                    <td><?=$key->apellidoM?></td>
                    <td><a href="<?=base_url('entrenador/editar/'.$key->idEntrenador);?>" class="btn btn-warning marButt">Editar</a></td>
                    <td><a href="<?=base_url('entrenador/eliminar/'.$key->idEntrenador);?>" class="btn btn-danger marButt">Eliminar</a></td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
<div class="row justify-content-center text-center" v-if="sSoc">
    <div class="col-10 table-responsive-sm" style="margin-bottom: 100px;">
        <h3>Socios</h3>
        <table class="table ">
            <thead class="table-active">
                <th >Id socio</th>
                <th>Foto</th>
                <th>Nombre(s)</th> 
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th></th>
                <th></th>
            </thead>
            <tbody>
                <?php foreach($socio as $key):?>
                <tr>
                    <td><?=$key->idSocio?></td>
                    <td><img src="<?=base_url($key->foto);?>" alt="" style="width: 50%;"></td>
                    <td><?=$key->nombre?></td>
                    <td><?=$key->apellidoP?></td>
                    <td><?=$key->apellidoM?></td>
                    <td><a href="<?=base_url('socio/editar/'.$key->idSocio);?>" class="btn btn-warning marButt">Editar</a></td>
                    <td><a href="<?=base_url('socio/eliminar/'.$key->idSocio);?>" class="btn btn-danger marButt">Eliminar</a></td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
</div>


