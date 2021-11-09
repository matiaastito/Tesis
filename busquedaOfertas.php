<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="overides.css" type="text/css">
    <link rel="stylesheet" href="busquedaOfertas.css" type="text/css">
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
                            <a class="nav-link " aria-current="page" href="busquedaOfertas.php">Propuestas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Notificaciones</a>
                        </li>

                        <li class="nav-item">
                            <a href="perfilAdmin.php" class="nav-link active">Mi Cuenta</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active">LogOut</a>
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
        <div class="">
            <div class="row">
                <div class="col">
                    <div class="caja-filtros">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>Carrera</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>Job Position</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>

                                </div>
                                <div class="col">


                                </div>
                                <div class="col">


                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="tabla">
                        <table class="table table-striped table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">Empresa</th>
                                    <th scope="col">Experciencia</th>
                                    <th scope="col">Jornada</th>
                                    <th scope="col">Sueldo</th>
                                    <th scope="col">Tipo</th>
                                    <th scope="col">Aplicar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row"><a href="perfilEmpresa.php" class="nav-link text-light">Globant</th>
                                    <td>Intermedia</td>
                                    <td>Mañana</td>
                                    <td>A hablar</td>
                                    <td>Remoto</td>
                                    <td>
                                        <form action="#">
                                            <input type="submit" class="btn btn-outline-light2" value="->">
                                        </form>

                                    </td>
                                </tr>


                            </tbody>
                        </table>


                    </div>




                </div>
                <div class="col" id="columna">
                    <h1>Algunas de las Empresas</h1>
                    <p class="linea"></p>
                    <table class="table">

                        <tbody>
                            <tr>
                                <th scope="row"></th>
                                <td class="text-light">Globant</td>
                                <td></td>
                                <td>
                                <td><a href="perfilEmpresa.php" class="btn btn-outline-light2">Ver</td>
                                </td>
                            </tr>

                        </tbody>
                    </table>

                </div>

            </div>
        </div>


















    </main>




</body>

</html>