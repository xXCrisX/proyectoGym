<div class="container " style=" ">
    <div class="row justify-content-end">
        <div class="col-6">
            <form action="<?=base_url('accederSocio')?>" method="POST">
                <label for="alias" class="form-label">Nombre de usuario</label>
                <input type="text" class="form-control" name="alias" id="alias" required>
                <label for="cta" class="form-label">Contraseña</label>
                <input type="password" class="form-control" name="cta" id="ctas" required>
                <div class="text-center margen">
                <button type="submit" class="btn btn-danger">Iniciar sesión</button>
                </div>
            </form>
        </div>
    </div>
</div>