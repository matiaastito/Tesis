<?php
require_once("validate-session.php");
if ($_SESSION['loggedUser']->getUserType() == "admin") {
    require_once('nav.php');
} else {
    require_once('nav-student.php');
}

?>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo CSS_PATH ?>/AgregarEmpresaTrabajo.css" type="text/css">
    <link rel="stylesheet" href="<?php echo CSS_PATH ?>/overides.css" type="text/css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>URLdin</title>
</head>

<body style="background-color:#7B68EE">
    <main class="py-5">
        <section id="listado" class="mb-5">
            <h2>Listado de Alumnos</h2>
            <div class="container">
                <div class="tabla">
                    <table class="table">
                        <thead class="table-dark">
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

            </div>
        </section>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>