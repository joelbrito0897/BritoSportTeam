<?php
admi::apply();

if(isset($_SESSION['user'])){
    ?> 
        <div class="container">
            <div class="my-5"></div>
            <div class="px-5 pb-3">

            <h1 class="text-center">Agrega Administrador</h1>
            <hr>
            <div class="my-4"></div>
                <?= form_open_multipart('admin/registerAdmin')?>
                    <input type="hidden" name="id" id="id">
                    <div class="input-group form-group">
                        <span class="input-group-addon">Usuario</span>
                        <input type="text" name="usuario" id="nombre" class="form-control">
                    </div>
                    <div class="input-group form-group">
                        <span class="input-group-addon">Contraseña</span>
                        <input type="paswork" name="clave" id="" class="form-control">
                    </div>
                    <div class="text-center">
                        <input type="submit" value="Guardar" class='btn btn-success'>
                    </div>
                </form>
                
            </div>
            <div class="my-5"></div>
            <hr>
            <h1 class="text-center">Lista de Administradores</h1>
            <div class="d-flex justify-content-center">
                <div class="col col-md-3">
                    <table class="table">
                        <thead>
                            <tr>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $CI =& get_instance();
                        $result= $CI->db->get('usuarios')->result_array();
                        foreach($result as $art):?>
                        <tr>
                                <th><?= $art['user']; ?></th>
                                <th><a class="btn btn-danger" href="<?= base_url('admin/deleteAdmin/').$art['id']?>"><i class="fa fa-trash" aria-hidden="true"></i></a></th>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <?php
}else{
    redirect('admin/login');
    echo"Debe Iniciar sesion para poder tener acceso a todo el contenido";  
}
?>
