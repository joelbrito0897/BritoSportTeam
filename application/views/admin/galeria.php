<?php
admi::apply();

if(isset($_SESSION['user'])){

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

    <!-- Editor WySiWyG -->
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=w6kfa3s41tj1p7v3t4txy4tsjn2fgckfis09zmi27z2k43be"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
    <!-- Editor WySiWyG -->
        <div class="container">
            <div class="my-5"></div>
            <div class="px-5 pb-3">

            <h1 class="text-center">Agrega Imagen</h1>
            <hr>
            <div class="my-4"></div>
                <?= form_open_multipart('admin/saveFoto')?>
                    <input type="hidden" name="id" id="id">
                    <div class="input-group form-group">
                        <span class="input-group-addon">Nombre</span>
                        <input type="text" name="nombre" id="nombre" class="form-control">
                    </div>
                     <div class="input-group form-group">
                        <span class="input-group-addon">Descripcion</span>
                        <textarea name="descripcion" id="descricion" class="form-control"></textarea>
                    </div>
                    <div class="input-group form-group">
                        <span class="input-group-addon">Imagen</span>
                        <input type="file" name="foto" id="" class="form-control">
                    </div>
                    <div class="text-center">
                        <input type="submit" value="Guardar" class='btn btn-success'>
                    </div>
                </form>
                
            </div>
            <div class="my-5"></div>
            <hr>

            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Foto</th>
                        <th></th>
                    </tr>
                </thead>
                
                <tbody>
                <?php
                 $CI =& get_instance();
                 $result= $CI->db->get('galeria')->result_array();
                foreach($result as $art):?>
                    
                   <tr>
                        <td><?= $art['id']; ?></td>
                        <td><?= $art['nombre']; ?></td>
                        <td><img src="<?= base_url()?>img/<?= $art['foto']?>" style="width:75px;"></td>
                        <td><button class="btn btn-warning" onclick="editar('<?= $art['id']; ?>','<?= $art['nombre']; ?>')"><i class='fa fa-pencil-square-o' aria-hidden='true'></i></button>
                        <a class="btn btn-danger" href="<?= base_url('admin/deleteNoticias/').$art['id']?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
                        </td>
                        
                    </tr>
                    
                    
                
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <script>
            var editar= function(id,nombre){
                $('#id ').val(id);
                $('#nombre').val(nombre);
            }
        </script>

    <?php
}else{
    redirect('admin/login');
    echo"Debe Iniciar sesion para poder tener acceso a todo el contenido";  
}

?>


