<?php

require_once("validate-session.php");
require_once("nav-student.php");
?>
<!-- ################################################################################################ -->
<div class="wrapper row2 bgded" style="background-image:url('../images/demo/backgrounds/1.png');">
    <div class="overlay">
        <div id="breadcrumb" class="clear">
            <ul>
                <li><a href="<?php echo  FRONT_ROOT . "Admin/ShowStudentListView " ?>">Student list</a></li>
                <li><a href="<?php echo  FRONT_ROOT . "Admin/ShowCompanyListView " ?>">Company list</a></li>
            </ul>
        </div>
    </div>
</div>
<!-- ################################################################################################ -->
<div class="wrapper row4">
    <main class="container clear">
        <div class="content">
            <div id="comments">
                <?php
                foreach ($studentList as $student) {
                    if ($student->getStudentId() == $_SESSION['loggedUser']->getStudentId()) {
                ?>
                        <?php echo $student->getName()  ?>
                        <?php echo $student->getLastName() ?>
                        <?php echo 'DNI:' . $student->getDni() . "<br>"; ?>
                        <?php echo 'Birth Date: ' . $student->getBirthDate() . "<br>"; ?>

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