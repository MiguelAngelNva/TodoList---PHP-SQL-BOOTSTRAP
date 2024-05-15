<?php include_once("agregarTarea.php") ?> 
<!doctype html>
<html lang="en">
    <head>
        <title>TodoList</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
        <style>
            .subrayado{
                text-decoration: line-through;
            }
        </style>
    </head>

    <body>
        <header>
            <!-- place navbar here -->
        </header>
        <main class="container"> 
           <br/>
            <div class="card">
                <div class="card-header">TODO LIST</div>
                <div class="card-body">

                    

                    <div class="mb-3">
                        <form action="" method="post">
                            <label for="tarea" class="form-label">Tarea:</label>
                            <input
                                type="text"
                                class="form-control"
                                name="tarea"
                                id="tarea"
                                aria-describedby="helpId"
                                placeholder="Escriba su tarea"
                                required
                            />

                            <br/>
                            <input
                                name="agregar_tarea"
                                id="agregar_tarea"
                                class="btn btn-primary"
                                type="submit"
                                value="Agregar tarea"
                            />
                        </form>
                    </div>
                        
                    <ul class="list-group">

                        <!-- cargamos los datos almacenados en la base de datos -->
                        <?php foreach($datosAlmacenados as $dato){ ?>
                        
                            <li class="list-group-item "> 
                                
                                <form action="" method="post">
                                    <input type="hidden" name="id" value="<?php echo $dato['id']; ?>">
                                    <input
                                        class="form-check-input float-start"
                                        type="checkbox"
                                        name="completado"
                                        value="<?php echo $dato['estado']; ?>"
                                        id=""
                                        <?php /*Mandar el formulario automaticamente cada vez que el estado cambie*/ ?>
                                        onchange="this.form.submit()"
                                        <?php /*Subrayar las tareas en las que el estado sea 1*/ ?>
                                        <?php echo ($dato['estado']==1)?'checked':'' ?>
                                    />


                                </form>
                                
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="float-start <?php echo ($dato['estado'] == 1) ? 'subrayado' : ''; ?>">
                                        &nbsp; <?php echo $dato['nombre']; ?>
                                    </span>
                                    <h6 class="m-0">
                                        <!-- lógica de eliminación de usuarios -->
                                        &nbsp;<a href="?id=<?php echo $dato['id']; ?>"><span class="badge bg-danger float-end">X</span></a>
                                    </h6>
                                </div>

                            </li>
                            
                        <?php }?>

                    </ul>
                    
                </div>
            </div>
            
        </main>
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
