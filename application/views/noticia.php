<style media="screen">

#slider-text .col-md-6{
  overflow: hidden;
}
.carousel-showmanymoveone .carousel-control {
  width: 4%;
  background-image: none;
}
.carousel-showmanymoveone .carousel-control.left {
  margin-left: 5px;
}
.carousel-showmanymoveone .carousel-control.right {
  margin-right: 5px;
}
.carousel-showmanymoveone .cloneditem-1,
.carousel-showmanymoveone .cloneditem-2,
.carousel-showmanymoveone .cloneditem-3,
.carousel-showmanymoveone .cloneditem-4,
.carousel-showmanymoveone .cloneditem-5 {
  display: none;
}
.item div, .carousel-inner{
  height: 250px !important;
}
@media all and (min-width: 768px) {
  .carousel-showmanymoveone .carousel-inner > .active.left,
  .carousel-showmanymoveone .carousel-inner > .prev {
    left: -50%;
  }
  .carousel-showmanymoveone .carousel-inner > .active.right,
  .carousel-showmanymoveone .carousel-inner > .next {
    left: 50%;
  }
  .carousel-showmanymoveone .carousel-inner > .left,
  .carousel-showmanymoveone .carousel-inner > .prev.right,
  .carousel-showmanymoveone .carousel-inner > .active {
    left: 0;
  }
  .carousel-showmanymoveone .carousel-inner .cloneditem-1 {
    display: block;
  }
}
@media all and (min-width: 768px) and (transform-3d), all and (min-width: 768px) and (-webkit-transform-3d) {
  .carousel-showmanymoveone .carousel-inner > .item.active.right,
  .carousel-showmanymoveone .carousel-inner > .item.next {
    -webkit-transform: translate3d(50%, 0, 0);
    transform: translate3d(50%, 0, 0);
    left: 0;
  }
  .carousel-showmanymoveone .carousel-inner > .item.active.left,
  .carousel-showmanymoveone .carousel-inner > .item.prev {
    -webkit-transform: translate3d(-50%, 0, 0);
    transform: translate3d(-50%, 0, 0);
    left: 0;
  }
  .carousel-showmanymoveone .carousel-inner > .item.left,
  .carousel-showmanymoveone .carousel-inner > .item.prev.right,
  .carousel-showmanymoveone .carousel-inner > .item.active {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
    left: 0;
  }
}
@media all and (min-width: 992px) {
  .carousel-showmanymoveone .carousel-inner > .active.left,
  .carousel-showmanymoveone .carousel-inner > .prev {
    left: -16.666%;
  }
  .carousel-showmanymoveone .carousel-inner > .active.right,
  .carousel-showmanymoveone .carousel-inner > .next {
    left: 16.666%;
  }
  .carousel-showmanymoveone .carousel-inner > .left,
  .carousel-showmanymoveone .carousel-inner > .prev.right,
  .carousel-showmanymoveone .carousel-inner > .active {
    left: 0;
  }
  .carousel-showmanymoveone .carousel-inner .cloneditem-2,
  .carousel-showmanymoveone .carousel-inner .cloneditem-3,
  .carousel-showmanymoveone .carousel-inner .cloneditem-4,
  .carousel-showmanymoveone .carousel-inner .cloneditem-5,
  .carousel-showmanymoveone .carousel-inner .cloneditem-6  {
    display: block;
  }
}
@media all and (min-width: 992px) and (transform-3d), all and (min-width: 992px) and (-webkit-transform-3d) {
  .carousel-showmanymoveone .carousel-inner > .item.active.right,
  .carousel-showmanymoveone .carousel-inner > .item.next {
    -webkit-transform: translate3d(16.666%, 0, 0);
    transform: translate3d(16.666%, 0, 0);
    left: 0;
  }
  .carousel-showmanymoveone .carousel-inner > .item.active.left,
  .carousel-showmanymoveone .carousel-inner > .item.prev {
    -webkit-transform: translate3d(-16.666%, 0, 0);
    transform: translate3d(-16.666%, 0, 0);
    left: 0;
  }
  .carousel-showmanymoveone .carousel-inner > .item.left,
  .carousel-showmanymoveone .carousel-inner > .item.prev.right,
  .carousel-showmanymoveone .carousel-inner > .item.active {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
    left: 0;
  }
}
.carousel-control {
    top: 50%;
  }
</style>



  <?php
        if ($noticias) {
          foreach ($noticias as $noticia) {

          ?>
          <?php if($this->session->userdata('logueado')){ ?>
          <section class="cuenta1">
            <div class="container">
              <a href="<?php echo base_url() ?>index.php/news/editar/<?=$noticia->id?>">Editar noticia</a>

            </div>
          </section>
          <?php }?>
      <img src="<?=$noticia->imagendest?>" class="img-responsive" alt="" style="width:100%;">
      <div class="aboutheader">
        <h1><?=$noticia->titulonew?></h1>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <p>&nbsp;</p><p>&nbsp;</p>
            <h4 class="text-center"><strong><?=$noticia->titulonew?></strong></h4>
            <p>&nbsp;</p>
            <p><?=$noticia->fecha?></p>
            <p>&nbsp;</p>
            <?php echo html_entity_decode($noticia->contenido);?>
            <p>&nbsp;</p>
            <h4 class="text-center"><strong>Noticia completa en:</strong></h4>
            <h4 class="fuente"><a href="<?=$noticia->fuente?>"><?=$noticia->fuente?></a></h4>
            <p>&nbsp;</p>
            <p class="text-center"><a href="<?=base_url()?>index.php/noticias" class="btn btn-default volver">Volver</a></p>

            </div>
          </div>
          </div>
          <?php }
          } ?>

          <div class="noticias">
<p>&nbsp;</p><p>&nbsp;</p>
            <div class="carousel carousel-showmanymoveone slide" id="itemslider">
        <div class="carousel-inner">

          <?php
          $primero=true;
          if ($noticiasarray) {
            foreach (array_reverse($noticiasarray) as $noticiar) {
              if ($primero) {
              ?>
              <div class="item active">
                <div class="col-xs-12 col-sm-6 col-md-3"  style=" background: url(<?=$noticiar->imagendest?>); background-size: cover; background-position: center; background-repeat: no-repeat;">

                  <p style="width: 100%; padding: 50px 0;"><h4 style="text-align: center;"><a href="<?=base_url()?>index.php/noticias/entrada/<?=$noticiar->id?>" style="color: #fff; font-weight: bold; font-size:1.8rem;"> <?=$noticiar->titulonew?> </a></h4></p>
                </div>
              </div>
          <?php
          $primero=false;
        }else{
          ?>
          <div class="item ">
            <div class="col-xs-12 col-sm-6 col-md-3"  style="opacity: .9; background: url(<?=$noticiar->imagendest?>); background-size: cover; background-position: center; background-repeat: no-repeat;">

              <p style="width: 100%; padding: 50px 0;"><h4 style="text-align: center;"><a href="<?=base_url()?>index.php/noticias/entrada/<?=$noticiar->id?>" style="color: #fff; font-weight: bold; font-size:1.5rem;"> <?=$noticiar->titulonew?> </a></h4></p>
            </div>
          </div>
          <?php
        }
            }
          }
           ?>



        </div>

        <div id="slider-control">
        <a class="left carousel-control" href="#itemslider" data-slide="prev"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>
        <a class="right carousel-control" href="#itemslider" data-slide="next"><i class="fa fa-chevron-right" aria-hidden="true"></i>
</a>
      </div>
      </div>

                    <script type="text/javascript">
                    //carrusel noticias
                    (function(){

  $('#itemslider').carousel({ interval: 3000 });
}());

(function(){
  $('.carousel-showmanymoveone .item').each(function(){
    var itemToClone = $(this);

    for (var i=1;i<6;i++) {
      itemToClone = itemToClone.next();


      if (!itemToClone.length) {
        itemToClone = $(this).siblings(':first');
      }


      itemToClone.children(':first-child').clone()
        .addClass("cloneditem-"+(i))
        .appendTo($(this));
    }
  });
}());

                    </script>

</div>
