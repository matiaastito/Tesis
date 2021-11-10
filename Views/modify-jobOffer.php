<?php

if ($_SESSION["loggedUser"]->getUserType() != "admin"){
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
    <link rel="stylesheet" href="<?php echo CSS_PATH?>/listaEmpresas.css" type="text/css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>URLdin</title>
</head>
<body style="background-color:#7B68EE">
<main>
<form action="<?php echo FRONT_ROOT . "/JobOffer/ModifyAttribute" ?>" method="post">
        <div class="container">
            <div>
                <div class="row">
                    <div class="col">
                        <div class="form-floating mb-3">
                        <select class="form-select" id="career_Id" name ="career_Id" aria-label="Default select example">
                                <option selected>Carrera</option>
                                <?php foreach($careerList as $career){?>
                                <option value="<?php echo $career->getDescription()?>"><?php echo $career->getDescription()?></option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="form-floating mb-3">
                        <select class="form-select" id="puesto" name ="puesto" aria-label="Default select example">
                                <option selected>Puesto</option>
                                <?php foreach($jobPositionList as $jobPosition){?>
                                <option value="<?php echo $jobPosition->getDescription()?>"><?php echo $jobPosition->getDescription()?></option>
                                <?php }?>
                            </select>
                            </div>
                            <div class="form-floating mb-3">
                            <select class="form-select" id="exp" name ="exp" aria-label="Default select example">
                                <option selected>Experiencia</option>
                                <option value="si">Si</option>
                                <option value="no">No</option>
                            </select>
                            </div>
                        
                        
                    </div>
                    <div class="col">
                    <div class="form-floating mb-3">
                    <select class="form-select" id="turn" name ="turn" aria-label="Default select example">
                                <option selected>Turno</option>
                                <option value="mañana">Mañana</option>
                                <option value="tarde">Tarde</option>
                                <option value="noche">Noche</option>
                            </select>
                        </div>
                        <div class="form-floating mb-3">
                        <select class="form-select" id="salary" name ="salary"  aria-label="Default select example">
                                <option selected>Sueldo</option>
                                <option value="40.000 - 60.000">40.000 - 60.000</option>
                                <option value="60.000 - 100.000">60.000 - 100.000</option>
                                <option value="100.000 - ...">100.000 - ... </option>
                                <option value="A hablar en la entrevista">A hablar en la entrevista </option>
                            </select>
                        </div>
                        <div class="form-floating mb-3">
                        <select class="form-select" id="lang" name ="lang" aria-label="Default select example">
                                <option selected>Idioma Principal</option>
                                <option value="Español">Español</option>
                                <option value="Ingles">Ingles</option>
                                <option value="Aleman">Aleman</option>
                                <option value="Frances">Frances</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                    <div class="form-floating mb-3">
                    <select class="form-select" id="pLang" name ="pLang" aria-label="Default select example">
                                <option selected>Idioma Secundario</option>
                                <option value="Español">Español</option>
                                <option value="Ingles">Ingles</option>
                                <option value="Aleman">Aleman</option>
                                <option value="Frances">Frances</option>
                            </select>
                        </div>
                        <div class="form-floating mb-3">
                        <select class="form-select" id="place" name ="place"  aria-label="Default select example">
                                <option selected>Trabajo</option>
                                <option value="Remoto">Remoto</option>
                                <option value="Distancia">Distancia</option>
                            </select>
                        </div>
                        <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="description" name ="description" placeholder="name@example.com">
                            <label for="description">Descripcion</label>
                            </select>
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
                        <tr>
                        <?php
                     foreach ($jobOfferList as $jobOffer) {if($jobOffer->getJobOfferId() == $_POST["job_Offer_Id"]){
                        ?>
                            <th scope="row"></th>
                            <td><?php echo $jobOffer->getCompanyId() ?></td>
                                <td><?php echo $jobOffer->getJobPositionId()?></td>
                                <td><?php echo $jobOffer->getCareerId()?></td>
                                <td><?php echo $jobOffer->getSalary() ?></td>
                                <td><?php echo $jobOffer->getDescription() ?></td>
                                <td><?php echo $jobOffer->getTurn() ?></td>
                                <td><?php echo $jobOffer->getExp() ?></td>
                                <td><?php echo $jobOffer->getLang() ?></td>
                                <td><?php echo $jobOffer->getPrefLang() ?></td>
                                <td><?php echo $jobOffer->getPlace() ?></td>
                        </tr>
                        <?php }}?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="boton">
            <div class="row">
                <div class="col">
                </div>
                <div class="col">
                    <form action="<?php echo FRONT_ROOT . "/JobOffer/ShowListView"?>" method="get">
                        <input type="submit" class="btn btn-outline-light" value="Volver">
                    </form>
                </div>
                <div class="col">
                   
                        <input name="job_Offer_Id" type="hidden" value="<?php echo $_POST["job_Offer_Id"] ?>">
                        <button class="btn btn-outline-light" type="submit" name="">Modificar</button>
                   
                </div>
            </div>
        </div>
        </div>
        </div>
  </form>
    </main>
</body>
</html>
<?php

?>