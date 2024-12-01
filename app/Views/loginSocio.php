   <div class="row align-items-center" >
    <div class="col-6 ">
           <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
             <div class="carousel-inner">
               <div class="carousel-item active">
                  <img src=" <?=base_url('/logos/img_c.jpg')?>" class="d-block w-100" alt="..." style="width:max-content; height: max-content;">
                </div>
               <div class="carousel-item">
                  <img src="<?=base_url('/logos/img_c1.webp')?>" class="d-block w-100" alt="..." style="width:max-content; height: max-content;">
                </div>
               <div class="carousel-item">
                 <img src="<?=base_url('/logos/img_c2.jpg')?>"  class="d-block w-100" alt="..." style="width:max-content; height: max-content;">
               </div>
             </div>
            </div>
        </div>
        <div class="col-6">
          <div class="row justify-content-center">
          <div class="col-6">
             <h1 style="color: whitesmoke;">Inicio de Sesión</h1>
            <form action="<?=base_url('accederSocio')?>" method="POST">
                <label for="alias" class="form-label"></label>
                <input type="text" class="form-control" name="alias" id="alias" required placeholder="Nombre de usuario">
                <label for="cta" class="form-label"></label>
                <input type="password" class="form-control" name="cta" id="ctas" required placeholder="Contraseña">
                <div class="text-center margen">
                <button type="submit" class="btn btn-danger margen">Iniciar Sesión</button>
            </form>
            </div>
            </div>
        </div>
    </div>
