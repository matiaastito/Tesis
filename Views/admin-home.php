<?php
require_once("validate-session.php");

include("header.php");

?>
<!-- ################################################################################################ -->

<!DOCTYPE html>
<html lang="en">

<head>
    <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script href="../lib/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?php echo CSS_PATH?>\perfil.css" type="text/css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>URLdin</title>

</head>

<body style="background-color:#7B68EE">

    <header>




        <! –– Parte superior del perfil ––>

            <div class="header">
                <ul>
                    <li>
                        <img class="foto" src="../imagenes/foto default de usuario.png" alt="">
                    </li>
                    <li class="userName">
                        <h1>Administrador</h1>
                    </li>
                    <li>
                        <h2 class="linea"></h2>
                    </li>

                    <ul class="opcionesDePerfilAdmin">
                        <li>
                            <a href="#" class="nav-link text-white">
                                <svg class="bi d-block mx-auto mb-1" width="24" height="24">
                                    <use xlink:href="#people-circle" />
                                </svg>
                                <a href="<?php echo  FRONT_ROOT . "Company/ShowAddView" ?>"> Agregar</a>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link text-white">
                                <svg class="bi d-block mx-auto mb-1" width="24" height="24">
                                    <use xlink:href="#people-circle" />
                                </svg>
                                <a href="<?php echo  FRONT_ROOT . "Admin/ShowCompanyListView " ?>">Remover</a>
                            </a>
                        <li>
                            <a href="#" class="nav-link text-white">
                                <svg class="bi d-block mx-auto mb-1" width="24" height="24">
                                    <use xlink:href="#people-circle" />
                                </svg>
                                <a href="<?php echo  FRONT_ROOT . "Admin/ShowCompanyListView " ?>">Enlistar</a>
                            </a>
                        </li>
                    </ul>
                </ul>

                <! –– Parte inferior del perfil (Muro de publicaciones) ––>
            </div>





    </header>


</body>

</html>


<?php
//include('footer.php');
?>