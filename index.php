<!-- __________________________________________________________________PHP_____________________________________________  -->
<?php
date_default_timezone_set("America/La_Paz");
$conn = new mysqli("localhost", "root", "", "sis_admin_bd");
$fechaActual = date("Y-m-d H:i:s");
$sql2 = "SELECT
            a.id_publicacion,
            a.inicio_publicacion,
            a.fin_publicacion,
            b.objeto_contratacion,
            b.descripcion
    FROM pos_publicaciones a 
    LEFT JOIN pos_convocatorias b ON a.convocatoria_id = b.id_convocatoria
    WHERE fin_publicacion >= '$fechaActual' AND a.estado = 'A'";

$result = mysqli_query($conn, $sql2);

$sqlServicios = "SELECT
                        a.id_servicio,
                        a.nombre,
                        a.descripcion
                    FROM ges_servicios a
                    WHERE a.estado = 'A'";
$resServicios = mysqli_query($conn, $sqlServicios);
// var_dump($resServicios);die;
?>
<!-- __________________________________________________________________HTML5_____________________________________________  -->
<!DOCTYPE html>
<html lang="es">

<head>
  <!-- Required meta tags -->
  <link rel="icon" href="img/logostsa.png" type="image/png" />

  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <title>STS Bolivia Ltda </title>

  <!-- Bootstrap CSS online -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous" />
  <!-- <link rel="stylesheet" href=""> -->

  <!--Mis estilos-->
  <link rel="stylesheet" href="css/estilos.css" />
  <link rel="stylesheet" href="css/estilos2.css">


  <!-- vendor -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <script src="vendor/jquery/jquery.slim.min.js"></script>
  <script src="vendor/bootstrap/js/popper.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.js"></script>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" />
  <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css" />

  <!-- js CSS online-->
  <!-- CDN link used below is compatible with this example -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js">
  </script>


  <!-- font awesome -->
  <link href="fontawesome/css/all.css" rel="stylesheet" />
  <!-- <link href="css/landing-page.min.css" rel="stylesheet"> -->
  <script src="https://kit.fontawesome.com/a7cbfb8cb7.js" crossorigin="anonymous"></script>

  <!--load all styles -->

  <!-- Google fonts nunito online-->

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@700&display=swap" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/a7cbfb8cb7.js" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200&display=swap" rel="stylesheet" />

  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&family=MuseoModerno:wght@100&family=Nunito+Sans:wght@200&family=Rajdhani:wght@300&display=swap" rel="stylesheet" />
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet" />
</head>


<!-- _______________________________________________________Body__________________________________________________-->

<body>

  <!--==========================
      Header Section
    ============================-->

  <!-- _____________ header nav ----bar-info---- contacto directo__________________-->

  <div class="bar-info" id="inicio">
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light align-items-center justify-content-between w3-topnav one-info">
        <a><em class="fa-solid fa-phone"></em> : 2222222</a>
        <a><i class="fa-solid fa-envelope"></i> : contacto@sts.com.bo</a>
        <a><i class="fa-brands fa-whatsapp"></i> : 77747777</a>
      </nav>
    </div>
  </div>
  <!-- ________________________ header sticky-top_________________________________________________________________-->
  <!-- ________________________ header nav ----navbar-menu---- principal_________________________________________________ -->
  <header class="header sticky-top">
    <div id="MEB">

      <nav class="navbar navbar-menu navbar-expand-lg navbar-light   ">
        <a class="navbar-brand" href="#"><img id="logo" src="img/logostsb.png" class="logo" height="200px" alt="" />
          <span class="titulo"></span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fa fa-align-justify"></i>
        </button>

        <div class="collapse navbar-collapse capitalize navbar-menu-text" id="navbarNav" class="collapse navbar-collapse" id="collapsibleNavbar">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="#inicio">Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="institucional.html">Empresa</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="servicios.html">Servicios</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contactos.html">Contactos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link btm-mega-menu" class="btm-mega-menu" href="#"> Más &nbsp;<i class="fa fa-caret-down"></i></a>
            </li>

            <!-- <a class="nav-link" href="contactos.html">Contactos</a> -->
            <!-- <li><a href="#" class="btm-mega-menu"> Más &nbsp;<i class="fa fa-caret-down"></i></a></li> -->

            <!-- <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                    <li><a tabindex="-1" href="#">Adquisiciones</a></li>
                    <hr>
<li class="divider"></li> 
                    <li><a tabindex="-1" href="convocatorias.php">Convocatorias de trabajo</a></li>
                    <li class="divider"></li>
                  </ul> -->


            <!-- <li class="nav-item">
                <a class="nav-link" href="http://localhost/sis-admin/"><i class="puerta">
                    <i class="fa-solid fa-right-to-bracket"></i> INGRESAR
                  </i>
                </a>
              </li> -->
          </ul>
        </div>
      </nav>



      <!--========== Mega menu ====================================-->

      <div class="full-reset mega-menu">
        <div class="container">
          <div class="row">
            <div class="col-xs-12 col-sm-4">
              <!-- <span class="full-reset titles-mega-menu">Publicaciones</span>
              <ul class="list-unstyled full-reset">
                <li><a href="servicios.html"><i class="fa "></i>&nbsp;Servicios</a></li>
                <li><a href="#!"><i class="fa "></i>&nbsp;Clientes</a></li>
                <li><a href="#!"><i class="fa "></i>&nbsp;Proveedores</a></li>
                <li><a href="#!"><i class="fa "></i>&nbsp;Trabaja con Nosotros</a></li>
              </ul> -->
            </div>
            <div class="col-xs-12 col-sm-4">
              <span class="full-reset titles-mega-menu">PUBLICACIONES</span>
              <ul class="list-unstyled full-reset">
                <li><a href="#!"><i class="fa "></i>&nbsp;Convocatorias</a></li>

                <!-- <li><a href="#!"><i class="fa "></i>&nbsp;Enterprise</a></li>
                  <li><a href="#!"><i class="fa "></i>&nbsp;Seguridad</a></li> -->
              </ul>
            </div>
            <div class="col-xs-12 col-sm-4">
              <!-- <span class="full-reset titles-mega-menu">INFRAESTRUCTURA</span>
              <ul class="list-unstyled full-reset">
                <li><a href="oficinas.html">Nuestras Oficinas </a></li>
                <li><a href="#!"><i class="fa "></i>&nbsp;Instalaciones</a></li>
                <li><a href="#!"><i class="fa "></i>&nbsp;Parqueo Vehicular</a></li>
              </ul> -->
            </div>
          </div>
        </div>
        <i class="fa fa-times-circle btm-mega-menu close-mega-menu fa-2x"></i>
        <!--btn de cierre de megamenu (X)-->
      </div>

      <!--========================= Button  mobil =======================-->




    </div>
  </header>

  <!--==========================
      Section Carusel Slide
    ============================-->
  <section id="container-slider">
    <a href="javascript: fntExecuteSlide('prev');" class="arrowPrev"><i class="fas fa-chevron-circle-left"></i></a>
    <a href="javascript: fntExecuteSlide('next');" class="arrowNext"><i class="fas fa-chevron-circle-right"></i></a>
    <ul class="listslider">
      <li><a itlist="itList_0" href="#" class="item-select-slid"></a></li>
      <li><a itlist="itList_1" href="#"></a></li>
      <li><a itlist="itList_2" href="#"></a></li>
    </ul>

    <!-- _____img_______________-->
    <ul id="slider">
      <!-- 1 -->
      <li style="background-image: url('#'); z-index: 0; opacity: 1" id="particles-js">
        <!-- slider title -->
        <article>
          <div class="slider-title-1">
            <div class="slider-title-item">
              <h5>
                <br />STS Bolivia Ltda.
                <br />

                <p>
                  Sociedad de telecomunicaciones y servicios

                </p>
              </h5>
              <a href="#sec_tel_ver" class="btnSlider">Descubrir</a>
            </div>
          </div>
        </article>

        <!-- slider img-->
        <article>
          <div class="position-img-Index">
            <div class="position-img-item">
              <img src="img/Ant-microondas.png" alt="Logo" class="img-responsive" />
            </div>
          </div>
        </article>
      </li>

      <!-- 2 -->
      <li style="background-image: url('img/Group51.png')" id="particles-js-2">
        <!-- slider title -->
        <article>
          <div class="slider-title-1">
            <div class="slider-title-item">
              <h5>
                <br />Presencia a Nivel Nacional
                <br />
                <p>
                  En los 9 departamentos del país
                </p>
              </h5>
              <a href="#sec_tel_ver" class="btnSlider">Descubrir</a>
            </div>
          </div>
        </article>
        <!-- slider -->

        <article>
          <div class="position-img-Index-next">
            <div class="position-img-item-next">
              <img src="img/Group25.png" alt="Logo" class="img-responsive" />
            </div>
          </div>
        </article>
      </li>

      <!-- 3 -->
      <li style="background-image: url('img/Group26.png')" id="particles-js-3">
        <!-- slider title -->
        <article>
          <div class="slider-title-1">
            <div class="slider-title-item">
              <h5>
                <br />La mejor opcion en servicios
                <br />
                <p>
                  La calidad nos identifica
                </p>
              </h5>
              <a href="#sec_tel_ver" class="btnSlider">Descubrir</a>
            </div>
          </div>
        </article>
        <!-- slider caption-->
        <article>
          <div class="position-img-Index-next">
            <div class="position-img-item-next">
              <img src="img/antena-de-telefonia-movil.png" alt="Logo" class="img-responsive" />
            </div>
          </div>
        </article>
      </li>
    </ul>
  </section>

  <!-- ________________________________________ -->


  <!-- ____________________________afiche Presentacion________________________________________________________________________ -->

  <section class="page-section-press bg-press mb-0" id="nosotros">
    <div class="container text-center">
      <div class="row">
        <div class="col-lg-2"> </div>

        <div class="col-lg-8 col-md-12 col-sm-12 bg-press-L">
          <h5 class="texto-pre-title">STS Bolivia LTDA.</h5>

          <p class="press-text">
            Somos una empresa orientada a ofrecer Soluciones Integrales en el
            rubro de las Telecomunicaciones. Contamos con el respaldo y la
            garantía de más de 15 años de trabajo, tiempo en el que hemos
            alcanzado una óptima combinación de recursos humanos, tecnológicos
            y logísticos que nos permiten enfrentar los retos más exigentes en
            el mercado de las telecomunicaciones.
          </p>
        </div>
        <div class="col-lg-2"> </div>

      </div>
    </div>
  </section>

  <!--==========================
      Video
    ============================-->
  <section class="features-icons  text-center">
    <div class="video-presentacion" class="features-icons  text-center">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
              <div class="features-icons-icon d-flex aling-center">
                <i class="icon-control-play  m-auto text-primary" class="Picture-in-Picture"></i>
              </div>
              <h3 class="titles text-center">Una gran Empresa! </h3>
              <h3 class="titles text-center">Para Grandes Clientes!</h3>
            </div>

          </div>
          <div class="col-md-6 col-sm-8 col-xs-12">
            <video controls id="video">
              <source src="video/video1.mp4" type="video/mp4">
            </video>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!--==========================
      showcase
    ============================-->
  <!--==========================
      Services Section
    ============================-->
  <section class="showcase ">
    <div class="container-fluid">
      <header class="section-header pb-4 text-capitalize showcase-title">
        <h3>SERVICIOS </h3>
      </header>
      <div class="row about-container">
        <div class="col-lg-6  order-lg-2 text-white showcase-img" style="background-image: url('img/radio.png');">
        </div>

        <div class="col-lg-6 order-lg-1 my-auto showcase-text">

          <div class="box-content">
            <div class="box-list ">
              <h2>Ofrecemos soluciones integrales en:</h2>
              <ul>

                <?php
                while ($row = mysqli_fetch_array($resServicios)) {
                  $texto = $row['nombre'];
                  $codificacion = mb_detect_encoding($texto, "UTF-8, ISO-8859-1");
                  $texto = iconv($codificacion, "UTF-8", $texto);
                  echo "<li><span></span> $texto </li>";

                ?>


                <?php
                }
                ?>

              </ul>

            </div>


          </div>
        </div>


  </section>
  <!--==========================
      Services Section
    ============================-->

  <section id="services" class="section-portafolio-bg">
    <div class="container">
      <header class="section-header pb-4 text-capitalize portafolio-title">
        <h3>PORTAFOLIO DE SOLUCIONES</h3>
      </header>

      <div class="row">
        <div class="col-md-6 mb-4">
          <div class="card">
            <img src="img/G27.png" class="card-img-top" alt="..." />
            <a href="#">
              <div class="box">
                <div class="icon">
                  <i class="fa-solid fa-satellite" style="color: #ff689b"></i>
                </div>
                <h4 class="title">SECTOR TELECOMUNICACIONES</h4>
                <p class="description"></p>
              </div>
            </a>
          </div>
        </div>

        <div class="col-md-6 mb-4">
          <div class="card">
            <img src="img/G28.png" class="card-img-top" alt="..." />
            <a href="#">
              <div class="box">
                <div class="icon">
                  <i class="fa-solid fa-solid fa-land-mine-on" style="color: #3fcdc7"></i>
                </div>
                <h4 class="title">SECTOR CORPORATIVO</h4>
                <p class="description"></p>
              </div>
            </a>
          </div>
        </div>

        <div class="col-md-6 mb-4">
          <div class="card">
            <img src="img/G30.png" class="card-img-top" alt="..." />
            <a href="#">
              <div class="box">
                <div class="icon">
                  <i class="fa-solid fa-fire-flame-curved" style="color: #e9bf06"></i>
                </div>
                <h4 class="title">SECTOR HIDROCARBUROS</h4>
                <p class="description"></p>
              </div>
            </a>
          </div>
        </div>
        <div class="col-md-6 mb-4">
          <div class="card">
            <img src="img/G29.png" class="card-img-top" alt="..." />
            <a href="#">
              <div class="box">
                <div class="icon">
                  <i class="fa-solid fa-fan" style="color: #41cf2e"></i>
                </div>
                <h4 class="title">SECTOR ENERGETICO</h4>
                <p class="description"></p>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- #services -->

  <!--==========================
      Why Us Section
    ============================-->
  <section id="why-us">
    <div class="container">
      <header class="section-header pb-4 text-uppercase">
        <h3>Nuestra Contribución</h3>
      </header>

      <div class="row counters">
        <div class="col-lg-3 col-6 text-center">
          <div class="row pl-0 pl-lg-3">
            <div class="col-8 col-sm-7 text-right">
              <span data-toggle="counter-up">90</span>
            </div>
            <div class="col-4 col-sm-5 text-left px-0">
              <span>%</span>
            </div>
          </div>

          <p>
            Más del 90% de las redes de telecomunicaciones de larga distancia
            en Bolivia, tanto en microondas como por fibra óptica, han sido
            instaladas por STS.
          </p>
        </div>

        <div class="col-lg-3 col-6 text-center">
          <div class="row pl-0 pl-lg-3">
            <div class="col-8 col-sm-7 text-right">
              <span data-toggle="counter-up">70</span>
            </div>
            <div class="col-4 col-sm-5 text-left px-0">
              <span>%</span>
            </div>
          </div>

          <p>
            Más del 70% de toda la red de telefonía móvil en Bolivia ha sido
            instalada y actualmente es mantenida por STS
          </p>
        </div>

        <div class="col-lg-3 col-6 text-center">
          <span data-toggle="counter-up">4 Of.</span>
          <p>
            Cuatro oficinas principales en las ciudades de La Paz, Cochabamba,
            Santa Cruz y Tarija.
          </p>
        </div>

        <div class="col-lg-3 col-6 text-center">
          <span data-toggle="counter-up">7 M</span>
          <p>Beneficiando a más de 7 millones de usuarios.</p>
        </div>

        <div class="col-lg-3 col-6 text-center">
          <span data-toggle="counter-up"> 25 </span>
          <p>Más de 25 años de experiencia en Bolivia</p>
        </div>

        <div class="col-lg-3 col-6 text-center">
          <span data-toggle="counter-up">30 </span>
          <p>
            Subcentros de atención en toda la extensión del territorio
            boliviano.
          </p>
        </div>
        <div class="col-lg-3 col-6 text-center">
          <span data-toggle="counter-up">700</span>
          <p>
            Consolidada con más de 700 personas prestando servicios en todo el
            país.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!--________________________________________Clientes______________________________________________-->
  <div class="container-fluid clientes-bg">
    <div class="row">
      <div class="col-lg-12 col-12 text-center clientes-title">
        <h3 class=" text-uppercase">NUESTROS CLIENTES, NUESTRA
          MEJOR REFERENCIA</h3>
        <h2 class="clientes-title ">Operadores de redes de telecomunicaciones:</h2>
      </div>

      <ul class="col-lg-3 col-6">
        <li class="media">
          <img src="img/logo_entel.png" alt="Boat" class="media-object-img" />
          <div class="media-body">
          </div>
        </li>

      </ul>

      <div class="col-lg-3 col-6">
        <li class="media">
          <img src="img/tigo-logo-11.png" alt="Boat" class="media-object-img" />
          <div class="media-body">
          </div>
        </li>
      </div>

      <div class="col-lg-3 col-6">
        <li class="media">
          <img src="img/Viva-Bolivia-Logo.png" alt="Boat" class="media-object-img" />
          <div class="media-body">
          </div>
        </li>
      </div>

      <div class="col-lg-3 col-6">
        <li class="media">
          <img src="img/indice.png" alt="Boat" class="media-object-img" />
          <div class="media-body">
          </div>
        </li>
      </div>

      <div class="col-lg-3 col-6">
        <li class="media">
          <img src="img/cotas.jpg" alt="Boat" class="media-object-img" />
          <div class="media-body">
          </div>
        </li>
      </div>

      <div class="col-lg-3 col-6">
        <li class="media">
          <img src="img/att.png" alt="Boat" class="media-object-img" />
          <div class="media-body">
          </div>
        </li>
      </div>

      <div class="col-lg-3 col-6">
        <li class="media">
          <img src="img/dlp.png" alt="Boat" class="media-object-img" />
          <div class="media-body">
          </div>
        </li>
      </div>

      <div class="col-lg-3 col-6">
        <li class="media">
          <img src="img/ende.jpg" alt="Boat" class="media-object-img" />
          <div class="media-body">
          </div>
        </li>
      </div>

      <div class="col-lg-3 col-6">
        <li class="media">
          <img src="img/ypfb.png" alt="Boat" class="media-object-img" />
          <div class="media-body">
          </div>
        </li>
      </div>
      <div class="col-lg-12 clientes-title-2">
        <h2 class="clientes-title-2 text-center">
          Fabricantes de redes de telecomunicaciones como:</h2>
      </div>

      <div class="col-lg-3 col-6">
        <li class="media">
          <img src="img/inhw.png" alt="Boat" class="media-object-img" />
          <div class="media-body">
          </div>
        </li>
      </div>

      <div class="col-lg-3 col-6">
        <li class="media">
          <img src="img/Ericsson-Logo.png" alt="Boat" class="media-object-img" />
          <div class="media-body">
          </div>
        </li>
      </div>

      <div class="col-lg-3 col-6">
        <li class="media">
          <img src="img/Nokia.png" alt="Boat" class="media-object-img" />
          <div class="media-body">
          </div>
        </li>
      </div>

      <div class="col-lg-3 col-6">
        <li class="media">
          <img src="img/1200px-ZTE-logo.svg.png" alt="Boat" class="media-object-img" />
          <div class="media-body">
          </div>
        </li>
      </div>

    </div>
  </div>

  <!--____________________________________parallax_________________-->
  <section class="parallax">
    <h3> <a href="#"> </a>Estamos instalando equipos con tecnología 3G, 4G y LTE.</h3>
  </section>

  <div class="divider-general-footeru"></div>

  <section class="limpia"></section>
  <section>
    <!-- ======================footer================================================= -->
    <footer class="full-reset footer">
      <div class="full-reset " style="padding: 15px 0;">
        <div class="container">

          <div class="row">

            <div class="col-xs-12 col-sm-4">
              <h4 class="titles text-center">Visitenos</h4>
              <p class="text-center pfooter">
                Oficina Central, La Paz, Av. Mariscal Santa Cruz, Edificio Hansa, Piso 4.
              </p>
            </div>

            <div class="col-xs-12 col-sm-4">
              <h4 class="titles text-center">Contactenos</h4>
              <p class="text-center pfooter">Teléfono: 2406667 <br>Correo Electrónico: contactolpz@sts.com.bo </p>
            </div>

            <div class="col-xs-12 col-sm-4">
              <h4 class="titles subtitles-footer">Siguenos:</h4>
              <ul class="list-unstyled links-footer ">
                <li class="list-inline-item mr-3">
                  <a href="https://es-la.facebook.com/STSbo/">
                    <i class="fab fa-facebook fa-2x fa-fw"></i>
                  </a>
                </li>
                <li class="list-inline-item mr-3">
                  <a href="https://www.youtube.com/channel/UCHlFLkWMtfK4RRkSsXwtCGA">
                    <i class="fab fa-youtube fa-2x fa-fw"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a href="#">
                    <i class="fab fa-instagram fa-2x fa-fw"></i>
                  </a>
                </li>
              </ul>
            </div>

            <div class="col-lg-12 col-xs-12">
              <div class="full-reset footer-copyright" pfooter><i class="fa fa-copyright "></i> 2022 <a href="http://localhost/sis-admin/" style="text-decoration: none; color: #bce0f2;">Administrador</a> </div>
            </div>
          </div>

        </div>
      </div>
    </footer>
  </section>


  <!-- <script src="js/jquery-3.5.1.slim.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="bootstrap-4.6.0-dist/js/bootstrap.bundle.min.js"></script> -->
  <script src="js/particles.js"></script>
  <script src="js/app.js"></script>
  <script src="js/megamenu.js"></script>
  <script src="js/dinamicajs.js"></script>


  <!-- ============================= vendor     js======================================= -->

  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>