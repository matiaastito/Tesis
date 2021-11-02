<!DOCTYPE html>
<html lang="en">

<head>
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <script href="lib/bootstrap/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="perfil.css" type="text/css">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body style="background-color:#7B68EE">

  <header>

    <div class="px-3 py-2 bg-dark text-white">
      <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
          <a href="/" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
            <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
              <use xlink:href="#bootstrap" />
            </svg>
          </a>

          <! –– Barra de arriba ––>
            <li>
              <a href="#" class="container d-flex flex-wrap justify-content-center">
                <form action="" class="col-12 col-lg-auto mb-2 mb-lg-0 me-lg-auto">
                  <input type="submit" class="logo" value="">
              </a>
            </li>
            <li>
              <a href="#" class="container d-flex flex-wrap justify-content-center">
                <form class="col-12 col-lg-auto mb-2 mb-lg-0 me-lg-auto">
                  <input type="search" class="searchBar" placeholder="Buscar..." aria-label="Search">
              </a>
            </li>
            <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
              <li>
                <a href="#" class="nav-link text-white">
                  <svg class="bi d-block mx-auto mb-1" width="24" height="24">
                    <use xlink:href="#home" />
                  </svg>
                  Propuestas
                </a>
              </li>
              <li>
                <a href="#" class="nav-link text-white">
                  <svg class="bi d-block mx-auto mb-1" width="24" height="24">
                    <use xlink:href="#speedometer2" />
                  </svg>
                  Notificaciones
                </a>
              </li>
              <li>
                <a href="#" class="nav-link text-white">
                  <svg class="bi d-block mx-auto mb-1" width="24" height="24">
                    <use xlink:href="#grid" />
                  </svg>
                  Mi cuenta
                </a>
              </li>
              <li>
                <a href="#" class="nav-link text-white">
                  <svg class="bi d-block mx-auto mb-1" width="24" height="24">
                    <use xlink:href="#grid" />
                  </svg>
                  LogOut
                </a>
              </li>

            </ul>
        </div>
      </div>
    </div>

    <! –– Parte superior del perfil ––>

      <div class="header">
        <ul>
          <li>
            <img class="foto" src="imagenes/foto default de usuario.png" alt="">
          </li>
          <li class="userName">
            <h1>Nombre Apellido</h1>
          </li>
          <li>
            <h2 class="linea"></h2>
          </li>

          <ul class="opcionesDePerfil">
            <li>
              <a href="#" class="nav-link text-white">
                <svg class="bi d-block mx-auto mb-1" width="24" height="24">
                  <use xlink:href="#people-circle" />
                </svg>
                Ver CV
              </a>
            </li>
            <li>
              <a href="#" class="nav-link text-white">
                <svg class="bi d-block mx-auto mb-1" width="24" height="24">
                  <use xlink:href="#people-circle" />
                </svg>
                GitHub
              </a>
            <li>
              <a href="#" class="nav-link text-white">
                <svg class="bi d-block mx-auto mb-1" width="24" height="24">
                  <use xlink:href="#people-circle" />
                </svg>
                Informacion
              </a>
            </li>
            <li>
              <a href="#" class="nav-link text-white">
                <svg class="bi d-block mx-auto mb-1" width="24" height="24">
                  <use xlink:href="#people-circle" />
                </svg>
                Imagenes
              </a>
            </li>
            <li>
              <a href="#" class="nav-link text-white">
                <svg class="bi d-block mx-auto mb-1" width="24" height="24">
                  <use xlink:href="#people-circle" />
                </svg>
                Videos
              </a>
            </li>
          </ul>
        </ul>

        <! –– Parte inferior del perfil (Muro de publicaciones) ––>
      </div>

      <div contenteditable class="caja" oninput="document.querySelector('#description').textContent = this.innerText"></div>

      <ul>

      </ul>
      <ul>
        <h4 class="lineaDelMuroDeTexto"></h4>
        <button type="submit" class="agregar" value="Agregar">Agregar</button>
      </ul>
      <ul>
        <h5 class="cajaMuro"> </h5>

      </ul>




  </header>


</body>

</html>