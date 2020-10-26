<?php
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");    // Date in the past
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
header("Cache-Control: no-store, no-cache, must-revalidate");  // HTTP/1.1
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");                          // HTTP/1.0
include ("./mysql/dbconnect.php");
mysql_query("SET NAMES 'utf8'");
require './fx/functions.php';
extract($_REQUEST);
$path_img="./web/webimg/";
?>
<!DOCTYPE html>
<html lang="en">
  <?php include('head.php') ?>
	<script src='https://www.google.com/recaptcha/api.js'></script>
  <body style="position: relative;">

    <!--INICIO TOP-->



      <!--<header>



        <div class="navbar navbar-default navbar-fixed-top menu-top">



            <div class="container">



                <div class="row">



                <div class="navbar-header centro1">



                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">



                        <span class="sr-only">Toggle navigation</span>



                        <span class="icon-bar"></span>



                        <span class="icon-bar"></span>



                        <span class="icon-bar"></span>



                    </button>



                <a href="index.php" class="navbar-brand"><img src="img/logo1.png" alt="logo"></a>



                </div>



                </div>



                <div class="row">



                <div class="navbar-collapse collapse">



                  <nav>



                    <ul class="nav navbar-nav centro2">



                      <li><a class="page-scroll" href="index.php">INICIO</a></li>



                      <li><a class="page-scroll" href="#scroll-nosotros">NOSOTROS</a></li>



                      <li><a class="page-scroll" href="#scroll-servicios">SERVICIOS</a></li>



                      <li><a class="page-scroll" href="#scroll-productos">PRODUCTOS</a></li>



                      <li><a class="page-scroll" href="#scroll-blog">BLOG</a></li>



                      <li><a class="page-scroll" href="#scroll-contactos">CONTACTO</a></li>



                    </ul>



                  </nav>



                </div>



                </div>



            </div>



        </div>



      </header>-->



    <!--FIN TOP-->







    <?php include('top.php') ?>







    <!--INICIO REDES LATERAL-->



    <!--<div class="redes-lateral">



      <div class="lateral-social">



      <ul>



          <li><a class="footer_facebook  wow bounceInDown" data-wow-delay=".1s" href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a></li>



          <li><a class="footer_twitter wow bounceInDown" data-wow-delay=".2s" href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a></li>



          <li><a class="footer_google wow bounceInDown" data-wow-delay=".3s" href="#" data-toggle="tooltip" data-placement="top" title="Google Plus"><i class="fa fa-google-plus"></i></a></li>



          <li><a class="footer_linkedin wow bounceInDown" data-wow-delay=".4s" href="#" data-toggle="tooltip" data-placement="top" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>



          <li><a class="footer_youtube wow bounceInDown" data-wow-delay=".5s" href="#" data-toggle="tooltip" data-placement="top" title="Youtube"><i class="fa fa-youtube"></i></a></li>



          <li><a class="footer_skype wow bounceInDown" data-wow-delay=".6s" href="#" data-toggle="tooltip" data-placement="top" title="Skype"><i class="fa fa-skype"></i></a></li>



      </ul>



      </div>



    </div>-->



    <!--FIN REDES LATERAL-->







    <!--INICIO SLIDER BOOPSTRAT-->



      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">



        <!-- Indicators -->



        <ol class="carousel-indicators">



          <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>



          <li data-target="#carousel-example-generic" data-slide-to="1"></li>



          <li data-target="#carousel-example-generic" data-slide-to="2"></li>



          <li data-target="#carousel-example-generic" data-slide-to="3"></li>



          <li data-target="#carousel-example-generic" data-slide-to="4"></li>



        </ol>







        <!-- Wrapper for slides -->



        <div class="carousel-inner" role="listbox">



          <div class="item active">



            <img src="img/banner2osc.jpg">



            <div class="carousel-caption fr-medio">



              <h1>ARQUITECTURA, ACCESIBILIDAD Y<br>DISEÑO UNIVERSAL</h1>



              <a href="serv2.php" class="btn-celeste">VER MÁS</a>



              <a href="contacto.php" class="btn-blanco">INFORMACIÓN</a>



            </div>



          </div>



          <div class="item">



            <img src="img/banner3osc.jpg">



            <div class="carousel-caption fr-medio">



              <h1>ACCESIBILIDAD EN EL<br>TRANSPORTE</h1>



              <a href="serv4.php" class="btn-celeste">VER MÁS</a>



              <a href="contacto.php" class="btn-blanco">INFORMACIÓN</a>



            </div>



          </div>



          <div class="item">



            <img src="img/banner4osc.jpg">



            <div class="carousel-caption fr-medio">



              <h1>ACCESIBILIDAD EN LA COMUNICACIÓN Y LA INFORMACIÓN</h1>



              <a href="serv8.php" class="btn-celeste">VER MÁS</a>



              <a href="contacto.php" class="btn-blanco">INFORMACIÓN</a>



            </div>



          </div>



          <div class="item">



            <img src="img/banner5osc.jpg">



            <div class="carousel-caption fr-medio">



              <h1>TURISMO ACCESIBLE</h1>



              <a href="serv7.php" class="btn-celeste">VER MÁS</a>



              <a href="contacto.php" class="btn-blanco">INFORMACIÓN</a>



            </div>



          </div>



          <div class="item">



            <img src="img/banner6osc.jpg">



            <div class="carousel-caption fr-medio">



              <h1>ACCESIBILIDAD WEB<br>

              Y TECNOLOG&Iacute;AS ACCESIBLES</h1>



              <a href="serv3.php" class="btn-celeste">VER MÁS</a>



              <a href="accesibilidad-web.php" class="btn-blanco">INFORMACIÓN</a>



            </div>



          </div>



        </div>







        <!-- Controls -->



        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">



          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>



          <span class="sr-only">Previous</span>



        </a>



        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">



          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>



          <span class="sr-only">Next</span>



        </a>



      </div>



    <!--FIN SLIDER BOOPSTRAT-->







    <!--INICIO NOSOTROS-->



      <div id="scroll-nosotros"></div>



      <section id="nosotros">



        <div class="container">



          <div class="row">



            <div class="col-md-4 col-md-offset-4">



              <a href="nosotros.php" style="text-decoration: none;">



              <div class="caja border-box">



                <h2 class="title-index">NOSOTROS</h2>



              </div>



              <!--<div class="linea"></div>-->



              </a>



            </div>



          </div>



          <div class="row">



            <div class="col-md-10 col-md-offset-1">



              <p class="justificar comprimir-first">Somos un equipo de profesionales formado por Arquitectos, Ingenieros, Especialistas en Comunicación y Profesionales en Gestión de Proyectos con especialización en Accesibilidad y Diseño Universal para Todos, comprometidos con nuestros objetivos para el desarrollo de proyectos  que consideran a la PERSONA y su entorno como un TODO y así conseguir una sociedad en la que todos los ciudadanos sin exclusión, puedan desenvolverse de una manera más autónoma y en completa libertad.</p>



            </div>



          </div>



          <div class="row">



            <div class="col-md-6">



              <div class="row mivi comprimir"><span>1</span><h3>MISIÓN</h3></div>



              <div class="row comprimir">



                <p class="text-nosotros justificar">Nuestra misión es ser agentes de cambio para suprimir las barreras existentes en las ciudades y entornos para una sociedad más accesible, promoviendo la independencia, la igualdad para todos, el trato adecuado y la correcta comunicación de las personas, brindando soluciones donde todos podamos acceder sin dificultades, convirtiendo al Perú en un país más inclusivo.</p>



              </div>



            </div>



            <div class="col-md-6">



              <div class="row mivi comprimir"><span>2</span><h3>VISIÓN</h3></div>



              <div class="row comprimir">



                <p class="text-nosotros justificar">Ser promotores de la Accesibilidad y Diseño Universal en Perú y el mundo, desarrollando proyectos que favorezcan la igualdad de oportunidades, la no discriminación y que mejoren la calidad de vida de todas las personas.</p>



              </div>



            </div>



          </div>



        </div>



      </section>



    <!--FIN NOSOTROS-->







    <!--INICIO ESPACIO ACCESIBLE-->



    <section id="espacc">



      <div class="container-fluid no-pad-fluid">



        <div class="fr-img-con fr-espacc">



          <div class="container">



          <div class="row">



            <div class="col-md-6 col-md-offset-3" align="center">



              <!--<div class="foco">



                <i class="fa fa-lightbulb-o" aria-hidden="true"></i>



              </div>-->



              <h2 class="title-valores-index">NUESTROS VALORES</h2>



              <!--<div class="linea-blanca"></div>-->



            </div>



          </div>



          <div class="row esp-cuadrex">



              <div class="col-md-2 col-md-offset-1">



                <div class="cuadrex">



                  <picture>



                      <source media="(max-width: 768px)" srcset="img/iconos/responsabilidad-b.png">



                      <img src="img/iconos/responsabilidad.png">



                  </picture>



                  <p>RESPONSABILIDAD</p>



                </div>



              </div>



              <div class="col-md-2">



                <div class="cuadrex">



                  <picture>



                      <source media="(max-width: 768px)" srcset="img/iconos/compromiso-b.png">



                      <img src="img/iconos/compromiso.png">



                  </picture>



                  <p>COMPROMISO</p>



                </div>



              </div>



              <div class="col-md-2">



                <div class="cuadrex">



                  <picture>



                      <source media="(max-width: 768px)" srcset="img/iconos/innovacion-b.png">



                      <img src="img/iconos/innovacion.png">



                  </picture>



                  <p>INNOVACIÓN</p>



                </div>



              </div>



              <div class="col-md-2">



                <div class="cuadrex">



                  <picture>



                      <source media="(max-width: 768px)" srcset="img/iconos/sostenibilidad-b.png">



                      <img src="img/iconos/sostenibilidad.png">



                  </picture>



                  <p>SOSTENIBILIDAD</p>



                </div>



              </div>



              <div class="col-md-2">



                <div class="cuadrex">



                  <picture>



                      <source media="(max-width: 768px)" srcset="img/iconos/trabajoequipo-b.png">



                      <img src="img/iconos/trabajoequipo.png">



                  </picture>



                  <p>TRABAJO EN EQUIPO</p>



                </div>



              </div>



              <!--<div class="col-md-2">



                <div class="cuadrex">



                  <p>TRABAJO EN EQUIPO</p>



                </div>



              </div>



              <div class="col-md-2">



                <div class="cuadrex">



                  <p class="cuadrex-top">EMPATÍA</p>



                </div>



              </div>-->



          </div>



          </div>



        </div>



      </div>



    </section>



    <!--FIN ESPACIO ACCESIBLE-->







    <!--INICIO SERVICIOS-->



    <div id="scroll-servicios"></div>



    <section id="servicios">



      <div class="container">



        <div class="row">



            <div class="col-md-4 col-md-offset-4">



              <a href="servicios.php" style="text-decoration: none;">



              <div class="caja border-box">



                <h2 class="title-index">SERVICIOS</h2>



              </div>



              </a>



            </div>



          </div>



         <!--



          <div class="row">



            <div class="col-md-10 col-md-offset-1">



              <p class="justificar comprimir in-serv-2">ESPACIO ACCESIBLE le brinda la posibilidad de solucionar todas las dificultades que encuentra una persona en su día a día, asesorando y ejecutando proyectos con un planteamiento de mejora y de cambio a nivel urbanístico, en la construcción de viviendas, edificios y locales de uso público, en el transporte adaptado en todas sus versiones y facilitando los medios para comunicarse escrita, visual, sensorial y auditivamente, de está forma estamos consiguiendo una SOCIEDAD PARA TODOS con soluciones de diseño normalizado, que pasaran desapercibidas para la inmensa mayoría de personas pero que a lo largo de nuestra vida la encontraremos con facilidad.</p>



            </div>



          </div>



      -->



          <div class="row">



            <div class="col-md-4 col-sm-4 col-xs-12 img-servicios-index">



              <img src="img/lateral2.jpg" class="img-responsive" alt="">



            </div>







            <div class="col-md-8 col-sm-8 col-xs-12 body-servicios-index">



                <div class="according-area">



                  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">







                  <div class="panel panel-default">



                      <div class="panel-heading" role="tab" id="headingOne">



                        <h4 class="panel-title">



                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">



                          ESTUDIOS Y CONSULTORÍA EN ACCESIBILIDAD



                        </a>



                        </h4>



                      </div>



                      <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">



                        <div class="panel-body">



                          <p>ESPACIO ACCESIBLE ofrece sus servicios de diagnóstico, estudio, consultoría y auditoría para el diseño, planificación, revisión y gestión de proyectos en el ámbito de la Accesibilidad Universal y Diseño para Todos en los espacios urbanos, edificaciones, redes de transporte, comunicación y sistemas de información.



                          “La posibilidad de poder intervenir y hacer presente la accesibilidad en la fase inicial de un proyecto supone una ventaja en los tiempos de ejecución, los costes, integrando la accesibilidad dentro del diseño inicial“</p>



                          <a class="btn btn-lg btn-blog-bg2" href="serv1.php">Leer más</a>



                        </div>



                      </div>



                    </div><!--- END PANEL -->







                    <div class="panel panel-default">



                      <div class="panel-heading" role="tab" id="headingTwo">



                        <h4 class="panel-title">



                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">



                          ACCESIBILIDAD UNIVERSAL Y ARQUITECTÓNICA



                        </a>



                        </h4>



                      </div>



                      <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">



                        <div class="panel-body">



                          <p>La accesibilidad es el resultado de una interacción positiva entre los elementos que configuran un entorno determinado y la persona que, independiente de sus limitaciones funcionales interacciona con los mismos. En el campo de la Accesibilidad Universal, como en cualquier otro del conocimiento humano, se trata de avanzar aplicando los parámetros y criterios de diseño consensuados y modificándolos para mejorar cuando la experiencia demuestre que es necesario, a la par que se va investigando sobre lo desconocido.</p>



                          <a class="btn btn-lg btn-blog-bg2" href="serv2.php">Leer más</a>



                        </div>



                      </div>



                    </div><!--- END PANEL -->







                    <div class="panel panel-default">



                      <div class="panel-heading" role="tab" id="headingThree">



                        <h4 class="panel-title">



                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">



                          ACCESIBILIDAD EN LA COMUNICACIÓN E INFORMACIÓN



                        </a>



                        </h4>



                      </div>







                      <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">



                        <div class="panel-body">



                          <p>Cuando se habla de Accesibilidad, muchas veces se relaciona con el urbanismo, la edificación y transporte; porque estos ámbitos para algunos son los más visibles, sin embargo la accesibilidad absorbe más ámbitos, uno de ellos es la Comunicación y la Información, y ESPACIO  ACCESIBLE, lo considera dentro de sus cuatro ejes principales.</p>



                          <a class="btn btn-lg btn-blog-bg2" href="serv8.php">Leer más</a>



                        </div>



                      </div>



                    </div><!--- END PANEL -->







                    <div class="panel panel-default">



                      <div class="panel-heading" role="tab" id="headingThree-2">



                        <h4 class="panel-title">



                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" data-target="#collapseThree-2" aria-expanded="false" aria-controls="collapseThree-2">



                          ACCESIBILIDAD EN TECNOLOGÍAS DE LA INFORMACIÓN



                        </a>



                        </h4>



                      </div>







                      <div id="collapseThree-2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">



                        <div class="panel-body">



                          <p>La Accesibilidad Tecnológica es un derecho, por tanto desarrollamos propuestas adaptándonos a todas las situaciones y condiciones de las personas, incorporando la accesibilidad en todos los ámbitos posibles, con el fin de facilitar el acceso a ellas y mejorar la calidad de vida de todos.</p>



                          <a class="btn btn-lg btn-blog-bg2" href="serv3.php">Leer más</a>



                        </div>



                      </div>



                    </div><!--- END PANEL -->







                    <div class="panel panel-default">



                      <div class="panel-heading" role="tab" id="headingThree">



                        <h4 class="panel-title">



                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">



                          ACCESIBILIDAD EN EL TRANSPORTE



                        </a>



                        </h4>



                      </div>



                      <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">



                        <div class="panel-body">



                          <p>La Accesibilidad en el transporte es un <strong>derecho que todas las personas tienen</strong>, poder desplazarse libremente en cualquier medio de transporte, ya sea en autobuses, vehículos propios, trenes, metros, autocares, avión, barco, etc., para ello todas las empresas y organismos implicados en el transporte deben tener esto como un principio, y que es nada menos que cuidar su accesibilidad para que una persona con diversidad funcional tenga plena movilidad para viajar a donde quiera o desee.</p>



                          <a class="btn btn-lg btn-blog-bg2" href="serv4.php">Leer más</a>



                        </div>



                      </div>



                    </div><!--- END PANEL -->







                    <div class="panel panel-default">



                      <div class="panel-heading" role="tab" id="headingThree">



                        <h4 class="panel-title">



                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">



                          PROYECTOS DE ACCESIBILIDAD



                        </a>



                        </h4>



                      </div>



                      <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">



                        <div class="panel-body">



                          <p>La implementación de la accesibilidad en todo producto, servicio, edificación, en la adecuación de puestos laborales, en nuestra vivienda, y en nuestra vida diaria ayudan a mejorar la calidad de vida de todas las personas, especialmente de las personas con discapacidad.</p>



                          <a class="btn btn-lg btn-blog-bg2" href="serv5.php">Leer más</a>



                        </div>



                      </div>



                    </div><!--- END PANEL -->







                    <div class="panel panel-default">



                      <div class="panel-heading" role="tab" id="headingThree">



                        <h4 class="panel-title">



                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">



                          CAPACITACIÓN Y CONCIENTIZACIÓN



                        </a>



                        </h4>



                      </div>



                      <div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">



                        <div class="panel-body">



                          <p>La capacitación contribuye al desarrollo personal y profesional, lo cual permite contar con personas cualificadas y productivas para el desempeño de nuestras actividades personales y profesionales.</p>



                          <a class="btn btn-lg btn-blog-bg2" href="serv6.php">Leer más</a>



                        </div>



                      </div>



                    </div><!--- END PANEL -->







                    <div class="panel panel-default">



                      <div class="panel-heading" role="tab" id="headingThree">



                        <h4 class="panel-title">



                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">



                          TURISMO ACCESIBLE



                        </a>



                        </h4>



                      </div>



                      <div id="collapseSeven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">



                        <div class="panel-body">



                          <p>El Turismo Accesible o Turismo para Todos no solo contempla la eliminación de barreras físicas, movilidad y  transporte, sensoriales o de la comunicación, sino que tiene por finalidad lograr que los entornos, productos y servicios turísticos puedan ser disfrutados en igualdad de condiciones por cualquier persona con o sin discapacidad.</p>



                          <a class="btn btn-lg btn-blog-bg2" href="serv7.php">Leer más</a>



                        </div>



                      </div>



                    </div><!--- END PANEL -->







                    <div class="panel panel-default">



                      <div class="panel-heading" role="tab" id="headingThree">



                        <h4 class="panel-title">



                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" data-target="#collapseEigth" aria-expanded="false" aria-controls="collapseEigth">



                          ACCESIBILIDAD WEB



                        </a>



                        </h4>



                      </div>



                      <div id="collapseEigth" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">



                        <div class="panel-body">



                          <p>Desarrollamos proyectos de Accesibilidad WEB, ofreciendo  nuestra herramienta ACCEDES que mejora la accesibilidad y usabilidad de su página web de manera sencilla, cumpliendo con los estándares y recomendaciones W3C.</p>



                          <a class="btn btn-lg btn-blog-bg2" href="serv9.php">Leer más</a>



                        </div>



                      </div>



                    </div><!--- END PANEL -->







                  </div><!--- END PANEL GROUP-->



                </div><!--- END ACCORDION AREA -->



            </div>



          </div>



      </div>



    </section>



    <!--FIN SERVICIOS-->







    <!--INICIO PRODUCTOS-->



    <div id="scroll-productos"></div>



    <section id="productos">



      <div class="container">



          <div class="row">



            <div class="col-md-4 col-md-offset-4">



              <a href="productos.php" style="text-decoration: none;">



              <div class="caja border-box">



                <h2 class="title-index">PRODUCTOS</h2>



              </div>



              </a>



            </div>



          </div>



          <!--



          <div class="row">



            <div class="col-md-10 col-md-offset-1">



              <p class="justificar comprimir">Somos la única empresa en Perú interesada en solucionar los problemas de accesibilidad tanto en entornos, productos y servicios que posibiliten el acceso, la movilidad, la comunicación y la información adecuada; así como la utilización y comprensión de los bienes y servicios que dispone la sociedad en condiciones de igualdad, autonomía y seguridad de todas las personas, especialmente de las personas con discapacidad.</p>



            </div>



          </div>



      -->



          <div class="row espprod">



            <a href="accesibilidad-web.php#aqui">



            <div class="col-md-4 prod">



              <img src="img/iconos/accesibilidadweb.png">



              <h4>Accesibilidad Web</h4>



              <p>Desarrollamos y gestionamos proyectos de Accesibilidad WEB...</p>



            </div>



            </a>



            <a href="planos-hapticos.php#aqui">



            <div class="col-md-4 prod">



              <img src="img/iconos/planoshapticos.png">



              <h4>Planos Hapticos o Tactovisuales</h4>



              <p>Facilitan la mejor orientación en ciudades y entornos...</p>



            </div>



            </a>



            <a href="rampas-portatiles.php#aqui">



            <div class="col-md-4 prod">



              <img src="img/iconos/rampasportatiles.png">



              <h4>Rampas Portátiles</h4>



              <p>Ofrecemos el diseño y fabricación de rampas fijas...</p>



            </div>



            </a>



          </div>



          <div class="row espprod2">



            <a href="braille.php">



            <div class="col-md-4 prod">



              <img src="img/iconos/braile.png">



              <h4>Placa y Señalética Braille</h4>



              <p>Espacio Accesible ofrece soluciones de señalización...</p>



            </div>



            </a>



            <a href="paneles-interpretativos.php#aqui">



            <div class="col-md-4 prod">



              <img src="img/iconos/panelesinterpretativos.png">



              <h4>Paneles Interpretativos</h4>



              <p>Informan de las características ambientales, animales...</p>



            </div>



            </a>



            <a href="soluciones-tecnologicas.php">



            <div class="col-md-4 prod">



              <img src="img/iconos/disenosolucionestecnologicas.png">



              <h4>Soluciones Tecnológicas Accesibles</h4>



              <p>Chef Voice, Web W3C, Map’s Voice</p>



            </div>



            </a>



          </div>



      </div>



    </section>



    <!--FIN PRODUCTOS-->







    <!--INICIO DISTINTIVO EA-->



    <section id="ea">



      <div class="container">



        <div class="row">



            <div class="col-md-4 col-md-offset-4">



              <div class="caja border-box">



                <h2 class="title-index">DISTINTIVO EA</h2>



              </div>



            </div>



        </div>



        <div class="row">



          <div class="col-md-3 col-md-offset-2">



            <img src="img/ea2.png" class="img-responsive img-ea">



          </div>



          <div class="col-md-5">



            <p class="center fs-ea1"><strong>RECIBE NUESTRO DISTINTIVO "EA" Y SE PARTE DE UNA RED DE EMPRESAS E INSTITUCIONES ACCESIBLES</strong></p>



            <p class="center fs-ea2 text-ea">Nos basamos en las normativas peruanas e internacionales. Rompe las barreras arquitectónicas que pueden existir en tu empresa e institución, facilitando la comunicación interna y creando un ambiente más inclusivo.</p>



          </div>



        </div>



      </div>



    </section>



    <!--FIN DISTINTIVO EA-->







    <!--INICIO NUESTRO BLOG-->



    <div id="scroll-blog"></div>



    <section id="blog" style="background: #f7f7f7;">



      <div class="container">



          <div class="row">



            <div class="col-md-4 col-md-offset-4">



              <a href="blog.php" style="text-decoration: none;">



              <div class="caja border-box">



                <h2 class="title-index">NUESTRO BLOG</h2>



              </div>



              </a>



            </div>



          </div>



          <div class="row">



            <div class="col-md-10 col-md-offset-1">



              <p class="justificar comprimir">Ha llegado el momento de modificar la estructura urbanística, edificatoria y del transporte en nuestras ciudades, en nuestro país, potenciando las medidas que facilitan la comunicación, la orientación y la información, contribuyendo con ello a que todas las personas disfruten de un confort y calidad de los servicios ofrecidos facilitando el desplazamiento, la máxima autonomía y la integración de todas las personas, eliminando la discriminación y aislamiento, porque pensando en Accesibilidad pensamos en Todos.</p>



            </div>



          </div>



          <div class="row espblog">



<?php



$load_query__="SELECT a.*,b.nom_area_noti FROM noticias a LEFT JOIN areas_noticias b ON a.id_area_noti=b.id WHERE !ISNULL(a.id_noticia) ORDER BY a.fecha DESC LIMIT 3";



$query__=mysql_query($load_query__) or die(mysql_error());



while ($res__=mysql_fetch_array($query__)){



	$id_noticia__=trim($res__[id_noticia]);



	$titulo__=trim($res__[titulo]);



	$txt__=trim($res__[texto]);



	$texto__=substr(strip_tags($txt__),0,120);	



	$nom_area_noti__=trim($res__[nom_area_noti]);



	$imagen__=trim($res__[imagen]);



	if (strlen($imagen__)<=5){



		$imagen__="img_default.jpg";



	}



	$pimagen__=$path_img.$imagen__;	



	$fecha=$res__[fecha];



	$dia=format_fech($fecha,"d");



	$nmes=format_fech($fecha,"M");



	$ano=format_fech($fecha,"Y");	



	$URL_w="detalle-blog.php?id=".$id_noticia__;



  echo '<div class="col-md-4 col-sm-12 col-xs-12">



              <article class="blog-post">



                <div class="post-img"> <img src="'.$pimagen__.'" alt=""></div>



                <h4>'.$titulo__.'</h4>



                <ul class="post-info">



                  <li> <i class="fa fa-bookmark-o"></i>'.$nom_area_noti__.'</li>



                  <li> <span class="date font-crimson">'.$dia.' de '.$nmes.'</span> </li>



                </ul>



                <p>'.$texto__.'...</p>



                <a class="btn btn-lg btn-blog-bg" href="'.$URL_w.'">Leer más</a>



              </article>



            </div>';



}



?>



           



          </div>



      </div>



    </section>



    <!--INICIO NUESTRO BLOG-->







    <!--INICIO CARRUSEL-->



    <!--<div id="scroll-alianzas"></div>



    <div class="partner-logo section-padding">



      <div class="container">



        <div class="row">



          <div class="col-md-12">



            <iframe style="background: transparent  none repeat scroll 0% 0%"scrolling="no" src="carrusel.php" width="100%" height="58" allowtransparency=0 frameborder=0></iframe>



          </div>



        </div>



      </div>



    </div>-->



    <!--FIN CARRUSEL-->







    <!--INICIO CONTACTOS-->



    <div id="scroll-contactos"></div>



    <section id="contacto" class="contact_area fr-img-cont">



      <div class="container">



        <div class="row">



          <div class="col-md-6 col-sm-6 col-xs-12 wow fadeInUp">



            <div class="contact_address">



              <h3>CONTÁCTANOS</h3>



              <p>Cualquier consulta no dude en llamarnos o escribirnos</p>



              <ul>



                <li><i class="fa fa-map-marker"></i>Lima, Perú</li>



                <li><i class="fa fa-phone"></i>(+511) 759-1268</li>



                <li><i class="fa fa-mobile"></i>(+51) 994 316 275 / (+51) 963 101 888</li>



                <li><i class="fa fa-envelope"></i>info@espacioaccesible.com /<span class="span-email"> proyectos@espacioaccesible.com</span> </li>



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



    <!--FIN CONTACTOS-->



    <!--INICIO MAPA-->



    <section class="container-fluid no-pad-fluid">



      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d22070.491793306213!2d-77.0803691092201!3d-12.07454824553706!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c91c0f19df11%3A0x6a332a1c8a99047b!2sPueblo+Libre%2C+Per%C3%BA!5e0!3m2!1ses!2ses!4v1507928206195" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>



    </section>



    <!--FIN MAPA-->







    <!--INICIO SUSCRIPCION-->



    <section class="newsletter_form section-padding">



      <div class="container">



        <div class="row">



          <div class="col-md-8 col-md-offset-2 col-sm-12 wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.1s" data-wow-offset="0">



            <div class="newsletter_title text-center">



              <h4>SUSCRÍBETE PARA OBTENER LAS ÚLTIMAS NOTICIAS Y NOVEDADES</h4>



              <!-- START MAILCHIMP SIGNUP FORM -->



              <div class="signup">



              <form action="enviaform.php" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" novalidate>



                  <div class="input-group input-group-lg newsletter">



                    <input type="email" name="correo" id="correo" class="form-control yesyes" style="background: #fff;" placeholder="Tu dirección e-mail">



                    <span class="input-group-btn">



                      <input name="_ubicacion" type="hidden" value="Formulario de SUSCRIBETE" id="_ubicacion">



					<input name="email_enviado" type="hidden" value="buzon@espacioaccesible.com" id="email_enviado">                              



                      <button type="submit" name="subscribe" class="btn-newsletter-bg">¡SUSCRÍBETE!</button>



                    </span>



                  </div>







                  <div id="mce-responses">



                    <div class="response" id="mce-error-response" style="display:none"></div>



                    <div class="response" id="mce-success-response" style="display:none"></div>



                  </div>



              </form>



              </div>



              <!-- END MAILCHIMP SIGNUP FORM -->



            </div>



          </div><!--- END COL -->



        </div><!--- END ROW -->



      </div><!--- END CONTAINER -->



    </section>



    <!--FIN SUSCRIPCION-->







    <?php include('footer.php') ?>







    <!-- START BACK TO TOP



    <a href="javascript:void(0);" id="scroll" title="Scroll to Top" style="display: none;">Top<span></span></a>



     END BACK TO TOP -->







    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>



    <!-- Include all compiled plugins (below), or include individual files as needed -->



    <script src="bootstrap/js/bootstrap.min.js"></script>



    <!--SCRIPTS-->



    <script src="js/scripts.js"></script>







  </body>



</html>



