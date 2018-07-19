<?php
defined('BASEPATH') OR exit('No direct script access allowed');
plantilla::apply();
?>  
<!-- STYLE -->
<style>
    section.conten{
        width: 100%;
    }
    div.noticia{
        padding: 50px;
        width: 70%;
        float: left;
    }
    div.aside{
        padding: 50px;
        width: 30%;
        float: right;
    }
   
</style>
<!-- STYLE -->

<section class="conten">
    <div class="noticia">
        <h1>Noticias</h1>
        <div class="my-3"></div>
        <?php  
        if(isset($noticias)){
            foreach($noticias as $art):
                ?>
                    <div class="card" style="width: 60rem;">
                        <div class="d-flex justify-content-center my-3">
                            <img style="width:800px; height:600px; text-aling:center;"  class="card-img-top" src="<?=base_url()?>/img/<?= $art['foto']?>" alt="Card image cap">
                        </div>
                    <div class="card-body">
                        <h4 class="card-title"><?= $art['titulo']?></h4>
                        <p class="card-text"><?= $art['resumen']?></p>
                        <a href="<?= base_url('Sport/detalleNoticia/').$art['id']?>" class="btn btn-primary">Ver Mas</a>
                        <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Comentar
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Comentario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?=form_open("Sport/SaveComentarios/{$art['id']}")?>
        <input type="hidden" name="id">
    <div class="form-group">
        <textarea name="comentario"  class="form-control"></textarea>
    </div>
    <div class="d-flex flex-row-reverse">
        <input type="submit" value="Comentar" class="btn btn-success">
    </div>
        </form>
      </div>
      
    </div>
  </div>
</div>
                    </div>
                    </div>
                    <div class="my-3"></div>
                <?php
            endforeach;
        }else{
            echo"no hay nada";
        }
    ?>
        
        <!-- ********************************** -->
        
    </div>
    <div class="aside">
        <aside>
            <h1>Eventos</h1>
            <div class="my-3"></div>
            <?php
           
            if (isset($eventos)) {
                foreach($eventos as $clas):

                ?>
                    <div class="card" style="width: 20rem;">
                        <div class="card-body">
                            <h4 class="card-title"><?= $clas['titulo']?></h4>
                            <p class="card-text"><?= $clas['descripcion']?></p>
                            <a href="<?=base_url('Sport/detalleEventos/')?><?=$clas['id']?>" class="btn btn-primary">Ver mas</a>
                        </div>
                        </div>

                    <div class="my-3"></div>
                <?php
                endforeach;
            } else {
                echo"No hay nada";
            }
            
            ?>
        </aside>
        <aside>
            <h1>Clasificados</h1>
            <div class="my-3"></div>
            <?php
            if (isset($clasificado)) {
                foreach($clasificado as $cla):
                ?>
                    <div class="card" style="width: 20rem;">
                        <div class="card-body">
                            <h4 class="card-title"><?= $cla['titulo']?></h4>
                            <p class="card-text"><?= $cla['descripcion']?></p>
                            <a href="<?=base_url('Sport/detalleClasificados/')?><?=$cla['id']?>" class="btn btn-primary">Ver mas</a>
                        </div>
                        </div>

                    <div class="my-3"></div>
                <?php
                endforeach;
            } else {
                echo"No hay nada";
            }
            
            ?>
        </aside>
    </div>

</section>