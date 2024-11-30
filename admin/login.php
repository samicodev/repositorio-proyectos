<?php 
session_start();
if (isset($_SESSION['login'])) { header('location:index.php');  }else{  ?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
    <head>
        <!-- Meta data -->
        <meta charset="UTF-8">
        <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>


        <!-- Title -->
        <title>Login </title>

        <!--Favicon -->
        <link rel="icon" href="../img/logo.png" type="image/x-icon"/>

        <!-- Bootstrap css -->
        <link href="../assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet" />

        <!-- Style css -->
        <link href="../assets/css/style.css" rel="stylesheet" />

        <!-- Dark css -->
        <link href="../assets/css/dark.css" rel="stylesheet" />

        <!-- Skins css -->
        <link href="../assets/css/skins.css" rel="stylesheet" />

        <!-- Animate css -->
        <link href="../assets/css/animated.css" rel="stylesheet" />

        <!---Icons css-->
        <link href="../assets/css/icons.css" rel="stylesheet" />

    </head>

    <body class="h-100vh page-style1" style="background-color: #11163a;">

        <div class="page">
            <div class="page-content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9 d-block mx-auto">
                            <div class="row">
                                <div class="col-md-5 p-md-0">
                                    <div class="card br-0 mb-0" style="box-shadow: none;">
                                        <div class="card-body page-single-content">
                                            <div class="w-100">
                                                <div class="custom-logo text-center">
                                                    
                                                    <img src="../img/logo.png"  alt="logo" width="40">
                                                    
                                                    
                                                </div>
                                                <div class="text-center">
                                                    <h2>Inicio de sesión</h2>
                                                </div>
                                                <form method="POST" action="auth.php">
                                                    
                                                
                                                <div class="input-group mb-4">
    <input id="email" type="text" class="form-control" name="usuario" required autofocus placeholder="Usuarios" autocomplete="off">
</div>
<div class="input-group mb-4">
    <input id="password" type="password" class="form-control" name="password" required placeholder="Contraseña" autocomplete="off">
</div>
                                                <div class="row">
          
                                                    <div class="col-4 mt-5">
                                                        <a href="../index.php" class="btn btn-info">Regresar</a>
                                                        </div>
                                                        <div class="col-8 mt-5">
                                                            <button type="submit" class="btn btn-lg btn-primary btn-block">Ingresar</button>
                                                    </div>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7 p-0">
                                    <div class="card text-white custom-content page-content mt-0">
                                        <div class="card-body text-center justify-content-center">
                                        	<br>
                                        	<img src="../img/colacion.jpg" width=370">
                                        	<br><br>
                                        	  <p class="text-white-50">
                                                    Apartado de administración de proyectos de modalidad de graduación
                                                </p>
                                                <span class="text-warning">Instituto Técnico INCOS Pando</span>
                                            <div class="custom-logo1">
                                                <!-- <a href="../index.php"><img src="../img/logo.png" class="header-brand-img dark-logo" alt="logo"></a> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Jquery js-->
        <script src="../assets/js/jquery-3.5.1.min.js"></script>

        <!-- Bootstrap4 js-->
        <script src="../assets/plugins/bootstrap/popper.min.js"></script>
        <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>

        <!--Othercharts js-->
        <script src="../assets/plugins/othercharts/jquery.sparkline.min.js"></script>

        <!-- Circle-progress js-->
        <script src="../assets/js/circle-progress.min.js"></script>

        <!-- Jquery-rating js-->
        <script src="../assets/plugins/rating/jquery.rating-stars.js"></script>

    </body>
</html>


<?php } ?>