<div class="container">
    <div class="row">
        <div class="col">
            <?php foreach($pagos as $key):?>
            <h1>Hola <?=$key->nombre?> ¿como estas?</h1>
            <h2>Tú pago se vence el <?=$key->diaN?> <?=$key->dia?> de <?=$key->mes?> del <?=$key->anio?>.</h2>
            <h2> Te restan <?=$x=($key->dia-date('d'))?> Días, recuerda realizar tu pago para seguir disfrutando de nuestros servicios :)</h2>
            <?php endforeach ?>
        </div>
    </div>
    <div class="row text-center">
        <div class="col">
        <?php if($key->sexo=='F'):?>
                <img src="<?=base_url('logos/c.webp')?>" alt="" class="text-center" style="height: 400px; width: 400px; border-radius: 9px;">
        <?php endif?>
        <?php if($key->sexo=='M'):?>
                <img src="<?=base_url('logos/h.webp')?>" alt="" class="text-center" style="height: 400px; width: 400px; border-radius: 9px;">
        <?php endif?>
        </div>
    </div>
</div>