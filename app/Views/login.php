<div class="container">
    <div class="row justify-content-center">
        <div class="col-auto">
            <h1>Inicio de sesión</h1>
            <form action="<?=base_url('acceder');?>" method="POST">
            <label for="alias" class="form-label" >Usuario: </label>
            <input type="text" class="form-control" name="alias" id="alias"placeholder="Usuario"  required>
            <label for="cta" class="form-label">Contraseña: </label>
            <input type="password" class="form-control" name="cta" id="cta" placeholder="Contraseña" required>
            <input type="submit" class="btn btn-success" value="Iniciar sesión">
            </form>
        </div>
    </div>
</div>