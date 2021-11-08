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
                <h2>Añadir nueva empresa</h2>
                <form action="<?php echo  FRONT_ROOT . "/Company/Add " ?>" method="post" style="background-color: #EAEDED;padding: 2rem !important;">
                    <table>
                        <thead>
                            <tr>
                                <th>CUIL</th>
                                <th>Nombre legal</th>
                                <th>Direccion fisica</th>
                                <th>Numero de contacto</th>
                                <th>Email de contacto</th>
                            </tr>
                        </thead>
                        <tbody align="center">
                            <tr>
                                <td style="max-width: 100px;">
                                    <input type="number" name="CUIL" size="20" required>
                                </td>
                                <td>
                                    <input type="text" name="legalName" size="20" required>
                                </td>
                                <td>
                                    <input type="text" name="address" size="30" required>
                                </td>
                                <td>
                                    <input type="number" name="contactNumber" size="22" required>
                                </td>
                                <td>
                                    <input type="email" name="email" size="30" required>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div>
                        <input type="submit" class="btn" value="Agregar" style="background-color:#DC8E47;color:white;"/>
                    </div class="alert alert-<?php echo $alert->getType()?>">
                    <?php echo $alert->getMessage();?>
                    <div>

                    </div>
                </form>
            </div>
        </div>
    </main>
</div>
<!-- ################################################################################################ -->



<?php

?>