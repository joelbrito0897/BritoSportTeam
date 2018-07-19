<?php
defined('BASEPATH') OR exit('No direct script access allowed');
plantilla::apply();
if(isset($eventos)){
    ?>
        <div class="my-5"></div>
        <div class="container">
        <h1 class="text-center">Eventos</h1>
        <hr>
    <?php
    if(isset($_SESSION['idMiembro'])){
    $CI =& get_instance();
    $query = $CI->db->get_where('listevento',array('idMiembro'=>$_SESSION['idMiembro']))->row_array();  
}
    
    foreach($eventos as $event):
        ?>
        <div class="card">
        <div class="d-flex flex-row-reverse">
            <h4 class="card-header"><i class="fa fa-calendar" aria-hidden="true"></i> <?=$event['fecha']?> <i class="fa fa-clock-o"     aria-hidden="true"></i> <?= $event['hora']?> </h4>  
        </div>
        
        <div class="card-body">
                <div class="row">           
                <div class="col col-md-4">
                    <img style="200px" src="<?=base_url()?>img/<?=$event['foto']?>" alt="">
                </div>
                <div class="col col-md-8">
                    <h4 class="card-title"><?=$event['titulo']?></h4>
                    <p class="card-text"><?=$event['descripcion']?></p>
                    <a href="<?=base_url('Sport/detalleEventos/')?><?=$event['id']?>" class="btn btn-info">Ver Listado</a>
                    <div class="d-flex flex-row-reverse">
                    <?php
                    if(isset($_SESSION['idMiembro'])){
                        if($query['idMiembro']==$_SESSION['idMiembro']){
                            ?><a href='<?= base_url('Sport/nolistEvent/')?><?=$_SESSION['idMiembro']?>' class='btn btn-primary'>No Asistire</a>
                            
                            <?php
                        }else{
                            ?>
                             <a href='<?= base_url('Sport/listEvent/')?><?=$event['id']?>' class='btn btn-primary'>Asistir</a>
                             
                            <?php
                        }
                        ?>  
                           
                        <?php
                    }
                       
                    ?>
                    </div>
                    
                </div>
            </div>
            
                    <div class="my-3"></div>
        </div>
        </div>
        
        <?php
    endforeach;
    ?>
    
    <div class="my-5"></div> 
    <div class="d-flex justify-content-center">
            <?= $paginacion?>
        </div>
        </div>
        <script>
            var active = function(){
                document.getElementById('asistir').disabled=true;
                document.getElementById('noasistir').disabled=false;
            }
            var disable = function(){
                document.getElementById('asistir').disabled=false;
                document.getElementById('noasistir').disabled=true;
            }
        </script>
    <?php
}
?>  