<?php

if ($_SESSION["loggedUser"]->getUserType() == "admin"){
    
    include("nav.php");
  }elseif ($_SESSION["loggedUser"]->getUserType() == "company"){
    include("nav-company.php");
  }
  else{
    echo "<script> if(confirm('Acceso incorrecto'));";
    echo "window.location = '../index.php';
</script>";
  }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo CSS_PATH?>/AgregarEmpresaTrabajo.css" type="text/css">
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
                <form action="<?php echo  FRONT_ROOT . "/JobOffer/Add "?>" method="post">
                    <ul class="nav justify-content-center">
                        <li>
                            <h1>Nueva Oferta de Trabajo</h1>
                            <h2 id="linea"></h2>
                     
                        </li>
                    
                        <li>
                        <?php if ($_SESSION['loggedUser']->getUserType()=="admin"){?>
                            <select class="form-select" id="company_Id" name ="company_Id" aria-label="Default select example">
                                
                                <option selected>Empresa</option>
                                <?php foreach($companyList as $company){ if($company->getActive() =='si'){?>
                                <option value="<?php echo $company->getLegalName()?>"><?php echo $company->getLegalName()?></option>
                                <?php }
                            }
                            ?></select>
                            <?php } else{?> <input type="hidden" name="company_Id" value="<?php echo $_SESSION['loggedUser']->getLegalName()?>">
                                <?php }?>
                            
                        </li>
                        <li>
                            <select class="form-select" id="career_Id" name ="career_Id" aria-label="Default select example">
                                <option selected>Carrera</option>
                                <?php foreach($careerList as $career){?>
                                <option value="<?php echo $career->getDescription()?>"><?php echo $career->getDescription()?></option>
                                <?php }?>
                            </select>
                        </li>
                        <li>
                            <select class="form-select" id="puesto" name ="puesto" aria-label="Default select example">
                                <option selected>Puesto</option>
                                <?php foreach($jobPositionList as $jobPosition){?>
                                <option value="<?php echo $jobPosition->getDescription()?>"><?php echo $jobPosition->getDescription()?></option>
                                <?php }?>
                            </select>
                        </li>
                        <li>
                            <select class="form-select" id="exp" name ="exp" aria-label="Default select example">
                                <option selected>Experiencia</option>
                                <option value="si">Si</option>
                                <option value="no">No</option>
                            </select>
                        </li>
                        <li>
                            <select class="form-select" id="turn" name ="turn" aria-label="Default select example">
                                <option selected>Turno</option>
                                <option value="mañana">Mañana</option>
                                <option value="tarde">Tarde</option>
                                <option value="noche">Noche</option>
                            </select>
                        </li>
                        <li>
                            <select class="form-select" id="salary" name ="salary"  aria-label="Default select example">
                                <option selected>Sueldo</option>
                                <option value="40.000 - 60.000">40.000 - 60.000</option>
                                <option value="60.000 - 100.000">60.000 - 100.000</option>
                                <option value="100.000 - ...">100.000 - ... </option>
                                <option value="A hablar en la entrevista">A hablar en la entrevista </option>
                            </select>
                        </li>
                        <li>
                            <select class="form-select" id="lang" name ="lang" aria-label="Default select example">
                                <option selected>Idioma Principal</option>
                                <option value="Español">Español</option>
                                <option value="Ingles">Ingles</option>
                                <option value="Aleman">Aleman</option>
                                <option value="Frances">Frances</option>
                            </select>
                        </li>
                        <li>
                        <select class="form-select" id="langP" name ="langP" aria-label="Default select example">
                                <option selected>Idioma Secundario</option>
                                <option value="Español">Español</option>
                                <option value="Ingles">Ingles</option>
                                <option value="Aleman">Aleman</option>
                                <option value="Frances">Frances</option>
                            </select>
                        </li>
                        <li>
                        <select class="form-select" id="place" name ="place"  aria-label="Default select example">
                                <option selected>Trabajo</option>
                                <option value="Remoto">Remoto</option>
                                <option value="Distancia">Distancia</option>
                            </select>
                        </li>
                        <li class="form-floating mb-3">
                            <input type="text" class="form-control" id="description" name ="description" placeholder="name@example.com">
                            <label for="description">Descripcion</label>
                        </li>
                        <div>
                            <input type="submit" class="btn btn-outline-light" value="Agregar">
                            </div>
                            </div class="alert alert-<?php echo $alert->getType()?>">
                    <?php echo $alert->getMessage();?>
                    <div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>
