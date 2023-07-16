<?php 
    $connection = new conexion();
    $projects = $connection->consultar("select * from proyectos");
?>
<?php foreach($projects as $project) { ?>
    <div class="col">
        <div class="card border-dark">
            <img src="<?php echo PATH_IMAGE . $project['IMAGE'] ?>" class="card-img-top" alt="<?php echo $project['NAME'] ?>">
            <div class="card-body text-dark">
                <h5 class="card-title"><?php echo $project['NAME'] ?></h5>
                <p class="card-text card-text-fix"><?php echo $project["DESCRIPTION"] ?></p>
            </div>
            <div class="card-footer d-flex justify-content-between">
                <div>
                    <small class="text-muted"><?php echo $project["SKILLS"] ?></small>                        
                </div>
                <div>
                    <a class="text-decoration-none" href="<?php echo $project["GIT"] ?>" target="_blank">
                        <i class="fa-brands fa-github fa-xl" style="color: #6c757d;" title="GitHub"></i>
                    </a>
                    <a class="text-decoration-none" href="<?php echo $project["WEB"] ?>" target="_blank">
                        <i class="fa-solid fa-arrow-up-right-from-square fa-lg" style="color: #6c757d;" title="Pagina Web"></i>
                    </a>
                </div>                        
            </div>
        </div>                    
    </div>                        
<?php }; ?>