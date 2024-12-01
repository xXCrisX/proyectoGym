<div class="container">
    <div class="row">
        <div class="col">
        <?php if(isset($validarS)):?>
                <h1>Ya esta confirmada tu asistencia :)</h1>
                <?php else:?>
                    <h1>Gracias por confirmar tu asistencia, recuerda asistir :)</h1>
            <?php endif?>
            <?php if(isset($validarA)):?>
                    <h1>Ya no hay lugares elige otra actividad :)</h1>
            <?php endif?>
           
        </div>
    </div>
</div>