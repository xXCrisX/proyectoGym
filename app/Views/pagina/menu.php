<nav class="navbar navbar-expand-lg nav-style logo" >
  <div class="container-fluid">
    <a class="navbar-brand" href="<?=base_url('inicio')?>"> <img src="<?=base_url('logos/file.png')?>" alt=""></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="<?=base_url('inicio')?>">Inicio</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="<?=base_url('/sociorutinas')?>">Rutinas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=base_url('/actividadSocio')?>">Actividades</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=base_url('/equipoSocio');?>">Equipos</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="<?=base_url("/dietasSocio")?>">Dietas</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="<?=base_url("/pagoSocio")?>">Pagos</a>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item text-center">
          <a class="btn btn-danger margen" href="<?=base_url('salirSocio');?>" class="btn btn-danger">salir</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href=""><img src="<?=$foto?>" alt=""></a>
        </li> 
      </ul>
    </div>
  </div>
</nav>