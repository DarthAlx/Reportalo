<div class="container" style="top: 200px; position: relative;">
  <?php if($exito){
    echo "<div class='alert alert-success alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Cerrar'><span aria-hidden='true'>&times;</span></button>Noticia publicada exitosamente!</div>";
 }
 ?>
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            <h2>Publicar noticia</h2>

                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <form action="<?php echo base_url() ?>index.php/News/noticia" method="post" class="form-horizontal">
                                  <div class="form-group">
                                      <div class="col-sm-12">
                                          <input type="text" name="titulonew" class="form-control" placeholder="Titulo" required>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <div class="col-sm-12">
                                          <input type="text" name="imagendest" class="form-control" placeholder="URL de Imagen destacada" required>
                                      </div>
                                  </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <textarea class="form-control ckeditor" name="contenido" rows="200" required placeholder="Contenidos"></textarea>
                                            <input type="hidden" name="publicadopor" value="<?=ucfirst($this->session->userdata('aliasuser'))?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="url" name="fuente" class="form-control" required placeholder="Fuente">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class=" col-lg-12 text-right">

                                          <button class="btn btn-primary" type="submit" id="botonguardar" style="float:left;">Publicar</button>

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>



            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">

                    <section class="panel">
                        <header class="panel-heading">
                            Subir archivos

                        </header>

                        <div class="panel-body">
                            <div class="form">
                                <form class="cmxform form-horizontal adminex-form" enctype="multipart/form-data"  method="POST" action="<?php echo base_url() ?>index.php/news/do_upload">
                                    <div class="form-group ">
                                        <label for="userfile" class="control-label col-lg-2">Archivo *</label>
                                        <div class="col-lg-10 col-md-10 col-sm-10">
                                            <div class="input-group">
                                              <input class=" form-control" id="userfile" name="userfile" type="file" size="20" required/>
                                              <span class="input-group-btn">
                                                <button class="btn btn-primary" type="submit">Subir</button>
                                              </span>
                                            </div>
                                            <span id="helpBlock" class="help-block">Maximo 2Mb (.pdf, .docx, .jpg, .png, .bmp, .zip, .rar) </span>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <p>
                              &nbsp;
                            </p>
                            <?php  if($files){?>
                            <div class="adv-table table-responsive">
                            <table class="display table table-bordered table-striped table-hover" id="dynamic-table">
                            <thead>
                            <tr>
                                <th>Vista</th>
                                <th>
                                  URL
                                </th>
                                <th>

                                </th>

                            </tr>
                            </thead>
                            <tbody>


                              <?php foreach($files as $file):?>
                            <tr>
                                <td>
                                  <a href="<?php echo base_url() ?>uploads/noticias/<?=$file?>" class="thumbnail" target="_blank">
                                    <img src="<?php echo base_url() ?>uploads/noticias/<?=$file?>" alt="..." style="max-width: 70px;">
                                  </a>
                                </td>
                                <td><?php echo anchor(base_url().'uploads/noticias/'.$file, base_url()."uploads/noticias/".$file);?> </td>
                                <td>
                                  <a style="float:right" href="<?php echo base_url() ?>index.php/news/delete/<?php echo $file?>"<i class="fa fa-minus-circle" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                            <?php endforeach; ?>

                            </tbody>
                            <tfoot>
                            <tr>
                              <th>Vista</th>
                              <th>
                                URL
                              </th>
                              <th>

                              </th>

                            </tr>
                            </tfoot>
                            </table>

                            </div>
                            <?php }?>

                        </div>
                    </section>

                </div>
            </div>



        </div>
