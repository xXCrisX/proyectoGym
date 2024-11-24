<form action="<?=base_url('upload')?>" method="POST" enctype="multipart/form-data">
<label for="foto" class="form-label">foto</label>
<input type="file"  name="foto" id="foto"  class="form-control" accept="image/jpeg,image/png,image/jpg ">
<input type="submit" value="enviar">
</form>
<div class="col-4 logo">
<img src="<?=base_url('logos/Designer.png')?>" alt="s" class="img-fluid">
</div>
<?= 
$date='2024-11-20';
echo date('l-d', strtotime($date));?>
<button type="button" class="btn btn-outline-danger"> <i class="bi bi-folder"></i></button>
<button class="btn btn-danger"><i class="bi bi-trash"></i></button>

