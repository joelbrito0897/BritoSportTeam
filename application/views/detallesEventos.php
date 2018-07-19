<?php
defined('BASEPATH') OR exit('No direct script access allowed');
plantilla::apply();
if(isset($detalles)){
   
   $CI =& get_instance();
   $det=$CI->db->get_where('eventos',array('id'=>$detalles[0]['idEvento']))->row_array();
   
  // $mie=$CI->db->get_where('miembros',array('id'=>$detalles['idMiembro']))->row_array();
   //var_dump($mie);
   ?>
   <div class="my-5"></div>
    <div class="container">
        <div>
            <h1 class="text-center mb-5"><?= $det['titulo']?></h1>

            <div class="d-flex justify-content-between">
                <div class="">
                    <img style="width:500px;" class="card-img-top" src="<?=base_url()?>/img/<?= $det['foto']?>" >
                </div>
                <div class="mx-2"></div>
                <div class="">
                    <p><?= $det['descripcion']?></p>
                </div>
            </div>
        </div>
        <div class="my-5"></div>
        <hr>
        <h1 class="text-center">Confirmacion de Personas</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Telefono</th>
                    <th>Celular</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($detalles as $pr):
                        $mie=$CI->db->get_where('miembros',array('id'=>$pr['idMiembro']))->row_array();
                        ?>
                            <tr>
                                <td><?=$mie['nombre']?> <?=$mie['apellido']?></td>
                                <td><?=$mie['correo']?></td>
                                <td><?=$mie['telefono']?></td>
                                <td><?=$mie['celular']?></td>
                            </tr>
                        <?php
                    endforeach;
                    
                ?>
                <tr>
                </tr>
            </tbody>
        </table>
        <div class="my-5"></div>
    </div>
   <?php
   
}