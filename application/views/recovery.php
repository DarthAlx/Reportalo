<div class="container">
  <?php if ($error): ?> <p> <?php echo "<div class='alert alert-warning alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Cerrar'><span aria-hidden='true'>&times;</span></button>".$error."</div>"; ?> </p> <?php endif; ?>

    <form class="form-signin" action="<?php echo base_url() ?>index.php/usuarios/recuperacion" method="post">
        <div class="form-signin-heading text-center">
            <h1 class="sign-title"><strong>Recuperación</strong></h1>
            <img src="<?php echo base_url() ?>img/logo.png" alt=""/>
        </div>
        <div class="login-wrap">

            <input type="password" class="form-control" placeholder="Nueva contraseña" name="nuevacontraseña" autofocus required>
            <input type="password" class="form-control" placeholder="Repetir contraseña" name="nuevacontraseña1" required>
            <input type="hidden" class="form-control"  name="userpost" value="<?=$user?>" required>
            <input type="hidden" class="form-control"  name="tokenpost" value="<?=$token?>" required>

            <button class="btn btn-lg btn-login btn-block" type="submit">
                <i class="fa fa-check"></i>
            </button>

            <!--div class="registration">
                Not a member yet?
                <a class="" href="registration.html">
                    Signup
                </a>
            </div-->


        </div>

    </form>

</div>
