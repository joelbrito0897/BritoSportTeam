<?php
defined('BASEPATH') OR exit('No direct script access allowed');
plantilla::apply();
if(!isset($_SESSION['idMiembro'])){
    redirect('Sport/loginMiembro');
}
?>
        <div class="my-5"></div>
<?php
if (isset($miembros)) {
        ?> 
        <div class="container">
            <div class="d-flex flex-row-reverse">
                <a href="<?= base_url('Sport/miembroById/').$_SESSION['idMiembro']?>" class="btn btn-info">Ver y editar mis datos</a>
            </div>
            <h2 class="text-center">Listado de Miembros</h2>
            <div class="my-3"></div>
        <?php
    foreach($miembros as $art):
        ?>
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
                </div>
                </div>
                <div class="my-3"></div>
            
        <?php
    endforeach;
    ?></div>
     <div class="d-flex justify-content-center">
            <?= $paginacion?>
        </div>
    <?php
    
} else {
    # code...
}

?>  