<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>crear BD</title>
  </head>
  <body>
    <h1>Crear BD</h1>
<?php
try{
    $conexion = new PDO("mysql:host=localhost", "root");
  }catch(PDOException $e){
    echo "Error: ".$e->getMessage();
    die();
  }

  /* Borrar la BD */
  $sql = "drop database if exists mister;";
  $res = $conexion->exec($sql);
  echo "<p>Se ha borrado la base de datos anterior.</p>";

  /* Crear la BD*/
  $sql = "create database mister;";
  $res = $conexion->exec($sql);
  if($res===FALSE){
    echo "<p>No se ha podido crear la base de datos.</p>";
    echo "<p>".$conexion->erorInfo()[2]."</p>";
  }else{
    echo "<p>Base de datos creada.</p>";
  }

  /* Conectar la BD */
  $sql = "use mister;";
  $res = $conexion->exec($sql);
  if($res===FALSE){
    echo "<p>No se ha podido conectar a la base de datos.</p>";
    echo "<p>".$conexion->erorInfo()[2]."</p>";
  }else{
    echo "<p>Conectados!!!</p>";
  }




/* Crear tabla preguntas */
$sql = <<<sql
create table preguntas(
id int primary key auto_increment,
pregunta varchar(20),
tema int
);
sql;
$res = $conexion->exec($sql);
if($res===FALSE){
      echo "<p>No se ha podido crear la tabla preguntas.</p>";
      echo "<p>".$conexion->errorInfo()[2]."</p>";
}else{
      echo "<p>Tabla preguntas creada!!!</p>";
  }


  /* Crear tabla temas */
$sql = <<<sql
create table temas(
id int primary key auto_increment,
titulo varchar(20) not null,
titulo_url varchar(50)
);
sql;
$res = $conexion->exec($sql);
if($res===FALSE){
  echo "<p>No se ha podido crear la tabla temas.</p>";
  echo "<p>".$conexion->erorInfo()[2]."</p>";
}else{
  echo "<p>Tabla temas creada.</p>";
}

/* Crear tabla respuestas */
$sql = <<<sql
create table respuestas(
id int primary key auto_increment,
respuesta varchar(80),
verdadera boolean,
pregunta int not null
);
sql;
$res = $conexion->exec($sql);
if($res===FALSE){
    echo "<p>No se ha podido crear la tabla respuestas.</p>";
    echo "<p>".$conexion->errorInfo()[2]."</p>";
}else{
    echo "<p>Tabla respuestas creada!!!</p>";
}


/* Insert preguntas */
$sql =<<<sql
insert into preguntas(pregunta, tema) values
("3+3?",1);
sql;
$res = $conexion->exec($sql);
if($res===FALSE){
    echo "<p>Error al añadir datos.</p>";
    echo "<p>".$conexion->errorInfo()[2]."</p>";
}else{
    echo "<p>Se han añadido $res filas.</p>";
}

/* Insert respuestas */
$sql =<<<sql
insert into respuestas(respuesta, pregunta) values
("6",1);
sql;
$res = $conexion->exec($sql);
if($res===FALSE){
    echo "<p>Error al añadir datos.</p>";
    echo "<p>".$conexion->errorInfo()[2]."</p>";
}else{
    echo "<p>Se han añadido $res filas.</p>";
}

?>
</body>
</html>
