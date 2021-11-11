<?php

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
                            <h1>Agregar una Empresa</h1>
                            <form action="<?php echo  FRONT_ROOT . "/Company/Add " ?>" method="post" >
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
                            <input type="number" class="form-control" id="cuil" name="cuil" placeholder="cuil">
                            <label for="cuil">CUIL</label>
                        </li>
                        <li class="form-floating mb-3">
                            <input type="text" class="form-control" id="legalName" name="legalName" placeholder="Nombre...">
                            <label for="legalName">Nombre</label>
                        </li>
                        <li class="form-floating mb-3">
                            <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
                            <label for="email">Email</label>
                        </li>
                        <li class="form-floating mb-3">
                            <input type="text" class="form-control" id="password" name="password" placeholder="123456asdf...">
                            <label for="password">Contraseña</label>
                        </li>
                        <li class="form-floating mb-3">
                            <input type="number" class="form-control" id="contactNumber" name="contactNumber" placeholder="Numero contacto">
                            <label for="contactNumber">Numero de Contacto</label>
                        </li>
                        <li class="form-floating mb-3">
                            <input type="text" class="form-control" id="web_Page" name="web_Page" placeholder="name.com.ar">
                            <label for="web_Page">Pagina Web</label>
                        </li>
                        <li class="form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here" id="description" name="description"></textarea>
                            <label for="description">Descripcion</label>
                        </li>
                        <li class="col-sm-4">
                            <input type="text" class="cuadrado-de-opciones" name="province" placeholder="Provincia" aria-label="City">
                        </li>
                        <li class="col-sm">
                            <input type="text" class="cuadrado-de-opciones" name="location" placeholder="Localidad" aria-label="State">
                        </li>
                        <li class="col-sm">
                            <input type="text" class="cuadrado-de-opciones" name="address" placeholder="Direccion" aria-label="Zip">
                        </li>
                        <div>
                       
                                <input type="submit" class="btn btn-outline-light" value="Agregar">
                           
                        </div>
                        </form>
                    </ul>
                        </div class="alert alert-<?php echo $alert->getType()?>">
                    <?php echo $alert->getMessage();?>
                    <div>
            </div>
        </div>
    </main>
</body>
</html>