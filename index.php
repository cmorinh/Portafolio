<?php 
    include_once('include/conexion.php');

    $connection = new conexion();
    $projects = $connection->consultar("select * from proyectos");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portafolio</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css"> 
    <script src="https://kit.fontawesome.com/ded7749dbd.js" crossorigin="anonymous"></script>
</head>
    <body>
        <header class="container-fluid text-center text-white">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container-fluid d-flex justify-content-end">
                    <div class="collapse navbar-collapse justify-content-end" id="navbarToggler">
                        <a class="btn btn-outline-light me-2" href="index.php">Home</a>
                        <a class="btn btn-outline-light me-2" href="#portfolio">Portafolio</a>
                        <a class="btn btn-outline-light" href="#contact">Contacto</a>
                    </div>
                </div>
            </nav>
            <div class="row">
                <div class="col-12">
                    <img class="img-circle mt-4" src="assets/img/1517463744545.jpg" alt="Carlos Morin">
                </div>                
            </div>
            <div class="row">
                <div class="col-12">
                    <h1>
                        Carlos Morín
                    </h1>
                </div>
                <hr>
                <div class="col-12">
                    <h2>
                        FullStack Software Developer Jr
                    </h2>
                </div>
            </div>              
        </header>
        <section id="portfolio" class="container-md">
            <div class="row my-5 sticky-top">
                <div class="col-12">
                    <h2 class="title-section">
                        Portafolio
                    </h2>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                <?php foreach($projects as $project) { ?>
                    <div class="col">
                        <div class="card border-dark">
                            <img src="assets/img/<?php echo $project['IMAGE'] ?>" class="card-img-top" alt="...">
                            <div class="card-body text-dark">
                                <h5 class="card-title"><?php echo $project['NAME'] ?></h5>
                                <p class="card-text card-text-fix"><?php echo $project["DESCRIPTION"] ?></p>
                            </div>
                            <div class="card-footer d-flex justify-content-between">
                                <div>
                                    <small class="text-muted"><?php echo $project["SKILLS"] ?></small>                        
                                </div>
                                <div>
                                    <a class="text-decoration-none" href="<?php echo $project["GIT"] ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" role="img" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github">
                                            <title>GitHub</title>
                                            <path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path>
                                        </svg>
                                    </a>
                                    <a class="text-decoration-none" href="<?php echo $project["WEB"] ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" role="img" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-external-link">
                                            <title>Web</title>
                                            <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path><polyline points="15 3 21 3 21 9"></polyline><line x1="10" y1="14" x2="21" y2="3"></line>
                                        </svg>
                                    </a>
                                </div>                        
                            </div>
                        </div>                    
                    </div>                        
                <?php }; ?>
                <!--
                    <div class="col">
                        <div class="card border-dark">
                            <img src="assets/img/jqwoiuasc.jpg" class="card-img-top" alt="...">
                            <div class="card-body text-dark">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            </div>
                            <div class="card-footer d-flex justify-content-between">
                                <div>
                                    <small class="text-muted">HTML CSS JAVASCRIPT BOOTSTRAP</small>                        
                                </div>
                                <div>
                                    <a class="text-decoration-none" href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" role="img" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github">
                                            <title>GitHub</title>
                                            <path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path>
                                        </svg>
                                    </a>
                                    <a class="text-decoration-none" href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" role="img" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-external-link">
                                            <title>Web</title>
                                            <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path><polyline points="15 3 21 3 21 9"></polyline><line x1="10" y1="14" x2="21" y2="3"></line>
                                        </svg>
                                    </a>
                                </div>                        
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card border-dark">
                            <img src="assets/img/jqwoiuasc.jpg" class="card-img-top" alt="...">
                            <div class="card-body text-dark">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            </div>
                            <div class="card-footer d-flex justify-content-between">
                                <div>
                                    <small class="text-muted">HTML CSS JAVASCRIPT BOOTSTRAP</small>                        
                                </div>
                                <div>
                                    <a class="text-decoration-none" href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" role="img" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github">
                                            <title>GitHub</title>
                                            <path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path>
                                        </svg>
                                    </a>
                                    <a class="text-decoration-none" href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" role="img" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-external-link">
                                            <title>Web</title>
                                            <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path><polyline points="15 3 21 3 21 9"></polyline><line x1="10" y1="14" x2="21" y2="3"></line>
                                        </svg>
                                    </a>
                                </div>                        
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card border-dark">
                            <img src="assets/img/jqwoiuasc.jpg" class="card-img-top" alt="...">
                            <div class="card-body text-dark">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            </div>
                            <div class="card-footer d-flex justify-content-between">
                                <div>
                                    <small class="text-muted">HTML CSS JAVASCRIPT BOOTSTRAP</small>                        
                                </div>
                                <div>
                                    <a class="text-decoration-none" href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" role="img" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github">
                                            <title>GitHub</title>
                                            <path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path>
                                        </svg>
                                    </a>
                                    <a class="text-decoration-none" href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" role="img" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-external-link">
                                            <title>Web</title>
                                            <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path><polyline points="15 3 21 3 21 9"></polyline><line x1="10" y1="14" x2="21" y2="3"></line>
                                        </svg>
                                    </a>
                                </div>                        
                            </div>
                        </div>
                    </div>
                    <div class="col border-dark">
                        <div class="card">
                            <img src="assets/img/jqwoiuasc.jpg" class="card-img-top" alt="...">
                            <div class="card-body text-dark">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            </div>
                            <div class="card-footer d-flex justify-content-between">
                                <div>
                                    <small class="text-muted">HTML CSS JAVASCRIPT BOOTSTRAP</small>                        
                                </div>
                                <div>
                                    <a class="text-decoration-none" href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" role="img" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github">
                                            <title>GitHub</title>
                                            <path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path>
                                        </svg>
                                    </a>
                                    <a class="text-decoration-none" href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" role="img" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-external-link">
                                            <title>Web</title>
                                            <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path><polyline points="15 3 21 3 21 9"></polyline><line x1="10" y1="14" x2="21" y2="3"></line>
                                        </svg>
                                    </a>
                                </div>                        
                            </div>
                        </div>
                    </div>-->
            </div>
        </section>
        <section id="contact" class="container-md">
            <div class="row my-5 sticky-top">
                <div class="col-12">
                    <h2 class="title-section">
                        Contacto
                    </h2>
                </div>
            </div>
            <div class="row flex-column-reverse align-content-center flex-lg-row justify-content-lg-center">
                <div class="col-11 col-md-6 col-lg-5 mt-5">
                    <nav class="navbar"> 
                        <ul class="navbar-nav flex-row justify-content-evenly w-100 flex-lg-column"> 
                            <li class="nav-item mt-2">
                                <a href="https://www.google.com.ar/maps/place/Buenos+Aires/@-34.6156548,-58.5156988,12z/data=!3m1!4b1!4m6!3m5!1s0x95bcca3b4ef90cbd:0xa0b3812e88e88e87!8m2!3d-34.6036844!4d-58.3815591!16zL20vMDFseTVt?entry=ttu" class="text-decoration-none text-white">
                                    <i class="fa-solid fa-location-dot icon-footer mx-1"></i>
                                    <span class="icon-text-footer">Argentina, Capital Federal</span>
                                </a>
                            </li>
                            <li class="nav-item mt-2">
                                <a href="mailto:carlos.alberto.morin@gmail.com" class="text-decoration-none text-white" target="_blank" title="Correo">
                                    <i class="fa-regular fa-envelope icon-footer"></i>
                                    <span class="icon-text-footer">carlos.alberto.morin@gmail.com</span>
                                </a>    
                            </li>
                            <li class="nav-item mt-2"> 
                                <a href="https://github.com/cmorinh" class="text-decoration-none text-white" target="_blank" title="Github">
                                    <i class="fa-brands fa-github icon-footer"></i>
                                    <span class="icon-text-footer">cmorinh</span>
                                </a>
                            </li>
                            <li class="nav-item mt-2"> 
                                <a href="https://ar.linkedin.com/in/carlosmorin" class="text-decoration-none text-white" target="_blank" title="Linkedin">
                                    <i class="fa-brands fa-linkedin icon-footer"></i>
                                    <span class="icon-text-footer">carlosmorin</span>
                                </a>
                            </li>
                        </ul> 
                    </nav>
                </div>                
                <div class="col-11 col-md-6 col-lg-5">
                    <form>
                        <div class="col-12 mt-1">
                          <label for="name" class="form-label ">Nombre</label>
                          <input type="text" class="form-control" id="name" maxlength="40">
                        </div>
                        <div class="col-12 mt-2">
                          <label for="email" class="form-label">Email</label>
                          <input type="email" class="form-control" id="email" maxlength="300">
                        </div>
                        <div class="col-12 mt-2">
                          <label for="reason" class="form-label">Asunto</label>
                          <input type="text" class="form-control" id="reason">
                        </div>
                        <div class="col-12 mt-2">
                          <label for="message" class="form-label">Mensaje</label>
                          <textarea class="form-control" id="message" rows="5" cols="40"></textarea>
                        </div>                        
                        <div class="col-12 text-center mt-4">
                          <button type="submit" class="btn btn-dark btn-outline-light">ENVIAR</button>
                        </div>
                      </form>
                </div>
            </div>
        </section>
        <?php include('partials/footer.php'); ?> 
    </body>
</html>