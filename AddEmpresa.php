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
                            <h1>Agregar una Empresa</h1>
                            <h2 id="linea"></h2>
                        </li>

                        <li>

                            <label for="formFile" class="form-label"></label>
                            <input class="form-control" type="file" id="formFile">

                        </li>
                        <li>

                            <label for="formFile" class="form-label"></label>
                            <input class="form-control" type="file" id="formFile">

                        </li>
                        <li class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Email</label>

                        </li>
                        <li class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Pagina Web</label>

                        </li>
                        <li class="form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                            <label for="floatingTextarea">Descripcion</label>


                        </li>
                        <li class="col-sm-4">
                            <input type="text" class="cuadrado-de-opciones" placeholder="Provincia" aria-label="City">

                        </li>
                        <li class="col-sm">
                            <input type="text" class="cuadrado-de-opciones" placeholder="Localidad" aria-label="State">

                        </li>
                        <li class="col-sm">

                            <input type="text" class="cuadrado-de-opciones" placeholder="Altura" aria-label="Zip">
                        </li>
                        <div>
                            <button type="button" class="btn btn-outline-light">Agregar</button>
                        </div>






            </div>
        </div>








    </main>
</body>

</html>