        <footer>
          <p>&nbsp;</p><p>&nbsp;</p>
          <div class="container">
            <div class="row">
              <div class="col-sm-3 col-xs-4">
                <h3><strong>Menú</strong></h3>
                <br>
                <p>
                  <a href="<?=base_url()?>">Inicio</a><br>
                  <a href="<?=base_url()?>index.php/about">Proyecto REPÓRTALO</a><br>
                  <a href="<?=base_url()?>index.php/dudas">Tienes dudas</a><br>
                  <a href="<?=base_url()?>index.php/noticias">Noticias</a><br>
                  <a href="<?=base_url()?>index.php/alianzas">Nuestras alianzas</a><br>
                  <a href="<?=base_url()?>index.php/contacto#">Contacto</a><br>
                </p>
              </div>
              <div class="col-sm-6 hidden-xs mediorep">
                <p>&nbsp;</p>
                <h1>#REPÓRTALOAHORA</h1>
                <p>&nbsp;</p>
              </div>
              <div class="col-sm-3 col-xs-8">
                <div class="col-xs-6 text-center"><i class="fa fa-facebook" aria-hidden="true"></i></div>
                <div class="col-xs-6 text-center"><i class="fa fa-twitter" aria-hidden="true"></i></div>
              </div>
            </div>
          </div>
          <p>&nbsp;</p><p style="margin:0;">&nbsp;</p>
        </footer>

        <script type="text/javascript">
        var menubool=false;

                  function clickmenu(){
                    if (menubool) {
                      ocultarmenu();
                      menubool=false;
                    }
                    else{
                      ocultarredes();
                      mostrarmenu();
                      menubool=true;
                      if (redesbool) {
                        redesbool=false;
                      }
                    }
                  }
                  function mostrarmenu(){
                    setTimeout(function() {
                        $(".menudesp").fadeIn(400);
                    }, 100);
                  }
                  function ocultarmenu(){
                    setTimeout(function() {
                        $(".menudesp").fadeOut(400);
                    }, 100);
                  }



                  var redesbool=false;

                            function clickredes(){
                              if (redesbool) {
                                ocultarredes();
                                redesbool=false;
                              }
                              else{
                                ocultarmenu()
                                mostrarredes();
                                redesbool=true;
                                if (menubool) {
                                  menubool=false;
                                }
                              }
                            }
                            function mostrarredes(){
                              setTimeout(function() {
                                  $(".menuredes").fadeIn(400);
                              }, 100);
                            }
                            function ocultarredes(){
                              setTimeout(function() {
                                  $(".menuredes").fadeOut(400);
                              }, 100);
                            }
        </script>


    </body>
</html>
