<section>
        <!-- GALLERY SLIDER -->
        <div data-ride="carousel" class="carousel slide" id="carousel">

          <ol class="carousel-indicators">
             <li data-target="#carousel" data-slide-to="0" class="active"></li>
             <li data-target="#carousel" data-slide-to="1"></li>
             <li data-target="#carousel" data-slide-to="2"></li>
             <li data-target="#carousel" data-slide-to="3"></li>
          </ol>
        <!-- Wrapper for slides -->
        <div role="listbox" class="carousel-inner">

        <div class="item active">
          <a href="/"><img alt="" style="border: 0px none; width: 100% !important;" src="<?=base_url()?>img/aboutbg.png" /></a>
          <div class="carousel-caption">
            <h1>Cuentas con nosotros</h1>
            <h1>#REPÓRTALOAHORA</h1>
          </div>
        </div>

        <div class="item">
          <a href="/"><img alt="" style="border: 0px none; width: 100% !important;" src="<?=base_url()?>img/aboutbg.png" /></a>
          <div class="carousel-caption">
            <h1>Cuentas con nosotros</h1>
            <h1>#REPÓRTALOAHORA</h1>
          </div>
        </div>

        <div class="item">
          <a href="/"><img alt="" style="border: 0px none; width: 100% !important;" src="<?=base_url()?>img/aboutbg.png" /></a>
          <div class="carousel-caption">
            <h1>Cuentas con nosotros</h1>
            <h1>#REPÓRTALOAHORA</h1>
          </div>
        </div>

        <div class="item">
          <a href="/"><img alt="" style="border: 0px none; width: 100% !important;" src="<?=base_url()?>img/aboutbg.png" /></a>
          <div class="carousel-caption">
            <h1>Cuentas con nosotros</h1>
            <h1>#REPÓRTALOAHORA</h1>
          </div>
        </div>

          </div>

        </a>
        </div>
        <!-- END GALLERY SLIDER -->
        </section>

        <section>
          <div class="aboutheader">
            <h1>Noticias</h1>
          </div>
        </section>
        <div class="pagecontact">
          <div class="row text-center">
            <div class="col-md-2 hidden-sm hidden-xs"><img src="<?=base_url()?>img/circulo4.png" class="circulo" alt="" style="top: -65px;"></div>
          </div>

          <div class="noticias row">
            <?php
            if ($noticias) {
              foreach (array_reverse($noticias) as $noticia) {?>
            <div class="col-sm-4 noticiacuadro" style="opacity: .9; background: url(<?=$noticia->imagendest?>); background-size: cover; background-position: center; background-repeat: no-repeat;">
              <p><h4 style="opacity: 0.9;"><a href="<?=base_url()?>index.php/noticias/entrada/<?=$noticia->id?>"> <?=$noticia->titulonew?> </a></h4></p>
            </div>
            <?php
              }
            }
             ?>

          </div>


            <div class="text-center" style="padding: 50px 0;">
              <h4>¡Bienvenidos aquellos que creen en un mundo mejor! <br> <span class="lineanaranja"></span></h4>

            </div>

        </div>
