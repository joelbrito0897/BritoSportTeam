<?php
admi::apply();

if(isset($_SESSION['user'])){
    ?> 
         <div class="container">
            <div class="my-5"></div>
            <div class="px-5 pb-3">

            <h1 class="text-center">Agrega Administrador</h1>
            <hr>
            <?= var_dump($_POST);   ?>
            <div class="my-4"></div>
                <form method="post">
                    <input type="hidden" name="id">
                    <div class="input-group form-group">
                        <span class="input-group-addon">Usuario</span>
                        <input type="text" name="user" class="form-control">
                    </div>
                     <div class="input-group form-group">
                        <span class="input-group-addon">Contraseña</span>
                        <input type="password" name="pass" class="form-control">
                    </div>
                    <div class="text-center">
                        <input type="submit" value="Guardar" class='btn btn-success'>
                    </div>
                </form>
                
            </div>
            <div class="my-5"></div>
            <hr>
    <?php

}else{
    redirect('admin/login');
    echo"Debe Iniciar sesion para poder tener acceso a todo el contenido";
}
?>