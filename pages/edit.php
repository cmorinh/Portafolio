<?php 
    ob_start();
    session_start();    

    if(!isset($_SESSION['logueado']) || $_SESSION['logueado'] != true)
    {
        header('location:/login.php');
        die();
    }

    require_once('../include/config.php');
    require_once('../include/project.php');

    $showMessage = false;
    $connection = new conexion();    
    $project = new Project(0, "", "", "", "", "", "");

    if($_POST)
    {       
        $project = new Project($_POST['id'], $_POST['name'], $_POST['description'], $_FILES['image']['name'], $_POST['skills'], $_POST['git'], $_POST['web']);

        if(!empty($project->GetImage()))
        {
            $imageTemp = $_FILES['image']['tmp_name'];
            $date = new DateTime();
            $project->SetImage($date->getTimestamp() . "_" . $project->GetImage());
            move_uploaded_file($imageTemp, '..' . PATH_IMAGE . $project->GetImage());              
        }

        if(is_numeric($project->GetId()) && $project->GetId() == "0")
        {
            $sql = "INSERT INTO proyectos ";
            $sql = $sql .  "(`NAME`, `DESCRIPTION`, `IMAGE`, `SKILLS`, `GIT`, `WEB`) ";
            $sql = $sql . "VALUES ('" . $project->GetName() . "', '" . $project->GetDescription() . "', '" . $project->GetImage(); 
            $sql = $sql . "', '" . $project->GetSkills() . "', '" . $project->GetGit(). "', '" . $project->GetWeb() . "')";

            $id_proyecto = $connection->ejecutar($sql);

            if($id_proyecto > 0)
            {
                header("location:edit.php?m=s");                    
            }
        }
        
        if(is_numeric($project->GetId()) && $project->GetId() != "0")
        {
            $sql = "UPDATE proyectos SET NAME = '" . $project->GetName() . "',";
            $sql = $sql . "DESCRIPTION = '" . $project->GetDescription() . "',";
            $sql = $sql . "SKILLS = '" . $project->GetSkills() . "',";
            $sql = $sql ."GIT = '" . $project->GetGit() . "',";
            $sql = $sql ."WEB = '" . $project->GetWeb() . "'";

            if(!empty($project->GetImage()))
            {
                $sql = $sql . ", IMAGE = '" . $project->GetImage() . "'";                
            }

            $sql = $sql . "where ID =" . $project->GetId();      
            $id_proyecto = $connection->ejecutar($sql);      

            if($id_proyecto == 0)
            {
                header("location:edit.php?m=s");     
            }
        }       
    }

    if($_GET)
    {
        if(!empty($_GET['id']) && is_numeric($_GET['id']) && is_numeric($_GET['a']))
        {
            $id = $_GET['id'];

            switch($_GET['a'])
            {
                case "1": //edit                        
                        $projects = $connection->consultar("select * from proyectos where ID = $id");
                        $project = new Project($projects[0]['ID'], $projects[0]['NAME'], $projects[0]['DESCRIPTION'], "", $projects[0]['SKILLS'],  $projects[0]['GIT'], $projects[0]['WEB']);
                    break;
                case "2": //delete                        
                    $id_proyecto = $connection->ejecutar("DELETE FROM proyectos where ID = $id");

                    if($id_proyecto == 0)
                    {
                        header("location:edit.php?m=s"); 
                    }
                    break;
            }     
        }

        if(!empty($_GET['m']) && $_GET['m'] == "s")
        {
            $showMessage = true;
        }
    }

    $projects = $connection->consultar("select * from proyectos");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portafolio - Edición</title>
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
        <section id="message" class="container-md">
            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                </symbol>
            </svg>
            <div class="alert alert-success d-flex align-items-center <?php if($showMessage) { echo "show"; } else { echo "fade"; } ?>" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                <div>
                    Operación realizada con exito
                </div>                
            </div>
            <?php 
                if($showMessage) { 
                    echo "<script> setTimeout(() => { const alert = document.getElementsByClassName('alert')[0]; alert.classList.add('fade'); alert.classList.remove('show'); }, 5000);</script>";                
                }; 
            ?>
        </section>
        <section id="newPortfolio" class="container-md">
            <div class="row mt-5 mb-3">
                <div class="col-12">
                    <h2 class="title-section fs-1">
                        Edición de Portafolio
                    </h2>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12 d-flex justify-content-start">
                    <div class="me-2">
                        <i class="fa-solid fa-plus"></i>     
                        <button class="btn text-white btn-new">Nuevo</button>
                    </div>
                    <div class="me-2">
                        <i class="fa-solid fa-arrows-rotate"></i>
                        <button class="btn text-white btn-reload">Actualizar</button>
                    </div>
                </div>
            </div>
            <div id="newProject" class="row justify-content-center mb-5 new-project <?php if(!empty($project->GetName())) { echo 'show'; } ?>">
                <div class="col-md-10 col-sm-12">
                    <div class="card bg-secondary">
                        <div class="card-header">
                            Proyecto
                        </div>
                        <div class="card-body">
                            <form action="edit.php" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-12">
                                        <?php 
                                            if($project->GetId() != "0")
                                            { ?>
                                                <label for="idProject" class="mb-2">Id: <?php echo $project->GetId() ?></label>
                                        <?php
                                            } ?>
                                            <input id="idProject" type="hidden" name="id" value="<?php echo $project->GetId() ?>" required>
                                    </div>                
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <label for="name" class="mb-2">Nombre</label>
                                        <input id="nameProject" class="form-control" type="text" name="name" maxlength="30" value="<?php echo $project->GetName() ?>" required>
                                    </div>                    
                                    <div class="col-12 col-md-6">
                                        <label for="image" class="mb-2">Imagen</label>
                                        <input id="imageProject" class="form-control" type="file" name ="image">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <label for="description" class="my-2">Descripción</label>
                                        <textarea id="descriptionProject" class="form-control" name="description" cols="30" rows="4" maxlength="270" required><?php echo $project->GetDescription() ?></textarea>
                                    </div>
                                </div>
                                <div class="row">                                
                                    <div>
                                        <label for="skills" class="my-2">Tecnologías</label>
                                        <input id="skillsProject"  class="form-control" type="text" name="skills" maxlength="40" value="<?php echo $project->GetSkills() ?>" required>
                                    </div> 
                                    <div>
                                        <label for="git" class="my-2">Repositorio Git</label>
                                        <input id="gitProject" class="form-control" type="url" name="git" maxlength="500" pattern="(http|HTTP|Http)(s*)://.*" value="<?php echo $project->GetGit() ?>" required>
                                    </div> 
                                    <div>
                                        <label for="web" class="my-2">Pagina Web</label>
                                        <input id="webProject" class="form-control" type="url" name="web" maxlength="500" pattern="(http|HTTP|Http)(s*)://.*" value="<?php echo $project->GetWeb() ?>" required>
                                    </div> 
                                </div>
                                <div class="d-flex justify-content-center">
                                    <button id="btnCancel" class="btn btn-light m-3" type="reset">Cancelar</button>
                                    <button id="btnSend" class="btn btn-success m-3" type="submit">Guardar</button>
                                </div>                        
                            </form>
                        </div>            
                    </div>                    
                </div>
            </div>
        </section>
        <section id="listPortfolio" class="container-md">
            <div class="row">
                <div class="col-12 table-responsive"> 
                    <table class="table table-secondary table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">Id</th>
                                <th scope="col" class="text-center">Nombre</th>
                                <th scope="col" class="text-center">Descripción</th>
                                <th scope="col" class="text-center">Tecnologías</th>
                                <th scope="col" class="text-center">Imagen</th>
                                <th scope="col" class="text-center">GitHub</th>
                                <th scope="col" class="text-center">Web</th>                                
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($projects as $project) { ?>
                                <tr>
                                    <th scope="row" class="th-project-table">
                                        <?php echo $project['ID'] ?>
                                    </th>
                                    <td class="td-project-table">
                                        <p>
                                            <?php echo $project['NAME'] ?>
                                        </p>                                        
                                    </td>
                                    <td class="td-project-table">
                                        <p>
                                            <?php echo $project['DESCRIPTION'] ?>
                                        </p>                                        
                                    </td>
                                    <td class="td-project-table">
                                        <p>
                                            <?php echo $project['SKILLS'] ?>
                                        </p>                                        
                                    </td>
                                    <td class="td-project-table">
                                        <img src="<?php echo '..' . PATH_IMAGE . $project['IMAGE'] ?>" class="img-thumbnail" alt="<?php echo $project['NAME'] ?>">
                                    </td>
                                    <td class="td-project-table">
                                        <!--<p>
                                            <?php echo $project['GIT'] ?>
                                        </p>-->
                                        <i class="fa-brands fa-github fa-xl text-dark" title="<?php echo $project['GIT'] ?>"></i>
                                    </td>
                                    <td class="td-project-table">
                                        <!--<p>
                                            <?php echo $project['WEB'] ?>
                                        </p>-->   
                                        <i class="fa-solid fa-arrow-up-right-from-square fa-lg text-dark" title="<?php echo $project['WEB'] ?>"></i>                                     
                                    </td>
                                    <td class="td-project-table">
                                        <a href="edit.php?id=<?php echo $project['ID'] ?>&a=1" class="text-dark" title="Editar">
                                            <i class="fa-icon fa-solid fa-pen-to-square fa-lg"></i>    
                                        </a>
                                    </td>                                    
                                    <td class="td-project-table">
                                        <a href="edit.php?id=<?php echo $project['ID'] ?>&a=2" class="text-dark" title="Eliminar">
                                            <i class="fa-icon fa-solid fa-trash-can fa-lg"></i>                                
                                        </a>
                                    </td>                                    
                                </tr>
                            <?php } ?>    
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <script src="../js/bootstrap.bundle.min.js"></script>   
        <script src="../js/edit.js"></script>   
    </body>
</html>