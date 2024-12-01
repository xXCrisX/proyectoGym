<div class="container">
<div class="card text-bg-dark">
  <div class="card-body">
    <h1 class="card-title"><?=$dieta[0]->tiempoDeComida?></h1>
    <h2 class="card-title"><?="Objetivo de la dieta: ".$dieta[0]->objetivo?></h2>
    <p class="card-text"><?="Descripcion".$dieta[0]->descripcion?></p>
    <p class="card-text"><?="Recomendaciones".$dieta[0]->recomendacion?></p>
    <p class="card-text"> <?="Duracion de semanas aprox: ".$dieta[0]->duracionSemanas?></p>
    <p class="card-text"><?="Calorias a consumir por día: ".$dieta[0]->calorias?></p>
    <p class="card-text"><small><?="Objetivo de la dieta: ".$dieta[0]->objetivo?></small></p>
  </div>
  <img src="<?=base_url($dieta[0]->foto)?>" class="card-img-bottom" alt="...">
</div>
</div>