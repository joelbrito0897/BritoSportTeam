<?php
plantilla::apply();
?>
<div class="mar"></div>
<center>
    <div class="my-5"></div>
<div class="col col-md-5">
        
        <h2 class="my-4">Debe de verificar su cedula</h2>
            <div class="input-group form-group">
                <span class="input-group-addon">Cedula</span>
                <input type="text" name="cedula" id="cedula" class="form-control" placeholder="001-0000000-0">
            </div>
            <button class="btn btn-info" href="" onclick="valida_cedula()">Velificar</button>
        
</div>
</center>
<div class="my-5"></div>


<script>


function valida_cedula() {

    var ced = document.getElementById('cedula').value;
    var c = ced.replace(/-/g,'');
    var Cedula = c.substr(0, c.length - 1);
    var Verificador = c.substr(c.length - 1, 1);
    var suma = 0;
    if(ced.length < 13) { return false; }
    for (i=0;i < Cedula.length;i++) {
        mod = "";
         if((i % 2) == 0){mod = 1} else {mod = 2}
         res = Cedula.substr(i,1) * mod;
         if (res > 9) {
              res = res.toString();
              uno = res.substr(0,1);
              dos = res.substr(1,1);
              res = eval(uno) + eval(dos);
         }
         suma += eval(res);
    }
    el_numero = (10 - (suma % 10)) % 10;
    if (el_numero == Verificador && Cedula.substr(0,3) != "000") {
        alert("La Cedula Verificada");
        window.location ="registerMiembro";
    }
    else   {
     alert("La Cedula es Ilegal");
    }
}

</script>

