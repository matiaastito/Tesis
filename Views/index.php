<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script href="lib/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?php echo CSS_PATH ?>/Css.css" type="text/css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>URLdin</title>
</head>

<body class="fondo">
    <span><img src="<?php echo IMG_PATH ?>/logo UTN con UTN.png" class="logo" alt=""></span>

    <div class="container">
        <div class="row align-items-center">
            <div class="col">

            </div>
            <div class="container" id="cuadrado">

                <header>
                    <p>Iniciar Sesión
                    </p>
                    <header>
                        <header id="linea">
                            <header>


                                <form action="<?php echo FRONT_ROOT . "/Session/Login" ?>" method="post">
                                    <input class="field field--animate" type="email" name="email" id="emailadress" placeholder="Email" required>
                                    <button class="buttonFlecha" type="submit" name=""></button>
                                </form>
                                <input class="field field--animate" type="text" name="password" id="emailadress" placeholder="Password" required>




                                <div class="container">
                                    <div class="row">
                                        <div class="col">
                                            <button type="button" class="btn btn-outline-info">Sing In as User</button>
                                        </div>
                                        <div class="col">

                                        </div>
                                        <div class="col">
                                            <button type="button" class="btn btn-outline-warning">Sing In as Company</button>
                                        </div>
                                    </div>
                                </div>



                                <form action="https://mdp.utn.edu.ar/">
                                    <input type="submit" class="buttonCampus" value="">
                                </form>
                                <form action="https://www.instagram.com/utnmardelplata/">
                                    <input type="submit" class="buttonIg" value="">
                                </form>
                                <form action="https://twitter.com/UTNMardelPlata">
                                    <input type="submit" class="buttonTwitter" value="">
                                </form>



            </div>
            <div class="col">


            </div>


</body>

</html>