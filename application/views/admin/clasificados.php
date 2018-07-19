<?php
admi::apply();

if(isset($_SESSION['user'])){
    ?> 

    <div class="container">
        <div class="my-5"></div>
        <div>
            <table class="table">
                <thead>
                    <tr>
                        <th>FECHA</th>
                        <th>IMAGEN</th>
                        <th>TITULO</th>
                        <th>DESCRIPCION</th>
                        <th>Publicador</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    
                   if(isset($clasificado)){
                    foreach($clasificado as $art):
                        $CI =& get_instance();
                        $CI->db->where('id',$art['idMiembro']);
                        $query=$CI->db->get('miembros')->row_array();

                    
                    ?>
                        
                    <tr>
                            <td><?= $art['fecha']; ?></td>
                            <td><img style="width:150px;" src="<?=base_url()?>img/<?=$art['foto']?>" alt=""></td>
                            <td><?= $art['titulo']; ?></td>
                            <td><?= $art['descripcion']; ?></td>
                            <td><?= $query['nombre']?></td>
                            <td><a class="btn btn-danger" href="<?= base_url('admin/deleteClasificados/').$art['id']?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            </td>
                            
                        </tr>
                        
                    
                    <?php endforeach; 
                    }?>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}else{
    redirect('admin/login');
    echo"Debe Iniciar sesion para poder tener acceso a todo el contenido";  
}

?>