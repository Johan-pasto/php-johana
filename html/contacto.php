<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=  , initial-scale=1.0">
    <title>Document</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<title>Retaurante don pollo</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
<script src="../js/calendario.js" defer></script>
<body>
   <!--barra de navegacion-->

   <?php
session_start();
$usuario = $_SESSION['usuario'] ?? null;
?>
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
  <div class="container-fluid">
    
    <!-- Usuario y logout a la izquierda -->
    <?php if ($usuario): ?>
      <div class="d-flex align-items-center me-auto">
        <span class="navbar-text text-white me-3">
          Bienvenido, <?= htmlspecialchars($usuario['Nombre']) ?>
        </span>
        <a href="../Controller/logout.php" class="btn btn-outline-light btn-sm">Cerrar sesión</a>
      </div>
    <?php endif; ?>

    <!-- Marca -->
    <a class="navbar-brand ms-auto" href="#" style="font-size: 30px;">
      Pollo Eats
      <img src="../img/pixelcut-export.jpeg" alt="Logo" style="width: 40px;" class="rounded-pill">
    </a>

    <!-- Botón para móviles -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Menú -->
    <div class="collapse navbar-collapse" id="menuNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="./menu.html">Menú</a></li>
        <li class="nav-item"><a class="nav-link" href="./sobre nosotros.html">Nosotros</a></li>
        <li class="nav-item"><a class="nav-link" href="./indexP.php">Inicio</a></li>
        <li class="nav-item"><a class="nav-link" href="./contacto..php">Contacto</a></li>
        <li class="nav-item"><a class="nav-link" href="./perfil.php">Perfil</a></li>
        <?php if (!$usuario): ?>
          <li class="nav-item"><a class="nav-link" href="./login.php">Inicio/Registro</a></li>
        <?php endif; ?>
      </ul>
    </div>

  </div>
</nav>

  <!-- fin carrito -->
 

 <!--fin de barra-->
   <div id="map"></div>
   <script src="../js/script.js"></script>
   <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBDaeWicvigtP9xPv919E-RNoxfvC-Hqik&callback=iniciarMap"></script>
  </div>
   <div class="container mt-3">

    <form action="/action_page.php">
      <div class="form-floating mb-3 mt-3">
        <input type="text" class="form-control" id="email" placeholder="Enter email" name="email">
        <label for="email">Nombre</label>
      </div>
      <div class="form-floating mt-3 mb-3">
        <input type="text" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
        <label for="pwd">Email</label>
      </div>

      <form action="/action_page.php">
        <div class="mb-3 mt-3">
          <label for="comment">Mensaje:</label>
          <textarea class="form-control" rows="5" id="comment" name="text"></textarea>
        </div>
        
      </form>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
  
  <div class="container mt-3">
    
    
    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#myModal">
      Reservar
    </button>
  </div>
  
  <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog modal-fullscreen">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Modal Heading</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
  
        <!-- Modal body -->
        <div class="container mt-3">
          
          <form action="/action_page.php">
            <div class="mb-3 mt-3">
              <label for="email">Nombre:</label>
              <input type="email" class="form-control" id="email" placeholder="ingrese su nombre" name="email">
            </div>
            <div class="mb-3">
              <label for="pwd">Telefono:</label>
              <input type="password" class="form-control" id="pwd" placeholder="ingrese su telefono" name="pswd">
            </div>
            <div class="mb-3">
              <label for="pwd">email:</label>
              <input type="password" class="form-control" id="pwd" placeholder="ingrese su email" name="pswd">
            </div>
            
          </form>
        </div>
        <!-- formulario2 -->
        <div class="container mt-3">
          
          <form>
            <div class="row">
              <div class="col">
                <input type="text" class="form-control" placeholder="Hora de reserva" name="email">
              </div>
              <div class="col">
                <input type="password" class="form-control" placeholder="Numero de personas" name="pswd">
              </div>
            </div>
          </form>
          <div class="form-check mb-3">
            
          </div>
        </div>




         <!-- calendario-->
        <div class="modal-body">
          <div class="container mt-3">
          
            <form>
              <div class="row">
                <div class="col">
          <div class="wrapper">
            <header>
              <p class="current-date"></p>
              <div class="icons">
                <span id="prev" class="material-symbols-rounded">chevron_left</span>
                <span id="next" class="material-symbols-rounded">chevron_right</span>
              </div>
            </header>
            <div class="calendar">
              <ul class="weeks">
                <li>Sun</li>
                <li>Mon</li>
                <li>Tue</li>
                <li>Wed</li>
                <li>Thu</li>
                <li>Fri</li>
                <li>Sat</li>
              </ul>
              <ul class="days"></ul>
            </div>
          </div>
        </div>
        
      </div>
      
    </div>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Enviar</button>
        </div>
  
      </div>
    </div>
  </div>












<!-- inicio footer -->

<footer class="footer extend text-center ">

 
  <div class="container p-7 my-7 bg-dark text-white">
      <div class="row">
      <div class="col-lg-4 col-md-4">
      <h3>carrera 43 #542 7A</h3>
      <h3>carrera 34 #415 12</h3>
      <h3>carrera 24 #424 3b</h3>
    </div>
      <div class="col-4" id="redes">
      <img src="../img/red1.png" alt="" height="30px"><h5>@pollo_restaurant34</h5>
      <img src="../img/red2.png" alt="" height="30px"><h5>@pollo_restaurant34</h5>
      <img src="../img/red3.png" alt="" height="30px"><h5>@pollo_restaurant34</h5>
      <img src="../img/red4.jpg" alt="" height="30px"><h5>313151517</h5>
    </div>
   
    <div class="col-4">
    <h4>telefono</h4>
    <h3>Tel:321441515</h3>
    </div>
    
  </div>
   
  </footer>

</body>
</html>