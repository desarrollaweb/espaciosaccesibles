<!DOCTYPE html>

<html lang="en">

  <?php include('head.php') ?>
	<script src='https://www.google.com/recaptcha/api.js'></script>
  <body>



    <?php include('top.php') ?>



    <div class="fr-banner fr-img-banner-contacto">

      <h2>CONTACTO</h2>

    </div>



    <section id="contacto" class="contact_area">

      <div class="container">

        <div class="row">

          <div class="col-md-6 col-sm-6 col-xs-12 wow fadeInUp">

            <div class="contact_address">

              <h3 style="color: #333;">CONTÁCTANOS</h3>

              <p style="color: #333;">Cualquier consulta no dude en llamarnos o escribirnos</p>

              <ul>

                <li style="color: #333;"><i class="fa fa-map-marker" style="color: #fff;"></i>Lima, Perú</li>

                <li style="color: #333;"><i class="fa fa-phone" style="color: #fff;"></i>(+511) 759-1268</li>

                <li style="color: #333;"><i class="fa fa-mobile" style="color: #fff;"></i>(+51) 994 316 275 / (+51) 963 101 888</li>

                <li style="color: #333;"><i class="fa fa-envelope" style="color: #fff;"></i>info@espacioaccesible.com / <span class="contact-email">proyectos@espacioaccesible.com</span> </li>

              </ul>

            </div>

          </div><!-- END COL -->

          <div class="col-md-6 col-sm-6 col-xs-12 wow fadeInRight">

            <div class="contact">

              <form id="contact-form" action="enviaform.php" method="post">

                <div class="row">

                  <div class="form-group col-md-12">

                    <input type="text" name="nombres" class="form-control" id="nombres" placeholder="Nombre" required>

                  </div>

                  <div class="form-group col-md-12">

                    <input type="email" name="email" class="form-control" id="email" placeholder="Email" required>

                  </div>

                  <div class="form-group col-md-12">
                    <textarea rows="6" name="mensaje" class="form-control" id="mensaje" placeholder="Tu mensaje" required></textarea>
                  </div>

                  <div class="form-group col-md-12">
                    <div class="g-recaptcha" data-sitekey="6Lek6kMUAAAAAFwiv98fIA5tzd0ZUxJ2ifkGUFQV"></div>
                  </div>


                  <div class="col-md-12">
                    <div class="actions">
				
                    	 <input name="ubicacion" type="hidden" value="Formulario de Contacto" id="ubicacion">
                         <input type="submit" value="Enviar mensaje" class="btn btn-lg btn-contact-bg" title="Submit Your Message!">

                    </div>

                  </div>

                </div>

              </form>

            </div>

          </div>

        </div>

      </div>

    </section>



    <section class="container-fluid no-pad-fluid">

      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d22070.491793306213!2d-77.0803691092201!3d-12.07454824553706!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c91c0f19df11%3A0x6a332a1c8a99047b!2sPueblo+Libre%2C+Per%C3%BA!5e0!3m2!1ses!2ses!4v1507928206195" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>

    </section>



    <?php include('footer.php') ?>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->

    <script src="bootstrap/js/bootstrap.min.js"></script>

    <!--SCRIPTS-->

    <script src="js/scripts.js"></script>

  </body>

</html>

