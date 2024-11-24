<div class="container">
<div class="row justify-content-center">
        <div class="col-6">
            <h2>Agregar Dietas</h2>
            <?= validation_list_errors()?>
            <form action="<?= base_url('dietas/insertar'); ?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">
            <label for="descripcion" class="form-label">Descripción:</label>
            <input type="text" name="descripcion" class="form-control" id="descripcion" placeholder="Escribe toda la información sobre la dieta"  required value="<?= set_value('descripcion')?>">
            <label for="recomendacion" class="form-label">Recomendación</label>
            <input type="text" name="recomendacion" class="form-control" id="recomendacion" placeholder="recomendacion"  required value="<?= set_value('recomendacion')?>">    
            <label for="calorias" class="form-label">Calorias totales a consumir</label>
            <input type="text" name="calorias" class="form-control" id="calorias" placeholder="Escribe las calorías totales para esta dieta por día"  required value="<?= set_value('calorias')?>">
            <label for="objetivo" class="form-label">Objetivo de esta dieta</label>
            <select name="objetivo" id="objetivo" class="form-select" required value="<?=set_value('objetivo');?>">
                <option value="" selected disabled>Selecciona una opción</option>
                <option value="Perdida de peso">Perdida de peso</option>
                <option value="Aumento de masa muscular">Aumento de masa muscular</option>
                <option value="Mantenimiento">Mantenimiento</option>
            </select>
            <label for="foto" class="form-label">Foto</label>
            <input type="file" name="foto" class="form-control" id="foto" accept="image/png,image/jpg,image/jpeg" required value="<?= set_value('foto');?>">
            <label for="duracionSemanas" class="form-label">Duración de la dieta</label>
            <input type="text" class="form-control" name="duracionSemanas" id="duracionSemanas" placeholder="Escribe las semanas que durara esta dieta" required value="<?=set_value('duracionSemanas');?>">
            <label for="tiempoDeComida" class="form-label">Tiempo de comida al día</label>
            <select name="tiempoDeComida" id="tiempoDeComida" class="form-select" required value="<?=set_value('tiempoDeComida');?>">
                <option value="" selected disabled>Elije una opción</option>
                <option value="Desayuno">Desayuno</option>
                <option value="Media mañana">Media mañana</option>
                <option value="Comida">Comida</option>
                <option value="Merienda">Merienda</option>
                <option value="Cena">Cena</option>
            </select>
            <input type="submit" class="btn btn-success margen" value="Agregar">   
            </form>
       
    </div>
</div>
</div>