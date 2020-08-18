<?php session_start();

if(isset($_SESSION['usuario'])){
    header('Location:contenidoa.php');
}
$errores = '';
if($_SERVER['REQUEST_METHOD']=='POST'){
 $usuario=filter_var(strtolower($_POST['usuario']),FILTER_SANITIZE_STRING);
 $password=$_POST['password'];
 $password=hash('sha512', $password);
 try{
    $conexion=new PDO('mysql:host=localhost;dbname=sistema','root', 'Bazinga02');
 }catch(PDOException $e){
     echo "Error:" . $e->getMessage();
 }
  $statement=$conexion->prepare('SELECT * FROM alumnos WHERE usuario=:usuario AND pass=:passwor' );
  $statement->execute(array(':usuario'=>$usuario,':passwor' =>$password));
  $resultado=$statement->fetch();
  if($resultado!=false){
      $_SESSION['usuario']=$usuario;
header('Location:contenidoa.php');
  }
  $errores .= '<li> Error al ingresar</li>';
}
require 'views/logina.views.php'

?>