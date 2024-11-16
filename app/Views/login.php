<div class="container" style="margin-bottom: 173px ; margin-top:100px;">
    <div class="row justify-content-center">
        <div class="col-5">
            <h1 class="text-center">Inicio de sesión</h1>
            <form action="<?=base_url('acceder');?>" method="POST">
            <label for="alias" class="form-label" >Usuario: </label>
            <input type="text" class="form-control" name="alias" id="alias"placeholder="Usuario"  required>
            <label for="cta" class="form-label">Contraseña: </label>
            <input type="password" class="form-control" name="cta" id="cta" placeholder="Contraseña" required>
            <input type="submit" class="btn btn-success margen" style="margin-left: 170px; "value="Iniciar sesión">
            </form>
        </div>
    </div>
</div>