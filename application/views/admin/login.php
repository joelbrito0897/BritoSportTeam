<?php
admi::apply();
?>
<div class="d-flex justify-content-center">
<div class="my-5"></div>

<div class="col col-md-6 p-5">
    <h2 class="text-center">Inciar Sesion</h2>
    <hr>
    <?= form_open('Admin/login')?>
        <div class="input-group form-group">
            <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
            <input type="text" name="user" id="" class="form-control">
        </div>
        <div class="input-group form-group">
            <span class="input-group-addon"><i class="fa fa-lock" aria-hidden="true"></i></span>
            <input type="password" name="pass" id="" class="form-control">
        </div>
     
        <div class="text-center">
            <input type="submit" value="Acceder" class="btn btn-primary">
        </div>
    </form>
   
</div>
</div>