<?php

require_once("validate-session.php");
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
                <!--aca iria la pagina inicial del admin-->
            </div>
        </div>
    </main>
</div>
<!-- ################################################################################################ -->

<?php
include('footer.php');
?>