<?php session_start();
if(isset($_SESSION['usuario'])){
    header('Location:contenidom.php');
}
if($_SERVER['REQUEST_METHOD']=='POST'){
    $usuario=filter_var(strtolower($_POST['usuario']),FILTER_SANITIZE_STRING);
    $grupo=$_POST['grupo'];
    $password=$_POST['password'];
    $password2=$_POST['password2'];
   // echo "$usuario . $grupo . $password . $password2";
    $errores='';
    if(empty($usuario)or empty($grupo)or empty($password)or empty($password2) ){
$errores.='<li> Resgistra todos los campos</li>';
}
else{
    try{
        $conexion=new PDO('mysql:host=localhost;dbname=sistema','root','Bazinga02');
    }catch(PDOException $e){
        echo "Error: ".$e->getMessage();
    }
    $statement=$conexion->prepare('SELECT * FROM alumnos where usuario=:usuario LIMIt 1');
    $statement->execute(array(':usuario'=>$usuario));
    $resultado=$statement->fetch();
   if($resultado==true){
       $errores.="El usuario ya esta registrado";
   }

   $password=hash('sha512',$password);
   $password2=hash('sha512',$password2);
   if($password!=$password2){
    $errores .='<li>La contraseña no coinside</li>';
   }

}
    if($errores==''){
        $statement= $conexion->prepare('INSERT INTO alumnos(usuario, pass, grupo) VALUES (:usuarios, :pass, :grupo )');
        $statement->execute(array(':usuarios'=>$usuario,
        'pass'=>$password,
        'grupo'=>$grupo));
        header('Location:logina.php');
    }
}

require 'views/registroa.views.php';
?>