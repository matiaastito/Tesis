<?php
require_once("validate-session.php");

if ($_SESSION['loggedUser']->getUserType() != "student") {
    echo "<script> if(confirm('Acceso incorrecto'));";
    echo "window.location = '../index.php';
		</script>";
}
include("nav-student.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo CSS_PATH ?>/overides.css" type="text/css">
    <link rel="stylesheet" href="<?php echo CSS_PATH ?>/busquedaOfertas.css" type="text/css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>URLdin</title>
</head>

<body style="background-color:#7B68EE">
    <main>
        <div class="">
            <div class="row">
                <div class="col">
                    <div class="caja-filtros">
                        <form action="<?php echo  FRONT_ROOT . "/JobOffer/SearchByParameters " ?>" method="post">
                            <div class="container">
                                <div class="row">
                                    <div class="col">

                                        <select class="form-select" id="puesto" name="puesto" aria-label="Default select example">
                                            <option selected>Puesto</option>
                                            <?php foreach ($jobPositionList as $jobPosition) { ?>
                                                <option value="<?php echo $jobPosition->getDescription() ?>"><?php echo $jobPosition->getDescription() ?></option>
                                            <?php } ?>
                                        </select>
                                        <select class="form-select" id="carrera" name="carrera" aria-label="Default select example">
                                            <option selected>Carrera</option>
                                            <?php foreach ($careerList as $career) { ?>
                                                <option value="<?php echo $career->getDescription() ?>"><?php echo $career->getDescription() ?></option>
                                            <?php } ?>
                                        </select>
                                        <input type="submit" class="btn btn-outline-light" value="Buscar">

                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tabla">
                        <table class="table table-striped table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">Empresa</th>
                                    <th scope="col">Puesto</th>
                                    <th scope="col">Carrera</th>
                                    <th scope="col">Sueldo</th>
                                    <th scope="col">Descripcion</th>
                                    <th scope="col">Turno</th>
                                    <th scope="col">Experiencia</th>
                                    <th scope="col">Idioma</th>
                                    <th scope="col">Idioma Secundario</th>
                                    <th scope="col">Tipo</th>



                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($jobApplicationList as $jobApplication) {
                                    if ($jobApplication->getStudentId() == $_SESSION['loggedUser']->getStudentId()) {
                                        foreach ($jobOfferList as $jobOffer) {
                                            if ($jobOffer->getJobOfferId() == $jobApplication->getJobOfferId()) {
                                ?>

                                                <tr>
                                                    <td><?php echo $jobOffer->getCompanyId() ?></td>
                                                    <td><?php echo $jobOffer->getJobPositionId() ?></td>
                                                    <td><?php echo $jobOffer->getCareerId() ?></td>
                                                    <td><?php echo $jobOffer->getSalary() ?></td>
                                                    <td><?php echo $jobOffer->getDescription() ?></td>
                                                    <td><?php echo $jobOffer->getTurn() ?></td>
                                                    <td><?php echo $jobOffer->getExp() ?></td>
                                                    <td><?php echo $jobOffer->getLang() ?></td>
                                                    <td><?php echo $jobOffer->getPrefLang() ?></td>
                                                    <td><?php echo $jobOffer->getPlace() ?></td>
                                                    <?php

                                                    if ($_SESSION['loggedUser']->getUserType() == "admin") { ?>
                                                        <form action="<?php echo FRONT_ROOT . "/JobOffer/Remove" ?>" method="post">
                                                            <td><input type="hidden" name="job_Offer_Id" id="job_Offer_Id" value="<?php echo $jobOffer->getJobOfferId(); ?>">
                                                                <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                                                    <div class="modal-dialog modal-dialog-centered">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="exampleModalToggleLabel">Modal 1</h5>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                Esta seguro que desea eliminar esta Compañia?
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Si</button>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                                                                    <div class="modal-dialog modal-dialog-centered">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="exampleModalToggleLabel2">Modal 2</h5>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                Compañia eliminada con exito
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <a class="btn btn-outline-light3" data-bs-toggle="modal" type="submit" href="#exampleModalToggle" role="button">Eliminar</a>

                                                            </td>

                                                        </form>

                                                        <form action="<?php echo FRONT_ROOT . "/JobOffer/Modify" ?>" method="post">
                                                            <td><input type="hidden" name="job_Offer_Id" id="job_Offer_Id" value="<?php echo $jobOffer->getJobOfferId(); ?>">
                                                                <button class="btn btn-outline-light3" type="submit" name="">Modificar</button>
                                                            </td>

                                                        </form>
                                    <?php }
                                                }
                                            }
                                        }
                                    } ?>
                                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col" id="columna">
                    <h1 class="tituloColumna">Empresas vinculadas</h1>
                    <p class="linea"></p>
                    <form action="<?php echo FRONT_ROOT . "/Company/ShowCompanyProfile" ?>" method="post">
                        <table class="table">

                            <tbody>
                                <?php foreach ($companyList as $company) { ?>
                                    <tr>
                                        <th scope="row"></th>
                                        <td class="text-light"><?php echo $company->getLegalName() ?></td>

                                        <td>
                                            <input name="company_Id" type="hidden" value="<?php echo $company->getCompanyId() ?>" />
                                            <button class="btn btn-outline-light2" type="submit" name="">Ver</button>
                                        </td>


                                    </tr>
                                <?php } ?>
                            </tbody>

                        </table>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>