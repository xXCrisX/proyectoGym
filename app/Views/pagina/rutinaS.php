<div class="container">
  <div class="row ">
    <div class="col">
      <h1 >Mis Rutinas</h1>
    <div id="carouselExampleIndicators" class="carousel slide carousel-fade" >
          
            <div class="carousel-indicators carousel-custom">
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <?php foreach($rutinasSocio as $index => $key):?>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?=$index+1;?>" aria-label="Slide <?=$index+1;?>"></button>
              <?php endforeach?>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="<?=base_url($rutinasSocio[0]->foto);?>" class="d-block w-100" alt="..." style="width: 100px; height: 400px; border-radius: 7%;" >
              </div>
                            
              <?php foreach($rutinasSocio as $key):?>
              <div class="carousel-item">
                <h2><?=$key->tipoRutina; echo "-".$key->dia?></h2>
                 <a href="<?=base_url('rutina/').$key->idRutina?>"> <img src="<?=base_url($key->foto);?>" class="d-block w-100" alt="..." style="width: 100px; height: 400px; border-radius: 7%;"></a>
              </div>
              <?php endforeach?>
              
            </div>
          
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>  

          </div>
          <div class="row style-r text-start ">
            <h3 class="text-center">Todas las rutinas</h3>
          <?php foreach($rutina as $key):?>
            <div class="col-4">
             <div class="card text-bg-dark mb-3  text-center">
             <a href="<?=base_url('rutina/').$key->idRutina?>"> <img src="<?=$key->foto;?>" class="img-fluid rounded-start" alt="" ></a>
              <div class="card-body text-start">      
                <h4 class=""><?=$key->tipoRutina?></h4>
                <p><?=$key->descripcion?></p>
                <a href="<?=base_url('rutina/').$key->idRutina?>" class="btn btn-primary margen">Ver</a>
              </div>
             </div>
            </div>
            <?php endforeach?>
          </div> 
  </div>
</div>