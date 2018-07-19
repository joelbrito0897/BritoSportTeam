<?php
admi::apply();


if (isset($ubicacion)) {
    foreach($ubicacion as $ubi):
        ?>
        <div class="container">
            <div class="my-5"></div>
            <div class='p-3'>       
        
                <div class="row">
                    <div class="col col-md-3">
                        <img src="<?= base_url()?>/img/<?= $ubi['foto']?>" alt="" style="width:200px">
                    </div>
        
                    <div class="col col-md-9">
        
                        <div class="form-group">
                            <span class="">Nombre: </span>
                            <p class="form-control"><?= $ubi['nombre']." ".$ubi['apellido']?></p>
                        </div>
                        <div class="my-3"></div>
                        <div class="form-group">
                            <span class="">Correo: </span>
                            <p class="form-control"><?= $ubi['correo']?></p>
                        </div> <div class="my-3"></div>
                        <div class="form-group">
                            <span class="">Contactos: </span>
                            <p class="form-control"><?= $ubi['telefono']." | ".$ubi['celular']?></p>
                        </div>
                        <div class="my-5"></div>
                       
                    </div>
                </div>
                <style>
                #map {
                    height: 400px;
                    width: 100%;
                }
                </style>
                 <h3><i class="fa fa-map-marker" aria-hidden="true"></i> Ubicacion</h3>
                    <div id="map"></div>
                    <script>
                    function initMap() {
                        var uluru = {lat: <?= $ubi['latitud']?>, lng: <?= $ubi['longitud']?>};
                        var map = new google.maps.Map(document.getElementById('map'), {
                        zoom: 18,
                        center: uluru
                        });
                        var marker = new google.maps.Marker({
                        position: uluru,
                        map: map
                        });
                    }
                    </script>
                    <script async defer
                    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCT20CAt7VRVOlwXf7upjI0hbopHzEuDYc&callback=initMap">
                    </script>
                   
            </div>
            <hr>
          
            <div class="my-5"></div>
            
        </div>
        
        
        <?php
        endforeach;

}
?>