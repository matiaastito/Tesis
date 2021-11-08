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
                <form action="<?php echo  FRONT_ROOT . "/JobOffer/Add " ?>" method="post" style="background-color: #EAEDED;padding: 2rem !important;">
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
                            </tr>
                        </thead>
                        <tbody align="center">
                            <tr>
                                <td style="max-width: 100px;">
                                    <input type="text" name="name" size="20" required>
                                </td>
                                <td>
                                    <input type="text" name="puesto" size="20" required>
                                </td>
                                <td>
                                    <input type="number" name="salary" size="30" required>
                                </td>
                                <td>
                                    <input type="number" name="hours" size="2" required>
                                </td>
                                <td>
                                    <input type="text" name="turn" size="30" required>
                                </td>
                                <td>
                                    <input type="text" name="exp" size="2" required>
                                </td>
                                <td>
                                    <input type="text" name="lang" size="30" required>
                                </td>
                                <td>
                                    <input type="text" name="langP" size="30" required>
                                </td>
                                <td>
                                    <input type="text" name="gender" size="30" required>
                                </td>
                                
                                  
                                
                            </tr>
                        </tbody>
                    </table>
                    <div>
                        <input type="submit" class="btn" value="Agregar" style="background-color:#DC8E47;color:white;" />
                    </div>
                </form>
            </div>
        </div>
    </main>
</div>
<!-- ################################################################################################ -->

<?php

?>