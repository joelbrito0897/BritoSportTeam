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
                <h3><?= $det['resumen']?></h3>
                <p><?= $det['descripcion']?></p>
            </div>
        </div>
    </div>
    <div class="my-5"></div>
</div>
<?php

if (isset($comentarios)) {
    ?>
<h1 class="text-center">Comentarios</h1>
          <div class="container">
        <table class="table">
            <thead>
                <th>Comentario</th>
                <th>Publicado por:</th>
            </thead>
            <tbody>
    <?php
    foreach($comentarios as $co){
        if($co['idNoticia']==$det['id']){
            ?>
           
            <?php
                
                $CI =& get_instance();
                $CI->db->where('id',$co['idMiembro']);
                $query=$CI->db->get('miembros')->row_array();
                
                ?>
                <tr>
                    <td><?=$co['comentario']?></td>
                    <td><?=$query['nombre']?></td>
                </tr>
                <?php
            ?>
           
            <?php
        }
    }
    ?>
    </tbody>
        
        </table>
        </div>
    <?php

}


endforeach;
}