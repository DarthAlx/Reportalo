<div class="container">
  <?php if ($Mensaje): ?> <p> <?php echo "<div class='alert alert-warning alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Cerrar'><span aria-hidden='true'>&times;</span></button>".$Mensaje."</div>"; ?> </p> <?php endif; ?>
</div>
<div class="pagecontact">
        <section>
          <div class="contactheader">
            <p>Soy Campesinx, No Esclavx <br> <span class="lineanaranja"></span></p>

          </div>
        </section>

        <section>
          <div class="container">
            <div class="row">
              <div class="col-md-4 col-sm-6">
                <h2>Contacto</h2>
                <p>Si deseas ponerte en contacto con el equipo de Repórtalo para pedir información, resolver dudas, contarnos tu historia trabajando en el campo, este es tu espacio, nuestros asesores están para ayudarte.</p>
                <h3>Tu datos están protegidos. <br>No se compartirán con nadie.</h3>

              </div>
              <div class="col-md-6 col-md-offset-2 col-sm-6">
                <form class="" action="<?php echo base_url() ?>index.php/email"  enctype="multipart/form-data" method="post">
                  <div class="form-group">
                    <label for="">Nombre (Opcional): <br><small>*Este dato es totalmente CONFIDENCIAL</small></label>
                    <input type="text" name="nombre" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="">¿Qué quieres reportar?</label>
                    <div class="radio">
                      <label>
                        <input type="radio" name="reporte" value="Horas excesivas">
                        Horas excesivas
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" name="reporte" value="Confiscación de documentos">
                        Confiscación de documentos
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" name="reporte" value="Sueldo">
                        Sueldo
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" name="reporte" value="Amenazas">
                        Amenazas
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" name="reporte" value="No cumplen lo que prometieron">
                        No cumplen lo que prometieron
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" name="reporte" value="No te dejan salir del rancho">
                        No te dejan salir del rancho
                      </label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="">Nombre del empleador:</label>
                    <input type="text"  name="empleador" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="">¿Deseas que nos comuniquemos contigo? <br>Teléfono (opcional)</label>
                    <input type="text" name="telefono" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="">Correo electrónico (opcional)</label>
                    <input type="text"  name="email" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="">Agregar adjunto (opcional)</label>
                    <input type="file"  name="adjunto" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="">Mensaje</label>
                    <textarea name="mensaje" rows="8" cols="80" class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                    <button type="submit" name="button" class="btn btn-warning">Enviar</button>
                    <button type="reset" name="button" class="btn btn-warning">Borrar</button>
                  </div>

                </form>
                <p>&nbsp;</p><p>&nbsp;</p>

              </div>
            </div>
          </div>
        </section>
        </div>
