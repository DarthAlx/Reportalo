<div class="container">
  <?php if ($error): ?> <p> <?php echo "<div class='alert alert-warning alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Cerrar'><span aria-hidden='true'>&times;</span></button>".$error."</div>"; ?> </p> <?php endif; ?>
<div class="blanco">


    <form class="form-signin" action="<?php echo base_url() ?>index.php/usuarios/iniciar_sesion_post" method="post">
        <div class="form-signin-heading text-center">
            <h1 class="sign-title"><strong>Bienvenidos</strong></h1>
            <img src="<?php echo base_url() ?>img/logo.png" alt=""/>
        </div>
        <div class="login-wrap">
            <input type="text" class="form-control" placeholder="Correo electrónico" name="email" autofocus required>
            <input type="password" class="form-control" placeholder="Contraseña" name="contraseña" required>

            <button class="btn btn-lg btn-login btn-block" type="submit">
                <i class="fa fa-check"></i>
            </button>

            <!--div class="registration">
                Not a member yet?
                <a class="" href="registration.html">
                    Signup
                </a>
            </div-->
            <label class="checkbox">
              <!--  <input type="checkbox" value="remember-me"> Recordarme-->
                <span class="pull-right">
                    <a data-toggle="modal" href="#myModal"> ¿Olvidaste tu contraseña?</a>

                </span>
            </label>

        </div>



    </form>
    </div>
    <!-- Modal -->
    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><strong>¿Olvidaste tu contraseña?</strong></h4>
                </div>
                <div class="modal-body">

                    <p>Ingresa tu correo electrónico para recuperar tu contraseña.</p>
                    <input type="email" id="email1" name="email" placeholder="tuemail@ejemplo.com" autocomplete="off" class="form-control placeholder-no-fix">


                </div>
                <div class="modal-footer">
                  <button data-dismiss="modal" class="btn btn-default" type="button">Cancelar</button>
                  <button class="btn btn-primary" data-dismiss="modal" id="yes-button">Enviar</button>
                </div>
              </form>
            </div>
        </div>
    </div>
    <!-- modal -->

</div>

<div class="oculto" style="display:none;">
  <form  action="<?php echo base_url() ?>index.php/usuarios/enviar_recuperacion" method="post" name="recuperar" role="form">
    <p>Ingresa tu correo electrónico para recuperar tu contraseña.</p>
    <input type="email" name="email" id="email2" placeholder="tuemail@ejemplo.com" autocomplete="off" class="form-control placeholder-no-fix" required>

  </form>

</div>


<!-- Placed js at the end of the document so the pages load faster -->

<!-- Placed js at the end of the document so the pages load faster -->
<script src="<?php echo base_url() ?>js/jquery-1.10.2.min.js"></script>
<script src="<?php echo base_url() ?>js/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>js/modernizr.min.js"></script>
<script type="text/javascript">
$("#yes-button").on('click', function(){
              document.getElementById('email2').value= document.getElementById('email1').value
              document.recuperar.submit();
          });
</script>
