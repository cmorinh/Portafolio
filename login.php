<?php 
    ob_start();
    session_start();

    $errorMessage = '';

    if ($_POST)
    {
        if( ($_POST['user']=="admin") && ($_POST['pass']=='@dm1n') )
        {
          $_SESSION['usuario']="Admin";
          $_SESSION['logueado']=true;

          header("location:pages/admin.php");
          die();
        }
        else{
            $errorMessage = "Usuario o contraseña incorrectas";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portafolio - Inicia sesión</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <script src="https://kit.fontawesome.com/ded7749dbd.js" crossorigin="anonymous"></script>
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">    
</head>
    <body>
        <div class="container h-100">
            <div class="row justify-content-center align-items-center align-content-center h-75">
                <div class="col-11 col-md-6 col-lg-4">
                    <img src="assets/img/as8d7qw4asd.jpg" class="img-fluid rounded-start" alt="login" />
                </div>
                <div class="col-11 col-md-4 col-lg-3 mt-3">
                    <form action="login.php" method="post">
                    <div class="mb-3">
                            <label for="inputUser" class="form-label">Usuario</label>
                            <input type="text" class="form-control" id="inputUser" name="user" placeholder="" maxlength="20" required>
                        </div>
                        <div class="mb-2">
                            <label for="inputPass" class="form-label">contraseña</label>
                            <input type="password" class="form-control" id="inputPass" name="pass" placeholder="" maxlength="20" required>                                                    
                        </div>
                        <?php if(!empty($errorMessage)) { ?>
                            <div class="mb-1 text-center">
                                <span class="text-danger fw-bold fs-6"><?php echo $errorMessage ?></span>
                            </div>
                        <?php } ?>                        
                        <div class="text-center">
                            <button type="submit" class="btn border-light text-white mt-3">Iniciar sesión</button>
                        </div>
                    </form>
                </div>
            </div>        
        </div>
    </body>
</html>

