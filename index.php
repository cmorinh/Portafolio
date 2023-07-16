<?php 
    require_once('include/config.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portafolio</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <script src="https://kit.fontawesome.com/ded7749dbd.js" crossorigin="anonymous"></script>
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">     
</head>
    <body>
        <header class="container-fluid text-center text-white header-img">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container-fluid d-flex justify-content-end">
                    <div class="collapse navbar-collapse justify-content-end" id="navbarToggler">
                        <a class="btn btn-outline-light me-2" href="index.php">Inicio</a>
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
                <?php require_once('./partials/projects.php'); ?>
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
                          <label for="email" class="form-label">Correo</label>
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
        <script src="./js/bootstrap.bundle.min.js"></script>   
    </body>
</html>