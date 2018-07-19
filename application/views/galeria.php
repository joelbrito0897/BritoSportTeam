<?php
defined('BASEPATH') OR exit('No direct script access allowed');
plantilla::apply();

if(isset($galeria)){
    ?>
    <div class="container">
      <div id="galeria"> 
        <div id="galeria_base">
          <div class="text-center">
            <h2>Galeria de Imagenes</h2>
            <img class="image-resposive" src="<?=base_url()?>useFile/img/img.png" id="imgMostrar">
            <hr>
          </div>
        </div>
        <div class="galeria_miniatura">

        
    <?php
    foreach($galeria as $galery):
        ?>  
           <img onclick="document.getElementById('imgMostrar').src='<?=base_url()?>img/<?= $galery['foto']?>';" src="<?=base_url()?>img/<?= $galery['foto']?>" alt="" class="miniatura text-center">
        <?php
    endforeach;
}
?>  
<div class="my-5">  </div>
</div>
      </div>
    </div>