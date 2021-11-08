<?php
include('nav-student.php');
var_dump($_SESSION["loggedUser"]->getStudentId());

?>
<!-- ################################################################################################ -->
<div class="wrapper row2 bgded" style="background-image:url('../images/demo/backgrounds/1.png');">
    <div class="overlay">
        <div id="breadcrumb" class="clear">
            <ul>
                <!-- Aca van los botones que irian arriba-->
            </ul>
        </div>
    </div>
</div>
<!-- ################################################################################################ -->
<div class="wrapper row4">
    <main class="container clear">
        <div class="content">
            <div id="comments">
                <h2>Ofertas Laborales</h2>
                <form action="<?php echo  FRONT_ROOT . "/JobApplication/Add " ?>" method="post" style="background-color: #EAEDED;padding: 2rem !important;">
                    <table>
                        <thead>
                            <tr>
                                <th>Nombre Compañia</th>
                                <th>Puesto Laboral</th>
                                <th>Salario</th>
                                <th>Horas laborales(por dia)</th>
                                <th>Turno(mañana/tarde/noche)</th>
                                <th>Experiencia (si/no)</th>
                                <th>Idioma preferente</th>
                                <th>Idioma secundario</th>
                                <th>Genero preferente</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody align="center">
                        <?php
                     foreach ($jobOfferList as $jobOffer) {
                        ?>
                            <tr>
                                <td><?php echo $jobOffer->getCompanyId() ?></td>
                                <td><?php echo $jobOffer->getJobPositionId()?></td>
                                <td><?php echo $jobOffer->getSalary() ?></td>
                                <td><?php echo $jobOffer->getHours() ?></td>
                                <td><?php echo $jobOffer->getTurn() ?></td>
                                <td><?php echo $jobOffer->getExp() ?></td>
                                <td><?php echo $jobOffer->getLang() ?></td>
                                <td><?php echo $jobOffer->getPrefLang() ?></td>
                                <td><?php echo $jobOffer->getGender() ?></td>
                                <td><input type="hidden" name="jobApplicationId" value="<?php echo $jobOffer->getJobOfferId();?>">
                                <input type="hidden" name="studentId" value="<?php echo $_SESSION["loggedUser"]->getStudentId();?>">
                                <input type="hidden" name="jobOfferId" value="<?php echo $jobOffer->getJobOfferId();?>">
                                

                                <input type="submit" class="btn" value="Aplicar" style="background-color:#DC8E47;color:white;" /></td>
                             

                            </tr>
                        <?php
                        }
                        ?>
                        </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </main>
</div>
<!-- ################################################################################################ -->

<?php

?>