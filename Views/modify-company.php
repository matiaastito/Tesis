<?php
if ($_SESSION["loggedUser"]->getUserType() != "admin") {
    echo "<script> if(confirm('Acceso incorrecto'));";
    echo "window.location = '../index.php';
          </script>";
}
include("nav.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo CSS_PATH ?>/listaEmpresas.css" type="text/css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>URLdin</title>
</head>

<body style="background-color:#7B68EE">
    <main>
        <form action="<?php echo FRONT_ROOT . "/Company/ModifyAttribute" ?>" method="post">
            <div class="container">
                <div>
                    <div class="row">
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="legalName" name="legalName" placeholder="Nombre...">
                                <label for="legalName">Nombre</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="address" name="address" placeholder="Direccion...">
                                <label for="address">Direccion</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="textarea" class="form-control" id="description" name="description" placeholder="Descripcion..">
                                <label for="description">Activo</label>
                            </div>


                        </div>
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" id="contactNumber" name="contactNumber" placeholder="Numero contacto...">
                                <label for="contactNumber">Contacto</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
                                <label for="email">Email</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="web_Page" name="web_Page" placeholder="name.com.ar">
                                <label for="web_Page">Pagina Web</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="textarea" class="form-control" id="description" name="description" placeholder="Descripcion..">
                                <label for="description">Descripcion</label>
                            </div>


                        </div>



                    </div>
                </div>
            </div>
            <div class="container">
                <div class="tabla">
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Descripcion</th>
                                <th scope="col">Email</th>
                                <th scope="col">Contacto</th>
                                <th scope="col">Pagina Web</th>
                                <th scope="col">Direccion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php foreach ($companyList as $company) {
                                    if ($company->getCUIL() == $_POST['CUIL']) { ?>
                                        <th scope="row"></th>
                                        <td><?php echo $company->getLegalName() ?></td>
                                        <td><?php echo $company->getDescription() ?></td>
                                        <td><?php echo $company->getEmail() ?></td>
                                        <td><?php echo $company->getContactNumber() ?></td>
                                        <td><?php echo $company->getWeb() ?></td>
                                        <td><?php echo $company->getAddress() ?></td>
                            </tr>
                    <?php }
                                } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="boton">
                <div class="row">
                    <div class="col">

                    </div>
                    <div class="col">

                    </div>

                    <div class="col">
                        <form action="<?php echo FRONT_ROOT . "/Admin/ShowCompanyListView" ?>" method="get">

                        </form>
                    </div>

                    <div class="col-4">



                        <input name="cuil" type="hidden" value="<?php echo $_POST['CUIL'] ?>">
                        <button class="btn btn-outline-light" type="submit" name="">Modificar</button>
        </form>
        <form action="<?php echo FRONT_ROOT . "/Admin/ShowCompanyListView" ?>" method="get">
            <input type="submit" class="btn btn-outline-light" value="Volver">
        </form>
        </div>
        </div>


        </div>
        </div>
        </div>


    </main>
</body>

</html>