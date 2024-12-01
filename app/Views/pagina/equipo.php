<div class="container style-e">
    <div class="row  text-end">
    <h1 class="text-center">Equipo Disponible</h1>
        <?php foreach($equipo as $key):?>
        <div class="col-6 ">
        <div class="card mb-3 text-bg-dark" style="max-width: 540px;">
           <div class="row g-0">
             <div class="col-md-4">
               <img src="<?=base_url($key->foto)?>" class="img-fluid rounded-start" alt="...">
             </div>
             <div class="col-md-8">
               <div class="card-body">
                 <h3 class="card-title"><?="Nombre: ".$key->nombre?></h3>
                 <h4 class=""><?="Marca: ".$key->marca?></h4>
                 <p class="card-text"><small ><?="Estado: ".$key->estado?></small></p>
               </div>
             </div>
           </div>
         </div>
        </div>
        <?php endforeach?>

    </div>
</div>