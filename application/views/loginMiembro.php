<?php
defined('BASEPATH') OR exit('No direct script access allowed');
plantilla::apply();
?>  
<center>
<div class="my-5"></div>
<div class="col col-md-5">
    <?= form_open('Sport/loginMiembro')?>
    <h2 class="my-4">Iniciar Sesion</h2>
        <div class="input-group form-group">
            <span class="input-group-addon">Cedula</span>
            <input type="text" name="cedula" id="cedula" class="form-control" placeholder="001-0000000-0">
        </div>
        <input type="submit" value="Ingresar" class="btn btn-info">
    
</div>
</center>
<div class="my-5"></div>