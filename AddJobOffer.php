<?php





?>


<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="AgregarEmpresaTrabajo.css" type="text/css">
    <link rel="stylesheet" href="overides.css" type="text/css">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body style="background-color:#7B68EE">

    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#"><img src="imagenes/logoNegro.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#">Propuestas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Notificaciones</a>
                        </li>

                        <li class="nav-item">
                            <a href="perfilAdmin.php" class="nav-link">Mi Cuenta</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link">LogOut</a>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <input class="searchBar me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>

    </header>


    <main>

        <div class="container">

            <div id="cuadrado">

                <!–– select imagen ––>

                    <ul class="nav justify-content-center">
                        <li>
                            <h1>Nueva Oferta de Trabajo</h1>
                            <h2 id="linea"></h2>
                        </li>
                        <li class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Puesto</label>

                        </li>
                        <li class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Empresa</label>

                        </li>
                        <li>

                            <select class="form-select" id="margenesb" aria-label="Default select example">
                                <option selected>Experiencia</option>
                                <option value="1">Inicial</option>
                                <option value="2">Intermedio</option>
                                <option value="3">Avanzado</option>
                            </select>

                        </li>
                        <li>

                            <select class="form-select" id="margenesa" aria-label="Default select example">
                                <option selected>Jornada</option>
                                <option value="1">Media</option>
                                <option value="2">Completa</option>
                                <option value="3">Extendida</option>
                            </select>



                        </li>
                        <li>
                            <select class="form-select" id="margenesb" aria-label="Default select example">
                                <option selected>Sueldo</option>
                                <option value="1">40.000 - 60.000</option>
                                <option value="2">60.000 - 100.000</option>
                                <option value="3">100.000 - ... </option>
                                <option value="4">A hablar en la entrevista </option>
                            </select>

                        </li>
                        <li>
                            <select class="form-select" id="margenesa" aria-label="Default select example">
                                <option selected>Tipo</option>
                                <option value="1">Precencial</option>
                                <option value="2">Remoto</option>
                            </select>


                        </li>

                        <li class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Descripcion</label>

                        </li>






            </div>
        </div>








    </main>
</body>

</html>