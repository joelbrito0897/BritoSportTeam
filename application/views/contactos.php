<?php
defined('BASEPATH') OR exit('No direct script access allowed');
plantilla::apply();
if(validation_errors()){
    ?>
    <div class="alert alert-danger">
        <?= validation_errors();?>
    </div>
    <?php
}
?>
 <!-- Editor WySiWyG -->
 <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=w6kfa3s41tj1p7v3t4txy4tsjn2fgckfis09zmi27z2k43be"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
    <!-- Editor WySiWyG -->
<div class="my-5"></div>
<div class="container">
    <h1 class="text-center">Contactos</h1>
    <hr>
    <?=form_open('Sport/saveContactos')?>
        <div class="form-group">
            <label for="">Nombre</label>
            <input type="text" name="nombre" id="" class="form-control">
        </div>
        <div class="form-group">
            <label for="">E-mail</label>
            <input type="email" name="email" id="" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Mensaje</label>
            <textarea name="mensaje" id="" cols="30" rows="10" class="form-control"></textarea>
        </div>
        <div class="text-center">
            <input type="submit" value="Enviar" class="btn btn-success">
        </div>
        <div class="my-5"></div>
    </form>
</div>