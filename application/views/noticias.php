<?php
defined('BASEPATH') OR exit('No direct script access allowed');
plantilla::apply();
?>  
<!-- STYLE -->
<style>
  section.conten{
    width: 100%;
  }
  div.noticias{
      padding: 50px;
  }
   
</style>
<!-- STYLE -->

<section class="conten">
  <div class="noticias">
    <h1>Noticias</h1>
    <?php  
        if(isset($noticias)){
            foreach($noticias as $art):
                ?>
                    <div class="card">
                    <h4 class="card-header"><?= $art['titulo']?></h4>
                    <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <img  class="card-img-top" src="<?=base_url()?>img/<?= $art['foto']?>" >
                        </div>
                        <div class="mx-2"></div>
                        <div>
                            <h5 class="card-title"><?= $art['resumen']?></h5>
                            <p class="card-text"><?= $art['descripcion']?></p>
                        </div>
                    </div>
                    <div class="my-3"></div>
                    <a href="<?= base_url('Sport/detalleNoticia/').$art['id']?>" class="btn btn-primary">Ver Mas</a>
                    </div>
                  </div>
                  <div class="my-3"></div>
                <?php
            endforeach;

        }else{
            echo"no hay";   
        }
        ?>
        <div class="d-flex justify-content-center">
            <?= $paginacion?>
        </div>
   <div class="my-5"></div>
        
        </div>
    </div>
    </div>
    
    </div>
    
  </div>

</section>