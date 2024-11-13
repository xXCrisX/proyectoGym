<div class="container">
    <div class="row justify-content-center">
        <div class="col-auto">
            <h2>Editar Equipo</h2>
           <?php //print_r ($usuario);?>    
            <form action="<?= base_url('equipos/actualizar/'); ?>" method="POST">
            <div class=""> 
            <input type="hidden" name="idEquipo" value="<?= $equipo[0]->idEquipo;?>">
            <label for="marca" class="form-label">Marca</label>
            <input type="text" name="marca" class="form-control" id="marca" placeholder="marca" required value="<?=$equipo[0]->marca;?>">
            <label for="nombre" class="form-label">nombre</label>
            <input type="text" name="nombre" class="form-control" id="nombre"  placeholder="nombre" required value="<?= $equipo[0]->nombre;?>">    
            <label for="cantidad" class="form-label">Cantidad : </label>
            <input type="text" name="cantidad" class="form-control" id="cantidad" placeholder="cantidad"  required value="<?= $equipo[0]->cantidad;?>">
            <div>
            <label for="fechaAdq">Fecha de Adquisición: </label>
            <input type="date" name="fechaAdq" id="fechaAdq" required value="<?=$equipo[0]->fechaAdq;?>">
            </div>
            <label for="fotografia" class="form-label">Fotografía: </label>
            <input type="text" name="fotografia" class="form-control" id="fotografia" placeholder="fotografia"  required value="<?= $equipo[0]->fotografia;?>">
            </div>
            <input type="submit" class="btn btn-primary" value="Actualizar">   
            </form>
         
        </div>
    </div>
</div>