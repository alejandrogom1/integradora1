<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=+, initial-scale=1.0">
    <title>Registro de maestro </title>
    <link rel="stylesheet" href="css/formulario.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
</head>
<body>
    
    <div class="contenedor fondo">
      <h1 class="titulo">Resgistrate</h1>
      <hr class="border">
      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="formulario" name="login">
      <div class="form-group">
      <i class="icono izquierda fa fa-user"></i><input type="text" name="usuario" class="usuario" placeholder="Usuario" maxlength="12">
      </div>
      <div class="form-group">
      <i class="icono izquierda fa fa-lock"></i><input type="text" name="grupo" class="usuario" placeholder="Grupo" maxlength="3">
      </div>
      <div class="form-group">
      <i class="icono izquierda fa fa-lock"></i><input type="password" name="password" class="password" placeholder="Contraseña">
      </div>
      <div class="form-group">
      <i class="icono izquierda fa fa-lock"></i><input type="password" name="password2" class="password_btn" placeholder="Contraseña"><i class="submit-btn fa  fa-arrow-right" onclick="login.submit()"> </i>
      </div>
      <?php if(!empty($errores)): ?>
        <div class="error">
         <ul>
           <?php echo $errores;?>
         </ul>
        </div>
      <?php endif; ?>
      </form>
      <p class="texto-registrate">¿Ya tienes Cuenta </p>
      <a href="loginm.php">Ingresa a </a>
    </div>

</body>
</html>