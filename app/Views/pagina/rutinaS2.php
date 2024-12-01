<div class="container style-r-ver">
  <div class="row">
    <div class="col-6">
      <img src="<?=base_url($rutina[0]->foto)?>" alt="">
    </div>
    <div class="col-6">
      <h1><?=$rutina[0]->tipoRutina?></h1>
      <h2><?="Dia de la semana: ".$rutina[0]->dia?></h2>
      <p><?="Decripcion de la rutina: ".$rutina[0]->descripcion?></p>
      <p><?="Recomendacion previa: ".$rutina[0]->recomendacion?></p>
      <p><?="Nivel De dificultad: ".$rutina[0]->nivelDificultad?></p>
      <p><?="Ojetivo de la rutina: ".$rutina[0]->objetivo?></p>
      <p><?="Duracion Promedio de la rutina en semanas: ".$rutina[0]->duracionSemanas?></p>
    </div>
  </div>
  
  <div class="row style-r">
    <h3>Ejercicios De la rutina</h3>
  <?php $i=1?>
  <?php foreach($ejercicios as $key):?>
    <div class="col-4">
      <div class="card text-bg-dark border-info mb-3 " style="width: 18rem;">
      <div class="card-header"><?=$i++."-".$key->nombre?></div>
       <div class="card-body ">  
      <p><?="Descripcion del ejercicio: ".$key->descripcion?></p>
      <p><?="¿Cual musculo se trabaja? ".$key->grupoMuscular?></p>
      <p><?="Numero total de series: ".$key->series?></p>
      <p><?="Total de repeticiones: ".$key->repeticiones?></p>
      <p><?="Dwscanso entre series: ".$key->descanso?></p>
      <p>Equipo: </p>
      <?php foreach ($equipo as $key2):?>
        <?php if($key->idEjercicio==$key2->idEjercicio):?></p>
          <p><?=$key2->nombre?></p>
        <?php endif?>
        <?php endforeach?>
       </div>
      
     </div>
     </div>
     <?php endforeach?>
  </div>
</div>
