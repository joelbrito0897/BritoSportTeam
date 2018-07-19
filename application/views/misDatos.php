<?php
defined('BASEPATH') OR exit('No direct script access allowed');
plantilla::apply();
    if(isset($datos)){

        ?>

<div class="container">
<div class="my-5"></div>
<?= form_open_multipart('Sport/registerMiembro')?>
        <?php
        foreach($datos as $art):
            ?> 
          
    <div class="row">
    <input type="hidden" name="id" value="<?=$art['id']?>">
        <div class="col col-md-6">
            <div class="form-group ">
                <span class="">Nombre</span>
                <input type="text" name="nombre" value="<?= $art['nombre']?>" class="form-control">
            </div>
        </div>
        <div class="col col-md-6">
            <div class="form-group ">
                <span class="">Apellido</span>
                <input type="text" name="apellido" value="<?=$art['apellido']?>" class="form-control">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col col-md-6">
            <div class="form-group">
                <span class="">Telefono</span>
                <input type="text" name="telefono" value="<?=$art['telefono']?>" class="form-control" placeholder="000-000-0000">
            </div>
        </div>
        <div class="col col-md-6">
            <div class="form-group ">
                <span class="">Celular</span>
                <input type="text" name="celular" value="<?=$art['celular']?>" class="form-control" placeholder="000-000-0000">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col col-md-4">
            <div class="form-group ">
                <span class="">Cedula</span>
                <input type="text" name="cedula" value="<?=$art['cedula']?>" class="form-control" placeholder="000-0000000-0">
            </div>
        </div>
        <div class="col col-md-4">
            <div class="form-group ">
                <span class="">Foto</span>
                <input type="file" name="foto" value="<?=$art['foto']?>" class="form-control">
            </div>
        </div>
        <div class="col col-md-4">
            <div class="form-group ">
                <span class="">Correo</span>
                <input type="email" name="correo" value="<?=$art['correo']?>" class="form-control" placeholder="example@example.com">
            </div>
        </div>
    </div>
    
    <div class="form-group ">
        <span class="">Direccion</span>
        <input type="text" name="direccion" value="<?=$art['direccion']?>" class="form-control">
    </div>

    <div class="row">
        <div class="col col-md-6">
            <div class="form-group ">
                <span class="">Latitud</span>
                <input type="text" name="latitud" value="<?=$art['latitud']?>" class="form-control">
            </div>
        </div>
        <div class="col col-md-6">
            <div class="form-group ">
                <span class="">Longitud</span>
                <input type="text" name="longitud" value="<?=$art['longitud']?>" class="form-control">
            </div>
        </div>
    </div>
    <div class="text-center">
            <input type="submit" value="Editar" class="btn btn-success">
        </div>  
</form>
</div>
            <?php
        endforeach;
    }else{
        echo"no hay usuario";
    }
?>