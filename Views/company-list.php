<?php
require_once("validate-session.php");

if ($_SESSION['loggedUser']->getUserType() == "admin") {
    require_once('nav.php');
} else {
    require_once('nav-student.php');
}
?>
<main class="py-5">
    <section id="listado" class="mb-5">
        <div class="container">
            <h2 class="mb-4">Listado de empresas</h2>
            <form action="<?php echo FRONT_ROOT . "Company/SearchByName" ?>" method="post">
                <input type="text" placeholder="Nombre..." name="nombre">
                <button name="" type="submit">Buscar</button>
            </form>
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
                    ?>
                    <?php if ($_SESSION['loggedUser']->getUserType() == "admin") { ?>
                        <form action="<?php echo FRONT_ROOT . "Company/Remove" ?>" method="post">
                            <input type="number" name="CUIL" id="CUIL" placeholder="CUIL">
                            <button class="" type="submit" name="">Eliminar</button>

                        </form>

                        <form action="<?php echo FRONT_ROOT . "Company/Modify" ?>" method="post">
                            <input type="number" name="CUIL" id="CUIL" placeholder="CUIL">
                            <button class="" type="submit" name="">Modificar</button>

                        </form>
                    <?php } ?>

                    </tr>

                </tbody>

            </table>

        </div>
    </section>
</main>