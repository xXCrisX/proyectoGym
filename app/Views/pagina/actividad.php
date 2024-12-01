<div class="container">

        <div class="row style-r text-start ">
            <h1 class="text-center">Actividades</h1>
            <?php foreach($actividades as $key):?>
            <div class="col-4">
             <div class="card text-bg-dark mb-3  text-center">
             <a href="<?=base_url($key->foto);?>"> <img src="<?=$key->foto;?>" class="img-fluid rounded-start" alt=""  ></a>
              <div class="card-body text-start">      
              <h3 class="card-title"><?="Nombre de actividad: ". $key->nombre?></h3>
                 <h5 class="card-title"><?="Tipo de actividad: ".$key->tipoAct?></h5>
                 <h6 class="card-title"><?="Objetivo:".$key->objetivo?></h6>
                 <h7 class="card-title"><?="Nivel de dificultad: ".$key->dificultad?></h7>
                 <p class="card-text"><?="Fecha de actividad: ".$key->fecha?></p>
                 <p class="card-title"><?="Descripcion: ".$key->descripcion?></p>
                 <p class="card-title"><?="Total de cupos: ".$key->capacidad?></p>
                 <p class="card-title"><?="Hora de inicio: ".$key->horaI?></p>
                 <p class="card-title"><?="Hora de Finalización: ".$key->horaF?></p>
                 <a href="<?=base_url('/actividad/insertar/').$key->idActividad?>" class="btn btn-primary">Apartar</a>
              </div>
             </div>
            </div>
            <?php endforeach?>
          </div> 

</div>