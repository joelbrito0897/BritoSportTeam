<?php
admi::apply();

if(!isset($_SESSION['user'])){
    redirect('Sport/login');
}

if(isset($contacto)){
    ?>
    <div class="my-5"></div>
    <div class="container">
        <h1 class="text-center">Lista de Contactos</h1>
        <hr>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>E-Mail</th>
                <th>Mensaje</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($contacto as $con):
            ?>
            <tr>
                <td><?=$con['nombre']?></td>
                <td><?=$con['email']?></td>
                <td><?=$con['mensaje']?></td>
                <th><a class="btn btn-danger" href="<?= base_url('admin/deleteContactos/').$con['id']?>"><i class="fa fa-trash" aria-hidden="true"></i></a></th>
            </tr>
            <?php
        endforeach;?>
        
        </tbody>
    </table>
    
    <?php
}
   
