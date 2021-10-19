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
            <h2 class="mb-4">Listado de Alumnos</h2>
            <table class="table bg-light-alpha">
                <thead>
                    <th>Numero Matricula</th>
                    <th>Nombre y Apellido</th>
                    <th>Dni</th>
                    <th>Email</th>
                </thead>
                <tbody>
                    <?php
                    foreach ($studentList as $student) {
                    ?>
                        <tr>
                            <td><?php echo $student->getFileNumber() ?></td>
                            <td><?php echo $student->getName() . ' ' . $student->getLastName() ?></td>
                            <td><?php echo $student->getDni() ?></td>
                            <td><?php echo $student->getEmail() ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
</main>