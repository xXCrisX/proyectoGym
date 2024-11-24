<div class="container align-items-center" style="margin-top:140px;">
    <div class="row justify-content-center" >
        <div class="col-5" style=" border-radius: 8px; ">
            <h1 class="text-center" >Inicio de sesión</h1>
            <form action="<?=base_url('acceder');?>" method="POST">
            <label for="alias" class="form-label" >Usuario: </label>
            <input type="text" class="form-control" name="alias" id="alias"placeholder="Usuario"  required>
            <label for="cta" class="form-label" >Contraseña: </label>
            <input type="password" class="form-control" name="cta" id="cta" placeholder="Contraseña" required>
            <div class="text-center">
            <input type="submit" class="btn btn-success margen" value="Iniciar sesión">
            </div>
            </form>
        </div>
    </div>
</div>  