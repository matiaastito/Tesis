<?php

if ($_SESSION["loggedUser"]->getUserType() != "admin"){
    echo "<script> if(confirm('Acceso incorrecto'));";
              echo "window.location = '../index.php';
          </script>";
  }
include('nav.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo CSS_PATH?>/AgregarEmpresaTrabajo.css" type="text/css">
    <link rel="stylesheet" href="<?php echo CSS_PATH?>/overides.css" type="text/css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>URLdin</title>
</head>
<body style="background-color:#7B68EE">
<main>
        <div class="container">
            <div id="cuadrado">
           
                <!–– select imagen ––>
                    <ul class="nav justify-content-center">
                        <li>
                            <h1>Agregar un administrador</h1>
                            <form action="<?php echo  FRONT_ROOT . "/Admin/Add " ?>" method="post" >
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
                            <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Nombre..">
                            <label for="firstName">Nombre</label>
                        </li>
                        <li class="form-floating mb-3">
                            <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Apellido...">
                            <label for="lastName">Apellido</label>
                        </li>
                        <li class="form-floating mb-3">
                            <input type="number" class="form-control" id="dni" name="dni" placeholder="DNI...">
                            <label for="dni">DNI</label>
                        </li>
                        <li class="form-floating mb-3">
                            <input type="text" class="form-control" id="gender" name="gender" placeholder="Genero...">
                            <label for="gender">Genero</label>
                        </li>
                        <li class="form-floating mb-3">
                            <input type="date" class="form-control" id="birhtDate" name="birhtDate" placeholder="Fecha de nacimiento">
                            <label for="birhtDate">Fecha de Nacimiento</label>
                        </li>
                        <li class="form-floating mb-3">
                            <input type="email" class="form-control" id="email" name="email" placeholder="email@email.com">
                            <label for="email">Email</label>
                        </li>
                        <li class="form-floating mb-3">
                            <input type="number" class="form-control" id="phoneNumber" name="phoneNumber" placeholder="123456">
                            <label for="phoneNumber">Numero de Telefono</label>
                        </li>
                       
                                <input type="submit" class="btn btn-outline-light" value="Agregar">
                           
                        </div>
                        </form>
                        </div class="alert alert-<?php echo $alert->getType()?>">
                    <?php echo $alert->getMessage();?>
                    <div>
            </div>
        </div>
    </main>
</body>
</html>