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
                            <a class="nav-link active" aria-current="page" href="busquedaOfertas.php">Propuestas</a>
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
        <div class="search">
            <nav class="navbar navbar-light bg-light">
                <div class="container-fluid">
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-primary" type="submit">Search</button>
                    </form>
                </div>
            </nav>


        </div>
        <div class="container">
            <div class="tabla">
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Nombre</th>
                            <th scope="col">CUIL</th>
                            <th scope="col">Email</th>
                            <th scope="col">Contacto</th>
                            <th scope="col">Pagina Web</th>
                            <th scope="col">Direccion</th>
                            <th scope="col">Modificar</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row"></th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>
                                <form action="modificar.php">
                                    <input type="submit" class="btn btn-outline-light2" value=">">
                                </form>
                            </td>


                        </tr>

                    </tbody>
                </table>


            </div>


        </div>








    </main>
</body>

</html>