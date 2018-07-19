<?php
admi::apply();
if(!isset($_SESSION['user'])){
    redirect('Admin/login');
}

if(isset($miembros)){
    ?><div class="my-5"></div>
    <div class="container">
    <div class="d-flex flex-row-reverse">
                <a href="<?= base_url('Admin/exportarExcel')?>" class="btn btn-info">Exportar</a>
            </div>
    </div>
    <?php
    foreach($miembros as $art):
    ?>
    <div class="container">
            
    <div class="card">
            <h4 class="card-header"><?=$art['nombre']." ".$art['apellido']?> </h4>
            <div class="card-body">
            <div class="float-left">
                <img style="width:200px;"src="<?=base_url()?>img/<?=$art['foto']?>" alt="">
            </div>
                <h5 class="card-title"><?=$art['correo']?></h5>
                <hr>
                <p class="card-text">Telefono: <?=$art['telefono']?> | Celular: <?=$art['celular']?></p>
                <p><?=$art['direccion']?></p>
                <div class="d-flex flex-row-reverse">
                    <a class="btn btn-primary" href="<?=base_url('Admin/location/').$art['id']?>"><i class="fa fa-map-marker" aria-hidden="true"></i>  Ir a la Ubicacion</a>
                </div>
            </div>
            </div>
            <div class="my-3"></div>
    </div>   
        
    <?php
    endforeach;
    ?>
     <div class="d-flex justify-content-center">
            <?= $paginacion?>
        </div>
    <?php
}
?>
