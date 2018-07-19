<?php
defined('BASEPATH') OR exit('No direct script access allowed');
plantilla::apply();
if(isset($detalle)){
    foreach($detalle as $det):
        ?>
        <div class="my-5"></div>
        <div class="container">
            <div>
                <h1 class="text-center mb-5"><?= $det['titulo']?></h1>
        
                <div class="d-flex justify-content-between">
                    <div class="">
                        <img style="width:500px;" class="card-img-top" src="<?=base_url()?>/img/<?= $det['foto']?>" >
                    </div>
                    <div class="mx-2"></div>
                    <div class="">
                        <p><?= $det['descripcion']?></p>
                    </div>
                </div>
            </div>
            <div class="my-5"></div>
        </div>
        
        
        <?php
        endforeach;
}