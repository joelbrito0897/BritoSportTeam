<?php
defined('BASEPATH') OR exit('No direct script access allowed');
plantilla::apply();
if(isset($_SESSION['idMiembro'])){
    if(validation_errors()){
        ?>
        <div class="alert alert-danger">
            <?= validation_errors();?>
        </div>
        <?php
    }
    
    if(isset($error)){
        ?>
        <div class="alert alert-danger">
            <?= $error;?>
        </div>
        <?php
    }
    ?>
        <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=w6kfa3s41tj1p7v3t4txy4tsjn2fgckfis09zmi27z2k43be"></script>
        <script>tinymce.init({ selector:'textarea' });</script>
        
        <div class="container">

        <div class="my-5"></div>
        <h2 class="text-center">Ingresar un Clasificados</h2>
        <hr>
        <?=form_open_multipart('Sport/saveClasificados')?>
            <input type="hidden" name="id">
            <div class="form-group">
                <label>Titulo</label>
                <input type="text" name="titulo" id="" class="form-control">
            </div>
            <div class="form-group">
                <label>Descripcion</label>
                <textarea name="descripcion" class="form-control" ></textarea>
            </div>
            <div class="form-group">
                <label>Foto</label>
                <input type="file" name="foto" id="" class="form-control">
            </div>
            
            <div class="text-center">
                <input type="submit" value="Guardar" class="btn btn-success">
            </div>
        <div class="my-5"></div>
        </form>
        </div>
  <?php
}else{
    if (isset($clasificados)) {
        ?>
        <div class="my-5"></div>
        <h1 class="text-center">Clasificados</h1>

        <div class="container">
        <?php
         foreach($clasificados as $cla):
            ?>
            <div class="card">
                <h4 class="card-header"><?= $cla['titulo']?></h4>
                <div class="card-body">
                <div class="d-flex justify-content-around">
                    <div>
                        <img style="width:250px;" class="card-img-top" src="<?=base_url()?>img/<?= $cla['foto']?>" >
                    </div>
                    <div class="mx-2"></div>
                    <div>
                        <p class="card-text"><?= $cla['descripcion']?></p>
                    </div>
                </div>
            </div>
           
            <?php
         endforeach;
         ?>
         </div>  
         <div class="d-flex justify-content-center">
            <?= $paginacion?>
        </div>
         <?php
        }
}