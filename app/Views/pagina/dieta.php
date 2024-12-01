<div class="container">
          <div class="row mb-4">
          <h1 class="text-center">Mis dietas</h1>
          <?php foreach($dietas as $key):?>
            <div class="col-6 ">
            <div class="card mb-3 text-bg-dark" style="max-width: 540px;">
            <div class="row g-0">
             <div class="col-md-4 text-start ">
               <img src="<?=base_url($key->foto)?>" class="img-fluid rounded-start" alt="...">
               <a href="<?=base_url('dieta/').$key->idDieta;?>" class="btn btn-primary" style="margin-top: 5px; margin-left: 5px;">ver</a>
             </div>
             <div class="col-md-8">
               <div class="card-body">
                 <h3 class="card-title"><?="tiempo De comida: ".$key->tiempoDeComida?></h3>
                 <p class="card-text"><small ><?="Objetivo de la dieta: ".$key->objetivo?></small> </p>
               </div>
             </div>
           </div>
         </div>
        </div>
        <?php endforeach?>
     </div>
</div>
       

