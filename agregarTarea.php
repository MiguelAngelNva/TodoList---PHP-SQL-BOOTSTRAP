<?php
// conexion con la base de datos
try{
    $conect = new PDO('mysql:host=localhost;dbname=todolist', 'root', '');
// direccion ip, en este caso es local, nombre de la base de datos, usuario, contraseña
}catch(PDOException $e){
    echo "error de conexion";
}

// consulta sql para traer los datos de la base de datos
$getTareas="SELECT * FROM tareas";

// logica para la actualizacion de estado de las tareas
if(isset($_POST['id'])){
    $id = $_POST['id'];
    $completado =(isset($_POST['completado']))?1:0;
    
    // consulta sql para actualizar el estado de las tareas
    $updateTareaSQL = "UPDATE tareas SET estado=? WHERE id = ?";
    // preparamos la instruccion sql con prepare() para posteriormente insertarle el valor
    $sentencia = $conect->prepare($updateTareaSQL); 
    // insertamos los datos a la instruccion sql mediante execute()
    $sentencia->execute([$completado, $id]);


}

// verificacion si hubo un envio Post mediante el boton 'agregar_tarea'
if(isset($_POST['agregar_tarea'])){
    // obtener la tarea enviada en el formulario 
    $nombreTarea = trim($_POST['tarea']);

    // verificar si el input no llega vacio
    if(!empty($nombreTarea)){
        // en el simbolo de interrogacion "?" obtendrá el valor de lo enviado la funcion execute()
        $postTareaSQL = "INSERT INTO tareas (nombre, estado) VALUES (?, ?)";
        // preparamos la instruccion sql con prepare() para posteriormente insertarle el valor
        $sentencia = $conect->prepare($postTareaSQL);
        // insertamos los datos a la instruccion sql mediante execute()
        $sentencia->execute([$nombreTarea, 0]);
    }

}

if(isset($_GET['id'])){
    $id = $_GET['id'];

    // consulta sql para eliminar tareas
    $deleteTareaSQL = "DELETE FROM tareas WHERE id = ?";
    // preparamos la instruccion sql con prepare() para posteriormente insertarle el valor
    $sentencia = $conect->prepare($deleteTareaSQL);
    // insertamos los datos a la instruccion sql mediante execute()
    $sentencia->execute([$id]);
}
//  enviamos el contenido que esta en la base de datos
$datosAlmacenados = $conect->query($getTareas);
?>