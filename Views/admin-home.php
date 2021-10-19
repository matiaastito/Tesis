<?php
require_once("validate-session.php");
include('nav.php');


?>
<!-- ################################################################################################ -->

<!-- ################################################################################################ -->
<div class="wrapper row4">
    <main class="container clear">
        <div class="content">
            <div id="comments">
                <?php
                foreach ($adminList as $admin) {
                    if ($admin->getIdAdmin() == $_SESSION['loggedUser']->getIdAdmin()) {
                ?>
                        <?php echo $admin->getName()  ?>
                        <?php echo $admin->getLastName() ?>
                        <?php echo 'DNI:' . $admin->getDni() . "<br>"; ?>
                        <?php echo 'Birth Date: ' . $admin->getBirthDate() . "<br>"; ?>

                <?php
                    }
                }
                ?>
            </div>
        </div>
    </main>
</div>
<!-- ################################################################################################ -->

<?php
include('footer.php');
?>