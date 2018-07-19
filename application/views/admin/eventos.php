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
    ?>
    <!-- Editor WySiWyG -->
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=w6kfa3s41tj1p7v3t4txy4tsjn2fgckfis09zmi27z2k43be"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
    <!-- Editor WySiWyG -->
 <div class="my-5"></div>
    <div class="container">
        <h1 class="text-center">Crear Evento</h1>
        <hr>
        <?= form_open_multipart('Admin/saveEvent')?>
        <input type="hidden" name="id">
        <div class="row">
                    <div class="col col-md-6">
                        <div class="form-group">
                            <label for="">Fecha</label>
                            <input type="date" name="fecha" id="" class="form-control">
                        </div>
                    </div>
                    <div class="col col-md-6">
                        <div class="form-group">
                            <label for="">Hora</label>
                            <input type="time" name="hora" id="" class="form-control">
                        </div>
                    </div>
               </div>
            <div class="form-group">
                <label for="">Titulo</label>
                <input type="text" name="titulo" id="" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Descripcion</label>
                <textarea name="descripcion" id="" cols="30" rows="10" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="">Foto</label>
                <input type="file" name="foto" id="" class="form-control">
            </div>
            <div class="text-center">
                <input type="submit" value="Crear" class="btn btn-success">
            </div>
            <div class="my-5"></div>
        </form>
        <hr>

        <?php
        if(isset($eventos)){
            ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th>TITULO</th>
                            <th>DESCRIPCION</th>
                            <th>FECHA</th>
                            <th>HORA</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($eventos as $event):
                                ?>
                                    <tr>
                                        <td><?= $event['titulo']?></td>
                                        <td><?= $event['descripcion']?></td>
                                        <td><?= $event['fecha']?></td>
                                        <td><?= $event['hora']?></td>
                                        <td><a class="btn btn-danger" href="<?= base_url('admin/deleteEventos/').$event['id']?>"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                                    </tr>
                                <?php
                            endforeach;
                        ?>
                    </tbody>
                </table>
            <?php
        }
        ?>
    </div>   
    <?php
}else{
    redirect('Admin/login');
}