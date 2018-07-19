<?php
defined('BASEPATH') OR exit('No direct script access allowed');
plantilla::apply();
if (isset($faq)) {
?>
<div class="container">
<div class="my-5"></div>
    <h1 class="text-center">Preguntas Freguentes</h1>
<hr>
   <?php
        foreach($faq as $fa):
            ?>
                 <div class="card">
                <div class="card-header">
                <h3><?= $fa['preguntas']?></h3>
                </div>
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                    <p><?= $fa['respuestas']?></p>
                    </blockquote>
                </div>
                </div>
                <div class="my-3"></div>

            <?php
        endforeach;
   ?>
    
</div>

<?php
}
?>


