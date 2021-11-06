<?php
require_once("validate-session.php");

require_once('header.php');

?>
<main class="py-5">
    <section id="listado" class="mb-5">
        <div class="container">
            <h2 class="mb-4">Modificar Empresa</h2>
            <table class="table bg-light-alpha">
                <thead>
                    <th>CUIT</th>
                    <th>Nombre legal</th>
                    <th>Direccion</th>
                    <th>Telefono de contacto</th>
                    <th>Email</th>
                </thead>
                <tbody>
                    <?php
                    foreach ($companyList as $company) {
                        if ($_POST['CUIL'] == $company->getCuil()) {
                    ?>

                            <tr>
                                <td><?php echo $company->getCUIL() ?></td>

                                <td><?php echo $company->getLegalName() ?></td>
                                <td><?php echo $company->getAddress() ?></td>
                                <td><?php echo $company->getContactNumber() ?></td>
                                <td><?php echo $company->getEmail() ?></td>

                            </tr>

                    <?php
                        }
                    }
                    ?>

                    <form action="<?php echo FRONT_ROOT . "/Company/ModifyAttribute" ?>" method="post">
                        <ul>
                            <li> Nombre Legal
                                <input type="text" name="legalName" id="legalName" placeholder="Nombre empresa..">
                            </li>
                            <li>
                                Direccion
                                <input type="text" name="address" id="address" size="30">
                            </li>
                            <li>
                                Telefono de Contacto
                                <input type="number" name="contactNumber" id="contactNumber" size="22">
                            </li>
                            <li>
                                Email
                                <input type="email" name="email" id="email" size="30">
                            </li>
                        </ul>

                        <input name="cuil" type="hidden" value="<?php echo $_POST['CUIL'] ?>">
                        <button class="" type="submit" name="">Modificar</button>
                    </form>


        </div>
    </section>
</main>