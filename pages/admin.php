<?php 
    ob_start();
    session_start();    
    require_once('../include/config.php');

    if(!isset($_SESSION['logueado']) || $_SESSION['logueado'] != true)
    {
        header('location:/login.php');
        die();
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portafolio - Configuración</title>
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
    <script src="https://kit.fontawesome.com/ded7749dbd.js" crossorigin="anonymous"></script>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">     
</head>
    <body>
        <?php require_once('../partials/loading.php') ?>
        <header class="container-fluid">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container-fluid justify-content-end">
                    <button class="navbar-toggler mt-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa-solid fa-bars fa-xl" style="color: #ffffff;"></i>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                        <ul class="nav mt-3 flex-column align-items-end flex-md-row align-items-md-center justify-content-md-end">
                            <li class="nav-item mx-3 my-2">
                                <a class="btn btn-outline-light text-white" aria-current="page" href="admin.php">Proyectos</a>
                            </li>
                            <li class="nav-item mx-3 my-2">
                                <a class="btn btn-outline-light text-white" href="edit.php">Editar</a>
                            </li>
                            <li class="nav-item mx-3 my-2">
                                <a class="btn btn-outline-light text-white" href="/logout.php">Salir</a>
                            </li>
                            <li class="nav-item mx-3 my-2">
                            <span class="nav-link text-white"><i class="text-white fa-solid fa-user-large fa-lg"></i> <?php echo $_SESSION['usuario'] ?></span>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>            
        </header>
        <section id="portfolio" class="container-md">
            <div class="row mt-5 mb-3">
                <div class="col-12">
                    <h2 class="title-section fs-1">
                        Administrador de Portafolio
                    </h2>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12">
                    <h6>
                        Vista previa de los proyectos almacenados
                    </h6>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                <?php require_once('../partials/projects.php'); ?>
            </div>
        </section>
        <script src="../js/bootstrap.bundle.min.js"></script>   
    </body>
</html>