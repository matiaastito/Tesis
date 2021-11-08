<?php
include('nav.php');

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
            </div>
            <form action="<?php echo FRONT_ROOT . "/JobOffer/ModifyAttribute" ?>" method="post">
            <?php
                     foreach ($jobOfferList as $jobOffer) {if($jobOffer->getJobOfferId() == $_POST["job_Offer_Id"]){
                        ?>
                        <ul>
                            <li> Puesto
                                <input type="text" name="puesto" id="puesto" placeholder="<?php echo $jobOffer->getJobPositionId()?>">
                            </li>
                            <li>
                                Salario
                                <input type="number" name="salary" id="salary" size="30" placeholder="<?php echo $jobOffer->getSalary() ?>">
                            </li>
                            <li>
                                Horas laborales(por dia)
                                <input type="number" name="hours" id="hours" size="22" placeholder="<?php echo $jobOffer->getHours() ?>">
                            </li>
                            <li>
                                Turno(Mañana/tarde/noche)
                                <input type="text" name="turn" id="turn" size="30" placeholder="<?php echo $jobOffer->getTurn() ?>">
                            </li>
                            <li>
                                Experiencia(si/no)
                                <input type="text" name="exp" id="" size="2" placeholder="<?php echo $jobOffer->getExp() ?>">
                            </li>
                            <li>
                                Idioma Preferente
                                <input type="text" name="lang" id="lang" size="30" placeholder="<?php echo $jobOffer->getLang() ?>">
                            </li>
                            <li>
                                Idioma Secundario
                                <input type="text" name="pLang" id="pLang" size="30" placeholder="<?php echo $jobOffer->getPrefLang() ?>">
                            </li>
                            <li>
                                Genero Prefernte
                                <input type="text" name="gender" id="gender" size="30" placeholder="<?php echo $jobOffer->getGender() ?>">
                            </li>
                        </ul>

                        <input name="job_Offer_Id" type="hidden" value="<?php echo $_POST['job_Offer_Id'] ?>">
                        <button class="" type="submit" name="">Modificar</button>
                    </form>
                    <?php }}?>

        </div>
    </main>
</div>
<!-- ################################################################################################ -->

<?php

?>