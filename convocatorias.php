<?php
    date_default_timezone_set("America/La_Paz");
    $conn = new mysqli("localhost","root","","sis_admin_bd");
    $fechaActual = date("Y-m-d H:i:s");
	  $sql2="SELECT
            a.id_publicacion,
            a.inicio_publicacion,
            a.fin_publicacion,
            b.objeto_contratacion,
            b.descripcion
    FROM pos_publicaciones a 
    LEFT JOIN pos_convocatorias b ON a.convocatoria_id = b.id_convocatoria
    WHERE fin_publicacion >= '$fechaActual' AND a.estado = 'A'";

    $result=mysqli_query($conn, $sql2);

    $sqlServicios = "SELECT
                        a.id_servicio,
                        a.nombre,
                        a.descripcion
                    FROM ges_servicios a
                    WHERE a.estado = 'A'";
    $resServicios=mysqli_query($conn, $sqlServicios);
    // var_dump($resServicios);die;
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <!-- Required meta tags -->
  <link rel="icon" href="img/logostsa.png" type="image/png" />
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>STS Yayo </title>

  <!-- Bootstrap CSS online -->
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous" /> -->
  <!-- <link rel="stylesheet" href=""> -->

  <!--Mis estilos-->
  <link rel="stylesheet" href="css/estilos.css" />

  <!--Estilos bootstrap-->
  <!-- <link rel="stylesheet" href="css/bootstrap.min.css" /> -->
  <link href="css/estilos2.css" rel="stylesheet">
  <!-- <link rel="stylesheet" href="data:text/css;charset=utf-8;base64,Y2xvdWRmbGFyZS1hcHBbYXBwLWlkPSJhLWJldHRlci1icm93c2VyIl0gewogIGRpc3BsYXk6IGJsb2NrOwogIGJhY2tncm91bmQ6ICM0NTQ4NGQ7CiAgY29sb3I6ICNmZmY7CiAgbGluZS1oZWlnaHQ6IDEuNDU7CiAgcG9zaXRpb246IGZpeGVkOwogIHotaW5kZXg6IDkwMDAwMDAwOwogIHRvcDogMDsKICBsZWZ0OiAwOwogIHJpZ2h0OiAwOwogIHBhZGRpbmc6IC41ZW0gMWVtOwogIHRleHQtYWxpZ246IGNlbnRlcjsKICAtd2Via2l0LXVzZXItc2VsZWN0OiBub25lOwogICAgIC1tb3otdXNlci1zZWxlY3Q6IG5vbmU7CiAgICAgIC1tcy11c2VyLXNlbGVjdDogbm9uZTsKICAgICAgICAgIHVzZXItc2VsZWN0OiBub25lOwp9CgpjbG91ZGZsYXJlLWFwcFthcHAtaWQ9ImEtYmV0dGVyLWJyb3dzZXIiXVtkYXRhLXZpc2liaWxpdHk9ImhpZGRlbiJdIHsKICBkaXNwbGF5OiBub25lOwp9CgpjbG91ZGZsYXJlLWFwcFthcHAtaWQ9ImEtYmV0dGVyLWJyb3dzZXIiXSBjbG91ZGZsYXJlLWFwcC1tZXNzYWdlIHsKICBkaXNwbGF5OiBibG9jazsKfQoKY2xvdWRmbGFyZS1hcHBbYXBwLWlkPSJhLWJldHRlci1icm93c2VyIl0gYSB7CiAgdGV4dC1kZWNvcmF0aW9uOiB1bmRlcmxpbmU7CiAgY29sb3I6ICNlYmViZjQ7Cn0KCmNsb3VkZmxhcmUtYXBwW2FwcC1pZD0iYS1iZXR0ZXItYnJvd3NlciJdIGE6aG92ZXIsCmNsb3VkZmxhcmUtYXBwW2FwcC1pZD0iYS1iZXR0ZXItYnJvd3NlciJdIGE6YWN0aXZlIHsKICBjb2xvcjogI2RiZGJlYjsKfQoKY2xvdWRmbGFyZS1hcHBbYXBwLWlkPSJhLWJldHRlci1icm93c2VyIl0gY2xvdWRmbGFyZS1hcHAtY2xvc2UgewogIGRpc3BsYXk6IGJsb2NrOwogIGN1cnNvcjogcG9pbnRlcjsKICBmb250LXNpemU6IDEuNWVtOwogIHBvc2l0aW9uOiBhYnNvbHV0ZTsKICByaWdodDogLjRlbTsKICB0b3A6IC4zNWVtOwogIGhlaWdodDogMWVtOwogIHdpZHRoOiAxZW07CiAgbGluZS1oZWlnaHQ6IDE7Cn0KCmNsb3VkZmxhcmUtYXBwW2FwcC1pZD0iYS1iZXR0ZXItYnJvd3NlciJdIGNsb3VkZmxhcmUtYXBwLWNsb3NlOmFjdGl2ZSB7CiAgLXdlYmtpdC10cmFuc2Zvcm06IHRyYW5zbGF0ZVkoMXB4KTsKICAgICAgICAgIHRyYW5zZm9ybTogdHJhbnNsYXRlWSgxcHgpOwp9CgpjbG91ZGZsYXJlLWFwcFthcHAtaWQ9ImEtYmV0dGVyLWJyb3dzZXIiXSBjbG91ZGZsYXJlLWFwcC1jbG9zZTpob3ZlciB7CiAgb3BhY2l0eTogLjllbTsKICBjb2xvcjogI2ZmZjsKfQo="> -->

  <!-- kk -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <script src="vendor/jquery/jquery.slim.min.js"></script>
  <!-- <script src="vendor/jquery/jquery.min.js" ></script> -->
  <script src="vendor/bootstrap/js/popper.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.js" ></script>
  <!-- <script src="vendor/bootstrap/js/bootstrap.min.js"></script> -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" />
  <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css" />
  <!-- js CSS online-->

  <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF"
    crossorigin="anonymous"></script> -->

  <!-- font awesome -->
  <link href="fontawesome/css/all.css" rel="stylesheet" />
  <link href="css/landing-page.min.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a7cbfb8cb7.js" crossorigin="anonymous"></script>

  <!--load all styles -->

  <!-- Google fonts nunito online-->

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@700&display=swap" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/a7cbfb8cb7.js" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200&display=swap" rel="stylesheet" />

  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link
    href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&family=MuseoModerno:wght@100&family=Nunito+Sans:wght@200&family=Rajdhani:wght@300&display=swap"
    rel="stylesheet" />
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet" />
</head>


<!-- _______________________________________________________Body__________________________________________________-->

<body>

  <!--==========================
      Header Section
    ============================-->

  <!-- _______________________________________ header nav ----bar-info---- contacto directo_____________________________-->

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
      <div class="">
        <nav class="navbar navbar-menu navbar-expand-lg navbar-light">
          <a class="navbar-brand" href="#"><img id="logo" src="img/logostsb.png" class="logo" height="200px" alt="" />
            <span class="titulo"></span>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-align-justify"></i>
          </button>

          <div class="collapse navbar-collapse capitalize navbar-menu-text" id="navbarNav">
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
                <!-- <a class="nav-link" href="contactos.html">Contactos</a> -->
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Publicaciones<b class="caret"></b></a>
                <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                  <li><a tabindex="-1" href="adquisiciones.php">Adquisiciones</a></li>
                  <hr>
                  <!-- <li class="divider"></li> -->
                  <li><a tabindex="-1" href="convocatorias.php">Convocatorias de trabajo</a></li>
                  <li class="divider"></li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="admin2/login.php"><i class="puerta">
                    <i class="fa-solid fa-right-to-bracket"></i> INGRESAR
                  </i>
                </a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </div>
  </header>

  <section class="section-portafolio-bg">
    <div class="container">
        <header class="section-header pb-4portafolio-title text-center">
            <h3>Requerimiento de Personal</h3>
        </header> <hr>
      <div class="row row-30">
          <?php
            // if(!empty(mysqli_fetch_array($result))){
              while($row=mysqli_fetch_array($result)){
          ?>
        <div class="col-sm-6 col-lg-4">
            <a class="thumbnail thumbnail-secondary" href="/sis-admin/Postulantes" target="_blank" style="background-image: url(img/personal3.jpeg)">
                <div class="thumbnail-caption">
                    <h4 class="thumbnail-heading"><?= $row['objeto_contratacion']; ?></h4>
                    <div class="thumbnail-inner">
                    <div class="thumbnail-content"><?= $row['descripcion']; ?></div>
                    <div class="thumbnail-icon fa-angle-right"></div>
                    </div>
                </div>
            </a>
        </div>
        <?php
            //   }
            // }else{
        ?>
          <!-- <div>
            No se encontro ninguna convocatoria.
          </div> -->
        <?php
            }
        ?>
      </div>
    </div>
  </section><br>

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
              <div class="full-reset footer-copyright" pfooter><i class="fa fa-copyright "></i> 2022 <a href="#"
                  style="text-decoration: none; color: #bce0f2;">Administrador</a> </div>
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
  <script src="js/app2.js"></script>
  <script src="js/app3.js"></script>

  <script src="js/dinamicajs.js"></script>


  <!-- ============================= vendor     js======================================= -->

  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>