<?php
admi::apply();

if(!isset($_SESSION['user'])){
    redirect('Sport/login');
}
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
        <h1 class="text-center">Preguntas Frecuentes</h1>
        <hr>
        <?=form_open('Admin/saveFaq')?>
            <input type="hidden" name="id" id="id">
            <div class="form-group">
                <label for="">Pregunta</label>
                <input type="text" name="preguntas" id="pregunta" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Respuesta</label>
                <input type="text" name="respuestas" id="respuesta" class="form-control">
            </div>
            <div class="text-center">
                <input type="submit" value="Guardar" class="btn btn-success">
            </div>
            <div class="my-5"></div>
        </form>
        <hr>

        <?php
            if(isset($faq)){
                ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Pregunta</th>
                            <th>Respuesta</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($faq as $fa):

                    $id=$fa['id'];
                    $pregunta=$fa['preguntas'];
                    $respuesta=$fa['respuestas'];
                        ?>
                        <tr>
                            <td><?=$fa['preguntas']?></td>
                            <td><?=$fa['respuestas']?></td>
                            <th><button class="btn btn-warning" onclick="editar('<?=$id?>','<?=$pregunta;?>','<?=$respuesta;?>')"><i class='fa fa-pencil-square-o' aria-hidden='true'></i></button>
                            <a class="btn btn-danger" href="<?= base_url('admin/deleteFaq/').$fa['id']?>"><i class="fa fa-trash" aria-hidden="true"></i></a></th>
                        </tr>
                        <?php
                    endforeach;?>
                    </tbody>
                </table>
                <?php
            }
        ?>
         <script>
            var editar= function(id,pregunta,respuesta){
                $('#id ').val(id);
                $('#pregunta').val(pregunta);
                $('#respuesta').val(respuesta);
            }
        </script>
    </div>