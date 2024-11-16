<nav class="navbar navbar-expand-lg bg-body-tertiary d-flex" >
  <div class="container-fluid">
    <a class="navbar-brand" href="<?=base_url('/inicio')?>">Gym</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?= base_url('/inicio')?>">Inicio</a>
        </li>
        <?php $session=session();
            if($session->get('tipo')==0): ?>
        <li class="nav-item">
          <a class="nav-link " href="<?=base_url('/usuario') ?>">Usuarios</a>
        </li>
       
        <li>
          <a class="nav-link" href="<?= base_url('/pago')?>">Pagos</a>
        </li>
        <li>
          <a class="nav-link" href="<?= base_url('/actividad')?>">Actividades</a>
        </li>
        <li>
          <a class="nav-link" href="<?= base_url('/equipos')?>">Equipos</a>
        </li>
        <?php endif?>
        <?php $session=session();
        if($session->get('tipo')==1):?>
        <li>
          <a class="nav-link" href="<?= base_url('/rutinas')?>">Rutinas</a>
        </li>
        <li>
          <a class="nav-link" href="<?= base_url('/dietas')?>">Dietas</a>
        </li>
        <li>
          <a class="nav-link" href="<?= base_url('/asistencias')?>">Asistencias</a>
        </li>
        <li>
          <a class="nav-link" href="<?=base_url('/ejercicios')?>">Ejercicios</a>
        </li>
        <?php endif?>
        </ul>
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item" >
          <a class="btn btn-danger " href="<?= base_url('salir')?>" >Salir</a>
        </li>
        <li class="nav-item">
           <a class="nav-link disabled " aria-disabled="true" href=""><?= $nombre ?></a>
        </li>
        </ul>
    </div>
  </div>
</nav>
