<?php
plantilla::apply();

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

<div class="container">
<div class="my-5"></div>
<?= form_open_multipart('Sport/registerMiembro')?>
    <div class="row">

    <input type="hidden" name="id">
        <div class="col col-md-6">
            <div class="form-group ">
                <span class="">Nombre</span>
                <input type="text" name="nombre" id="" class="form-control">
            </div>
        </div>
        <div class="col col-md-6">
            <div class="form-group ">
                <span class="">Apellido</span>
                <input type="text" name="apellido" id="" class="form-control">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col col-md-6">
            <div class="form-group">
                <span class="">Telefono</span>
                <input type="text" name="telefono" id="" class="form-control" placeholder="000-000-0000">
            </div>
        </div>
        <div class="col col-md-6">
            <div class="form-group ">
                <span class="">Celular</span>
                <input type="text" name="celular" id="" class="form-control" placeholder="000-000-0000">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col col-md-4">
            <div class="form-group ">
                <span class="">Cedula</span>
                <input type="text" name="cedula" id="" class="form-control" placeholder="000-0000000-0">
            </div>
        </div>
        <div class="col col-md-4">
            <div class="form-group ">
                <span class="">Foto</span>
                <input type="file" name="foto" id="" class="form-control">
            </div>
        </div>
        <div class="col col-md-4">
            <div class="form-group ">
                <span class="">Correo</span>
                <input type="email" name="correo" id="" class="form-control" placeholder="example@example.com">
            </div>
        </div>
    </div>
    
    <div class="form-group ">
        <span class="">Direccion</span>
        <input type="text" name="direccion" id="" class="form-control">
    </div>

    <div class="row">
        <div class="col col-md-6">
            <div class="form-group ">
                <span class="">Latitud</span>
                <input type="text" name="latitud" id="" class="form-control">
            </div>
        </div>
        <div class="col col-md-6">
            <div class="form-group ">
                <span class="">Longitud</span>
                <input type="text" name="longitud" id="" class="form-control">
            </div>
        </div>
    </div>
    <div class="text-center">
            <input type="submit" value="Registrar" class="btn btn-success">
        </div>  
</form>
</div>