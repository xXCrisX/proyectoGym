<div class="container">
    <div class="row justify-content-center">
        <div class="col-auto">
            <h2>Editar Equipo</h2>
           <?php //print_r ($usuario);?>    
            <form action="<?= base_url('equipos/actualizar/'); ?>" method="POST">
            <input type="hidden" name="idEquipo" value="<?= $equipo[0]->idEquipo;?>">
            <label for="marca" class="form-label">Marca</label>
            <input type="text" name="marca" class="form-control" id="marca" placeholder="marca" required value="<?=$equipo[0]->marca;?>">
            <label for="nombre" class="form-label">nombre</label>
            <input type="text" name="nombre" class="form-control" id="nombre"  placeholder="nombre" required value="<?= $equipo[0]->nombre;?>">    
            <label for="cantidad" class="form-label">Cantidad : </label>
            <input type="text" name="cantidad" class="form-control" id="cantidad" placeholder="cantidad"  required value="<?= $equipo[0]->cantidad;?>">
            <label for="fechaAdq" class="form-label">Fecha de Adquisición: </label>
            <input type="date" class="form-control" name="fechaAdq" id="fechaAdq" required value="<?=$equipo[0]->fechaAdq;?>">
            <label for="foto" class="form-label">Fotografía: </label>
            <input type="file" name="foto" class="form-control" id="foto" required value="<?= $equipo[0]->foto;?>">
            <label for="estado" class="form-label">Estado del Equipo</label>
            <select name="estado" id="estado" class="form-control" required >
                <option value="mantenimiento"<?=$equipo[0]->estado=="matenimiento"? "selected":"";?>>mantenimiento</option>
                <option value="sinFuncion"<?=$equipo[0]->estado=="sinFuncion"?"selected":"";?>>Sin Funcion</option>
                <option value="operativo"<?=$equipo[0]->estado=="operativo"?"selected":""?>>Opreativo</option>
            </select> 
            
            <input type="submit" class="btn btn-primary margen" value="Actualizar">   
            </form> 
        </div>
    </div>
</div>